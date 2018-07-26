<?php

namespace App\Console\Commands;

use App\Models\BooksLeech;
use App\Models\ChaptersLeech;
use Illuminate\Console\Command;
use App\Http\Controllers\Manage\SourceBooks\BooksDataFactory;
use Illuminate\Support\Facades\DB;

class LeechChapters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leech:chapters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get content chapters detail for all books';

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
        $this->info('Begin process leech data');
        $book_data = new BooksDataFactory();
        $count = 0;
        do {
            $midModel = ChaptersLeech::where('flag_leech_content', ChaptersLeech::STATUS_OFF)->orderBy('id')->take(10)->get(['id', 'leech_source_id', 'leech_chapter_url']);

            foreach ($midModel as $chapter) {
                $data                       = [];
                $source                     = $book_data->getSource($chapter->leech_source_id, $chapter->leech_chapter_url);
                $data['content']            = $source->getDetailChapter($source->getDom());
                $data['status']             = ChaptersLeech::STATUS_ON;
                $data['flag_leech_content'] = ChaptersLeech::STATUS_ON;
                $chapter->update($data);
                $this->info('--- Chapter id: ' . $chapter->id);
            }
            $count++;
        } while (count($midModel) > 0);
        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]; // >= php version PHP 5.4
        $this->info('Total time: ' . $executionTime . ' to execute.');
        $this->info('Complete leech data!');
    }
}
