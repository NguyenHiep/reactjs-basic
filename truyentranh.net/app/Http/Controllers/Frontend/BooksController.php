<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\FrontEndController;
use App\Books;
use App\Categories;
use App\Chapters;

class BooksController extends FrontEndController
{
    public function show($book_slug)
    {
        if(empty($book_slug)){
            return abort(404);
        }
        $book = Books::with(
            [
                'chapters' => function ($query) {
                    $query->where('status', '=', Chapters::STATUS_ON)
                        ->orderBy('created_at', 'desc');
                }
            ])
            ->where('slug', $book_slug)
            ->where('status', Books::STATUS_ON)
            ->first();
        if(empty($book)){
            return abort(404);
        }
        $book_related = Books::where('id', '!=', $book->id)
            ->where('status', Books::STATUS_ON)
            ->inRandomOrder()
            ->limit(4)
            ->get();
        $data['book']         = $book;
        $data['book_related'] = $book_related;
        $data['categories']   = Categories::get_option_list();
        return view('books',$data );
    }

}
