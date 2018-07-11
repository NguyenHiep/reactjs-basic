<?php

namespace App\Transformers;

use App\Models\Chapters;

class ChaptersListTransformer extends BaseTransformer
{

    public function transform(Chapters $chapters)
    {
        $routeParams = ['chapter' => $chapters->id];
        $actions = [
            'view'   => [
                'label'     => 'View',
                'attribute' => [
                    'href'   => route('front.books.showdetail', ['chapter_slug' => $chapters->slug]),
                    'target' => '_blank'
                ],
            ],
            'edit'   => [
                'label'     => 'Edit',
                'attribute' => [
                    'href' => route('chapters.edit', $routeParams),
                ],
            ],
            'delete' => [
                'label'     => 'Delete',
                'attribute' => [
                    'href'          => 'javascript:void(0);',
                    'onclick'       => 'deleteItem(this)',
                    'data-ajax-url' => route('chapters.destroy', $routeParams),
                ],
            ],
        ];
        return [
            'id'         => $chapters->id,
            'name'       => $this->getRedirectHtml(route('chapters.edit', $routeParams), $chapters->name),
            'sticky'     => $this->getStatusHtml($chapters->sticky),
            'status'     => $this->getStatusHtml($chapters->status),
            'created_at' => $chapters->created_at,
            'actions'    => $this->getActionsHtml($actions),
        ];
    }
}
