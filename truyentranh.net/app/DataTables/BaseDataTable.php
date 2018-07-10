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

    public function get($flag = true)
    {
        return $this->datatables->make($flag);
    }

    public function addRelationColumn($relations)
    {
        foreach ($relations as $colName => $relation) {
            $this->datatables->addColumn($colName, function ($item) use ($relation, $colName) {
                return ($item->{$relation['rel']}) ? $item->{$relation['rel']}->{$colName} : '';
            });
        }
    }

    public function addActionColumn($actions, $rawHtml = true)
    {
        $this->datatables->addColumn('actions', function ($item) use ($actions) {
            $action = '<div class="btn-group btn-sm">';
            $countAction = $this->countAction($item, $actions['dropdowns']);
            if (count($countAction) == 1) {
                foreach ($countAction as $r) {
                    $label = Lang::get($r[self::DT_LABEL]);
                    $arrID = ['id' => $item->{$r[self::DT_ROUTE][self::DT_FIELD]}];
                    $routeName = $r[self::DT_ROUTE][self::DT_NAME];
                    $action .= '<a href="' . route($routeName, $arrID) . '" class="btn btn-primary">' . $label . '</a>';
                }
            } else {
                $action .= $this->buildActionGroup($countAction, $item);
            }
            $action .= '</div>';
            return $action;
        });
        if ($rawHtml) {
            $this->datatables->rawColumns(['actions']);
        }
    }

    public function addRawColumn($arr)
    {
        if (!empty($arr)) {
            $this->datatables->rawColumns($arr);
        }
    }

    public function removeColumn($col)
    {
        $this->datatables->removeColumn($col);
    }
}
