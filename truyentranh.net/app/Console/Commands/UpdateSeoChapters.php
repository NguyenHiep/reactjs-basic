<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Chapters;

class UpdateSeoChapters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:chapters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update seo chapters';

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
        $this->info('Begin process update seo chapters');
        // Do some thing
        do {
            $midModel = Chapters::where('sticky', Chapters::STATUS_OFF)->orderBy('id')->take(10)->get(['id', 'name']);
            foreach ($midModel as $chapter) {
                $keywords                = $chapter->name.', '.$chapter->name.' mới, '.$chapter->name.' tiếng việt, truyentranhfc '.$chapter->name;
                $data['seo_title']       = $chapter->name.' Tiếng Việt - TruyenTranhFc';
                $data['seo_description'] = '❶❶✅ Đọc truyện tranh '.$chapter->name.' Tiếng Việt bản dịch Full mới nhất, ảnh đẹp chất lượng cao, cập nhật nhanh và sớm nhất tại TruyenTranhFc';
                $data['seo_keywords']    = (strlen($keywords) < 255) ? $keywords : $chapter->name.', '.$chapter->name.' tiếng việt';
                $data['sticky']          = Chapters::STATUS_ON;
                $chapter->update($data);
                $this->info('--- Chapters id: ' . $chapter->id);
            }
        } while (count($midModel) > 0);

        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]; // >= php version PHP 5.4
        $this->info('Total time: ' . $executionTime . ' to execute.');
        $this->info('Complete update seo chapters data!');
    }
}
