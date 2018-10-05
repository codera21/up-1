<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

// Facades
use Grid;
use Date;
use Config;

// Models and Repo
use App\Repositories\MaterialGroupRepository;
use App\Repositories\MaterialSubGroupRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\PaymentDetailsRepository;
use App\Repositories\PaymentRepository;

// Form Requests
use App\Http\Requests\Admin\MaterialSubGroupSaveRequest;
use App\Http\Requests\Admin\MaterialSubGroupUpdateRequest;

// Used to process plans
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;


class MaterialSubGroupController extends Controller
{

   /**
     * @var MaterialSubGroupRepository
     */
    protected $materialSubGroup;

    /**
     * @var MaterialGroupRepository
     */
    protected $materialGroup;

    /**
     * @var MaterialRepository
     */
    protected $material;

    /**
     * @var PaymentDetailsRepository
     */
    protected $paymentDetails;

    /**
     * @var PaymentRepository
     */
    protected $payment;

    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;

    public function __construct(MaterialSubGroupRepository $materialSubGroup, 
        MaterialGroupRepository $materialGroup,
        MaterialRepository $material, 
        PaymentDetailsRepository $paymentDetails,
        PaymentRepository $payment)
    {
        $this->materialSubGroup = $materialSubGroup;
        $this->materialGroup = $materialGroup;
        $this->material = $material;
        $this->paymentDetails = $paymentDetails;
        $this->payment = $payment;

        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
        }
        
        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    /**
     * Show all levels
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        //Get all material groups
        $materialGroups = array();
        $this->materialGroup->all()->map(function($item) use(&$materialGroups) {
            $materialGroups[$item->id] = $item->title;
        });

        //dd($materialGroups);

        //Get model
        $this->materialSubGroup->pushCriteria(new \App\Criteria\Admin\MaterialSubGroupCriteria());
        $materialSubGroups = $this->materialSubGroup;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('material-sub-group-grid')->setBaseUrl(route('admin.material-sub-group'))
            ->setPaginator($materialSubGroups, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.material-sub-group', array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.material-sub-group.add')
                    )
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
                        'name' => 'title',
                        'label' => trans('Title'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->title;
                        }
                    ),
                    array(
                        'name' => 'price',
                        'label' => trans('Price'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->price;
                        }
                    ),
                    array(
                        'name' => 'payment_type',
                        'label' => trans('Payment Type'),
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
                        'name' => 'enable_payment_button',
                        'label' => trans('Enabled'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->enable_payment_button;
                        }
                    ),
                    array(
                        'name' => 'material_group',
                        'label' => trans('Material Group'),
                        'sortable' => false,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => $materialGroups,
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            if($row->materialGroups){
                                return $row->materialGroups->title;   
                            }
                            
                        }
                    ),       
                    array(
                        'name' => 'action',
                        'label' => trans('Action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => '120',
                        'value' => function ($row) {
                            return '<a href="' . route('admin.material-sub-group.edit', ['id' => $row->id]) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                            <a href="' . route('admin.material-sub-group.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );

        return view('admin.material-sub-group.index', ['grid' => $grid]);
    }

    /**
     * Show add level form
     *
     * @return Response
     */
    public function add()
    {
        return view('admin.material-sub-group.add');
    }

    /**
     * Show edit level form
     *
     * @param integer $Id
     * @return Response
     */
    public function edit($Id)
    {
        $materialSubGroup = $this->materialSubGroup->find($Id);
        return view('admin.material-sub-group.edit', ['materialSubGroup' => $materialSubGroup]);
    }

    /**
     * Save MaterialSubGroup
     * 
     * @param MaterialSubGroupSaveRequest $request
     * @return Redirect
     */
    public function save(MaterialSubGroupSaveRequest $request)
    {
        $data = $request->except(['_token']);

        $data['enable_payment_button'] = $request->input('enable_payment_button');

        // Check Payment Type button
        $materialGroup = $this->materialGroup->find($data['group_id']);
        $data['payment_type'] = $materialGroup->payment_type;

        // Online Payment with Paypal starts here
//        if($data['payment_type'] == 'RECURRING'){
//
//            // Create a new billing plan
//            $plan = new Plan();
//            $plan->setName(config('settings.sitename') . ' Monthly Billing for ' . $data['title'])
//              ->setDescription('Monthly '. $data['title'] .' Billing to the ' . config('settings.sitename'))
//              ->setType('infinite');
//
//            // Set billing plan definitions
//            $paymentDefinition = new PaymentDefinition();
//            $paymentDefinition->setName('Regular Monthly Payments for ' . $data['title'])
//              ->setType('REGULAR')
//              ->setFrequency('Month')
//              ->setFrequencyInterval('1')
//              ->setCycles('0')
//              ->setAmount(new Currency(array('value' => $data['price'], 'currency' => 'USD')));
//
//            // Set merchant preferences
//            $merchantPreferences = new MerchantPreferences();
//            $merchantPreferences->setReturnUrl(route('online-payment.success'))
//              ->setCancelUrl(route('online-payment.cancel'))
//              ->setAutoBillAmount('yes')
//              ->setInitialFailAmountAction('CONTINUE')
//              ->setMaxFailAttempts('0');
//
//            $plan->setPaymentDefinitions(array($paymentDefinition));
//            $plan->setMerchantPreferences($merchantPreferences);
//
//            //create the plan
//            try {
//                $createdPlan = $plan->create($this->apiContext);
//
//                try {
//                    /*$patch = new Patch();
//                    $value = new PayPalModel('{"state":"ACTIVE"}');
//                    $patch->setOp('replace')
//                      ->setPath('/')
//                      ->setValue($value);
//                    $patchRequest = new PatchRequest();
//                    $patchRequest->addPatch($patch);
//                    $createdPlan->update($patchRequest, $this->apiContext);
//                    $plan = Plan::get($createdPlan->getId(), $this->apiContext);*/
//
//                    // Output plan id
//                    $data['paypal_plan_id'] = $createdPlan->getId();
//
//                } catch (PayPal\Exception\PayPalConnectionException $ex) {
//
//                    return redirect()->route('admin.material-sub-group.add')->withInput()->with('error', trans('Material Sub Group has not been saved. Error: ').$ex->getData());
//                } catch (Exception $ex) {
//
//                    return redirect()->route('admin.material-sub-group.add')->withInput()->with('error', trans('Material Sub Group has not been saved. Error: ').$ex);
//                }
//            } catch (PayPal\Exception\PayPalConnectionException $ex) {
//                return redirect()->route('admin.material-sub-group.add')->withInput()->with('error', trans('Material Sub Group has not been saved. Error: ').$ex->getData());
//            } catch (Exception $ex) {
//
//                return redirect()->route('admin.material-sub-group.add')->withInput()->with('error', trans('Material Sub Group has not been saved. Error: ').$ex);
//            }
//        }
        
        // ======================================
        
        if ($materialGroup = $this->materialSubGroup->create($data)) {
            return redirect()->route('admin.material-sub-group')->with('success', trans('Material Sub Group has been saved successfully.'));
        } else {
            return redirect()->route('admin.material-sub-group.add')->withInput()->with('error', trans('Material Sub Group has not been saved.'));
        }
    }

     /**
     * Update Material Group
     * 
     * @param MaterialSubGroupUpdateRequest $request
     * @param integer $Id
     * @return Redirect
     */
    public function update(MaterialSubGroupUpdateRequest $request, $Id)
    {
        $data = $request->except(['_token']);

        $data['enable_payment_button'] = $request->input('enable_payment_button');
        // Check Payment Type button
        $materialGroup = $this->materialGroup->find($data['group_id']);
        $data['payment_type'] = $materialGroup->payment_type;

        if ($materialGroup = $this->materialSubGroup->update($data, $Id)) {
            return redirect()->route('admin.material-sub-group.edit', ['id' => $Id])->with('success', trans('Material Sub Group has been updated successfully.'));
        } else {
            return redirect()->route('admin.material-sub-group.edit', ['id' => $Id])->withInput()->with('error', trans('Material Sub Group has not been updated.'));
        }
    }

    /**
     * Delete Material Sub Group
     *
     * @param Request $request
     * @param integer $Id
     * @return Redirect
     */
    public function delete(Request $request, $Id)
    {
        // Delete all childs
        
        // Delete all materials
        $this->material->deleteWhere(['sub_group_id' => $Id]);

        // Delete all payments history for this selected Group
        $paymentDetails = $this->paymentDetails->findByField('sub_group_id', $Id)->first();
        if($paymentDetails){
            $payment = $paymentDetails->payments()->first();
        
            $this->payment->delete($payment->id);
            $this->paymentDetails->deleteWhere(['sub_group_id' => $Id]);
        }

        if ($this->materialSubGroup->delete($Id)) {
            return redirect()->route('admin.material-sub-group')->with('success', trans('Material Level has been deleted successfully.'));
        } else {
            return redirect()->route('admin.material-sub-group')->with('error', trans('Material Level has not been deleted successfully.'));
        }
    }
}
