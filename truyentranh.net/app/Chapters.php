<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Chapters extends BaseModel
{
    use SoftDeletes;
    protected $table    = 'chapters';
    protected $dates    = ['deleted_at'];
    protected $fillable = [
        'id',
        'book_id',
        'name',
        'episodes',
        'slug',
        'content',
        'sticky',
        'views',
        'status',
        'created_by',
        'seo_title',
        'seo_slug',
        'seo_description',
        'seo_keywords',
        'created_at',
    ];

    public function books()
    {
        return $this->belongsTo('App\Books');
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

    public static function get_option_list_by_book_id($book_id = null){
        $chapters = Chapters::select('chapters.name', 'chapters.slug', 'books.name as book_name', 'books.slug as book_slug')
            ->join('books', 'books.id', '=', 'chapters.book_id')
            ->where('books.status', Books::STATUS_ON)
            ->where('chapters.status', Chapters::STATUS_ON)
            ->where('chapters.book_id', $book_id)
            ->orderBy('chapters.id', 'desc')
            ->get();
        return $chapters;
    }
}
