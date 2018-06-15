<?php
return [
    'assets_path'            => '/resources/assets',
    'assets_media'           => '/storage',
    'assets_additional_file' => '/storage',
    'storage'                => [
        'disk' => 'public',
    ],
    'date_format'            => [
        'date' => 'd/m/Y',
        'time' => 'd/m/Y h:i:s'
    ],
    'multilingual'           => [
        /*
         * Set whether or not the multilingual is supported by the BREAD input.
         */
        'enabled' => false,
        /*
         * Select default language
         */
        'default' => 'en',
        /*
         * Select languages that are supported.
         */
        'locales' => [
            'en',
        ],
    ],
    //'api_key' => env('GOOGLE_API_KEY', 'AIzaSyDwbI7Ag__FrwSncvrM8DDk1FTeTQbgdV4'),
    'app_bitly_key'          => env('APP_BITLY_KEY', 'R_732792ec99144e989cb9a2a139ff3e8f'),
    'login_name'             => env('LOGIN_NAME', '0tinhyeu'),
];
