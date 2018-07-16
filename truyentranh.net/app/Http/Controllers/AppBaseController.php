<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppBaseController extends Controller
{
    const CTRL_MESSAGE_SUCCESS  = "success";
    const CTRL_MESSAGE_INFO     = "info";
    const CTRL_MESSAGE_WARNING  = "warning";
    const CTRL_MESSAGE_ERROR    = "danger";
    const UPLOAD_IMG            = "uploads/images";
    const UPLOAD_IMG_THUMBNAIL  = "uploads/thumbnail";
    const AVATAR_PATH           = 'uploads/images/avatars/';
    const AVATAR_THUMBNAIL_PATH = 'uploads/thumbnail/avatars/';

    protected $AJAX_RESULT = [
        'SUCCESS' => 'success',
        'FAIL'    => 'fail',
        'ERROR'   => [
            'error' => 'error',
            'code'  => ''
        ]
    ];
    protected function responseJsonAjax($result, $message = '', $data = [])
    {
        return response()
            ->json([
                'result'  => $result,
                'message' => $message,
                'data'    => $data
            ]);
    }
}
