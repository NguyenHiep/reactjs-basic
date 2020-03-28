<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class BaseDataTable
{
    protected $datatables;

    public function __construct($collection)
    {
        $this->set($collection);
    }

    public function set($collection)
    {
        $this->datatables = Datatables::of($collection);
    }

    public static function getColumns($displayFields)
    {
        $dtColumns  = [];
        $searchable = 'searchable';
        $oderable   = 'orderable';
        foreach ($displayFields as $key => $column) {
            $dtColumns[] = [
                'data'      => $key,
                'name'      => $key,
                $searchable => $column[$searchable] ??  true,
                $oderable   => $column[$oderable] ?? true,
            ];
        }
        return $dtColumns;
    }
}
