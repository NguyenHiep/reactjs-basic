<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Chapters;
use App\Helpers\Helpers;

class FrontEndController extends AppBaseController
{
    protected $books;
    public function __construct(Books $books) {
        $this->books = $books;
    }

    public function index()
    {
        $books_new = $this->books->getBooksNew();
        $ids = [];
        if (!empty($books_new)) {
            foreach ($books_new as $book) {
                $ids[] = $book->id;
            }
        }
        $data = [
            'categories'   => Categories::get_option_list(),
            'books_new'    => $books_new,
            'books_update' => $this->books->getBooksUpdate($ids),
            'show_slider'  => $this->books->getBooksShowSlider(),
        ];
        return view('frontend.home', $data);
    }
}
