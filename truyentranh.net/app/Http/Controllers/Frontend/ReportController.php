<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\FrontEndController;
use App\Books;
use App\Chapters;
use App\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ReportController extends FrontEndController
{
    private $mreports;

    public function __construct(Reports $reports)
    {
        $this->mreports = $reports;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected static function validator(array $data)
    {
        return Validator::make($data, [
            'book_id'              => 'required|int|max:11',
            'chapter_id'           => 'required|int|max:11',
            'content'              => 'required|string',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
    }

    public function chapter(Request $request){
        // Do some thing
        $inputs    = $request->all();
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            return response()
                ->json(['status' => false, 'msg' => 'Có lỗi'], 200);
        }
        // Check books and chapter_id exists
        $books = Books::select(['books.id', 'books.name', DB::raw('count(chapters.id) as count_chapters')])
            ->join('chapters', 'chapters.book_id', '=', 'books.id')
            ->where('books.status', Books::STATUS_ON)
            ->where('books.id', array_get($inputs, 'book_id'))
            ->where('chapters.id', array_get($inputs, 'chapter_id'))
            ->groupBy('books.id')
            ->first();
        if (!empty($books) && $books->count_chapters > 0) {
            // Check user report chapter
            $report = Reports::where('book_id', array_get($inputs, 'book_id'))
                ->where('chapter_id', array_get($inputs, 'chapter_id'))
                ->first();
            if (empty($report)) {
                $this->mreports->fill($inputs);
                $this->mreports->save();
            }
        }

        return response()
            ->json(['status' => true, 'msg' => 'Báo lỗi thành công'], 200);

    }
}
