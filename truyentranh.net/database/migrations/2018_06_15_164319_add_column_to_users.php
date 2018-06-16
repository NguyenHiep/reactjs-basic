<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('avatar')->nullable()->after('name')->comment('Ảnh đại diện');
            $table->tinyInteger('level')->default(1)->comment('Cấp bậc [1: Người dùng, 2: Tác giả, 3: Quản trị]');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('level');
        });
    }
}
