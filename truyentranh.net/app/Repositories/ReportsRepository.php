<?php

namespace App\Repositories;

use App\Models\Books;
use App\Models\Chapters;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Reports;
use Carbon\Carbon;

class ReportsRepository extends BaseRepository
{

    protected $fieldSearchable = [
        'id',
        'book_id',
        'chapter_id',
        'content',
        'status'
    ];

    public function model()
    {
        return Reports::class;
    }

    public function getAllReports()
    {
        $model = $this->makeModel();
        $model = $model::select('reports.*', 'chapters.name as chapter_name', 'chapters.slug as chapter_slug', 'books.name as book_name')
            ->join('books', 'books.id', '=', 'reports.book_id')
            ->join('chapters', 'chapters.id', '=', 'reports.chapter_id')
            ->where('books.status', Books::STATUS_ON)
            ->where('chapters.status', Chapters::STATUS_ON)
            ->get();

        return $model;
    }

    public function getReportsById($id)
    {
        $model = $this->makeModel();
        $model = $model::select('reports.*', 'chapters.name as chapter_name', 'chapters.slug as chapter_slug', 'books.name as book_name')
            ->join('books', 'books.id', '=', 'reports.book_id')
            ->join('chapters', 'chapters.id', '=', 'reports.chapter_id')
            ->where('books.status', Books::STATUS_ON)
            ->where('chapters.status', Chapters::STATUS_ON)
            ->where('reports.id', $id)
            ->first();

        return $model;
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