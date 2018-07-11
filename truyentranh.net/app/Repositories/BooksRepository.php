<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Books;
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
}