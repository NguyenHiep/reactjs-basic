<?php

namespace App\Http\Controllers;
use App\Books;
use App\Categories;
use App\Chapters;
use App\Helpers\Helpers;

class FrontEndController extends Controller
{
    const CTRL_MESSAGE_SUCCESS  = "success";
    const CTRL_MESSAGE_INFO     = "info";
    const CTRL_MESSAGE_WARNING  = "warning";
    const CTRL_MESSAGE_ERROR    = "danger";
    const AVATAR_PATH           = 'uploads/images/avatars/';
    const AVATAR_THUMBNAIL_PATH = 'uploads/thumbnail/avatars/';
    public function index()
    {
        $data['categories'] = Categories::get_option_list();
        $data['books_new'] = Books::query()
            ->where('status', Books::STATUS_ON)
            ->where('sticky', Books::STATUS_ON)
            ->orderBy('updated_at', 'desc')
            ->limit(2)
            ->get();
        $ids = [];
        if (!empty($data['books_new'])) {
            foreach ($data['books_new'] as $book) {
                $ids[] = $book->id;
            }
        }

        $data['books_update'] = Books::query()->with(
            [
                'chapters' => function ($query) {
                    $query->where('status', '=', Chapters::STATUS_ON)
                        ->orderBy('created_at', 'desc');
                }
            ])->where('status', Books::STATUS_ON)
            ->whereNotIn('id', $ids)
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get();


        $data['show_slider'] = Books::query()->with(
            [
                'chapters' => function ($query) {
                    $query->where('status', '=', Chapters::STATUS_ON)
                        ->where('sticky', Chapters::STATUS_ON)
                        ->orderBy('created_at', 'desc');
                }
            ])->where('status', Books::STATUS_ON)
            ->orderBy('updated_at', 'desc')
            ->limit(12)
            ->get();
        return view('home', $data);
    }
}
