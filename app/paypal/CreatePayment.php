<?php


namespace App\paypal;


use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class CreatePayment extends Paypal
{
    public function create()
    {
        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123")
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setSku("321321")
            ->setPrice(2);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));

        $payment = $this->Payment(
            $this->Payer(),
            $this->RedirectUrls(),
            $this->Transaction($this->Amount($this->Details()), $itemList)
        );

        $payment->create($this->apiContext);
        $approvalUrl = $payment->getApprovalLink();
        return redirect($approvalUrl);
    }

    /**
     * @return Payer
     */
    protected function Payer()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        return $payer;
    }

    /**
     * @return Details
     */
    protected function Details()
    {
        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);
        return $details;
    }

    /**
     * @param Details $details
     * @return Amount
     */
    protected function Amount(Details $details)
    {
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);
        return $amount;
    }

    /**
     * @param Amount $amount
     * @param ItemList $itemList
     * @return Transaction
     */
    protected function Transaction(Amount $amount, ItemList $itemList)
    {
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
        return $transaction;
    }

    /**
     * @return RedirectUrls
     */
    protected function RedirectUrls()
    {
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(config('services.paypal.url.redirect'))
            ->setCancelUrl(config('services.paypal.url.cancel'));
        return $redirectUrls;
    }

    /**
     * @param Payer $payer
     * @param RedirectUrls $redirectUrls
     * @param Transaction $transaction
     * @return Payment
     */
    protected function Payment(Payer $payer, RedirectUrls $redirectUrls, Transaction $transaction)
    {
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        return $payment;
    }
}
