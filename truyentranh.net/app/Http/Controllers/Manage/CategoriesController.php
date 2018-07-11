<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\CategoriesRequest;
use App\Http\Controllers\ManageController;
use App\Models\Categories;
use App\Repositories\CategoriesRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoriesController extends ManageController
{
    protected $repository;
    protected $categories;

    public function __construct(CategoriesRepository $repository,Categories $categories)
    {
        $this->repository = $repository;
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $categoriesCollection = $this->repository->getAllCategories();
            $dataTables         = new CategoriesDataTable($categoriesCollection);
            return $dataTables->getTransformerData();
        }

        $fields = [
            'id'         => [
                'label' => 'ID',
            ],
            'name'       => [
                'label' => 'Tên thể loại',
            ],
            'status'     => [
                'label' => 'Trạng thái',
            ],
            'created_at' => [
                'label' => 'Ngày tạo',
            ],
            'actions'    => [
                'label'      => 'Action',
                'searchable' => false,
                'orderable'  => false,
            ],
        ];
        $dtColumns = CategoriesDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];

        return view('manage.categories.datatable')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $inputs = $request->all();
        try {
            DB::beginTransaction();
            $this->categories->fill($inputs);
            $this->categories->save();
            DB::commit();
            return redirect()->route('categories.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create categories is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['record'] = $this->categories->find($id);
        if(empty($data['record']))
        {
            return abort(404);
        }
        return view('manage.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $category = Categories::find($id);
        if (empty($category)) {
            return abort(404);
        }
        $inputs     = $request->all();
        try {
            DB::beginTransaction();
            $category->update($inputs);
            DB::commit();
            return redirect()->route('categories.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('categories.edit', ['id' => $category->id])->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update category is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->repository->find($id);
        if (empty($model)) {
            return $this->responseJsonAjax(
                $this->AJAX_RESULT['FAIL'],
                'Id ' . $id . ' items not found'
            );
        }
        try {
            DB::beginTransaction();
            $this->repository->delete($id);
            DB::commit();
            return $this->responseJsonAjax(
                $this->AJAX_RESULT['SUCCESS'],
                'Delete id ' . $id . ' items success'
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return $this->responseJsonAjax(
            $this->AJAX_RESULT['FAIL'],
            'Delete categories failed'
        );
    }

    public function batch()
    {
        try {
            if (request()->method() !== 'POST') {
                Log::warning('The requested method ' . request()->method() . ' is not allowed for the URL.',
                    __METHOD__);
                throw new \Exception('Method is not allowed for the URL', self::CTRL_MESSAGE_ERROR);
            }
            $inputs = request()->all();
            $validator = static::validate_batch($inputs);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($inputs);
            }
            $ids = request()->get('ids');
            if (empty($ids)) {
                throw new \Exception('Vui lòng chọn items');
            }

            DB::beginTransaction();
            switch (request()->get('batch_actions')) {
                case 'status_publish':
                    DB::table($this->categories->getTable())
                        ->whereIn('id', $ids)
                        ->update(['status' => Categories::STATUS_ON, 'updated_at' => Carbon::now()]);
                    break;

                case 'status_unpublish':
                    DB::table($this->categories->getTable())
                        ->whereIn('id', $ids)
                        ->update(['status' => Categories::STATUS_OFF, 'updated_at' => Carbon::now()]);
                    break;

                case 'delete':
                    DB::table($this->categories->getTable())
                        ->whereIn('id', $ids)
                        ->update(['deleted_at' => Carbon::now()]);
                    break;

                default:
                    throw new \Exception(__('Action được chọn không có trong danh sách'));
                    break;
            }
            DB::commit();


            return redirect()->route('categories.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception  $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('categories.index')->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Batch action categories is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    public function delete($id)
    {
        $category = Categories::find($id);
        if (empty($category)) {
            return abort(404);
        }

        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            return redirect()->route('categories.index')->with([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('categories.index')->with([
            'message' => __('system.message.errors', ['errors' => 'Delete category is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    public static function validate_batch($data)
    {
        return Validator::make($data, [
            'batch_actions' => 'required',
            'ids'           => 'nullable|array',
        ]);
    }
}
