<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use App\paypal\CreatePayment;
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
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AQSM8lBJQigwgjMbB-N33Sf0jotGwy9WtCxljG_ZoLzVKkhw66VzdcOf1yYR6WombijyPMJGaIVSsKmG',     // ClientID
                'EHXpzZ8FuD5gw1Krafokmsy_um9n7cxhn43dV9JAayzRpY7YIpYmuWmCdAMNDmCZlKsuCFVgeJhRPBJs'      // ClientSecret
            )
        );
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerID($_GET['PayerID']);

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(2.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);

        $amount->setCurrency('USD');
        $amount->setTotal(21);
        $amount->setDetails($details);
        $transaction->setAmount($amount);


        $execution->addTransaction($transaction);

        $result = $payment->execute($execution, $apiContext);

        return $result;
    }
}
