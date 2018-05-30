<?php

namespace App\Http\Controllers;
use App\Books;
class FrontEndController extends Controller
{
    public function index()
    {
        $data['books_new'] = Books::query()
            ->where('status', Books::STATUS_ON)
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();
        $ids = [];
        if (!empty($data['books_new'])) {
            foreach ($data['books_new'] as $book) {
                $ids[] = $book->id;
            }
        }

        $data['books_update'] = Books::query()
            ->where('status', Books::STATUS_ON)
            ->whereNotIn('id', $ids)
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get();
        return view('home', $data);
    }
}
