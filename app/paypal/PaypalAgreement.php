<?php


namespace App\paypal;


use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

class PaypalAgreement extends Paypal
{

    public function testCreate($id)
    {
        $agreement = new Agreement();
        $agreement->setName('Base Agreement')
            ->setDescription('Basic Agreement')
            ->setStartDate('2019-06-17T9:45:04Z');


        $plan = new Plan();
        $plan->setId($id);
        $agreement->setPlan($plan);


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        $shippingAddress = new ShippingAddress();
        $shippingAddress->setLine1('111 First Street')
            ->setCity('Saratoga')
            ->setState('CA')
            ->setPostalCode('95070')
            ->setCountryCode('US');
        $agreement->setShippingAddress($shippingAddress);


        $request = clone $agreement;


        $agreement = $agreement->create($this->apiContext);
        $agreement->getApprovalLink();

        $approvalUrl = $agreement->getApprovalLink();

        return $approvalUrl;
    }

    public function create($id)
    {
        return redirect($this->Agreement($id));
    }


    /**
     * @return string
     */
    protected function Agreement($id)
    {
        $agreement = new Agreement();

        $agreement->setName('Base Agreement')
            ->setDescription('Basic Agreement')
            ->setStartDate('2019-06-17T9:45:04Z');

        $agreement->setPlan($this->Plan($id));

        $agreement->setPayer($this->Payer());

        $agreement->setShippingAddress($this->shippingAddress());

        $agreement = $agreement->create($this->apiContext);
        return $agreement->getApprovalLink();
    }

    /**
     * @param $id
     * @return Plan
     */
    protected function Plan($id)
    {
        $plan = new Plan();
        $plan->setId($id);
        return $plan;
    }

    /**
     * @return Payer
     */
    protected function Payer()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        return $payer;
    }

    /**
     * @return ShippingAddress
     */
    protected function shippingAddress()
    {
        $shippingAddress = new ShippingAddress();
        $shippingAddress->setLine1('111 First Street')
            ->setCity('Saratoga')
            ->setState('CA')
            ->setPostalCode('95070')
            ->setCountryCode('US');
        return $shippingAddress;
    }
}
