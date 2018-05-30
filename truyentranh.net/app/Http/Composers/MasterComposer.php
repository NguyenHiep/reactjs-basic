<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Categories;

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
        $view->with('categories', $categories);
    }

}