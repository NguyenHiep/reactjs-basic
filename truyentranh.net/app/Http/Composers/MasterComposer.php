<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Categories;
use App\Chapters;
use App\Books;

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
        $chapters = Chapters::select('chapters.name','chapters.slug','books.name as book_name','books.slug as book_slug')
            ->join('books', 'books.id', '=', 'chapters.book_id')
            ->where('books.status', Books::STATUS_ON)
            ->where('chapters.status', Chapters::STATUS_ON)
            ->where('chapters.sticky', Chapters::STATUS_ON)
            ->orderBy('chapters.created_at', 'desc')
            ->limit(3)
            ->get();
        $view->with('categories', $categories);
        $view->with('chapters', $chapters);
    }

}