<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class User_Follow_Books extends BaseModel
{
    protected $table      = 'user_follow_books';
    protected $primaryKey = ['user_id', 'book_id'];
    public $incrementing  = false;
    protected $fillable   = [
        'user_id',
        'book_id'
    ];

    public function isUserFollowBooks($user_id, $book_id)
    {
        $data = User_Follow_Books::where('user_id', $user_id)->where('book_id', $book_id)->first();
        if (!empty($data)) {
            return false;
        }
        return true;
    }
}
