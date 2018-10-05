<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('photo', 255)->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 255);
            $table->string('phone', 50);
            $table->string('address1', 255);
            $table->string('address2', 255)->nullable();
            $table->string('city', 255);
            $table->char('state', 2);
            $table->string('zip', 10);
            $table->string('country', 2)->nullable();
            $table->string('timezone')->nullable();            
            $table->string('facebook_url',255)->nullable();
            $table->string('twitter_url',255)->nullable();
            $table->string('instagram_url',255)->nullable();
            $table->string('snapchat_url',255)->nullable();
            $table->string('skype_id',255)->nullable();
            $table->string('google_hangout_id',255)->nullable();
            $table->string('bio',255)->nullable();
            $table->enum('is_admin', ['YES', 'NO'] )->default('NO');
            $table->enum('is_active', ['YES', 'NO'] )->default('NO');
            $table->enum('prevent_users_to_see_email', ['YES', 'NO'] )->default('NO');
            $table->enum('prevent_users_to_see_phone', ['YES', 'NO'] )->default('NO');
            $table->enum('prevent_users_to_comments_messages', ['YES', 'NO'])->default('NO');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
