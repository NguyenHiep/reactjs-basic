<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Reports extends BaseModel
{
    protected $table    = 'reports';
    protected $fillable = [
        'id',
        'book_id',
        'chapter_id',
        'content',
        'status',
    ];

}
