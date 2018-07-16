<?php

namespace App\DataTables;
use App\Transformers\UsersListTransformer;

class UsersDataTable extends BaseDataTable
{
    public function getTransformerData()
    {
        return $this->datatables->setTransformer(new UsersListTransformer())->make(true);
    }
}