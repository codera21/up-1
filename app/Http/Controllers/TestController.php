<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function index()
    {

    }

    public function payPalBtn()
    {
        return view('test.payPalBtn');

    }

    public function payforuser($userID)
    {
        $transactionID = DB::table('payments')->insertGetId(
            [
                'user_id' => $userID,
                'payment_mode' => 'ONLINE',
                'payment_type' => 'RECURRING',
                'paid_for' => 'SUBSCRIPTION',
                'amount_paid' => 50, // todo this can change.... we need to find a way to make this dynamic
                'status' => 'APPROVED'
            ]
        );

        DB::table('payments_details')->insert(
            [
                'user_id' => $userID,
                'subscription_fee' => 'YES',
                'start_date' => Carbon::now()->startOfMonth(), // first day of the month no matter when he/she pays
                'end_date' => Carbon::now()->endOfMonth(),  // last day of the month no matter when he/she pays
                'amount' => 50,
                'transaction_id' => $transactionID
            ]
        );


        DB::table('users')
            ->where('id', $userID)
            ->update(['is_active' => 'YES', 'not_now' => 1]);


    }
}
