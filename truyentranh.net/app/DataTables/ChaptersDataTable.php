<?php

namespace App\DataTables;
use App\Transformers\ChaptersListTransformer;

class ChaptersDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new ChaptersListTransformer())->make(true);
    }
}