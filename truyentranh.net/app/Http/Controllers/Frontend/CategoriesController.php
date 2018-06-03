<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\FrontEndController;
use App\Books;
use App\Categories;
use App\Chapters;

class CategoriesController extends FrontEndController
{
    public function show($cat_slug)
    {
        if(empty($cat_slug)){
            return abort(404);
        }
        $category = Categories::where('slug', $cat_slug)
            ->where('status', Categories::STATUS_ON)
            ->first();
        $books = $category->books()
                ->where('status', Books::STATUS_ON)
                ->orderBy('name', 'asc')
                ->paginate(20);
        $data['category'] = $category;
        $data['books']    = $books;
        return view('categories',$data );
    }

    public function showall()
    {
        $books = Books::where('status', Books::STATUS_ON)
            ->orderBy('name', 'asc')
            ->paginate(20);
        $data['books'] = $books;
        return view('allcategories',$data );
    }

}
