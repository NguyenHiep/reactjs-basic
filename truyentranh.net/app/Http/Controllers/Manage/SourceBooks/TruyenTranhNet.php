<?php

namespace App\Http\Controllers\Manage\SourceBooks;

class TruyenTranhNet extends BooksDataBase implements BooksDataInterface
{
    public function __construct($url) { parent::__construct($url); }

    public function getList()
    {
        $html = $this->getDom();
        // Find content of a div with class = 'xyz'
        $divDetail  = $html->find('div[class=manga-detail]');
        $divContent = $html->find('div[class=manga-content]');
        $content = '';
        foreach ($divContent as $content) {
            $content = trim($content->plaintext);
        }
        // Get all list
        $divChapter_total = $html->find('.total-chapter .content p a');
        $list_chapter = [];
        foreach ($divChapter_total as $link) {
            $list_chapter[$link->href] = trim($link->plaintext);
        }
        echo '<pre>';
        var_dump($list_chapter);
        echo '</pre>';
        die('Hiep123');

        return "Get list truyen tranh net";
    }
}