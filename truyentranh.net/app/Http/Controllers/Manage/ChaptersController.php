<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\ChaptersDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\ManageController;
use App\Http\Requests\ChaptersRequest;
use App\Models\Books;
use App\Models\Chapters;
use App\Repositories\ChaptersRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ChaptersController extends ManageController
{
    protected $repository;
    protected $chapters;
    protected $fileds_seach = [];

    public function __construct(ChaptersRepository $repository, Chapters $chapters)
    {
        $this->repository = $repository;
        $this->chapters = $chapters;

        foreach ($this->chapters->getFillable() as $filed) {
            $this->fileds_seach[] = $this->search_prefix . $filed;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $chaptersCollection = $this->repository->getAllChapters();
            $dataTables         = new ChaptersDataTable($chaptersCollection);
            return $dataTables->getTransformerData();
        }
        return view('manage.chapters.datatable');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['books'] = ['' => 'Chọn truyện'] + Books::get_option_list();
        return view('manage.chapters.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChaptersRequest $request)
    {
        $inputs = $request->all();

        try {
            DB::beginTransaction();
            $this->chapters->fill($inputs);
            $this->chapters->save();
            DB::commit();
            return redirect()->route('chapters.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create chapters is failed']),
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
        $data['record'] = $this->chapters->find($id);
        if(empty($data['record']))
        {
            return abort(404);
        }
        $data['books'] = ['' => 'Chọn tất cả'] + Books::get_option_list();
        return view('manage.chapters.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChaptersRequest $request, $id)
    {
        $chapter = Chapters::find($id);
        if (empty($chapter)) {
            return abort(404);
        }
        $inputs     = $request->all();

        try {
            DB::beginTransaction();
            $chapter->update($inputs);
            DB::commit();
            return redirect()->route('chapters.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('chapters.edit', ['id' => $chapter->id])->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update chapter is failed']),
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
        //
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
                    DB::table($this->chapters->getTable())
                        ->whereIn('id', $ids)
                        ->update(['status' => Chapters::STATUS_ON, 'updated_at' => Carbon::now()]);
                    break;

                case 'status_unpublish':
                    DB::table($this->chapters->getTable())
                        ->whereIn('id', $ids)
                        ->update(['status' => Chapters::STATUS_OFF, 'updated_at' => Carbon::now()]);
                    break;

                case 'delete':
                    DB::table($this->chapters->getTable())
                        ->whereIn('id', $ids)
                        ->update(['deleted_at' => Carbon::now()]);
                    break;

                default:
                    throw new \Exception(__('Action được chọn không có trong danh sách'));
                    break;
            }
            DB::commit();


            return redirect()->route('chapters.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception  $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('chapters.index')->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Batch action chapters is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    public function delete($id)
    {
        $chapter = Chapters::find($id);
        if (empty($chapter)) {
            return abort(404);
        }

        try {
            DB::beginTransaction();
            $chapter->delete();
            DB::commit();
            return redirect()->route('chapters.index')->with([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('chapters.index')->with([
            'message' => __('system.message.errors', ['errors' => 'Delete chapter is failed']),
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