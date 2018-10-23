<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\ManageController;

class ConfigSystemController extends ManageController
{
    public function index()
    {
        return view('manage.configsystem.index');
    }

    public function store()
    {
        return __METHOD__;
    }
}