<?php

namespace App\Http\Controllers;
use App\Repositories\BooksRepository;
use App\Repositories\CategoriesRepository;

class FrontEndController extends AppBaseController
{
    protected $books;
    protected $categories;
    public function __construct(BooksRepository $books, CategoriesRepository $categories) {
        $this->books      = $books;
        $this->categories = $categories;
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
            'categories'   => $this->categories->get_option_list(),
            'books_new'    => $books_new,
            'books_update' => $this->books->getBooksUpdate($ids),
            'show_slider'  => $this->books->getBooksShowSlider(),
        ];
        return view('frontend.home', $data);
    }
}
