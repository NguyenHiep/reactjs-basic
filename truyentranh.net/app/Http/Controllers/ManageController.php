<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageController extends AppBaseController
{
    protected $fields_search  = [];
    protected $search_prefix = "search_";

    /***
     * Get key search
     * @param string $params
     * @return array|bool
     */
    protected function getKeySearch($params = '')
    {
        if (!empty($params) && is_array($params)) {
            $search_keys = [];
            foreach ($params as $key => $val) {
                if (in_array($key, $this->fields_search)) {
                    $key = substr($key, strlen($this->search_prefix));
                    $search_keys[$key] = $val;
                }
            }
            return $search_keys;
        }
        return false;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mainboard');
    }
}
