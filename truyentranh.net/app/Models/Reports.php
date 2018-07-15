<?php

namespace App\Models;

use Carbon\Carbon;

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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function books()
    {
        return $this->belongsTo(Books::class, 'book_id', 'id');
    }

    public function chapters()
    {
        return $this->belongsTo(Chapters::class, 'chapter_id', 'id');
    }
}
