<?php

namespace App\DataTables;

use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class BaseDataTable
{

    protected const DT_ROUTE = 'route';
    protected const DT_FIELD = 'field';
    protected const DT_LABEL = 'label';
    protected const DT_NAME  = 'name';

    protected $datatables;

    /**
     * Columns has html
     *
     * @var array
     */
    protected $rawColumns = [];
    protected $defaultOrder;

    /**
     * BaseDataTable constructor.
     * @param $collection
     */
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
                'data'        => $key,
                self::DT_NAME => $key,
                $searchable   => $column[$searchable] ??  true,
                $oderable     => $column[$oderable] ?? true,
            ];
        }
        return $dtColumns;
    }
}
