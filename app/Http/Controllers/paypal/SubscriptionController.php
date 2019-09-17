<?php

namespace App\Http\Controllers\paypal;

use App\paypal\PaypalAgreement;
use App\paypal\SubscriptionPlan;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function plan()
    {
        $plan = new SubscriptionPlan();
        $plan->create();
    }

    public function listPlan()
    {
        $plan = new SubscriptionPlan();
        return $plan->listPlan();
    }

    public function ShowPlan($id)
    {
        $plan = new SubscriptionPlan();
        return $plan->planDetails($id);
    }

    public function activatePlan($id)
    {
        $plan = new SubscriptionPlan();
        $plan->activate($id);
    }

    public function CreateAgreement($id)
    {
        $agreement = new PaypalAgreement;
        $agreement->create($id);
    }
}
