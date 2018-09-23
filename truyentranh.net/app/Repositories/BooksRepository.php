<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Books;
use App\Models\Chapters;
use Carbon\Carbon;

class BooksRepository extends BaseRepository
{

    protected $fieldSearchable = [
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
        'created_by',
        'seo_title',
        'seo_slug',
        'seo_description',
        'seo_keywords',
        'created_at',
    ];

    /***
     *
     * @return string
     */
    public function model()
    {
        return Books::class;
    }

    public function getAllBooks()
    {
        $model = $this->makeModel();
        return $model::query();
    }

    public function batch_action($action, $ids)
    {
        $model = $this->makeModel();
        if (empty($ids) || !is_array($ids)) {
            return false;
        }
        switch ($action) {
            case 'status_publish':
                $model::whereIn('id', $ids)->update(['status' => $model::STATUS_ON, 'updated_at' => Carbon::now()]);
                break;
            case 'status_unpublish':
                $model::whereIn('id', $ids)->update(['status' => $model::STATUS_OFF, 'updated_at' => Carbon::now()]);
                break;
            case 'delete':
                $model::whereIn('id', $ids)
                    ->update(['deleted_at' => Carbon::now()]);
                break;
            default:
                throw new \Exception(__('Action not found!'));
                break;
        }
    }

    public function getBooksNew()
    {
        return $this->makeModel()->query()->with([
            'chapters' => function ($query) {
                $query->select('id', 'book_id', 'name', 'slug', 'episodes')
                    ->where('status', '=', Chapters::STATUS_ON)
                    ->orderBy('name', 'desc');
            }
        ])->where('status', Books::STATUS_ON)
            ->where('sticky', Books::STATUS_ON)
            ->orderBy('updated_at', 'desc')
            ->limit(2)
            ->get(['id', 'slug', 'image', 'name', 'name_dif', 'categories', 'author', 'content']);
    }

    /***
     * Show list book update not in list ids
     * @param array $ids
     * @return \Illuminate\Support\Collection
     */
    public function getBooksUpdate(array $ids = [], int $limit = 30)
    {
        return $this->makeModel()->query()->with([
            'chapters' => function ($query) {
                $query->select('id', 'book_id', 'name', 'slug', 'episodes')
                    ->where('status', '=', Chapters::STATUS_ON)
                    ->orderBy('name', 'desc');
            }
        ])->where('status', Books::STATUS_ON)
            ->whereNotIn('id', $ids)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get(['id', 'slug', 'image', 'name', 'name_dif', 'categories', 'author', 'content']);
    }

    /***
     * Show books items sliders
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getBooksShowSlider(int $limit = 12)
    {
        return $this->makeModel()->query()->with([
            'chapters' => function ($query) {
                $query->select('id', 'book_id', 'name', 'slug', 'episodes')
                    ->where('status', '=', Chapters::STATUS_ON)
                    ->where('sticky', Chapters::STATUS_ON)
                    ->orderBy('name', 'desc');
            }
        ])->where('status', Books::STATUS_ON)
            ->orderBy('updated_at', 'desc')
            ->limit($limit)
            ->get(['id', 'slug', 'image', 'name', 'name_dif', 'categories', 'author', 'content']);
    }

    public static function getBookHistory(array $ids, $limit = 12)
    {
        if (!empty($ids) && is_array($ids)) {
            $books = Books::select('books.id', 'books.slug', 'books.name', 'books.name_dif', 'books.categories',
                'books.author', 'chapters.name as chapter_name', 'chapters.slug as chapter_slug')
                ->join('chapters', 'books.id', '=', 'chapters.book_id')
                ->whereIn('chapters.id', $ids)
                ->where('books.status', Books::STATUS_ON)
                ->where('chapters.status', Chapters::STATUS_ON)
                ->paginate($limit);
            return $books;
        }
        return [];
    }
}