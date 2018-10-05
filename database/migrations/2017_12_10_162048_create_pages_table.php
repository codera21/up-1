<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['PUBLISHED', 'DRAFT', 'TRASHED'])->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('content');
            $table->integer('left_sidebar_block_id')->nullable();
            $table->integer('right_sidebar_block_id')->nullable();
            $table->enum('type', ['PAGE', 'BLOCK']);
            $table->enum('layout', ['NO SIDEBAR', 'LEFT SIDEBAR', 'RIGHT SIDEBAR', 'LEFT & RIGHT SIDEBARS'])->nullable();


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
        Schema::dropIfExists('pages');
    }
}
