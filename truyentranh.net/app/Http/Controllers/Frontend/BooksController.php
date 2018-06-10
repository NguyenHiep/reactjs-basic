<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\FrontEndController;
use App\Books;
use App\Categories;
use App\Chapters;
use Illuminate\Support\Facades\DB;

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

    public function chapter_detail($book_slug, $chapter_slug)
    {
        if(empty($book_slug) || empty($chapter_slug) ){
            return abort(404);
        }
        $book = Books::where('slug', $book_slug)
            ->where('status', Books::STATUS_ON)
            ->first();
        if(empty($book)){
            return abort(404);
        }
        $chapter = $book->chapters()
            ->where('slug', $chapter_slug)
            ->where('status', Chapters::STATUS_ON)
            ->first();
        $data['book']          = $book;
        $data['chapter']       = $chapter;
        $data['categories']    = Categories::get_option_list();
        $data['list_chapters'] = Chapters::get_option_list_by_book_id($book->id);
        $data = $data + $this->move($book->id, $chapter->id);
        return view('books-detail',$data );
    }

    private function move($book_id, $chapter_id)
    {
        $result = [];
        $previous = DB::table('chapters')
            ->where('book_id', '=', $book_id)
            ->where('id', '<', $chapter_id)
            ->where('status', Chapters::STATUS_ON)
            ->max('id');
        $next = DB::table('chapters')
            ->where('book_id', '=', $book_id)
            ->where('id', '>', $chapter_id)
            ->where('status', Chapters::STATUS_ON)
            ->min('id');
        $result['next']     = Chapters::where('id', $next)->first();;
        $result['previous'] = Chapters::where('id', $previous)->first();
        return $result;
    }
}
