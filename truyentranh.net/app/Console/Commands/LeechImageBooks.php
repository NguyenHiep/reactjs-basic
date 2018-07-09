<?php

namespace App\Console\Commands;

use App\Models\BooksLeech;
use Illuminate\Console\Command;
use App\Http\Controllers\Manage\SourceBooks\BooksDataFactory;
use App\Traits\ToolLeechTrait;
use Illuminate\Support\Facades\Log;

class LeechImageBooks extends Command
{
    use ToolLeechTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leech:imagebooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dowload and update image books';

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
        $this->info('Begin process leech image books');
        // Do some thing
        $book_data = new BooksDataFactory();
        do {
            $midModel = BooksLeech::where('flag_leech_image', BooksLeech::STATUS_OFF)->orderBy('id')->take(10)->get(['id', 'image_link', 'slug']);

            foreach ($midModel as $books) {
                $data = [];
                $image_name = $books->slug.'.jpg';
                $path_image = public_path('uploads/books/' . $image_name);
                $flag_curl_image = $this->curl_download_image($books->image_link, $path_image); // return true or false
                if ($flag_curl_image && file_exists($path_image)) {
                    $data['image']            = $image_name;
                    $data['status']           = BooksLeech::STATUS_ON;
                    $data['flag_leech_image'] = BooksLeech::STATUS_ON;
                    $books->update($data);
                    $this->info('--- Books id: ' . $books->id);
                }else {
                    Log::error('+ Book id: ' . $books->id . ' errors', ['line' => __LINE__]);
                }

            }
        } while (count($midModel) > 0);

        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]; // >= php version PHP 5.4
        $this->info('Total time: ' . $executionTime . ' to execute.');
        $this->info('Complete leech data!');
    }
}
