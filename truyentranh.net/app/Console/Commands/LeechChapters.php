<?php

namespace App\Console\Commands;

use App\BooksLeech;
use App\ChaptersLeech;
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
        // TODO: Add new column save source leech
        $this->info('Begin process leech data');
        DB::table('chapters_leech')->where('status', ChaptersLeech::STATUS_OFF)->orderBy('id')->chunk(100, function ($chapters_leech) {
            $book_data = new BooksDataFactory();
            if (!empty($chapters_leech)) {
                foreach ($chapters_leech as $key => $chapter) {
                    $source    = $book_data->getSource(1, $chapter->source_book);
                    $mchapters = ChaptersLeech::find($chapter->id);
                    $mchapters->content = $source->getDetailChapter($source->getDom());
                    $mchapters->status  = ChaptersLeech::STATUS_ON;
                    $mchapters->save();
                    $this->info('--- Chapter id: '. $chapter->id);
                }
            }
            $this->info('Sleep 5 second');
            sleep(5);

        });
        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]; // >= php version PHP 5.4
        $this->info('Total time: '.$executionTime.' to execute.');
        $this->info('Complete leech data!');
    }
}
