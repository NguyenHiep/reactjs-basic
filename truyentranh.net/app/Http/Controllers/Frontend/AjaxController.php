<?php

namespace App\Http\Controllers\FrontEnd;

use App\ChaptersLeech;
use App\Http\Controllers\FrontEndController;
use App\Books;
use App\Categories;
use App\Chapters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AjaxController extends FrontEndController
{
    public function follow_books(Request $request)
    {
        if (!Auth::check()) {
            return 404;
        }
        if($request->ajax()){
            return response()->json([
                'status'   => $request->get('id'),
                'text'     => 'Bỏ theo dõi',
                'oldclass' => 'follow',
                'newclass' => 'Following',
                'href'     => route('front.ajax.unfollowbooks'),
            ]);
        }else{
            return response()->json([
                'status'   => false,
                'text'     => 'Bỏ theo dõi',
                'oldclass' => 'follow',
                'newclass' => 'Following',
                'href'     => route('front.ajax.unfollowbooks'),
            ]);
        }
    }

    public function unfollow_books(Request $request)
    {
        if (!Auth::check()) {
            return 404;
        }
        if ($request->ajax()) {
            return response()->json([
                'status'   => $request->get('id'),
                'text'     => 'Theo dõi truyện',
                'oldclass' => 'Following',
                'newclass' => 'follow',
                'href'     => route('front.ajax.followbooks'),
            ]);
        } else {
            return response()->json([
                'status'   => false,
                'text'     => 'Theo dõi truyện',
                'oldclass' => 'Following',
                'newclass' => 'follow',
                'href'     => route('front.ajax.followbooks'),
            ]);
        }
    }
}
