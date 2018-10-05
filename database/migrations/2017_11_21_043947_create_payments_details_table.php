<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('group_id')->nullable();
            $table->integer('sub_group_id')->nullable();
            $table->integer('material_id')->nullable();
            $table->enum('subscription_fee', ['YES', 'NO'])->default('NO');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->float('amount', 8, 2);
            $table->float('discount', 8,2)->nullable();
            $table->integer('transaction_id');
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
        Schema::dropIfExists('payments_details');
    }
}
