<?php

namespace App\Http\Controllers\Manage\SourceBooks;

abstract class AbstractFactory
{
    /***
     * Get soure books on website
     * @param $source
     * @param $url --> Link get
     * @return mixed
     */
    abstract function getSource($source, $url);
}