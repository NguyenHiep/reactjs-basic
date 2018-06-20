<?php

namespace App\Http\Controllers\Manage\SourceBooks;

use App\Http\Controllers\AppBaseController;
use App\Traits\ToolLeechTrait;

class BooksDataBase extends AppBaseController
{
    use ToolLeechTrait;

    const UPLOAD_IMG_TMP           = 'uploads/images/books';
    const UPLOAD_IMG_THUMBNAIL_TMP = 'uploads/thumbnail/books';
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

}
