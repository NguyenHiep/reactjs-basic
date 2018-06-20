<?php

namespace App\Http\Controllers\Manage\SourceBooks;

use App\Helpers\Uploads;

class TruyenTranhNet extends BooksDataBase implements BooksDataInterface
{
    protected $books;

    public function __construct($url) { parent::__construct($url); }

    public function getList()
    {

        //$html = $this->getDom('http://truyentranh.net/linh-kiem-ton/Chap-045');
        //return "Get list truyen tranh net";
    }

    /***
     * show info book: image, name, content
     *
     * @param $html
     * @return array
     */
    public function getInfoBook($html)
    {
        $books = [];
        $node_detail      = $html->find('div[class=manga-detail]');
        $divDetail        = array_shift($node_detail);
        $node_image       = $divDetail->find('div[class=cover-detail] img');
        $books['image']   = array_shift($node_image)->src ?? null;
        $node_name        = $divDetail->find('h1[class=title-manga]');
        $books['name']    = array_shift($node_name)->innertext ?? null;
        $divContent       = $html->find('div[class=manga-content]');
        $books['content'] = trim(array_shift($divContent)->plaintext) ?? null;
        return $books;
    }

    /***
     * Show list total chapters
     * @param $html
     * @return array
     */
    public function getListChapters($html)
    {
        $list_chapter = [];
        $divChapter_total = $html->find('.total-chapter .content p a');
        foreach ($divChapter_total as $key => $link) {
            $list_chapter[$link->href] = trim($link->title);
        }
        return $list_chapter;
    }

    /***
     * Get content detail book
     * @param $html
     * @return string
     */
    public function getDetailChapter($html)
    {
        $contents_detail = $html->find('div[class=paddfixboth-mobile] img');
        $content_html = '';
        if (!empty($contents_detail)) {
            foreach ($contents_detail as $content) {
                $content_html .= $content->outertext . '<br/>';
            }
        }
        return $content_html;
    }
}