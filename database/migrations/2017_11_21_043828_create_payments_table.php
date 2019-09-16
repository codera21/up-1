<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('bank_slip_no')->nullable(); // for offline payment
            $table->string('bank_id')->nullable(); // for offline payment
            $table->string('payment_profile_id', 255)->nullable(); // paypalController agreement id, or bank id
            $table->string('paypal_plan_id', 255)->nullable(); // paypalController plan id which was created when group, level or material was created
            $table->enum('payment_mode', ['OFFLINE', 'ONLINE']);
            $table->enum('payment_type', ['RECURRING', 'ONE TIME']);
            $table->enum('paid_for', ['GROUP', 'LEVEL', 'MATERIAL', 'SUBSCRIPTION']);
            $table->float('amount_paid', 8,2);
            $table->enum('status', ['APPROVED', 'REJECTED', 'PENDING', 'VERIFYING'])->default('PENDING');
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
        Schema::dropIfExists('payments');
    }
}
