<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('address1', 255);
            $table->string('address2', 255);
            $table->string('city', 255);
            $table->char('state', 2);
            $table->string('zip', 10);
            $table->char('country', 2);
            $table->string('cc_type', 50);
            $table->string('cc_number', 16);
            $table->string('cc_expiry', 9);
            $table->string('cc_security', 4);
            $table->enum('default', ['YES', 'NO'])->default('NO');
            $table->enum('deleted', ['YES', 'NO'])->default('NO');
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
        Schema::dropIfExists('billing_profiles');
    }
}
