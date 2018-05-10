<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_path')->nullable()->comment('Ảnh slider');
            $table->string('image_link')->nullable()->comment('Ảnh slider bằng link');
            $table->string('title')->comment('Tiêu đề slider');
            $table->text('content')->nullable()->comment('Nội dung slider');
            $table->string('url')->nullable()->comment('Link slider');
            $table->tinyInteger('position')->default(1)->comment('Vị trí slider [1: Home, 2: Danh mục]');
            $table->tinyInteger('target')->default(1)->comment('Taget slider [1: _blank, 2: _self, 3: _parent, 4: _top, 5: framename]');
            $table->tinyInteger('status')->default(1)->comment('Trạng thái slider [1: Đã đăng, 2: Xét duyệt]');
            $table->integer('user_id')->unsigned()->comment('Tác giả');
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
        Schema::dropIfExists('sliders');
    }
}
