<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\FrontEndController;
use App\Books;
use App\Categories;
use App\Chapters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ChapterReportRequest;
use Illuminate\Support\Facades\Validator;


class ReportController extends FrontEndController
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected static function validator(array $data)
    {
        return Validator::make($data, [
            'content'              => 'required|string',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
    }

    public function chapter(Request $request){
        // Do some thing
        $validator = self::validator($request->all());
        if ($validator->fails()) {
            return response()
                ->json(['status' => false, 'msg' => 'Có lỗi'], 404);
        }

        return response()
            ->json(['status' => true, 'msg' => 'Báo lỗi thành công'], 200);

    }
}
