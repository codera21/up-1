<?php

namespace App\Http\Controllers\paypal;

use App\paypal\PaypalAgreement;
use App\paypal\SubscriptionPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PayPal\Api\Agreement;

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
        return redirect($agreement->create($id));
    }

    public function executeAgreement($status)
    {
        if($status == 'true')
        {
            $agreement = new Agreement();
            $agreement->execute($_GET['token']);
            $tableData = DB::table("users")->get();
            var_dump($tableData);
        }
    }

}
