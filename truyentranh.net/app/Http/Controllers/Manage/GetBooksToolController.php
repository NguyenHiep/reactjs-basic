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
        /*$wrappers = stream_get_wrappers();
        echo 'openssl: ',  extension_loaded  ('openssl') ? 'yes':'no', "\n";
        echo 'https wrapper: ', in_array('https', $wrappers) ? 'yes':'no', "\n";
            echo 'wrappers: ', var_dump($wrappers);*/

        //$data = file_get_contents($request->get('url_book'));
        // Create a user agent so websites don't block you
        $html = $this->getDom($request->get('url_book'));
        // Find content of a div with class = 'xyz'
        $divDetail = $html->find('div[class=manga-detail]');
        $divContent = $html->find('div[class=manga-content]');
        $content = '';
        foreach ($divContent as $content) {
            $content = trim($content->plaintext);
        }
        // Get all list
        $divChapter_total = $html->find('.total-chapter .content p a');
        $list_chapter = [];
        foreach ($divChapter_total as $link) {
            $list_chapter[$link->href] = $link->plaintext;
        }

        // Loop through divData and grab all the links present in it
        /*foreach ($divDetail as $key => $value) {
            $image = $value->find('div[class=cover-detail] img');
            echo "<pre>";
                var_dump($image);
            echo "</pre>";
            die("Hiep123");
            /*foreach ($links as $link) {
                $linkHref = $link->href;
                $linkText = $link->plaintext;
            }*/
        //}*/

        // do what you want with your new link!
    }

    /***
     * Get content html with curl and php simple dom
     *
     * @param $target_url
     */
    protected function getDom($target_url)
    {
        $userAgent = 'Googlebot/2.1 (http://www.google.bot.com/bot.html)';
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
