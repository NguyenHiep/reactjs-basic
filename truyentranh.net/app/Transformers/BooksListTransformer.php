<?php

namespace App\Transformers;

use App\Models\Books;
use App\Models\Categories;

class BooksListTransformer extends BaseTransformer
{

    public function transform(Books $book)
    {
        $routeParams = ['book' => $book->id];
        $actions = [
            'view'   => [
                'label'     => 'View',
                'attribute' => [
                    'href'   => route('front.books.show', ['book_slug' => $book->slug]),
                    'target' => '_blank'
                ],
            ],
            'edit'   => [
                'label'     => 'Edit',
                'attribute' => [
                    'href' => route('books.edit', $routeParams),
                ],
            ],
            'delete' => [
                'label'     => 'Delete',
                'attribute' => [
                    'href'          => 'javascript:void(0);',
                    'onclick'       => 'deleteItem(this)',
                    'data-ajax-url' => route('books.destroy', $routeParams),
                ],
            ],
        ];
        return [
            'id'         => $book->id,
            'image'      => $this->getHtmlImage($book),
            'name'       => $this->getRedirectHtml(route('books.edit', $routeParams), $book->name),
            'chapters'   => $this->getHtmlChapters($book->id),
            'categories' => $this->getHtmlCategory($book->categories),
            'status'     => $this->getStatusHtml($book->status),
            'created_at' => $book->created_at,
            'actions'    => $this->getActionsHtml($actions),
        ];
    }

    private function getHtmlImage($book)
    {
        $html = '<a href="'.route('books.edit',$book->id).'">';
        if(!empty($book->image)){
            $html .= '<img class="img-thumbnail" src="'.asset(PATH_IMAGE_THUMBNAIL_BOOK.$book->image).'" alt="'.$book->name.'" />';
        }
        $html .= '</a>';
        return $html;
    }

    private function getHtmlCategory($categories)
    {
        $list_cate = Categories::get_option_list();
        $html = '';
        if (!empty($categories)) {
            $html .= '<ul class="text-left">';
            foreach ($categories as $val):
                $html .= '<li>' . array_get($list_cate, $val) . '</li>';
            endforeach;
            $html .= '</ul>';
        }
        return $html;
    }

    private function getHtmlChapters($book_id)
    {
        $html = '<a href="'.route('chapters.index',['mode' => 'list_filter',  'book_id' => $book_id]).'" class="btn btn-primary"><i class="fa fa-list"></i></a>';
        return $html;
    }
}
