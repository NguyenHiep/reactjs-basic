<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Image;
class Uploads
{
    const UPLOAD_FILE_SUCCESS   = 1;
    const UPLOAD_FILE_ERROR     = 0;
    const FILE_UPLOAD_NOT_EXIST = -1;
    const THUMB_NAIL_SIZE = [
        'width'  => 300,
        'height' => 300
    ];

    /***
     * Upload file
     *
     * @param Request $request
     * @param $key
     * @param string $path_save
     * @param string $thumb_nail
     * @return int|string
     */
    public static function upload(Request $request, $key, $path_save = 'uploads/images', $thumb_nail = 'uploads/thumbnail')
    {
        if ($request->hasFile($key)) {
            if ($request->file($key)->isValid()) {
                // File này có thực, bắt đầu đổi tên và move
                $fileExtension = $request->file($key)->getClientOriginalExtension(); // Lấy . của file
                // Filename cực shock để khỏi bị trùng
                $name           = time() . "_" . md5(rand(0, 9999999));
                $fileName       = $name . "." . $fileExtension;
                $thumbnail_name = 'thumbnail_'.$name . "." . $fileExtension;
                if ($thumb_nail) {
                    if (!file_exists(public_path($thumb_nail))) {
                        mkdir(public_path($thumb_nail), 666, true);
                    }
                    $destinationPath = public_path($thumb_nail);
                    $img = Image::make($request->file($key)->getRealPath());
                    $img->resize(static::THUMB_NAIL_SIZE['width'], static::THUMB_NAIL_SIZE['height'],
                        function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . '/' . $thumbnail_name);
                }
                // Thư mục upload
                $uploadPath = public_path($path_save); // Thư mục upload
                // Bắt đầu chuyển file vào thư mục
                $request->file($key)->move($uploadPath, $fileName);
                return $fileName;
            } else {
                Log::error(['Upload is failed', __METHOD__]);
                return self::UPLOAD_FILE_ERROR;
            }
        }
    }
}