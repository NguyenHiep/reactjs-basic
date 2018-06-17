<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('fullname')->nullable()->after('name')->comment('Tên hiển thị');
            $table->string('card', 11)->nullable()->after('fullname')->comment('Chứng minh thư');
            $table->string('phone', 15)->nullable()->after('card')->comment('Số điện thoại');
            $table->timestamp('birthday')->nullable()->after('phone')->comment('Ngày sinh');
            $table->text('sign')->nullable()->after('birthday')->comment('Chữ ký');
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
            $table->dropColumn('fullname');
            $table->dropColumn('card');
            $table->dropColumn('phone');
            $table->dropColumn('birthday');
            $table->dropColumn('sign');
        });
    }
}
