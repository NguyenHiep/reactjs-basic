<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Books extends BaseModel
{
    use SoftDeletes;
    protected $table    = 'books';
    protected $dates    = ['deleted_at'];
    protected $fillable = [
        'id',
        'categories',
        'author',
        'name',
        'slug',
        'name_dif',
        'image',
        'content',
        'progress',
        'teams_translate',
        'sticky',
        'views',
        'reviews',
        'status',
        'created_by',
        'created_at',
    ];
    protected $casts = [
        'categories' => 'array'
    ];

    public function chapters()
    {
        return $this->hasMany('App\Chapters');
    }

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
        if (!empty($searchs['content'])) {
            $model->where('content', 'like', '%' . $searchs['content'] . '%');
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
            $data = array_pluck(DB::table('books')->select('id', 'name')
                ->where('status', static::STATUS_ON)
                ->where('deleted_at', null)
                ->orderBy('name')
                ->get()
                ->toArray(), 'name', 'id');
        }
        if ($deleted && empty($deleted_data)) {
            $deleted_data = array_pluck(DB::table('books')->select('id', 'name')
                ->where('status', static::STATUS_OFF)
                ->orWhere('deleted_at', '!=', null)
                ->orderBy('name')
                ->get()
                ->toArray(), 'name', 'id');
        }

        return $data + ($deleted ? $deleted_data : []);
    }
}
