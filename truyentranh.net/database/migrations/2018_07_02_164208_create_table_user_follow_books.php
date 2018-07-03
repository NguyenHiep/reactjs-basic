<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserFollowBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_follow_books', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->comment('Id tài khoản');
            $table->integer('book_id')->unsigned()->comment('Id book');

            $table->primary(['user_id', 'book_id']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('book_id')
                ->references('id')
                ->on('books');
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
        Schema::dropIfExists('user_follow_books');
    }
}
