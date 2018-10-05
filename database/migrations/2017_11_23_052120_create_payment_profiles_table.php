<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('customer_profile_id')->nullable();
            $table->integer('customerpayment_profile_id')->nullable();
            $table->enum('payment_type', ['CARD', 'ONLINE BANK', 'OFFLINE BANK']);
            $table->string('card_no')->nullable();
            $table->string('card_exp_date', 7)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('bank_routing_no', 255)->nullable();
            $table->string('bank_account_no', 255)->nullable();
            $table->string('name', 50);
            $table->string('address', 255);
            $table->string('city', 255);
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
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
        Schema::dropIfExists('payment_profiles');
    }
}
