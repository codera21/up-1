<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsBannersPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_banners_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page', 255);
            $table->string('title', 255);
            $table->enum('banner_728_90', ['YES', 'NO'])->default('NO');
            $table->enum('see_more_ads', ['YES', 'NO'])->default('NO');
            $table->enum('see_more_text', ['YES', 'NO'])->default('NO');
            $table->enum('banner_300_250', ['YES', 'NO'])->default('NO');
            $table->enum('banner_160_600', ['0', '1', '2', '3', '4', '5'])->nullable();
            $table->enum('text_banners', ['YES', 'NO'])->default('NO');
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
        Schema::dropIfExists('ads_banners_pages');
    }
}
