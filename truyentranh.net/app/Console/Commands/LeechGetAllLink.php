<?php

namespace App\Console\Commands;

use App\Traits\ToolLeechTrait;
use Illuminate\Console\Command;

class LeechGetAllLink extends Command
{
    use ToolLeechTrait;
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
        $this->info('Begin process leech all link books');
        // Do some thing
        $files_link = fopen("list_link.txt", "w");
        $data_range = range(1,155);
        $tags_link  = [];
        $count = 0;
        do {
            $new_range = array_chunk($data_range, 3);
            foreach ($new_range as $ranges) {
                foreach ($ranges as $range) {
                    $link = 'http://truyentranh.net/danh-sach.tall.html?p=' . $range;
                    $html = $this->getDom($link);
                    foreach ($html->find('#loadlist a') as $element) {
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

    protected function getAllLink()
    {

    }

}
