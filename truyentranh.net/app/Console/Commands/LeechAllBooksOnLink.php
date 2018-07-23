<?php

namespace App\Console\Commands;

use App\Traits\ToolLeechTrait;
use Illuminate\Console\Command;

class LeechAllBooksOnLink extends Command
{
    use ToolLeechTrait;
    const FILE_NAME     = 'list_link.txt';
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
        $source = file_get_contents(static::FILE_NAME);
        if ($source == false || empty($source)) {
            $this->error('Link not found');
        }
        $datas = explode("\n", $source);
        foreach ($datas as $book_link){
            // Do some things
        }
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
