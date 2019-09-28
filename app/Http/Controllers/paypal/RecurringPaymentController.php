<?php

namespace App\Http\Controllers\paypal;


use App\Http\Controllers\Controller;
use App\paypal\RecurringPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Agreement;

class RecurringPaymentController extends Controller
{
    public function makeRecurringPayment()
    {
        $plan = new RecurringPlan();
        $url = $plan->MakeRecurringPayment();
        return redirect($url);
    }

    public function ExecuteRecurringPayment(Request $request)
    {
        $execute = new RecurringPlan();
        $execute->executeRecurringPayment($request);
    }
    public function cancelSubscription()
    {
        $cancel = new RecurringPlan();
        $cancel->cancelSubscription();
    }
}
