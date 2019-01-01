<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DateTime;

// Request & Response
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;

// Facades
use Date;
use Auth;
use Log;
use Cache;
use Session;

// Models and Repo
use App\Repositories\PaymentRepository;
use App\Repositories\PaymentDetailsRepository;
use App\Repositories\MaterialGroupRepository;
use App\Repositories\MaterialSubGroupRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\UserRepository;
use App\Repositories\PaymentProfileRepository;
use App\Repositories\LevelRepository;
use App\Repositories\UserCommissionRepository;
use Illuminate\Support\Facades\DB;

// Form Requests
use App\Http\Requests\OnlinePaymentSaveRequest;

// use to process billing agreements for Recurring payments
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;

// use to create One Time payments for Paypal
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

// use to execute One Time Payments
use PayPal\Api\PaymentExecution;


class OnlinePaymentController extends Controller
{

    protected $onlinePaymentDetails;

    protected $onlinePayment;

    protected $materialGroup;

    protected $materialSubGroup;

    protected $material;

    protected $paymentProfile;

    protected $level;

    protected $userCommission;

    protected $user;

    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    private $plan_id;


    public function __construct(PaymentRepository $onlinePayment,
                                PaymentDetailsRepository $onlinePaymentDetails,
                                MaterialGroupRepository $materialGroup,
                                MaterialSubGroupRepository $materialSubGroup,
                                MaterialRepository $material,
                                PaymentProfileRepository $paymentProfile,
                                LevelRepository $level,
                                UserCommissionRepository $userCommission,
                                UserRepository $user)
    {
        $this->onlinePaymentDetails = $onlinePaymentDetails;
        $this->onlinePayment = $onlinePayment;
        $this->materialGroup = $materialGroup;
        $this->materialSubGroup = $materialSubGroup;
        $this->material = $material;
        $this->paymentProfile = $paymentProfile;
        $this->level = $level;
        $this->userCommission = $userCommission;
        $this->user = $user;

        // Detect if we are running in live mode or sandbox
        if (config('paypal.settings.mode') == 'live') {
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
        }

        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));

        Log::getMonolog()->popHandler();//Remove Old Handlers
        Log::useDailyFiles(config('settings.log.onlinepayment'));//Set New Handler
    }


    /**
     * Show add online payment form
     *
     * @return Response
     */
    public function add()
    {
        $userID = Auth::user()->id;
        $material = DB::table('material')->first();

        $user = DB::table('users')
            ->find($userID);
        $dt = new DateTime();
        $dt->format('Ymd');
        $subsexists = DB::table('paypal_subscription')->where('user_id', $userID)->count();
        $status = '';
        $profile_id = '';
        if($subsexists !=0){
            $user_paypal_info = DB::table('paypal_subscription')->where('user_id', $userID)->first();
            $status = $user_paypal_info->status;
            $profile_id = $user_paypal_info->customer_profile_id;
        }
        return view('online-payment.add', ['material' => $material, 'notNow' => $user->not_now, 'subsexists' => $subsexists,  'status' => $status, 'profile_id' => $profile_id]);
    }
    public function addnew1()
    {
        $userID = Auth::user()->id;
        $material = DB::table('material')->first();

        $user = DB::table('users')
            ->find($userID);
        $dt = new DateTime();
        $dt->format('Ymd');
        return view('online-payment.addnew1', ['material' => $material, 'notNow' => $user->not_now]);
    }
    public function activate()
    {
        $userID = Auth::user()->id;
        $material = DB::table('material')->first();
        $user = DB::table('users')
            ->find($userID);
        $dt = new DateTime();
        $dt->format('Ymd');
        return view('online-payment.addnew', ['material' => $material, 'notNow' => $user->not_now]);
    }
    public function notNow()
    {
        $userID = Auth::user()->id;
        DB::table('users')
            ->where('id', $userID)
            ->update([ 'not_now' => 1,'is_active'=>'YES']);
        // this is working or not in the live
        return redirect()->route('user.dashboard');
    }

    /**
     * Save Payment
     *
     * @param OfflinePaymentSaveRequest $request
     * @return Redirect
     */
    public function ipn()
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        //curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
        curl_setopt($curl, CURLOPT_URL, 'https://api-3t.paypal.com/nvp');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
            //Test
            /* 'USER' => 'yahiadjipe-facilitator_api1.yahoo.com',
            'PWD' => '8SGJGYWJV58W6JR6',
            'SIGNATURE' => 'ANn5dzzcIR78iGR7aGxnVnfhg7baAn01lTbSYb4mFy7Bnjp7D1NINiev', */

            //Live
            'USER' => 'yahiadjipe_api1.yahoo.com',
            'PWD' => 'N642D4NF5B78ETPN',
            'SIGNATURE' => 'ABOwF8r6to13jmlQzssFI5MTljx3AzZoKlFxkmftsuhnXmmI98xA3DBe',

            'METHOD' => 'SetExpressCheckout',
            'VERSION' => '108',
            'LOCALECODE' => 'pt_EN',

            'PAYMENTREQUEST_0_AMT' => 54,
            'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
            'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
            'PAYMENTREQUEST_0_ITEMAMT' => 54,

            'L_PAYMENTREQUEST_0_NAME0' => 'Monthly',
            'L_PAYMENTREQUEST_0_DESC0' => 'Monthly subscription for dns book',
            'L_PAYMENTREQUEST_0_QTY0' => 1,
            'L_PAYMENTREQUEST_0_AMT0' => 54,

            'L_BILLINGTYPE0' => 'RecurringPayments',
            'L_BILLINGAGREEMENTDESCRIPTION0' => 'Monthly',

            'CANCELURL' => 'http://dnasbookdigimarket.com/online-payment/fail',
            'RETURNURL' => 'http://dnasbookdigimarket.com/online-payment/success1/'
        )));


        $response =    curl_exec($curl);
        curl_close($curl);
        //echo "<pre>";print_r($response);die;

        $nvp = array();
        if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
            foreach ($matches['name'] as $offset => $name) {
                $nvp[$name] = urldecode($matches['value'][$offset]);
            }
        }

        if (isset($nvp['ACK']) && $nvp['ACK'] == 'Success') {
            $query = array(
                'cmd'    => '_express-checkout',
                'token'  => $nvp['TOKEN']
            );
            //Live
            $redirectURL = sprintf('https://www.paypal.com/cgi-bin/webscr?%s', http_build_query($query));
            //Test
            //$redirectURL = sprintf('https://www.sandbox.paypal.com/cgi-bin/webscr?%s', http_build_query($query));


            header('Location: ' . $redirectURL);
        } else {
            //Opz, alguma coisa deu errada.
            //Verifique os logs de erro para depuração.
        }
    }
    public function saveRecurringPayment(OnlinePaymentSaveRequest $request)
    {
        $data = $request->except(['_token']);

        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['payment_mode'] = 'ONLINE';

        // Get Default Offline Payment Profile
        $paymentProfile = $this->paymentProfile->findWhere(['payment_type' => 'OFFLINE BANK', 'default' => 'YES'])->first();
        if ($paymentProfile) {
            $data['payment_profile_id'] = $paymentProfile->id;
        } else {
            $data['payment_profile_id'] = null;
        }

        $paymentForPackage = '';
        if ($data['paid_for'] == 'SUBSCRIPTION') {
            $data['payment_type'] = 'RECURRING'; //SUBSCRIPTION WILL BE RECURRING
            $paymentType = 'RECURRING';
            Log::info('Subscription Payment');
            $paymentForPackage = "Website Subscription";

            $material = $this->material->find(1);
            $data['amount_paid'] = $material->price;
            $planId = $material->paypal_plan_id;
            $data['material_id'] = 1;

        } else {
            $materialGroupID = $data['group_id'];
            $materialSubGroupID = $data['sub_group_id'];
            $materials = $data['material_id'];

            // Calculate discount if subscriber purchased Group or Level otherwise no discount just straight price of item
            $group = $this->materialGroup->find($data['group_id']);
            $paymentType = $group->payment_type;
            $data['payment_type'] = $paymentType;

            if ($data['paid_for'] == 'GROUP') {

                $data['amount_paid'] = $group->price;
                $groupMaterialPrice = $group->material->sum('price');
                $discount = $groupMaterialPrice - $data['amount_paid'];
                $paymentForPackage = $group->title;

                if ($paymentType == 'RECURRING') {
                    $planId = $group->paypal_plan_id;
                }


            } elseif ($data['paid_for'] == 'LEVEL') {

                $subGroups = $this->materialSubGroup->find($data['sub_group_id']);
                $data['amount_paid'] = $subGroup->price;
                $subGroupMaterialPrice = $subGroup->material->sum('price');
                $discount = $subGroupMaterialPrice - $data['amount_paid'];
                $paymentForPackage = $subGroup->title;

                if ($paymentType == 'RECURRING') {
                    $planId = $subGroup->paypal_plan_id;
                }

            } elseif ($data['paid_for'] == 'MATERIAL') {

                if (is_array($materials)) {
                    $materialsObj = $this->material->findWhereIn('id', $materials);

                    foreach ($materialsObj as $material) {
                        $data['payment_package'][$material->id] = $material->title;
                        $data['amount_paid'][$material->id] = $material->price;
                    }
                } else {
                    $materialObj = $this->material->find($materials);
                    $planId = $materialObj->paypal_plan_id;
                    $paymentForPackage = $materialObj->title;
                    // Total amount paid
                    $data['amount_paid'] = $materialObj->price;
                    $discount = 0;
                }

            }

            //$discount = ($discount / count($materials));

            $data['discount'] = 0;

        }//end of subscription else

        if (!empty($planId)) {
            $data['paypal_plan_id'] = $planId;
        }

        if (!empty($paymentForPackage)) {
            $data['paid_for_package'] = $paymentForPackage;
        }

        // Online Recurring Payment with Paypal starts here
        // Create new agreement
        if ($paymentType == 'RECURRING') {

            // Cache the request for next 10 minutes
            Cache::put('online-payment-details-' . Auth::user()->id, $data, 10);

            $agreement = new Agreement();
            $agreement->setName(config('settings.sitename') . ' Monthly Agreement for ' . $paymentForPackage)
                ->setDescription(config('settings.sitename') . ' Monthly Agreement for ' . $paymentForPackage)
                ->setStartDate(\Carbon\Carbon::now()->addMinutes(5)->toIso8601String());

            $plan = Plan::get($planId, $this->apiContext);

            if ($plan->state != "ACTIVE") {

                // Activate the plan
                $patch = new Patch();
                $value = new PayPalModel('{"state":"ACTIVE"}');
                $patch->setOp('replace')
                    ->setPath('/')
                    ->setValue($value);
                $patchRequest = new PatchRequest();
                $patchRequest->addPatch($patch);
                $plan->update($patchRequest, $this->apiContext);
                $plan = Plan::get($plan->getId(), $this->apiContext);
                $planId = $plan->id;
            }

            // Set plan id
            $plan = new Plan();
            $plan->setId($planId);

            // Set Plan for agreement
            $agreement->setPlan($plan);

            // Add payer type
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            $agreement->setPayer($payer);

            try {
                // Create agreement
                $agreement = $agreement->create($this->apiContext);

                // Extract approval URL to redirect user
                $approvalUrl = $agreement->getApprovalLink();

                return redirect($approvalUrl);
            } catch (PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            } catch (Exception $ex) {
                die($ex);
            }
        }


        /*$response = array(
                'status' => 'success',
                'message' => trans('Online Payment has been saved successfully.'),
                'redirect_url' => route('online-payment.add')
            );*/
//dd($data['payment_type']);
        //return redirect()->route('online-payment.add')->with('success', trans('Online Payment has been saved successfully.'));

        //} else {
        //return redirect()->route('online-payment.add')->withInput()->with('error', trans('Online Payment has not been saved.'));
        //Log::error("Online Payment has not been saved.");

        /*$response = array(
            'status' => 'error',
            'message' => trans('Offline Payment has not been saved.'),
        );
    }*/

        //return $response;
    }

    public function showMaterial(Request $request)
    {
        $post = $request->all();

        if ($post['paid_for'] == 'GROUP' or $post['paid_for'] == 'MATERIAL') {
            $materials = $this->material->findByField('group_id', $post['group_id']);
        } elseif ($post['paid_for'] == 'LEVEL' and isset($post['sub_group_id'])) {
            $materials = $this->material->findByField('sub_group_id', $post['sub_group_id']);
        }

        if ($post['paid_for'] != 'MATERIAL') {
            $disabled = true;
        } else {
            $disabled = false;
        }
        if (!empty($materials)) {
            return view('online-payment.material', ['materials' => $materials, 'disabled' => $disabled]);
        } else {
            return '';
        }

    }

    function getParents($user, $parents = array())
    {

        $parent = $user->parent;
        if ($parent) {
            //array_push($parents, $parent->id);
            array_unshift($parents, $parent->id);
            return $this->getParents($parent, $parents);
        }
        return $parents;
    }

    function successRecurringPayment(Request $request)
    {
        $user = Auth::user();
        $data = Cache::get('online-payment-details-' . $user->id);
        $data['status'] = 'APPROVED';
        //dd($data);
        $token = $request->token;
        $agreement = new \PayPal\Api\Agreement();

        try {
            // Execute agreement
            $result = $agreement->execute($token, $this->apiContext);

            if (isset($result->id)) {

                $data['payment_profile_id'] = $result->id;  //paypal profile id

                // ======================================
                if ($onlinePayment = $this->onlinePayment->create($data)) {

                    // Commission Calculation and Levels
                    Log::info("======= Commission Calculation (START) =======");
                    $parents = $this->getParents($user);
                    Log::info(print_r($parents, true));

                    // Get all levels
                    $this->level->pushCriteria(new \App\Criteria\Admin\LevelCriteria());
                    $levels = $this->level->all();

                    $levelCounter = 1;
                    foreach ($parents as $parentKey => $parent) {
                        //last/first parent (from top) will consider level first
                        Log::info('Level ' . $levelCounter);
                        foreach ($levels as $levelKey => $level) {

                            $parentUser = $this->user->find($parent);

                            if ($parentKey == $levelKey and $level->active == 'YES' and $parentUser->is_active == 'YES') {
                                Log::info('Level Title = ' . $level->level_title . ' == Level Percentage ==' . $level->level_percentage);
                                $commission = array();

                                $commission['receiver_id'] = $parent;
                                $commission['payer_id'] = $user->id;
                                $commission['payment_id'] = $onlinePayment->id;
                                $commission['payment'] = $data['amount_paid'];
                                $commission['level_id'] = $level->id;
                                $commission['commission_amount'] = ($data['amount_paid'] / 100) * $level->level_percentage;
                                // find last commission transaction
                                $lastCommission = $this->userCommission->findWhere(['receiver_id' => $parent])->last();
                                $commission['opening_balance'] = $lastCommission['closing_balance'];
                                $commission['closing_balance'] = $commission['commission_amount'] + $commission['opening_balance'];
                                Log::info('User Commission');
                                Log::info(print_r($commission, true));
                                if ($userCommission = $this->userCommission->create($commission)) {
                                    Log::info('User commission saved successfully');
                                    Log::info(print_r($userCommission, true));
                                } else {
                                    Log::error('User commission not saved successfully');
                                }

                            }

                        }

                        $levelCounter++;

                    }
                    Log::info("======= Commission Calculation (END) =======");

                    if ($data['paid_for'] == 'SUBSCRIPTION') {
                        //$data = array();
                        $data['user_id'] = $user->id;
                        $data['subscription_fee'] = 'YES';
                        $data['start_date'] = Date::now();
                        $data['end_date'] = Date::now()->addMonth();
                        $data['transaction_id'] = $onlinePayment->id;
                        $data['amount'] = $onlinePayment->amount_paid;

                        if ($onlinePaymentDetails = $this->onlinePaymentDetails->create($data)) {
                            $this->user->update(['is_active' => 'YES'], $user->id);
                        }
                    } elseif (in_array($data['paid_for'], ['GROUP', 'LEVEL', 'MATERIAL'])) {

                        //Save material item
                        $data['start_date'] = Date::now();
                        $data['end_date'] = Date::now()->addMonth();
                        $data['transaction_id'] = $onlinePayment->id;
                        $data['amount'] = $data['amount_paid'];

                        if ($onlinePaymentDetails = $this->onlinePaymentDetails->create($data)) {

                        }

                    }

                    return redirect()->route('online-payment.add')->with('success', trans('online_payment.saved_successfully1' . $data['paid_for'] . ' ' . $data['paid_for_package'] . 'online_payment.saved_successfully2'));
                }
                //echo 'New Subscriber Created and Billed';
            }


        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            ///echo 'You have either cancelled the request or your session has expired';
            return redirect()->route('online-payment.add')->with('error', trans('Online Recurring Payment has not been saved, either you cancelled the request or your session has expired.'));
        }
    }

    public function cancelRecurringPayment()
    {
        return redirect()->route('online-payment.add')->with('error', trans('Online Payment has not been saved, either you cancelled the request or your session has expired.'));
    }

    public function createOneTimePayment(OnlinePaymentSaveRequest $request)
        //public function createOneTimePayment(Request $request)
    {
        $data = $request->except(['_token']);
        $materials = explode(',', $data['material_id']);
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['payment_mode'] = 'ONLINE';
        $data['payment_type'] = 'ONE TIME';
        $data['status'] = 'APPROVED';

        if ($data['paid_for'] != 'SUBSCRIPTION') {

            // Initialize the PayPal API parameters
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");
            $itemList = new ItemList();
            $items = array();

            // Calculate discount if subscriber purchased Group or Level otherwise no discount just straight price of item
            if ($data['paid_for'] == 'GROUP') {

                $group = $this->materialGroup->find($data['group_id']);
                $data['amount_paid'] = $group->price;
                $groupMaterialPrice = $group->material->sum('price');
                $materialsObj = $group->material;
                $discount = $groupMaterialPrice - $data['amount_paid'];
                $paymentDescription = $group->title;

                $item = new Item();
                $item->setName($group->title)
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setSku($group->id)// Similar to `item_number` in Classic API
                    ->setPrice($data['amount_paid']);

                // Push new item into array
                array_push($items, $item);

            } elseif ($data['paid_for'] == 'LEVEL') {

                $subGroups = $this->materialSubGroup->find($data['sub_group_id']);
                $data['amount_paid'] = $subGgroup->price;
                $materialsObj = $subGroup->material;
                $subGroupMaterialPrice = $subGroup->material->sum('price');
                $discount = $subGroupMaterialPrice - $data['amount_paid'];

                $paymentDescription = $subGroup->title;

                $item = new Item();
                $item->setName($subGroups->title)
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setSku($subGroup->id)// Similar to `item_number` in Classic API
                    ->setPrice($data['amount_paid']);

                // Push new item into array
                array_push($items, $item);

            } elseif ($data['paid_for'] == 'MATERIAL') {

                $materialsObj = $this->material->findWhereIn('id', $materials);
                $data['amount_paid'] = $materialsObj->sum('price');
                $discount = 0;

                $paymentDescription = 'Video / Courses';
            }
        }

        //======
        if ($onlinePayment = $this->onlinePayment->create($data)) {

            // Commission Calculation and Levels
            Log::info("======= Commission Calculation (START) =======");
            $parents = $this->getParents($user);
            Log::info(print_r($parents, true));

            // Get all levels
            $this->level->pushCriteria(new \App\Criteria\Admin\LevelCriteria());
            $levels = $this->level->all();

            $levelCounter = 1;
            foreach ($parents as $parentKey => $parent) {
                //last/first parent (from top) will consider level first
                Log::info('Level ' . $levelCounter);
                foreach ($levels as $levelKey => $level) {
                    if ($parentKey == $levelKey and $level->active == 'YES') {
                        Log::info('Level Title = ' . $level->level_title . ' == Level Percentage ==' . $level->level_percentage);
                        $commission = array();

                        $commission['receiver_id'] = $parent;
                        $commission['payer_id'] = $user->id;
                        $commission['payment_id'] = $offlinePayment->id;
                        $commission['payment'] = $data['amount_paid'];
                        $commission['level_id'] = $level->id;
                        $commission['commission_amount'] = ($data['amount_paid'] / 100) * $level->level_percentage;
                        // find last commission transaction
                        $lastCommission = $this->userCommission->findWhere(['receiver_id' => $parent])->last();
                        $commission['opening_balance'] = $lastCommission['closing_balance'];
                        $commission['closing_balance'] = $commission['commission_amount'] + $commission['opening_balance'];
                        Log::info('User Commission');
                        Log::info(print_r($commission, true));
                        if ($userCommission = $this->userCommission->create($commission)) {
                            Log::info('User commission saved successfully');
                            Log::info(print_r($userCommission, true));
                        } else {
                            Log::error('User commission not saved successfully');
                        }
                    }
                }
                $levelCounter++;
            }
            Log::info("======= Commission Calculation (END) =======");
            // Comment from here
            if ($data['paid_for'] != 'SUBSCRIPTION') {

                //Save material item(s)
                foreach ($materialsObj as $material) {

                    if ($data['paid_for'] == 'MATERIAL') {

                        $item = new Item();
                        $item->setName($material->title)
                            ->setCurrency('USD')
                            ->setQuantity(1)
                            ->setSku($material->id)// Similar to `item_number` in Classic API
                            ->setPrice($material->price);

                        // Push new item into array
                        array_push($items, $item);
                    }

                    $details = array();
                    $details['user_id'] = $user->id;
                    $details['group_id'] = $data['group_id'];
                    $details['sub_group_id'] = $data['sub_group_id'];
                    $details['material_id'] = $material->id;
                    $details['start_date'] = Date::now();
                    $details['transaction_id'] = $onlinePayment->id;
                    $details['amount'] = $material->price;
                    $details['discount'] = 0;

                    if ($onlinePaymentDetails = $this->onlinePaymentDetails->create($details)) {

                    }

                }

                $itemList->setItems($items);
                $details = new Details();
                $details->setShipping(0)
                    ->setTax(0)
                    ->setSubtotal($data['amount_paid']);

                $amount = new Amount();
                $amount->setCurrency("USD")
                    ->setTotal($data['amount_paid'])
                    ->setDetails($details);

                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($itemList)
                    ->setDescription("Payment for " . $paymentDescription)
                    ->setInvoiceNumber($onlinePayment->id);
                //->setInvoiceNumber(uniqid());

                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl(route('online-payment.execute-onetime-payment'))
                    ->setCancelUrl(route('online-payment.cancel-onetime-payment'));

                $payment = new Payment();
                $payment->setIntent("sale")
                    ->setPayer($payer)
                    ->setRedirectUrls($redirectUrls)
                    ->setTransactions(array($transaction));

                $request = clone $payment;

                try {
                    $payment->create($this->apiContext);
                } catch (Exception $ex) {

                    $response = array(
                        'status' => 'error',
                        'message' => trans('Exception: Online Payment has not been saved.'),
                    );
                    return $response;
                }

                $approvalUrl = $payment->getApprovalLink();

            }
            //======

            // THIS IS SAMPLE=======================
            /*$payer = new Payer();
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
            $redirectUrls->setReturnUrl(route('online-payment.execute-onetime-payment'))
                            ->setCancelUrl(route('online-payment.cancel-onetime-payment'));

            $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));

            $request = clone $payment;

            try {
                $payment->create($this->apiContext);
            } catch (Exception $ex) {

                $response = array(
                    'status' => 'error',
                    'message' => trans('Exception: Online Payment has not been saved.'),
                );
                return $response;
            }

            $approvalUrl = $payment->getApprovalLink();
            // THIS IS SAMPLE=======================*/
            //=======================================


        } else {
            $response = array(
                'status' => 'success',
                'message' => trans('Online Payment has not been saved successfully.'),
                //'redirect_url' => route('online-payment.add')
            );
        }

        Session::put('total', $data['amount_paid']);
        return $payment;
        //return $data;
    }

    public function executeOneTimePayment(Request $request)
    {
        $total = Session::get('total');

        $paymentId = $request->paymentId;
        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($total);

        $amount->setCurrency('USD');
        $amount->setTotal($total);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        try {

            $result = $payment->execute($execution, $this->apiContext);

            try {

                $payment = Payment::get($paymentId, $this->apiContext);
            } catch (Exception $ex) {

                $response = array(
                    'status' => 'error',
                    'message' => trans('Exception: Online Payment has not been saved.'),
                    //'redirect_url' => route('online-payment.add')
                );
                return $response;
            }
        } catch (Exception $ex) {

            $response = array(
                'status' => 'error',
                'message' => trans('Exception: Online Payment has not been saved.'),
                //'redirect_url' => route('online-payment.add')
            );

            return $response;
        }

        $response = array(
            'status' => 'success',
            'message' => trans('online_payment.saved_successfully'),
            //'redirect_url' => route('online-payment.add')
        );
        //return $payment;
        return $response;

    }

    public function cancelOneTimePayment(Request $request)
    {
        return redirect()->route('online-payment.add')->with('error', trans('Online One Time Payment has not been saved, either you cancelled the request or your session has expired.'));
    }


    public function success()
    {

        $userID = Auth::user()->id;
        // save payment
        $transactionID = DB::table('payments')->insertGetId(
            [
                'user_id' => $userID,
                'payment_mode' => 'ONLINE',
                'payment_type' => 'RECURRING',
                'paid_for' => 'SUBSCRIPTION',
                'amount_paid' => 50, // todo this can change.... we need to find a way to make this dynamic
                'status' => 'APPROVED'
            ]
        );

        DB::table('payments_details')->insert(
            [
                'user_id' => $userID,
                'subscription_fee' => 'YES',
                'start_date' => Carbon::now()->startOfMonth(), // first day of the month no matter when he/she pays
                'end_date' => Carbon::now()->endOfMonth(),  // last day of the month no matter when he/she pays
                'amount' => 50,
                'transaction_id' => $transactionID
            ]
        );

        DB::table('users')
            ->where('id', $userID)
            ->update(['is_active' => 'YES', 'not_now' => 1]);
        return redirect()->route('home');
    }

    public function fail(Request $request)
    {
        // fail logic
        return redirect()->route('online-payment.add')->with('error', trans('Online One Time Payment has not been saved, either you cancelled the request or your session has expired.'));
    }


}
