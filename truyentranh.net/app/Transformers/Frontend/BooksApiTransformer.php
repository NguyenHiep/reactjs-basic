<?php

namespace App\Transformers\Frontend;

use App\Models\Books;
use App\Transformers\BaseApiTransformer;
use League\Fractal\Manager;

class BooksApiTransformer extends BaseApiTransformer
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'chapters'
    ];

    public function transform(Books $book)
    {
        return [
            'id'         => $book->id,
            'url'        => route('front.books.show', ['book_slug' => $book->slug]),
            'image'      => asset(PATH_IMAGE_THUMBNAIL_BOOK . $book->image),
            'name'       => $book->name,
            'name_dif'   => $book->name_dif,
            'categories' => $book->categories,
            'author'     => $book->author,
            'content'    => strip_tags($book->content),
            //'chapters'   => $book->chapters()->limit(8)->get(['id', 'book_id', 'name', 'episodes', 'slug'])
            //'chapters'   => $book->chapters
        ];
    }

    /**
     * Include Chapters
     *
     * @param Book $book
     * @return \League\Fractal\Resource\Item
     */
    public function includeChapters(Books $book)
    {
        $chapters = $book->chapters;
        return $this->collection($chapters, new ChaptersApiTransformer());

    }

}
