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

    public static function sys_route_name(){
        return request()->route()->getName();
    }

    /***
     * Create shorten link for url
     *
     * @param $longUrl
     * @return mixed
     * @throws \Exception
     */
    public static function sys_shorten_link($longUrl)
    {
        $appKey    = config('define.app_bitly_key');
        $loginName = config('define.login_name');
        if (!$appKey) {
            $exception = new \Exception('Please config App Key Bitly!');
            throw $exception;
        }
        if (!$loginName) {
            $exception = new \Exception('Please config Login Name Bitly!');
            throw $exception;
        }
        $curlObj = curl_init();
        $timeout = 5;
        $connectURL = 'http://api.bit.ly/v3/shorten?login=' . $loginName . '&apiKey=' . $appKey . '&uri=' . urlencode($longUrl);
        curl_setopt($curlObj, CURLOPT_URL, $connectURL);
        curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlObj, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($curlObj);
        curl_close($curlObj);
        $res = json_decode($data);
        return $res->data->url ?? $longUrl;
    }

    /***
     * Call api
     *
     * @param $url
     * @param array $postData
     * @return mixed
     */
    public static function sys_call_api($url, $postData = [])
    {
        $jsonData = json_encode($postData);
        $curlObj  = curl_init();
        curl_setopt($curlObj, CURLOPT_URL, $url);
        curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlObj, CURLOPT_HEADER, 0);
        curl_setopt($curlObj, CURLOPT_HTTPHEADER, array(
            'Content-type:application/json'
        ));
        curl_setopt($curlObj, CURLOPT_POST, 1);
        curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
        $response = curl_exec($curlObj);
        $json = json_decode($response);
        curl_close($curlObj);
        return $json;
    }

    /***
     * @param $input
     * @param array $arrExcept
     * @return array
     */
    public static function sys_script_stripper($input, $arrExcept = [])
    {
        $data = [];
        foreach ($input as $idx => $value) {
            if (is_array($value)) {
                $data[ $idx ] = self::sys_script_stripper($value, $arrExcept);
            } elseif (is_object($value) || is_numeric($value)) {
                $data[ $idx ] = $value;
            } else {
                if (empty($value)) {
                    $str = null;
                } else {
                    if (!in_array($idx, $arrExcept)) {
                        $str = strip_tags($value);
                    } else {
                        $str = preg_replace("/<script.*?\/script>/is", "", html_entity_decode($value));
                    }
                }
                $data[ $idx ] = $str;
            }
        }
        return $data;
    }
}
