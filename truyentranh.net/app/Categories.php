<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Categories extends BaseModel
{
    use SoftDeletes;
    protected $dates    = ['deleted_at'];
    protected $fillable = [

    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
