<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned()->comment('Mã truyện');
            $table->string('name')->comment('Tên chương');
            $table->string('slug')->comment('Tên chương không dấu');
            $table->text('content')->nullable()->comment('Nội dung');
            $table->tinyInteger('sticky')->default(2)->comment('[1: Nổi bật, 2: Không nổi bật]');
            $table->integer('views')->unsigned()->default(0)->comment('Lượt xem');
            $table->tinyInteger('status')->default(2)->comment('Trạng thái slider [1: Đã đăng, 2: Xét duyệt]');
            $table->integer('created_by')->unsigned()->comment('Người đăng');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
