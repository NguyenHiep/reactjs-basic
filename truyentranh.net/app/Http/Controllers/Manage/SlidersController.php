<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Sliders as Request;
use App\Http\Controllers\ManageController;
use App\Repositories\SlidersRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Helpers\Helpers;
use App\Helpers\Uploads;

class SlidersController extends ManageController
{
    protected $repository;
    protected $sliders;

    public function __construct(SlidersRepository $repository) {
        $this->repository = $repository;
        foreach ($this->repository->getFieldsSearchable() as $field) {
            $search_key[] = $this->search_prefix . $field;
        }
        $this->fields_seach = $search_key ?? null;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_params = request()->query();
        $params     = $this->getKeySearch($get_params);
        $data       = $this->repository->getListAll($params);
        return view('manage.sliders.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $image_path = Uploads::upload($request, 'image_path');
        if($image_path){
            $inputs['image_path'] = $image_path;
        }
        try {
            DB::beginTransaction();
            $this->repository->create($inputs);
            DB::commit();
            return redirect()->route('sliders.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errorss', ['errors' => 'Create sliders is failed']),
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
        $data['record'] = $this->repository->find($id);
        if(empty($data['record']))
        {
            return abort(404);
        }
        return view('manage.sliders.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = $this->repository->find($id);
        if (empty($slider)) {
            return abort(404);
        }
        $inputs     = $request->all();
        $image_path = Uploads::upload($request, 'image_path');
        if ($image_path) {
            $inputs['image_path'] = $image_path;
            if (!empty($slider->image_path)) {
                Helpers::delete_image(public_path('uploads/images/').$slider->image_path);
                Helpers::delete_image(public_path('uploads/thumbnail/').'thumbnail_'.$slider->image_path);
            }
        }
        try {
            DB::beginTransaction();
            $this->repository->update($inputs, $id);
            DB::commit();
            return redirect()->route('sliders.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('sliders.edit', ['id' => $slider->id])->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update slider is failed']),
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
            return redirect()->route('sliders.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        }catch (\Exception  $e){
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('sliders.index')->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Batch action slider is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);

    }

    public function delete($id)
    {
        $slider = $this->repository->find($id);
        if (empty($slider)) {
            return abort(404);
        }

        try {
            DB::beginTransaction();
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('sliders.index')->with([
                'message' => __('system.message.delete'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('sliders.index')->with([
            'message' => __('system.message.errors', ['errors' => 'Delete slider is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

    public static function validate_batch($data){
        return Validator::make($data, [
            'batch_actions' => 'required',
            'ids'           => 'required|array',
        ]);
    }
}
