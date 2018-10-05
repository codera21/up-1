<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidForToUserPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_payments', function (Blueprint $table) {
            $table->enum('paid_for', ['Group', 'Level', 'Material'])->after('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_payments', function (Blueprint $table) {
            $table->dropColumn('paid_for');
        });
    }
}
