<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_user_id');
            $table->string('from_username', 255);
            $table->integer('to_user_id');
            $table->string('to_username' ,255);
            $table->string('subject', 255);
            $table->text('message');
            $table->enum('deleted', ['YES', 'NO'])->default('NO');
            $table->enum('readed', ['YES', 'NO'])->default('NO');
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
        Schema::dropIfExists('messages');
    }
}
