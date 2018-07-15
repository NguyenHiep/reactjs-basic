<?php

namespace App\DataTables;
use App\Transformers\ReportsListTransformer;

class ReportsDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new ReportsListTransformer())->make(true);
    }
}