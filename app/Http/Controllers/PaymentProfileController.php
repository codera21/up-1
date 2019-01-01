<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

// Facades
use Date;
use Auth;
use Illuminate\Support\Facades\Session;
use Log;
use Grid;

// Models and Repo
use App\Repositories\PaymentProfileRepository;
use App\Repositories\UserRepository;

// Form Requests
use App\Http\Requests\PaymentProfileSaveRequest;

class PaymentProfileController extends Controller
{

    /**
     * @var PaymentProfileRepository
     */
    protected $paymentProfile;

    /**
     * @var UserRepository
     */
    protected $user;

    public function __construct(PaymentProfileRepository $paymentProfile, UserRepository $user)
    {
        $this->paymentProfile = $paymentProfile;
        $this->user = $user;

        Log::getMonolog()->popHandler();//Remove Old Handlers
        Log::useDailyFiles(config('settings.log.payment'));//Set New Handler
    }

    /**
     * Show all banks
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get model
        $this->paymentProfile->pushCriteria(new \App\Criteria\PaymentProfileCriteria());
        $paymentProfiles = $this->paymentProfile;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('payment-profile-grid')->setBaseUrl(route('payment-profile'))
            ->setPaginator($paymentProfiles, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('payment-profile', array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'class' => 'text-white',
                        'url' => route('payment-profile.add-profile')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'id',
                        'label' => trans('ID'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->id;
                        }
                    ),
                    array(
                        'name' => 'payment_type',
                        'label' => trans('Type'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->payment_type;
                        }
                    ),
                    array(
                        'name' => 'card_no',
                        'label' => trans('Card No'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->card_no;
                        }
                    ),
                    array(
                        'name' => 'bank_name',
                        'label' => trans('Bank Name'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->bank_name;
                        }
                    ),
                    array(
                        'name' => 'name',
                        'label' => trans('Name'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->name;
                        }
                    ),
                    array(
                        'name' => 'city',
                        'label' => trans('City'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->city;
                        }
                    ),
                    array(
                        'name' => 'state',
                        'label' => trans('State'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->state;
                        }
                    ),
                    array(
                        'name' => 'zip',
                        'label' => trans('Zip Code'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->zip;
                        }
                    ),
                    array(
                        'name' => 'default',
                        'label' => trans('Default'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->default;
                        }
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('Action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => 'auto',
                        'value' => function ($row) {
                            return '<a href="' . route('payment-profile.set-default', ['id' => $row->id]) . '" class="btn btn-primary text-white btn-xs edit">' . trans('Set Default') . '</a>
                            <a href="' . route('payment-profile.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete text-white">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );

        return view('payment-profile.index', ['grid' => $grid]);
    }

    /**
     * Show add payment profile
     *
     * @return Response
     */
    public function addProfile()
    {
        return view('payment-profile.add-profile');
    }

    /**
     * Save payment profile
     *
     * @param PaymentSaveRequest $request
     * @return Response
     */
    public function saveProfile(PaymentProfileSaveRequest $request)
    {

        Log::info("============ Payment - Add Profile (START) ============");

        $data = $request->except(['_token', 'amount', 'cvv']);
        $data['card_no'] = preg_replace('/\s+/', '', $data["card_no"]);

        $user = Auth::user();
        if ($user->paymentProfiles->count() > 0) {
            //$customerProfileId = $user->paymentProfiles[0]->customer_profile_id;
            $customerProfileId = $user->paymentProfiles[0]->id;
        } else {
            $customerProfileId = null;
            $data['default'] = 'Yes';
        }

        Log::info("User ID: " . $user->id);
        Log::info("Company ID: " . $user->company_id);
        Log::info("Existing Customer Profile ID: " . $customerProfileId);


        // Save Payment Profile
        $data['user_id'] = $user->id;
        $data['company_id'] = $user->company_id;
        //$data['customer_profile_id'] = $customerProfileId;
        //$data['customer_payment_profile_id'] = $customerPaymentProfileId;
        unset($data['first_name']);
        unset($data['last_name']);

        if ($paymentProfile = $this->paymentProfile->create($data)) {

            Log::info("Payment Profile (ID: " . $paymentProfile->id . ") has been saved successfully.");

            // Set Default Payment Profile Account
            if ($paymentProfile->default == 'YES') {

                $this->paymentProfile->pushCriteria(new \App\Criteria\PaymentProfileCriteria());
                $paymentProfiles = $this->paymentProfile->all();
                if ($paymentProfiles) {
                    foreach ($paymentProfiles as $profile) {
                        $this->paymentProfile->update(['default' => 'NO'], $profile->id);
                    }
                }
                $this->paymentProfile->update(['default' => 'YES'], $paymentProfile->id);
            }

            $response = array(
                'status' => 'success',
                'message' => trans('New payment profile has been added successfully.'),
                'payment_profile_id' => $paymentProfile->id,
                'redirect_url' => route('payment-profile.add-profile')
            );
        } else {
            Log::error("Payment Profile has not been saved.");

            $response = array(
                'status' => 'error',
                'message' => trans('Account has not been added.'),
            );
        }

        Log::info("============ Payment - Add Profile (END) ============");

        return $response;
    }

    /**
     * Delete Payment Profile
     *
     * @param Request $request
     * @param integer $profileId
     * @return Redirect
     */
    public function delete(Request $request, $profileId)
    {
        if ($this->paymentProfile->update(['deleted' => 'YES'], $profileId)) {
            return redirect()->route('payment-profile')->with('success', trans('Payment Profile has been deleted successfully.'));
        } else {
            return redirect()->route('payment-profile')->with('error', trans('Payment Profile has not been deleted.'));
        }
    }

    /**
     * Set default payment profile
     *
     * @param Request $request
     * @param integer $profileId
     * @return Redirect
     */
    public function setDefault(Request $request, $profileId)
    {
        $paymentProfile = $this->paymentProfile->find($profileId);

        $this->paymentProfile->pushCriteria(new \App\Criteria\PaymentProfileCriteria());
        $paymentProfiles = $this->paymentProfile->all();
        if ($paymentProfiles) {
            foreach ($paymentProfiles as $paymentProfile) {
                $this->paymentProfile->update(['default' => 'NO'], $paymentProfile->id);
            }
        }

        if ($this->paymentProfile->update(['default' => 'YES'], $profileId)) {
            return redirect()->route('payment-profile')->with('success', trans('Default Payment Profile has been set successfully.'));
        } else {
            return redirect()->route('payment-profile')->with('error', trans('Default Payment Profile has not been set.'));
        }

    }

}
