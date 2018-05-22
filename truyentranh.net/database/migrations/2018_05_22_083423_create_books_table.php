<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->default(0)->unsigned()->comment('Thể loại');
            $table->string('author')->nullable()->comment('Tác giả');
            $table->string('name')->comment('Tên sách');
            $table->string('slug')->nullable()->comment('Tên không dấu');
            $table->string('name_dif')->nullable()->comment('Tên khác');
            $table->string('image')->nullable()->comment('Hình ảnh');
            $table->text('content')->nullable()->comment('Mô tả');
            $table->tinyInteger('progress')->default(1)->comment('Tiến độ [1: Hoàn thành, 2: Chưa hoàn thành, 3: Dừng ]');
            $table->string('teams_translate')->nullable()->comment('Nhóm dịch');
            $table->tinyInteger('sticky')->default(2)->comment('[1: Nổi bật, 2: Không nổi bật]');
            $table->integer('views')->unsigned()->default(0)->comment('Lượt xem');
            $table->tinyInteger('reviews')->unsigned()->default(3)->comment('Đánh giá [1: Rất tệ, 2: Tệ, 3: Bình Thường, 4: Hay, 5: Tuyệt vời ]');
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
        Schema::dropIfExists('books');
    }
}
