<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned()->comment('Mã truyện');
            $table->integer('chapter_id')->unsigned()->comment('Mã chương');
            $table->text('content')->comment('Nội dung');
            $table->tinyInteger('status')->default(2)->comment('Trạng thái báo lỗi [1: Đã fix, 2: Chờ fix]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
