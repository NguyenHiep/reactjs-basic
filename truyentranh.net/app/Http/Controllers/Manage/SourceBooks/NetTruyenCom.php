<?php

namespace App\Http\Controllers\Manage\SourceBooks;

class NetTruyenCom extends BooksDataBase implements BooksDataInterface
{
    public function __construct($url) { parent::__construct($url); }

    public function getList()
    {
        return "Get list net truyen com";
    }
}