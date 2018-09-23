<?php

namespace App\Http\Controllers\Manage\SourceBooks;

interface  BooksDataInterface
{
    const TRUYENTRANH_NET   = 1;
    const HAMTRUYEN_COM     = 2;
    const TRUYENSIEUHAY_COM = 3;
    const COMMICVN_NET      = 4;
    const NETTRUYEN_COM     = 5;

    public function getList();

    public function getInfoBook($param);

    public function getListChapters($param);

    public function getDetailChapter($param);

    public function getInfoChapters($param);
}
