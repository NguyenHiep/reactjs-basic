<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Sliders;
use Carbon\Carbon;

class SlidersRepository extends BaseRepository
{

    protected $fieldSearchable = [
        'id',
        'image_path',
        'image_link',
        'title',
        'content',
        'url',
        'position',
        'target',
        'status',
        'user_id',
        'created_at'
    ];

    /***
     *
     * @return string
     */
    public function model()
    {
        return Sliders::class;
    }

    public function getListAll($params)
    {
        $model = $this->makeModel();
        if (!empty($params)) {
            $model = $model::SearchAdvanced($params);
        }
        $limit      = 15;
        $records    = $model->orderBy('id', 'DESC')->paginate($limit);
        $page_total = $records->total();
        $offset     = $limit;
        $display_to = $offset;
        $display_from = 1;
        if ($records->currentPage() > 1) {
            $offset       = min($limit * $records->currentPage(), $page_total);
            $display_to   = min($offset + $records->perPage(), $page_total);
            $display_from = min($offset, $display_to);
        }
        return [
            'records'      => $records,
            'page_total'   => $page_total,
            'display_to'   => $display_to,
            'display_from' => $display_from,
        ];
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