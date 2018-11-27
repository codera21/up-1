<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;
// Facades
use Date;
use Auth;
use Log;

// Models and Repo
use App\Repositories\PaymentRepository;
use App\Repositories\PaymentDetailsRepository;
use App\Repositories\MaterialGroupRepository;
use App\Repositories\MaterialSubGroupRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\UserRepository;
use App\Repositories\BankRepository;
use App\Repositories\PaymentProfileRepository;
use App\Repositories\LevelRepository;
use App\Repositories\UserCommissionRepository;

// Form Requests
use App\Http\Requests\OfflinePaymentSaveRequest;
use App\Http\Requests\OfflinePaymentUpdateRequest;

class OfflinePaymentController extends Controller
{
    /**
     * @var offlinePaymentDetailsRepository
     */
    protected $offlinePaymentDetails;

    /**
     * @var OfflinePaymentRepository
     */
    protected $offlinePayment;

    /**
     * @var MaterialGroupRepository
     */
    protected $materialGroup;

    /**
     * @var MaterialSubGroupRepository
     */
    protected $materialSubGroup;

    /**
     * @var MaterialRepository
     */
    protected $material;

    /**
     * @var PaymentProfileRepository
     */
    protected $paymentProfile;

    /**
     * @var LevelRepository
     */
    protected $level;

    /**
     * @var UserCommissionRepository
     */
    protected $userCommission;

    /**
     * @var BankRepository
     */
    protected $bank;

    /**
     * @var UserRepository
     */
    protected $user;

    public function __construct(PaymentRepository $offlinePayment,
                                PaymentDetailsRepository $offlinePaymentDetails,
                                MaterialGroupRepository $materialGroup,
                                MaterialSubGroupRepository $materialSubGroup,
                                MaterialRepository $material,
                                PaymentProfileRepository $paymentProfile,
                                LevelRepository $level,
                                UserCommissionRepository $userCommission,
                                BankRepository $bank,
                                UserRepository $user)
    {
        $this->offlinePaymentDetails = $offlinePaymentDetails;
        $this->offlinePayment = $offlinePayment;
        $this->materialGroup = $materialGroup;
        $this->materialSubGroup = $materialSubGroup;
        $this->material = $material;
        $this->paymentProfile = $paymentProfile;
        $this->level = $level;
        $this->userCommission = $userCommission;
        $this->bank = $bank;
        $this->user = $user;

        Log::getMonolog()->popHandler();//Remove Old Handlers
        Log::useDailyFiles(config('settings.log.offlinepayment'));//Set New Handler
        $this->middleware('isActive', ['except' => ['offline_add', 'offline','verify','search']]);

    }

    public function index()
    {

    }

    /**
     * Show add offline payment form
     *
     * @return Response
     */
    public function add()
    {
        //Get all material sub groups
        /*$banks = array();
        $this->materialSubGroup->all()->map(function($item) use(&$materialSubGroups) {
            $materialSubGroups[$item->id] = $item->title;
        });*/


        return view('offline-payment.add');
    }

    /**
     * Save Payment
     *
     * @param OfflinePaymentSaveRequest $request
     * @return Redirect
     */
    public function save(OfflinePaymentSaveRequest $request)
    {
        $data = $request->except(['_token']);

        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['payment_mode'] = 'OFFLINE';

        // Get Default Offline Payment Profile
        $paymentProfile = $this->paymentProfile->findWhere(['payment_type' => 'OFFLINE BANK', 'default' => 'YES'])->first();
        if ($paymentProfile) {
            $data['payment_profile_id'] = $paymentProfile->id;
        } else {
            $data['payment_profile_id'] = null;
        }


        if ($data['paid_for'] == 'SUBSCRIPTION') {
            $data['payment_type'] = 'RECURRING'; //SUBSCRIPTION WILL BE RECURRING
            Log::info('Subscription Payment');
        } else {
            $materialGroupID = $data['group_id'];
            $materialSubGroupID = $data['sub_group_id'];
            $materials = $data['material'];

            // Calculate discount if subscriber purchased Group or Level otherwise no discount just straight price of item
            $group = $this->materialGroup->find($data['group_id']);
            $paymentType = $group->payment_type;
            $data['payment_type'] = $paymentType;

            if ($data['paid_for'] == 'GROUP') {

                if ($data['amount_paid'] < $group->price) {
                    return redirect()->route('offline-payment.add')->withInput()->with('error', trans('Amount which you entered is less than selected Group Price.'));
                }
                $groupMaterialPrice = $group->material->sum('price');
                $discount = $groupMaterialPrice - $data['amount_paid'];


            } elseif ($data['paid_for'] == 'LEVEL') {

                $subGroups = $this->materialSubGroup->find($data['sub_group_id']);
                if ($data['amount_paid'] < $subGgroup->price) {
                    return redirect()->route('offline-payment.add')->withInput()->with('error', trans('Amount which you entered is less than selected Level Price.'));
                }

                $subGroupMaterialPrice = $subGroup->material->sum('price');
                $discount = $subGroupMaterialPrice - $data['amount_paid'];

            } elseif ($data['paid_for'] == 'MATERIAL') {


                $materialsObj = $this->material->findWhereIn('id', $materials);
                if ($data['amount_paid'] < $materialsObj->sum('price')) {
                    return redirect()->route('offline-payment.add')->withInput()->with('error', trans('Amount which you entered is less than selected Video/Course Price.'));
                }
                $discount = 0;
            }

            $discount = ($discount / count($materials));

        }//end of subscription else

        if ($offlinePayment = $this->offlinePayment->create($data)) {

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

                $parentUser = $this->user->find($parent);
                Log::info('Level ' . $levelCounter);
                foreach ($levels as $levelKey => $level) {
                    if ($parentKey == $levelKey and $level->active == 'YES' and $parentUser->is_active == 'YES') {
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


            if ($data['paid_for'] == 'SUBSCRIPTION') {
                $data = array();
                $data['user_id'] = $user->id;
                $data['subscription_fee'] = 'YES';
                $data['start_date'] = Date::now();
                $data['end_date'] = Date::now()->addMonth();
                $data['transaction_id'] = $offlinePayment->id;
                $data['amount'] = $offlinePayment->amount_paid;
                $data['transaction_id'] = $offlinePayment->id;

                if ($offlinePaymentDetails = $this->offlinePaymentDetails->create($data)) {
                    // make user active
                    $this->user->update(['is_active' => 'YES'], $user->id);
                }
            } else {

                //Save material item(s)
                foreach ($materials as $material) {
                    $data = array();
                    $objMaterial = $this->material->find($material);
                    $data['user_id'] = $user->id;
                    $data['group_id'] = $materialGroupID;
                    $data['sub_group_id'] = $materialSubGroupID;
                    $data['material_id'] = $material;
                    $data['start_date'] = Date::now();
                    if ($paymentType == 'RECURRING') {
                        $data['end_date'] = Date::now()->addMonth();
                    }
                    $data['transaction_id'] = $offlinePayment->id;
                    $data['amount'] = $objMaterial->price;
                    $data['discount'] = $discount;

                    if ($offlinePaymentDetails = $this->offlinePaymentDetails->create($data)) {

                    }
                }
            }

            $response = array(
                'status' => 'success',
                'message' => trans('Offline Payment has been saved successfully.'),
                'redirect_url' => route('offline-payment.add')
            );

            //return redirect()->route('offline-payment.add')->with('success', trans('Offline Payment has been saved successfully.'));

        } else {
            //return redirect()->route('offline-payment.add')->withInput()->with('error', trans('Offline Payment has not been saved.'));
            Log::error("Offline Payment has not been saved.");

            $response = array(
                'status' => 'error',
                'message' => trans('Offline Payment has not been saved.'),
            );
        }

        return $response;
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
            return view('offline-payment.material', ['materials' => $materials, 'disabled' => $disabled]);
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

    public function offline()
    {
        return view('offline-payment.off_add');
    }

    public function offline_add(request $request)
    {
        $receipt = Storage::disk('uploads.receipt_photo');
               $file = $request->file('receipt_photo');
               if ($request->hasFile('receipt_photo')) {
                   $receiptFile = $request->file('receipt_photo');
                   $receiptFileName = date('Ymd_His') . '_' . $receiptFile->getClientOriginalName();
                   $receiptFileRElativePath = $receipt->putFileAs('', $receiptFile, $receiptFileName);
                   $receiptStoragePath = $receipt->url($receiptFileRElativePath);
                   $receiptFileUrl = asset($receiptStoragePath);
                   $fileName = $receiptFileUrl;
               } else {
                   $fileName = '';
               }
        $addpayment = DB::table('offline_pay')->insert([
            'bank_slip_no' => $request->input('bank_slip_no'),
            'amount_paid' => $request->input('amount_paid'),
            'payment_type' => $request->input('payment_type'),
            'account_no' => $request->input('account_no'),
            'country' => $request->input('country'),
            'name_of_subscriber' => $request->input('name_of_subscriber'),
            'receipt_photo'=>$fileName
        ]);
        if ($addpayment) {
            return redirect()->route('offline_pay.verify')
                ->with('success', 'payment added successfully');
        }
    }
    public function verify()
    {
        DB::table('users')->update([
           'is_active'=>'YES'
        ]);
      return view('offline-payment.verify_form');
    }
    public function search(request $request)
    {
        $data = $request->input('bank_slip_no');
        $payment = DB::table('offline_pay')->where('bank_slip_no',$data)->first();
        $count = DB::table('offline_pay')->where('bank_slip_no',$data)->count();
        return view('offline-payment.details',['payment'=>$payment,'count'=>$count]);
    }
}
