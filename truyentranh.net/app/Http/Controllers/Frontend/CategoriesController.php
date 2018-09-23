<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Books;
use App\Models\Categories;
use App\Models\Chapters;
use App\Http\Controllers\FrontEndController;

class CategoriesController extends FrontEndController
{
    public function show($cat_slug)
    {
        $category = Categories::where('slug', $cat_slug)
            ->where('status', Categories::STATUS_ON)
            ->first();
        if (empty($cat_slug) || empty($category)) {
            return abort(404);
        }
        $sort = [
            'most_view',
            'most_review',
            'most_new',
        ];
        $data['list_filter']  = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
            'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
        ];
        $type_sort  = request()->query('sort');
        $filter_key = request()->query('fc');
        if( !empty($type_sort) && in_array($type_sort, $sort))
        {
            switch ($type_sort) {
                case 'most_view':
                    $column = 'views';
                    break;
                case 'most_review':
                    $column = 'reviews';
                    break;
                case 'most_new':
                    $column = 'created_at';
                    break;
                default:
                    $column = 'name';
            }
            $books = $category->books()
                //->select('id', 'image', 'slug', 'name', 'name_dif', 'author', 'content')
                ->where('status', Books::STATUS_ON)
                ->orderBy($column, 'desc')
                ->paginate(20);
        } else if (!empty($filter_key) && in_array($filter_key, $data['list_filter'] )){
            $books = $category->books()
                //->select('id', 'image', 'slug', 'name', 'name_dif', 'author', 'content')
                ->where('status', Books::STATUS_ON)
                ->where('name', 'like', $filter_key . '%')
                ->orderBy('name', 'asc')
                ->paginate(20);
        }else {
            $books = $category->books()
                //->select('id', 'image', 'slug', 'name', 'name_dif', 'author', 'content')
                ->where('status', Books::STATUS_ON)
                ->orderBy('name', 'asc')
                ->paginate(20);
        }
        $data['category'] = $category;
        $data['books']    = $books;
        return view('frontend.categories.detail', $data);
    }

    public function showall()
    {
        $data['list_filter']  = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
            'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
        ];
        $filter_key = request()->query('fc');
        if (!empty($filter_key) && in_array($filter_key, $data['list_filter'] )){
            $books = Books::select('id', 'image', 'slug', 'name', 'name_dif', 'author', 'content')
                ->where('status', Books::STATUS_ON)
                ->where('name', 'like', $filter_key . '%')
                ->orderBy('name', 'asc')
                ->paginate(20);
        }else {
            $books = Books::select('id', 'image', 'slug', 'name', 'name_dif', 'author', 'content')
                 ->where('status', Books::STATUS_ON)
                ->orderBy('name', 'asc')
                ->paginate(20);
        }
        $data['books'] = $books;
        return view('frontend.categories.list',$data );
    }

}
