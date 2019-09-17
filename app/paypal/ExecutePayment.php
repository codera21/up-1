<?php


namespace App\paypal;


use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class ExecutePayment extends Paypal
{
    public function execute()
    {
        $payment = $this->GetThePayment();

        $execution = $this->CreateExecution();

        $execution->addTransaction($this->transaction($this->amount($this->details())));

        $result = $payment->execute($execution, $this->apiContext);


        return $result;
    }

    /**
     * @return Payment
     */
    protected function GetThePayment()
    {
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);
        return $payment;
    }

    /**
     * @return PaymentExecution
     */
    protected function CreateExecution()
    {
        $execution = new PaymentExecution();
        $execution->setPayerID($_GET['PayerID']);
        return $execution;
    }

    /**
     * @return Details
     */
    protected function details()
    {
        $details = new Details();
        $details->setShipping(2.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);
        return $details;
    }

    /**
     * @param Details $details
     * @return Amount
     */
    protected function amount(Details $details)
    {
        $amount = new Amount();
        $amount->setCurrency('USD');
        $amount->setTotal(21);
        $amount->setDetails($details);
        return $amount;
    }

    /**
     * @param Amount $amount
     * @return Transaction
     */
    protected function transaction(Amount $amount)
    {
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        return $transaction;
    }
}
