<?php

namespace App\Http\Controllers\Manage\SourceBooks;

class ComicvnNet extends BooksDataBase implements BooksDataInterface
{
    public function __construct($url) { parent::__construct($url); }

    public function getList()
    {
        return "Get list comicvn net";
    }
}