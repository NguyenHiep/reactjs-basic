<?php

namespace App\Console\Commands;

use App\Models\BooksLeech;
use App\Models\ChaptersLeech;
use App\Traits\ToolLeechTrait;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Http\Controllers\Manage\SourceBooks\BooksDataFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LeechAllChaptersOnLink extends Command
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
    protected $signature = 'leech:allchapters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all chapters of book by file listlink';

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
        $this->getLeechChaptersOnServer();
    }

    protected function getLeechChaptersOnServer()
    {
        $this->info('Begin process leech chapters by list link');
        $book_data  = new BooksDataFactory();
        // Get links url
        $files = file_get_contents(static::FILE_NAME);
        if ($files == false || empty($files)) {
            $this->error('Link not found');
        }
        $datas  = preg_split("/\R/", $files);

        try {
            //DB::beginTransaction();
            do {
                DB::beginTransaction();
                $midModel =  BooksLeech::whereIn('leech_book_url', $datas)
                            ->whereNull('created_at')
                            ->orderBy('id')
                            ->take(10)
                            ->get(['id','leech_book_url']);
                foreach ($midModel as $book) {
                    $model_chapter = new ChaptersLeech();
                    $source        = $book_data->getSource(static::SOURCE_ID, $book->leech_book_url);
                    $list_chapters = $source->getListChapters($source->getDom());
                    $chapters      = [];
                    foreach ($list_chapters as $key => $items) {
                        $arr_episodes = explode('/', $key);
                        $episodes     = str_replace('-', ' ', end($arr_episodes));
                        $chapters[$key]['book_id']     = $book->id;
                        $chapters[$key]['name']        = $items;
                        $chapters[$key]['episodes']    = $episodes;
                        $chapters[$key]['slug']        = str_slug($items);
                        $chapters[$key]['leech_source_id']    = static::SOURCE_ID;
                        $chapters[$key]['leech_chapter_url']  = $key;
                        $chapters[$key]['flag_leech_content'] = ChaptersLeech::STATUS_OFF;
                        $chapters[$key]['created_by']         = 1;
                    }
                    $model_chapter::insert($chapters);
                    $data['created_at'] = Carbon::now()->toDateString();
                    $book->update($data);
                    $this->info('--- Leech chapter of book id: ' . $book->id);
                }
                DB::commit();
            } while (count($midModel) > 0);
            //DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]; // >= php version PHP 5.4
        $this->info('Total time: ' . $executionTime . ' to execute.');
        $this->info('Complete leech data!');
    }
}
