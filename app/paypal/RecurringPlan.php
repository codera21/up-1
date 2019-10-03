<?php

namespace App\paypal;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Agreement;
use PayPal\Api\AgreementStateDescriptor;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\Payer;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Common\PayPalModel;

class RecurringPlan extends Paypal
{
    public function MakeRecurringPayment()
    {
        $date = Carbon::now()->addDay(1)->toDateString();
        //create plan
        $createdPlan = $this->MakePlan();

        //get id of created plan
        $createdPlanId = $createdPlan->getId();
        //activate plan
        $this->ActivePlan($createdPlan);
        $getActivatedPlan = Plan::get($createdPlanId, $this->apiContext);
        //create Agreement
        $agreement = $this->CreateAgreement($date, $getActivatedPlan);
        return $agreement->getApprovalLink();
    }

    public function executeRecurringPayment(Request $request)
    {
        //id of plan
        $createdPlan = $this->makePlan();
        $createdPlanId = $createdPlan->getId();
        $planId = $createdPlan->getId();
        $userId = Auth::id();
        $data = DB::table("users")->where("id", $userId)->first();
        if ($data->is_active == "NO") {
            if ($request->has('success') && $request->success == 'true') {
                $token = $request->token;
                $agreement = new Agreement();
                if ($agreement->execute($token, $this->apiContext)) {
                    $updateusers = DB::table("users")->where('id', $userId)->update([
                        'is_active' => 'YES'
                    ]);
                    $insertInTable = DB::table('payments')->insert([
                        'user_id' => Auth::id(),
                        'bank_slip_no' => '',
                        'bank_id' => '',
                        'agreement_id' => $agreement->getId(),
                        'paypal_plan_id' => $planId,
                        'payment_mode' => 'ONLINE',
                        'payment_type' => 'RECURRING',
                        'paid_for' => 'SUBSCRIPTION',
                        'amount_paid' => 59.7,
                        'status' => 'APPROVED',
                        'created_at' => Carbon::now()->toDateTimeString(),
                        'updated_at' => Carbon::now()->toDateString()
                    ]);

                    if ($updateusers && $insertInTable) {
                        return redirect()->route('user.dashboard')
                            ->with('success', 'Subscription Started successfully');
                    } else {
                        echo "something went wrong";
                    }
                } else {
                    echo "payment could not be made";
                };
            }
        } else {
            echo "no need to pay now";
        }
    }

    public function cancelSubscription()
    {
        $getData = DB::table('payments')->where("user_id", Auth::id())->where('cancel', 0)->first();
        $agreement_id = $getData->agreement_id;
        $agreement = new Agreement();
        $agreement->setId($agreement_id);
        $agreementStateDescriptor = new AgreementStateDescriptor();
        $agreementStateDescriptor->setNote("Cancel the agreement");
        $cancel = $agreement->cancel($agreementStateDescriptor, $this->apiContext);
        $cancelAgreementDetails = Agreement::get($agreement->getId(), $this->apiContext);
        if ($cancel) {
            $setNull = DB::table('payments')->where('user_id', Auth::id())->update([
                'cancel' => 1
            ]);
            if ($setNull) {
                return redirect()->route('user.dashboard')
                    ->with('success', 'Subscription Cancelled added successfully');
            } else {
                echo "could not unsubscribed";
            }
        } else {
            echo "could not cancel";
        }
    }

    /**
     * @return Plan
     */
    protected function Plan()
    {
        $plan = new Plan();
        $plan->setName('Dnasbook Monthly Payment')
            ->setDescription('Our monthly fees payment is $59.7(monthly fees $50 and taxes and other fees: $9.7)')
            ->setType('fixed');
        return $plan;
    }

    /**
     * @return PaymentDefinition
     */
    protected function PaymentDefination()
    {
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Monthly Payments')
            ->setType('REGULAR')
            ->setFrequency('Month')
            ->setFrequencyInterval("1")
            ->setCycles("12")
            ->setAmount(new Currency(array('value' => 59.7, 'currency' => 'USD')));
        return $paymentDefinition;
    }

    /**
     * @return MerchantPreferences
     */
    protected function MerchantPreferences()
    {
        $merchantPreferences = new MerchantPreferences();
        $baseUrl = URL::to('/');
        $merchantPreferences->setReturnUrl("$baseUrl/subscription/ExecuteRecurringPayment?success=true")
            ->setCancelUrl("$baseUrl/subscription/ExecuteRecurringPayment?success=false")
            ->setAutoBillAmount("yes")
            ->setInitialFailAmountAction("CONTINUE")
            ->setMaxFailAttempts("0")
            ->setSetupFee(new Currency(array('value' => 59.7, 'currency' => 'USD')));
        return $merchantPreferences;
    }

    /**
     * @param Plan $createdPlan
     */
    protected function ActivePlan(Plan $createdPlan)
    {
        $patch = new Patch();
        $value = new PayPalModel('{
	       "state":"ACTIVE"
	     }');
        $patch->setOp('replace')
            ->setPath('/')
            ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);
        $createdPlan->update($patchRequest, $this->apiContext);
    }

    /**
     * @return Plan
     */
    protected function MakePlan()
    {
        $plan = $this->Plan();
        $paymentDefinition = $this->PaymentDefination();
        $merchantPreferences = $this->MerchantPreferences();
        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);
        $createdPlan = $plan->create($this->apiContext);
        return $createdPlan;
    }

    /**
     * @param $date
     * @param Plan $getActivatedPlan
     */
    protected function CreateAgreement($date, Plan $getActivatedPlan)
    {
        $agreement = new Agreement();
        $agreement->setId('I-ATACAMA');
        $agreement->setName('Base Agreement')
            ->setDescription('Basic Agreement')
            ->setStartDate($date . 'T9:45:04Z');
        $plan = new Plan();
        $plan->setId($getActivatedPlan->getId());
        $agreement->setPlan($plan);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);
        $agreement = $agreement->create($this->apiContext);
        return $agreement;
    }
}
