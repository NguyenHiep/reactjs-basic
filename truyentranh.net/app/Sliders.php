<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Sliders extends BaseModel
{
    use SoftDeletes;
    protected $table    = 'sliders';
    protected $dates    = ['deleted_at'];
    protected $fillable = [
        'id',
        'image_path',
        'image_link',
        'title',
        'content',
        'url',
        'position',
        'target',
        'status',
        'user_id',
        'created_at'
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
}
