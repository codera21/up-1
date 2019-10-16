<?php

namespace App\Http\Controllers\paypal;


use App\paypal\Checkout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Payment;
use Symfony\Component\HttpFoundation\Cookie;

class OneTimePaymentController extends Controller
{
    public function makeOneTimePayment()
    {
        $payment = new Checkout();
        $approved_url = $payment->oneTimePayment();
        return redirect($approved_url);
    }

    public function ExecuteOneTimePayment(Request $request)
    {
        if (env('SITE') == 'ENG') {
            $id = 2;
        } else {
            $id = 345;
        }
        $payment = new Checkout();
        $resultArr = $payment->executePayment($request);
        if ($resultArr['result']) {
            unset($resultArr['result']);
            session()->put('token', $resultArr['token']);
            setcookie('token',$resultArr['token'],time()+60*60*72);
            $insertInTable = DB::table('training_video_payment')->insert([
                $resultArr
            ]);
            if ($insertInTable) {
                Session::put('PaymentSuccess', "Successfully Payment occurs");
                return redirect('pages/dnasbook-distributor-payment?id=' . $id);
            }
        }
    }
}
