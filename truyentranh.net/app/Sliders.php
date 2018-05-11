<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;
class Sliders extends Model
{
    use FormAccessible;

    protected $fillable = [
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
}
