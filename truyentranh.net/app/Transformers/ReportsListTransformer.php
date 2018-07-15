<?php

namespace App\Transformers;

use App\Models\Reports;

class ReportsListTransformer extends BaseTransformer
{

    public function transform(Reports $report)
    {
        $routeParams = ['report' => $report->id];
        $actions = [
            'view'   => [
                'label'     => 'View',
                'attribute' => [
                    'href'   => route('front.books.showdetail', ['chapter_slug' => $report->chapter_slug]),
                    'target' => '_blank'
                ],
            ],
            'edit'   => [
                'label'     => 'Edit',
                'attribute' => [
                    'href' => route('reports.edit', $routeParams),
                ],
            ],
            'delete' => [
                'label'     => 'Delete',
                'attribute' => [
                    'href'          => 'javascript:void(0);',
                    'onclick'       => 'deleteItem(this)',
                    'data-ajax-url' => route('reports.destroy', $routeParams),
                ],
            ],
        ];

        return [
            'id'           => $report->id,
            'book_name'    => $report->book_name,
            'chapter_name' => $this->getRedirectHtml(route('chapters.edit', ['id' => $report->chapter_id]), $report->chapter_name),
            'content'      => $report->content,
            'status'       => $this->getStatusHtml($report->status),
            'created_at'   => $report->created_at,
            'actions'      => $this->getActionsHtml($actions),
        ];
    }
}
