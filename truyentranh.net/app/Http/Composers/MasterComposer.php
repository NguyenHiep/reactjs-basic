<?php

namespace App\Http\Composers;

use App\Models\Categories;
use App\Models\Chapters;
use App\Models\Books;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;

class MasterComposer
{

    /***
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Categories::getListCategories();
        $total_book = Books::getTotalBook();
        $chapters   = Chapters::getTopChapters();
        $book_id    = Cookie::get('ids');
        $book_history = false;
        if (!empty($book_id)) {
            $book_history = Books::getBookHistory($book_id, 5);
        }
        $view->with('categories', $categories);
        $view->with('total_book', $total_book);
        $view->with('chapters', $chapters);
        $view->with('book_history', $book_history);
    }

}