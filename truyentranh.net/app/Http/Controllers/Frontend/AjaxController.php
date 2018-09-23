<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\FrontEndController;
use App\Models\User_Follow_Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AjaxController extends FrontEndController
{
    /***
     * Validate id
     * @param $data
     * @return \Illuminate\Validation\Validator
     */
    protected static function validate_id($data)
    {
        return Validator::make($data, [
            'id' => 'integer',
        ]);
    }
    public function follow_books(Request $request)
    {
        if (!Auth::check()) {
            return 404;
        }
        if ($request->ajax()) {
            $inputs    = $request->all();
            $validator = self::validate_id($inputs);
            if ($validator->fails()) {
                // Write log error
                $errors       = $validator->errors();
                $list_message = '';
                foreach ($errors->all() as $message) {
                    $list_message .= $message . PHP_EOL;
                }
                Log::error($list_message);
                return $this->responseJsonAjax(
                    $this->AJAX_RESULT['FAIL'],
                    $list_message,
                    ['status' => false]
                );
            }
            $inputs['user_id'] = Auth::id();
            $inputs['book_id'] = $inputs['id'];
            // Begin follow books
            $mfollow_books = new User_Follow_Books();
            if ($mfollow_books->isUserFollowBooks($inputs['user_id'], $inputs['book_id'])) {
                $mfollow_books->fill($inputs);
                $mfollow_books->save();
                return $this->responseJsonAjax(
                    $this->AJAX_RESULT['SUCCESS'],
                    'Follow status success',
                    [
                        'status'   => $mfollow_books->book_id,
                        'text'     => 'Bỏ theo dõi',
                        'oldclass' => 'follow',
                        'newclass' => 'Following',
                        'href'     => route('front.ajax.unfollowbooks'),
                    ]
                );
            }

        }
        return $this->responseJsonAjax(
            $this->AJAX_RESULT['FAIL'],
            'Follow status failed',
            [
                'status'   => false,
                'text'     => 'Bỏ theo dõi',
                'oldclass' => 'follow',
                'newclass' => 'Following',
                'href'     => route('front.ajax.unfollowbooks'),
            ]
        );
    }

    public function unfollow_books(Request $request)
    {
        if (!Auth::check()) {
            return 404;
        }
        if ($request->ajax()) {
            $inputs    = $request->all();
            $validator = self::validate_id($inputs);
            if ($validator->fails()) {
                // Write log error
                $errors       = $validator->errors();
                $list_message = '';
                foreach ($errors->all() as $message) {
                    $list_message .= $message . PHP_EOL;
                }
                Log::error($list_message);
                return $this->responseJsonAjax(
                    $this->AJAX_RESULT['FAIL'],
                    $list_message,
                    ['status' => false]
                );
            }
            $user_id = Auth::id();
            $book_id = $inputs['id'];
            // Begin follow books
            $result  = User_Follow_Books::where('user_id', $user_id)->where('book_id', $book_id)->delete();
            if ($result) {
                return $this->responseJsonAjax(
                    $this->AJAX_RESULT['SUCCESS'],
                    'Unfollow status success',
                    [
                        'status'   => true,
                        'text'     => 'Theo dõi truyện',
                        'oldclass' => 'Following',
                        'newclass' => 'follow',
                        'href'     => route('front.ajax.followbooks'),
                    ]
                );
            }
        }
        return $this->responseJsonAjax(
            $this->AJAX_RESULT['FAIL'],
            'Unfollow status failed',
            [
                'status'   => false,
                'text'     => 'Theo dõi truyện',
                'oldclass' => 'Following',
                'newclass' => 'follow',
                'href'     => route('front.ajax.followbooks'),
            ]
        );
    }
}
