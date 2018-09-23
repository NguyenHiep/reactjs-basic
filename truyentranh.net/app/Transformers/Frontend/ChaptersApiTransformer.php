<?php

namespace App\Transformers\Frontend;

use App\Models\Chapters;
use App\Transformers\BaseApiTransformer;

class ChaptersApiTransformer extends BaseApiTransformer
{

    public function transform(Chapters $chapters)
    {
        return [
            'id'       => $chapters->id,
            'book_id'  => $chapters->book_id,
            'name'     => $chapters->name,
            'episodes' => $chapters->episodes,
            'url'      => route('front.books.showdetail', ['chapter_slug' => $chapters->slug])
        ];
    }
}
