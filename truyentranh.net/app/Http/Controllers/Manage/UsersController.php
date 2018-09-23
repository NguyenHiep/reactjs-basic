<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\ManageController;
use App\Http\Requests\UsersRequest;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Helpers\Helpers;
use App\Helpers\Uploads;

class UsersController extends ManageController
{
    protected $repository;

    public function __construct(UsersRepository $repository) {
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
            $usersCollection = $this->repository->getListUsers();
            $dataTables      = new UsersDataTable($usersCollection);
            return $dataTables->getTransformerData();
        }

        $fields = [
            'id'           => [
                'label' => 'ID',
            ],
            'avatar'    => [
                'label'      => 'Ảnh đại diện',
                'searchable' => false,
                'orderable'  => false,
            ],
            'name' => [
                'label'      => 'Tên tài khoản',
                'searchable' => false,
                'orderable'  => false,
            ],
            'email'      => [
                'label' => 'Email',
            ],
            'level'      => [
                'label' => 'Cấp bậc',
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
        $dtColumns = UsersDataTable::getColumns($fields);
        $withData = [
            'fields'  => $fields,
            'columns' => $dtColumns,
        ];
        return view('manage.users.index')->with($withData);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $inputs     = $request->all();
        $image_path = Uploads::upload($request, 'avatar', self::AVATAR_PATH, self::AVATAR_THUMBNAIL_PATH);
        if ($image_path) {
            $inputs['avatar'] = $image_path;
        }
        if (!empty($inputs['new_password'])) {
            $inputs['password'] = Hash::make($inputs['new_password']);
        }
        try {
            DB::beginTransaction();
            $this->repository->create($inputs);
            DB::commit();
            return redirect()->route('users.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Create user is failed']),
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
        return view('manage.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        $user = $this->repository->find($id);
        if (empty($user)) {
            return abort(404);
        }
        $inputs     = $request->all();
        $image_path = Uploads::upload($request, 'avatar', self::AVATAR_PATH, self::AVATAR_THUMBNAIL_PATH);
        if ($image_path) {
            $inputs['avatar'] = $image_path;
            if (!empty($user->avatar)) {
                Helpers::delete_image(public_path(PATH_AVATAR . $user->avatar));
                Helpers::delete_image(public_path(PATH_AVATAR_THUMBNAIL . $user->avatar));
            }
        }
        if(!empty($inputs['new_password'])){
            $inputs['password'] = Hash::make($inputs['new_password']);
        }
        try {
            DB::beginTransaction();
            $this->repository->update($inputs, $id);
            DB::commit();
            return redirect()->route('users.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('users.edit', ['id' => $user->id])->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Update user is failed']),
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
            return redirect()->route('users.index')->with([
                'message' => __('system.message.update'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        }catch (\Exception  $e){
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->route('users.index')->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Batch action user is failed']),
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
