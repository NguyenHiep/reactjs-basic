<?php

namespace App\DataTables;
use App\Transformers\CategoriesListTransformer;

class CategoriesDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new CategoriesListTransformer())->make(true);
    }
}