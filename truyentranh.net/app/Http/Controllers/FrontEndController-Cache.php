<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Chapters;
use App\Helpers\Helpers;

class FrontEndController_Cache extends AppBaseController
{
    protected $cache_time = 30;

    public function index()
    {

        if (!Cache::has('categories')) {
            Cache::forever('categories', Categories::get_option_list());
        }
        $data['categories'] = Cache::get('categories');

        if (!Cache::has('books_new')) {
            $book_new = Books::query()
                ->where('status', Books::STATUS_ON)
                ->where('sticky', Books::STATUS_ON)
                ->orderBy('updated_at', 'desc')
                ->limit(2)
                ->get();
            $minutes = now()->addMinutes(10);
            Cache::add('books_new', $book_new, $minutes);
        }

        $data['books_new'] = Cache::get('books_new');
        $ids = [];
        if (!empty($data['books_new'])) {
            foreach ($data['books_new'] as $book) {
                $ids[] = $book->id;
            }
        }
        if (!Cache::has('books_update')) {
            $book_update = Books::query()->with(
                [
                    'chapters' => function ($query) {
                        $query->where('status', '=', Chapters::STATUS_ON)
                            ->orderBy('name', 'desc');
                    }
                ])->where('status', Books::STATUS_ON)
                ->whereNotIn('id', $ids)
                ->orderBy('created_at', 'desc')
                ->limit(20)
                ->get();
            $minutes = now()->addMinutes(10);
            Cache::add('books_update', $book_update, $minutes);
        }
        $data['books_update'] = Cache::get('books_update');
        if(!Cache::has('show_slider')){
            $show_slider = Books::query()->with(
                [
                    'chapters' => function ($query) {
                        $query->where('status', '=', Chapters::STATUS_ON)
                            ->where('sticky', Chapters::STATUS_ON)
                            ->orderBy('name', 'desc');
                    }
                ])->where('status', Books::STATUS_ON)
                ->orderBy('updated_at', 'desc')
                ->limit(12)
                ->get();
            $minutes = now()->addMinutes(10);
            Cache::add('show_slider', $show_slider, $minutes);
        }
        $data['show_slider'] = Cache::get('show_slider');
        return view('frontend.home', $data);
    }
}
