<?php

namespace App\Http\Controllers\paypal;

use App\Http\Controllers\Controller;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Sample\PayPalClient;

class paypalController extends Controller
{
    public function recurring()
    {
        return view("paypal.index");
    }

    public function create()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AQSM8lBJQigwgjMbB-N33Sf0jotGwy9WtCxljG_ZoLzVKkhw66VzdcOf1yYR6WombijyPMJGaIVSsKmG',     // ClientID
                'EHXpzZ8FuD5gw1Krafokmsy_um9n7cxhn43dV9JAayzRpY7YIpYmuWmCdAMNDmCZlKsuCFVgeJhRPBJs'      // ClientSecret
            )
        );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(2);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));

        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://127.0.0.1:8000/subscription/executePayment")
            ->setCancelUrl("http://127.0.0.1:8000/subscription/cancel");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $payment->create($apiContext);
        $approvalUrl = $payment->getApprovalLink();
        return redirect($approvalUrl);
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

    public function clientExecute()
    {
        return view("paypal.create");
        /*$orderId = $_POST['orderID'];
        var_dump($orderId);*/
        /*$client = PayPalClient::client();
        $response = $client->execute(new OrdersGetRequest($orderId));
        print "Status Code: {$response->statusCode}\n";
        print "Status: {$response->result->status}\n";
        print "Order ID: {$response->result->id}\n";
        print "Intent: {$response->result->intent}\n";
        print "Links:\n";
        foreach ($response->result->links as $link) {
            print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
        }
        print "Gross Amount: {$response->result->purchase_units[0]->amount->currency_code} {$response->result->purchase_units[0]->amount->value}\n";
        if (!count(debug_backtrace())) {
            GetOrder::getOrder('REPLACE-WITH-ORDER-ID', true);
        }*/
    }
    public function test()
    {
        echo json_encode($_POST);
    }
}
