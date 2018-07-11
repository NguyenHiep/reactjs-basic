<?php

namespace App\Transformers;

use App\Models\Categories;

class CategoriesListTransformer extends BaseTransformer
{

    public function transform(Categories $category)
    {
        $routeParams = ['category' => $category->id];
        $actions = [
            'view'   => [
                'label'     => 'View',
                'attribute' => [
                    'href'   => route('front.categories.show', ['cat_slug' => $category->slug]),
                    'target' => '_blank'
                ],
            ],
            'edit'   => [
                'label'     => 'Edit',
                'attribute' => [
                    'href' => route('categories.edit', $routeParams),
                ],
            ],
            'delete' => [
                'label'     => 'Delete',
                'attribute' => [
                    'href'          => 'javascript:void(0);',
                    'onclick'       => 'deleteItem(this)',
                    'data-ajax-url' => route('categories.destroy', $routeParams),
                ],
            ],
        ];
        return [
            'id'         => $category->id,
            'name'       => $this->getRedirectHtml(route('categories.edit', $routeParams), $category->name),
            'status'     => $this->getStatusHtml($category->status),
            'created_at' => $category->created_at,
            'actions'    => $this->getActionsHtml($actions),
        ];
    }
}
