<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('sub_group_id');
            $table->string('title',255);
            $table->string('slug',255);
            $table->text('description');
            $table->enum('material_type', ['VIDEO','COURSE']);
            $table->string('video_url',255)->nullable();
            $table->string('course_url',255)->nullable();
            $table->float('price',8,2);
            $table->enum('payment_type', ['RECURRING', 'ONE TIME']);
            $table->enum('enable_payment_button', ['YES', 'NO'])->default('NO');
            $table->string('paypal_plan_id',255)->nullable();
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
        Schema::dropIfExists('material');
    }
}
