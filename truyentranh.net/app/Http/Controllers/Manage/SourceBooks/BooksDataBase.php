<?php

namespace App\Http\Controllers\Manage\SourceBooks;

class BooksDataBase
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getDom()
    {
        $userAgent = 'Googlebot/2.1 (http://www.google.bot.com/bot.html)';
        // Initialize curl and following options
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        // Grab the html from the page
        $content = curl_exec($ch);
        // Error handling
        if (!$content) {
            //handle error if page was not reachable, etc
            exit();
        }
        // Create DOM from URL or file
        $dom = str_get_html($content);
        return $dom;
    }
}
