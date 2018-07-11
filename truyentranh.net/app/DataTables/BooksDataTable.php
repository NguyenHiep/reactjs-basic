<?php

namespace App\DataTables;
use App\Transformers\BooksListTransformer;

class BooksDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new BooksListTransformer())->make(true);
    }
}