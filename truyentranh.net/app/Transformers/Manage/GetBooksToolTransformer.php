<?php

namespace App\Transformers\Manage;

use App\Transformers\BaseTransformer;
use App\Models\BooksLeech;
use App\Models\ChaptersLeech;

class GetBooksToolTransformer extends BaseTransformer
{
    public function transform(BooksLeech $booksLeech)
    {
        return [
            'contents' => [
                //'id', 'image', 'name', 'name_dif', 'author', 'content'
                'id'       => '',
                'image'    => '',
                'name'     => '',
                'name_dif' => '',
                'author'   => '',
                'content'  => '',
            ]
        ];
    }
}