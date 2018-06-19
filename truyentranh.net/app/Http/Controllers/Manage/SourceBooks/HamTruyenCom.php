<?php

namespace App\Http\Controllers\Manage\SourceBooks;

class HamTruyenCom extends BooksDataBase implements BooksDataInterface
{
    public function __construct($url) { parent::__construct($url); }

    public function getList()
    {
        return "Get list ham truyen com";
    }
}