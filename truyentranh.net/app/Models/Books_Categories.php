<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Books_Categories extends BaseModel
{
    protected $table    = 'books_categories';
    protected $fillable = [
        'id',
        'books_id',
        'categories_id'
    ];

}
