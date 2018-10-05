<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receiver_id');
            $table->integer('payer_id');
            $table->integer('payment_id')->nullable();
            $table->float('payment',8,2);//total payment which user has paid...means payee payment
            $table->integer('level_id')->nullable();
            $table->enum('transaction_type', ['COMMISSION_FROM_CUSTOMER', 'COMMISSION_FROM_ADMIN'])->default('COMMISSION_FROM_CUSTOMER');
            $table->float('commission_amount',8,2)->nullable();
            $table->float('opening_balance',8,2)->nullable();
            $table->float('closing_balance',8,2)->nullable();
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
        Schema::dropIfExists('user_commissions');
    }
}
