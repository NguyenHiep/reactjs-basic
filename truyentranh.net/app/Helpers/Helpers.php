<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
class  Helpers
{
    public static function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /***
     * @param $image_path
     * @return bool
     */
    public static function delete_image($image_path)
    {
        try {
            if (File::exists($image_path)) {
                File::delete($image_path);
                return true;
            }
            return false;
        } catch (\Exception $e) {
            Log::error([$e->getMessage(), __METHOD__]);
        }

    }
}
