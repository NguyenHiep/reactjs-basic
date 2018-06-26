<?php

namespace App\Console\Commands;

use App\Books;
use Illuminate\Console\Command;

class UpdateSeoBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:books';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update seo books';

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
        $this->info('Begin process update seo books');
        // Do some thing
        do {
            $midModel = Books::where('status', Books::STATUS_OFF)->orderBy('id')->take(10)->get(['id', 'name']);

            foreach ($midModel as $books) {
                $keywords                = $books->name.', '.$books->name.' mới, '.$books->name.' tiếng việt, truyentranhfc '.$books->name;
                $data['name_dif']        = $books->name;
                $data['author']          = 'Đang cập nhật';
                $data['teams_translate'] = 'Tổng hợp nhiều nguồn';
                $data['seo_title']       = $books->name.' Tiếng Việt - TruyenTranhFc';
                $data['seo_description'] = '❶❶✅ Đọc truyện tranh '.$books->name.' Tiếng Việt bản dịch Full mới nhất, ảnh đẹp chất lượng cao, cập nhật nhanh và sớm nhất tại TruyenTranhFc';
                $data['seo_keywords']    = (strlen($keywords) < 255) ? $keywords : $books->name.', '.$books->name.' mới';
                $data['status']          = Books::STATUS_ON;
                $books->update($data);
                $this->info('--- Books id: ' . $books->id);
            }
        } while (count($midModel) > 0);

        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]; // >= php version PHP 5.4
        $this->info('Total time: ' . $executionTime . ' to execute.');
        $this->info('Complete update seo books data!');
    }
}
