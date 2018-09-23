<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Books;
use App\Models\Categories;
use App\Models\Chapters;
use App\Http\Controllers\FrontEndController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BooksController extends FrontEndController
{
    public function show($book_slug)
    {
        if (empty($book_slug)) {
            return abort(404);
        }
        $book = Books::where('slug', $book_slug)
            ->where('status', Books::STATUS_ON)
            ->first([
                'id', 'slug', 'image', 'name', 'content', 'views', 'name_dif',
                'categories', 'author', 'teams_translate', 'progress', 'seo_title',
                'seo_slug', 'seo_description', 'seo_keywords'
            ]);
        if (empty($book)) {
            return abort(404);
        }
        $book_related         = Books::where('id', '!=', $book->id)
            ->where('status', Books::STATUS_ON)
            ->inRandomOrder()
            ->limit(4)
            ->get(['id', 'slug', 'image', 'name']);
        $data['book'] = $book;
        $data['book_related'] = $book_related;
        $data['categories'] = Categories::getListCategories();
        $data['chapters'] = $book->chapters()
                            ->where('status', '=', Chapters::STATUS_ON)
                            ->orderBy('name', 'desc')
                            ->get(['id', 'slug', 'name', 'created_at']);
        return view('frontend.books.index   ', $data);
    }

    public function chapter_detail($chapter_slug)
    {
        if (empty($chapter_slug)) {
            return abort(404);
        }
        $chapter = Chapters::select('chapters.*', 'books.name as book_name', 'books.slug as book_slug')
            ->join('books', 'books.id', '=', 'chapters.book_id')
            ->where('chapters.slug', $chapter_slug)
            ->where('books.status', Books::STATUS_ON)
            ->where('chapters.status', Chapters::STATUS_ON)
            ->first();
        if (empty($chapter)) {
            return abort(404);
        }
        //$this->setCookieChapterRecent([$chapter->id]);
        $data['chapter']       = $chapter;
        $data['list_chapters'] = Chapters::get_option_list_by_book_id($chapter->book_id);
        $data                  = $data + $this->move_chapter($chapter->book_id, $chapter->id);
        return view('frontend.books.chapters-detail', $data);
    }

    private function move_chapter($book_id, $chapter_id)
    {
        $result = [];
        $previous = DB::table('chapters')
            ->where('book_id', '=', $book_id)
            ->where('id', '<', $chapter_id)
            ->where('status', Chapters::STATUS_ON)
            ->max('id');
        $next = DB::table('chapters')
            ->where('book_id', '=', $book_id)
            ->where('id', '>', $chapter_id)
            ->where('status', Chapters::STATUS_ON)
            ->min('id');
        $result['next']     = Chapters::where('id', $next)->first();;
        $result['previous'] = Chapters::where('id', $previous)->first();
        return $result;
    }

    public function search(Request $request)
    {
        $search_key = $request->query('q');
        $books      = Books::select(['id', 'slug', 'image', 'name', 'content', 'author'])
            ->where('status', Books::STATUS_ON)
            ->where('name', 'like', '%' . $search_key . '%')
            ->orderBy('name', 'asc')
            ->paginate(20);
        $data['list_filter']  = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
            'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
        ];
        $filter_key = $request->query('fc');
        if (!empty($filter_key) && in_array($filter_key, $data['list_filter'])) {
            $books = Books::where('status', Books::STATUS_ON)
                ->where('name', 'like', $filter_key . '%')
                ->orderBy('name', 'asc')
                ->paginate(20);
        }
        $data['books'] = $books;
        return view('frontend.result-search', $data);
    }

    public function show_history_read()
    {
        $ids                = $this->getCookieChapterRecent();
        $books              = Books::getBookHistory($ids);
        $data['books']      = $books;
        $data['categories'] = Categories::getListCategories();
        return view('frontend.read-history', $data);
    }

    public function setCookieChapterRecent(array $data)
    {
        if (!empty($data)) {
            if (Cookie::get('ids')) {
                $cookie  = Cookie::get('ids');
                $book_id = array_shift($data);
                if (!in_array($book_id, $cookie)) {
                    array_push($cookie, $book_id);
                }
                $data = $cookie;
            }
            $cookie = Cookie::forever('ids', $data);
            return Cookie::queue($cookie);
        }
        return false;
    }

    public function getCookieChapterRecent()
    {
        return Cookie::get('ids');
    }

    public function deleteCookieChapterRecent()
    {
        $cookie = Cookie::forget('ids');
        return Cookie::queue($cookie);
    }
}
