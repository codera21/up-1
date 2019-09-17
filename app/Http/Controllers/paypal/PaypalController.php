<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use App\paypal\CreatePayment;
use App\paypal\ExecutePayment;
use App\paypal\Paypal;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class paypalController extends Controller
{
    public function recurring()
    {
        return view("paypal.index");
    }

    public function create()
    {
        $payment = new CreatePayment;
        return $payment->create();
    }

    public function executePayment()
    {
        $execute = new ExecutePayment();
        return $execute->execute();
    }
}
