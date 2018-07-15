<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\BooksDataTable;
use App\Repositories\BooksRepository;
use App\Models\Books_Categories;
use App\Models\Categories;
use App\Models\Books;
use App\Http\Requests\BoooksRequest;
use App\Http\Controllers\ManageController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Helpers\Helpers;
use App\Helpers\Uploads;

class BooksController extends ManageController
{
    protected $repository;
    protected $books;

    public function __construct(BooksRepository $repository,Books $books)
    {
        $this->repository = $repository;
        $this->books = $books;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $booksCollection = $this->repository->getAllBooks();
            $dataTables         = new BooksDataTable($booksCollection);
            return $dataTables->getTransformerData();
        }

        $fields = [
            'id'         => [
                'label' => 'ID',
            ],
            'image'       => [
                'label' => 'Hình ảnh',
                'searchable' => false,
                'orderable'  => false,
            ],
            'name'     => [
                'label' => 'Tên truyện',
            ],
            'chapters'     => [
                'label' => 'Chương',
                'searchable' => false,
                'orderable'  => false,
            ],
            'categories'     => [
                'label' => 'Thể loại',
                'searchable' => false,
                'orderable'  => false,
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
        $dtColumns = BooksDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.books.datatable')->with($withData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = ['0' => 'Chọn tất cả'] + Categories::get_option_list();
        return view('manage.books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoooksRequest $request)
    {
        $inputs = $request->all();
        $image_path = Uploads::upload($request, 'image');
        if($image_path){
            $inputs['image'] = $image_path;
        }
        try {
            DB::beginTransaction();
            $this->books->fill($inputs);
            $this->books->save();
            if(!empty($this->books->categories)){
                $books_categories = [];
                foreach ($this->books->categories as $key => $cat_id){
                    $books_categories['books_id']      = $this->books->id;
                    $books_categories['categories_id'] = $cat_id;
                    $model_books_categories = new Books_Categories();
                    $model_books_categories->fill($books_categories);
                    $model_books_categories->save();
                }
            }
            DB::commit();
            return redirect()->route('books.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create books is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['record'] = $this->books->find($id);
        if(empty($data['record']))
        {
            return abort(404);
        }
        $data['categories'] = ['0' => 'Chọn tất cả'] + Categories::get_option_list();
        return view('manage.books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoooksRequest $request, $id)
    {
        $book = Books::find($id);
        if (empty($book)) {
            return abort(404);
        }
        $inputs     = $request->all();
        $image_path = Uploads::upload($request, 'image');
        if ($image_path) {
            $inputs['image'] = $image_path;
            if (!empty($book->image)) {
                Helpers::delete_image(public_path('uploads/images/').$book->image);
                Helpers::delete_image(public_path('uploads/thumbnail/').'thumbnail_'.$book->image);
            }
        }
        try {
            DB::beginTransaction();
            $book->update($inputs);
            // Delete all
            if(!empty($book->categories)){
                Books_Categories::where('books_id', $book->id)->delete();
            }
            // Insert new to db
            if(!empty($book->categories)){
                $books_categories = [];
                foreach ($book->categories as $key => $cat_id){
                    $books_categories['books_id']      = $book->id;
                    $books_categories['categories_id'] = $cat_id;
                    $model_books_categories = new Books_Categories();
                    $model_books_categories->fill($books_categories);
                    $model_books_categories->save();
                }
            }
            DB::commit();
            return redirect()->route('books.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('books.edit', ['id' => $book->id])->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update book is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
            'Delete books failed'
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
                    DB::table($this->books->getTable())
                        ->whereIn('id', $ids)
                        ->update(['status' => Books::STATUS_ON, 'updated_at' => Carbon::now()]);
                    break;

                case 'status_unpublish':
                    DB::table($this->books->getTable())
                        ->whereIn('id', $ids)
                        ->update(['status' => Books::STATUS_OFF, 'updated_at' => Carbon::now()]);
                    break;

                case 'delete':
                    DB::table($this->books->getTable())
                        ->whereIn('id', $ids)
                        ->update(['deleted_at' => Carbon::now()]);
                    break;

                default:
                    throw new \Exception(__('Action được chọn không có trong danh sách'));
                    break;
            }
            DB::commit();


            return redirect()->route('books.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception  $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('books.index')->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Batch action books is failed']),
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
