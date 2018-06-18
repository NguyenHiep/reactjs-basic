<?php

namespace App\Http\Controllers\Manage;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetBooksToolController extends Controller
{

    public function index()
    {
        return view('manage.getbookstool.index');
    }

    public function preview(Request $request)
    {

    }

    public function store(Request $request)
    {
        //$data = file_get_contents($request->get('url_book'));
        // Create a user agent so websites don't block you
        $userAgent = 'Googlebot/2.1 (http://www.google.bot.com/bot.html)';
        // Create the initial link you want.
        $target_url = $request->get('url_book');
        // Initialize curl and following options
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_URL, $target_url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        // Grab the html from the page
        $html = curl_exec($ch);
        // Error handling
        if (!$html) {
            //handle error if page was not reachable, etc
            exit();
        }
        // Create DOM from URL or file
        $html = file_get_html($target_url);

// Find content of a div with class = 'xyz'
        $divData = $html->find('div[class=manga-detail]');

// Loop through divData and grab all the links present in it
        foreach ($divData as $key => $value) {
            $links = $value->find('a');
            foreach ($links as $link) {
                $linkHref = $link->href;
                $linkText = $link->plaintext;
            }
        }


        // do what you want with your new link!
    }
}
