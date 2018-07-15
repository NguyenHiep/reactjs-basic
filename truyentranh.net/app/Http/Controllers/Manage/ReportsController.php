<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\ReportsDataTable;
use App\Http\Controllers\ManageController;
use App\Http\Requests\ReportsRequest;
use App\Repositories\ReportsRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportsController extends ManageController
{
    protected $repository;

    public function __construct(ReportsRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $reportsCollection = $this->repository->getAllReports();
            $dataTables        = new ReportsDataTable($reportsCollection);
            return $dataTables->getTransformerData();
        }

        $fields = [
            'id'           => [
                'label' => 'ID',
            ],
            'book_name'    => [
                'label'      => 'Tên truyện',
                'searchable' => false,
                'orderable'  => false,
            ],
            'chapter_name' => [
                'label'      => 'Tên chương',
                'searchable' => false,
                'orderable'  => false,
            ],
            'content'      => [
                'label' => 'Nội dung report',
            ],
            'status'       => [
                'label' => 'Trạng thái',
            ],
            'created_at'   => [
                'label' => 'Ngày tạo',
            ],
            'actions'      => [
                'label'      => 'Action',
                'searchable' => false,
                'orderable'  => false,
            ],
        ];
        $dtColumns = ReportsDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.reports.datatable')->with($withData);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportsRequest $request)
    {
        $inputs = $request->all();
        try {
            DB::beginTransaction();
            $this->repository->create($inputs);
            DB::commit();
            return redirect()->route('reports.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errorss', ['errors' => 'Create report is failed']),
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
        $data['record'] = $this->repository->getReportsById($id);
        if (empty($data['record'])) {
            return abort(404);
        }
        return view('manage.reports.edit', $data);
    }

    /***
     * @param ReportsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(ReportsRequest $request, $id)
    {
        $record = $this->repository->find($id);
        if (empty($record)) {
            return abort(404);
        }
        $inputs     = $request->all();
        try {
            DB::beginTransaction();
            $this->repository->update($inputs, $id);
            DB::commit();
            return redirect()->route('reports.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('reports.edit', ['id' => $record->id])->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update report is failed']),
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
            'Delete reports failed'
        );
    }

    public function batch()
    {
        try{
            if (request()->method() !== 'POST'){
                Log::warning('The requested method '.request()->method().' is not allowed for the URL.', __METHOD__);
                throw new \Exception('Method is not allowed for the URL', self::CTRL_MESSAGE_ERROR);
            }
            $inputs    = request()->all();
            $validator = static::validate_batch($inputs);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($inputs);
            }
            DB::beginTransaction();
            $this->repository->batch_action($inputs['batch_actions'], $inputs['ids']);
            DB::commit();
            return redirect()->route('reports.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        }catch (\Exception  $e){
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('reports.index')->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Batch action reports is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    public static function validate_batch($data)
    {
        return Validator::make($data, [
            'batch_actions' => 'required',
            'ids'           => 'required|array',
        ]);
    }
}
