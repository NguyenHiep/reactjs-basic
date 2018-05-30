<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Categories extends BaseModel
{
    use SoftDeletes;
    protected $table    = 'categories';
    protected $dates    = ['deleted_at'];
    protected $fillable = [
        'id',
        'name',
        'slug',
        'status',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function scopeSearchAdvanced($model, $searchs)
    {
        if (!empty($searchs['id'])) {
            $cond = explode(',', $searchs['id']);
            $model->whereIn('id', $cond);
        }
        if (!empty($searchs['name'])) {
            $model->where('name', 'like', '%' . $searchs['name'] . '%');
        }
        if (!empty($searchs['status'])) {
            $model->whereIn('status', $searchs['status']);
        }
        if (!empty($searchs['created_at'])) {
            $model->whereDate('created_at', '>=', $searchs['created_at']);
        }
        return $model;
    }


    public static function get_option_list($deleted = false)
    {
        static $data, $deleted_data;
        if (empty($data)) {
            $data = array_pluck(DB::table('categories')->select('id', 'name')
                ->where('status', static::STATUS_ON)
                ->where('deleted_at', null)
                ->orderBy('name')
                ->get()
                ->toArray(), 'name', 'id');
        }
        if ($deleted && empty($deleted_data)) {
            $deleted_data = array_pluck(DB::table('categories')->select('id', 'name')
                ->where('status', static::STATUS_OFF)
                ->orWhere('deleted_at', '!=', null)
                ->orderBy('name')
                ->get()
                ->toArray(), 'name', 'id');
        }

        return $data + ($deleted ? $deleted_data : []);
    }

    public static function getListCategories(){
        return Categories::where('status', static::STATUS_ON)->get();
    }
}
