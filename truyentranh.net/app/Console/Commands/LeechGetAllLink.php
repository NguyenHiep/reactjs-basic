<?php

namespace App\Console\Commands;

use App\Traits\ToolLeechTrait;
use Illuminate\Console\Command;

class LeechGetAllLink extends Command
{
    use ToolLeechTrait;
    const FILE_NAME     = 'list_link.txt';
    const URL_BOOKS     = 'http://truyentranh.net/danh-sach.tall.html';
    const TOTAL_PAGE    = 155;
    const QUERY_PARAM   = '?p=';
    const NUMBER_CHUCK  = 3;
    const SELECTOR_HTML = '#loadlist a';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leech:alllink';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all link';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->getAllLinkOnServer();
    }

    protected function getAllLinkOnServer()
    {
        $this->info('Begin process leech all link books');
        // Do some thing
        $files_link = fopen(static::FILE_NAME, "w");
        $data_range = range(1,static::TOTAL_PAGE);
        $tags_link  = [];
        $count = 0;
        do {
            $new_range = array_chunk($data_range, static::NUMBER_CHUCK);
            foreach ($new_range as $ranges) {
                foreach ($ranges as $range) {
                    $link = static::URL_BOOKS . static::QUERY_PARAM . $range;
                    $html = $this->getDom($link);
                    foreach ($html->find(static::SELECTOR_HTML) as $element) {
                        if (in_array($element->href, $tags_link)) {
                            continue;
                        }
                        $tags_link[] = $element->href;
                        $tag_a = $element->href . PHP_EOL;
                        fwrite($files_link, $tag_a);
                        $count++;
                        $this->info('--- No: ' . $count);
                    }
                }

            }
        } while (count($new_range) > 0);
        fclose($files_link);
        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]; // >= php version PHP 5.4
        $this->info('Total time: ' . $executionTime . ' to execute.');
        $this->info('Complete Get all link!');
    }

}
