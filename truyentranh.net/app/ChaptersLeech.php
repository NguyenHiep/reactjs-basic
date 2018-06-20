<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\BooksLeech;

class ChaptersLeech extends BaseModel
{
    use SoftDeletes;
    protected $table    = 'chapters_leech';
    protected $dates    = ['deleted_at'];
    protected $fillable = [
        'id',
        'book_id',
        'name',
        'episodes',
        'slug',
        'content',
        'source_book',
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
        return $this->belongsTo(BooksLeech::class);
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
        $chapters = Chapters::select('chapters_leech.name', 'chapters_leech.slug', 'books_leech.name as book_name', 'books_leech.slug as book_slug')
            ->join('books_leech', 'books_leech.id', '=', 'chapters_leech.book_id')
            ->where('books_leech.status', BooksLeech::STATUS_ON)
            ->where('chapters_leech.status', ChaptersLeech::STATUS_ON)
            ->where('chapters_leech.book_id', $book_id)
            ->orderBy('chapters_leech.id', 'desc')
            ->get();
        return $chapters;
    }
}
