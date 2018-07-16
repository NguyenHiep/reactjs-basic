<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\User;
use Carbon\Carbon;

class UsersRepository extends BaseRepository
{

    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'avatar',
        'level',
        'fullname',
        'card',
        'phone',
        'birthday',
        'sign',
        'status'
    ];

    /***
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function getListUsers()
    {
        $model = $this->makeModel();
        return $model::query();
    }

    public function batch_action($action, $ids)
    {
        $model = $this->makeModel();
        if (empty($ids) || !is_array($ids)) {
            return false;
        }
        switch ($action) {
            case 'status_publish':
                $model::whereIn('id', $ids)->update(['status' => $model::STATUS_ON, 'updated_at' => Carbon::now()]);
                break;
            case 'status_unpublish':
                $model::whereIn('id', $ids)->update(['status' => $model::STATUS_OFF, 'updated_at' => Carbon::now()]);
                break;
            case 'delete':
                $model::whereIn('id', $ids)
                    ->update(['deleted_at' => Carbon::now()]);
                break;
            default:
                throw new \Exception(__('Action not found!'));
                break;
        }
    }
}