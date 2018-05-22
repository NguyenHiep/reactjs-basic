<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppBaseController extends Controller
{
    const CTRL_MESSAGE_SUCCESS = "success";
    const CTRL_MESSAGE_INFO    = "info";
    const CTRL_MESSAGE_WARNING = "warning";
    const CTRL_MESSAGE_ERROR   = "danger";
    const UPLOAD_IMG           = "uploads/images";
    const UPLOAD_IMG_THUMBNAIL = "uploads/thumbnail";
    protected $search_prefix   = "search_";
}
