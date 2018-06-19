<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\ManageController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Manage\SourceBooks\BooksDataFactory;

class GetBooksToolController extends AppBaseController
{
    protected $book_data;

    public function __construct(BooksDataFactory $book_data) {
        $this->book_data = $book_data;
    }

    public function index()
    {
        return view('manage.getbookstool.index');
    }

    public function preview(Request $request)
    {

    }

    public function store(Request $request)
    {
        // Create a user agent so websites don't block you
        $source = $this->book_data->getSource($request->get('url_domain'), $request->get('url_book'));
        echo '<pre>';
            var_dump($source->getList());
        echo '</pre>';
        die('Hiep123');

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
    /*protected function getDom($target_url)
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
    }*/
}
