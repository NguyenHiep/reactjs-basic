<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Chapters extends BaseModel
{
    use SoftDeletes;
    protected $table    = 'chapters';
    protected $dates    = ['deleted_at'];
    protected $fillable = [
        'id',
        'book_id',
        'name',
        'slug',
        'content',
        'sticky',
        'views',
        'status',
        'created_by',
        'created_at',
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
}
