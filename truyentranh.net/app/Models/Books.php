<?php

namespace App\Models;

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
        'image_link',
        'content',
        'leech_book_url',
        'leech_source_id',
        'flag_leech_image',
        'progress',
        'teams_translate',
        'sticky',
        'views',
        'reviews',
        'status',
        'flag_seo_book',
        'created_by',
        'seo_title',
        'seo_slug',
        'seo_description',
        'seo_keywords',
        'created_at',
    ];
    protected $casts = [
        'categories' => 'array'
    ];

    public function chapters()
    {
        return $this->hasMany(Chapters::class,'book_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function reports()
    {
        return $this->hasMany(Reports::class, 'book_id', 'id');
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

    public static function getTotalBook()
    {
        return Books::where('status', Books::STATUS_ON)->count();
    }

    public function user_follow()
    {
        return $this->belongsToMany(User::class, 'user_follow_books', 'book_id', 'user_id')->withTimestamps();
    }

    public function isFollowedBy($user_id)
    {
        return  !! $this->user_follow()->where('user_id', $user_id)->count();
    }

    public static function getBookHistory($ids, $limit = 12)
    {
        if (!empty($ids) && is_array($ids)) {
            $books = Books::select('books.*', 'chapters.name as chapter_name', 'chapters.slug as chapter_slug')
                ->join('chapters', 'books.id', '=', 'chapters.book_id')
                ->whereIn('chapters.id', $ids)
                ->where('books.status', Books::STATUS_ON)
                ->where('chapters.status', Chapters::STATUS_ON)
                ->paginate($limit);
            return $books;
        }
        return [];
    }

    public function getBooksNew()
    {
        return $this->query()
            ->where('status', Books::STATUS_ON)
            ->where('sticky', Books::STATUS_ON)
            ->orderBy('updated_at', 'desc')
            ->limit(4)
            ->get();
    }

    /***
     * Show list book update not in list ids
     * @param array $ids
     * @return \Illuminate\Support\Collection
     */
    public function getBooksUpdate(array $ids = [], int $limit = 20)
    {
        return $this->query()->with([
            'chapters' => function ($query) {
                $query->where('status', '=', Chapters::STATUS_ON)
                    ->orderBy('name', 'desc');
            }
        ])->where('status', Books::STATUS_ON)
            ->whereNotIn('id', $ids)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /***
     * Show books items sliders
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getBooksShowSlider(int $limit = 12)
    {
        return $this->query()->with([
            'chapters' => function ($query) {
                $query->where('status', '=', Chapters::STATUS_ON)
                    ->where('sticky', Chapters::STATUS_ON)
                    ->orderBy('name', 'desc');
            }
        ])->where('status', Books::STATUS_ON)
            ->orderBy('updated_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
