<?php

namespace App\DataTables;
use App\Transformers\ChaptersTransformer;

class ChaptersDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new ChaptersTransformer())->make(true);
    }
}