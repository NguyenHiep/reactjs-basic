<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->string('episodes')->nullable()->after('name')->comment('Số tập của chương, VD: Chapter 001, Chapter 002');
            $table->string('seo_title')->nullable()->after('created_by')->comment('Tiêu đề SEO');
            $table->string('seo_slug')->nullable()->after('seo_title')->comment('Đường dẫn SEO');
            $table->string('seo_description')->nullable()->after('seo_slug')->comment('Mô tả nội dung SEO');
            $table->string('seo_keywords')->nullable()->after('seo_description')->comment('Từ khoá SEO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropColumn('seo_title');
            $table->dropColumn('seo_slug');
            $table->dropColumn('seo_description');
            $table->dropColumn('keywords');
        });
    }
}
