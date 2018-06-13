<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\FrontEndController;
use App\Books;
use App\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


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
            'book_id'              => 'required|integer|digits_between:1,10',
            'chapter_id'           => 'required|integer|digits_between:1,11',
            'content'              => 'required|string',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function chapter(Request $request){
        // Do some thing
        $inputs    = $request->all();
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            // Write log error
            $errors = $validator->errors();
            $list_message = '';
            foreach ($errors->all() as $message) {
                $list_message .= $message . PHP_EOL;
            }
            Log::error($list_message);
            return response()->json(['status' => false, 'msg' => 'Có lỗi xảy ra' . PHP_EOL . $list_message], 200);
        }
        // Check books and chapter_id exists
        $books = Books::select(['books.id', 'books.name', DB::raw('count(chapters.id) as count_chapters')])
            ->join('chapters', 'chapters.book_id', '=', 'books.id')
            ->where('books.status', Books::STATUS_ON)
            ->where('books.id', array_get($inputs, 'book_id'))
            ->where('chapters.id', array_get($inputs, 'chapter_id'))
            ->groupBy('books.id')
            ->first();

        if (empty($books) || $books->count_chapters <= 0) {
            return response()->json(['status' => true, 'msg' => 'Truyện không tồn tại'], 200);
        }
        // Check user report chapter
        $report = Reports::where('book_id', array_get($inputs, 'book_id'))
            ->where('chapter_id', array_get($inputs, 'chapter_id'))
            ->first();
        if (empty($report)) {
            try {
                DB::beginTransaction();
                $this->mreports->fill($inputs);
                $this->mreports->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error([$e->getMessage(), __METHOD__]);
            }
        }
        return response()->json(['status' => true, 'msg' => 'Báo lỗi thành công'], 200);
    }
}
