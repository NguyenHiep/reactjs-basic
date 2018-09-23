<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Chapters;
use Carbon\Carbon;

class ChaptersRepository extends BaseRepository
{

    protected $fieldSearchable = [
        'id',
        'book_id',
        'name',
        'episodes',
        'slug',
        'content',
        'leech_source_id',
        'leech_chapter_url',
        'flag_leech_content',
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

    /***
     *
     * @return string
     */
    public function model()
    {
        return Chapters::class;
    }

    public function getAllChapters()
    {
        $model = $this->makeModel();
        return $model::query()->orderBy('id', 'DESC');
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