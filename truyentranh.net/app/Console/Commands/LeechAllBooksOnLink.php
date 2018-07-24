<?php

namespace App\Console\Commands;

use App\Models\BooksLeech;
use App\Models\ChaptersLeech;
use App\Traits\ToolLeechTrait;
use Illuminate\Console\Command;
use App\Http\Controllers\Manage\SourceBooks\BooksDataFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LeechAllBooksOnLink extends Command
{
    use ToolLeechTrait;
    const FILE_NAME = 'list_link.txt';
    const SOURCE_ID = 1; // truyentranh.net
    protected $book_data;
    protected $book_leech;
    protected $chapters_leech;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leech:allbooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all book by file listlink';

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
        $this->getReadFileOnServer();
    }

    protected function getReadFileOnServer()
    {
        $this->info('Begin process leech books by list link');
        $book_data      = new BooksDataFactory();
        $book_leech     = new BooksLeech();
        $files = file_get_contents(static::FILE_NAME);
        if ($files == false || empty($files)) {
            $this->error('Link not found');
        }
        $datas  = preg_split("/\R/", $files);
        $chucks = array_chunk($datas, 40);
        $total  = count($chucks);
        try {
            DB::beginTransaction();
            $info_book_leach = [];
            // Loop
            $count = 1;
            do {
                foreach ($chucks as $items) {
                    foreach ($items as $key => $book_link) {
                        $no = $count - 1;
                        $source     = $book_data->getSource(static::SOURCE_ID, $book_link);
                        $book_leach = $source->getInfoBook($source->getDom());
                        $info_book_leach[$no]['image_link']      = $book_leach['image_link'];
                        $info_book_leach[$no]['name']            = $book_leach['name'];
                        $info_book_leach[$no]['content']         = $book_leach['content'];
                        $info_book_leach[$no]['created_by']      = 1; //Auth::id();
                        $info_book_leach[$no]['slug']            = str_slug($book_leach['name']);
                        $info_book_leach[$no]['leech_source_id'] = static::SOURCE_ID;
                        $info_book_leach[$no]['leech_book_url']  = $book_link;
                        $this->info('--- No: ' . $count);
                        $count++;
                    }
                    $total--;
                }

            } while ($total > 0);

            $book_leech::insert($info_book_leach);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]; // >= php version PHP 5.4
        $this->info('Total time: ' . $executionTime . ' to execute.');
        $this->info('Complete leech data!');
    }

    protected function getBooksAll()
    {

    }

    protected function getChaptersAll()
    {

    }

    protected function getIdsBooksByLinks()
    {

    }

}
