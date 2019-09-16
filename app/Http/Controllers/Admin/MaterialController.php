<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// Request & Response
use App\Http\Requests\Admin\MaterialSaveRequest;
use App\Http\Requests\Admin\MaterialUpdateRequest;
use App\Http\Requests\Admin\SubscriptionUpdateRequest;
// Facades
use App\Models\Material;
use App\Repositories\MaterialGroupRepository;
use App\Repositories\MaterialRepository;
use App\Repositories\MaterialSubGroupRepository;

// Models and Repo
use App\Repositories\PaymentDetailsRepository;
use App\Repositories\PaymentRepository;
use Config;
use Date;
use Grid;

// Form Requests
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Used to process plans
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Common\PayPalModel;
use PayPal\Rest\ApiContext;
use Storage;

class MaterialController extends Controller
{

    protected $materialSubGroup;

    protected $materialGroup;

    protected $material;

    protected $paymentDetails;

    protected $payment;

    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;

    public function __construct(MaterialSubGroupRepository $materialSubGroup,
        MaterialGroupRepository $materialGroup,
        MaterialRepository $material,
        PaymentDetailsRepository $paymentDetails,
        PaymentRepository $payment) {
        $this->materialSubGroup = $materialSubGroup;
        $this->materialGroup = $materialGroup;
        $this->material = $material;
        $this->paymentDetails = $paymentDetails;
        $this->payment = $payment;

        // Detect if we are running in live mode or sandbox
        if (config('paypalController.settings.mode') == 'live') {
            $this->client_id = config('paypalController.live_client_id');
            $this->secret = config('paypalController.live_secret');
        } else {
            $this->client_id = config('paypalController.sandbox_client_id');
            $this->secret = config('paypalController.sandbox_secret');
        }
        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypalController.settings'));

    }

    public function index(Request $request)
    {
        //Get all material sub groups
        $materialSubGroups = array();
        $this->materialSubGroup->all()->map(function ($item) use (&$materialSubGroups) {
            $materialSubGroups[$item->id] = $item->title;
        });

        $materialGroups = array();
        $this->materialGroup->all()->map(function ($item) use (&$materialGroups) {
            $materialGroups[$item->id] = $item->title;
        });

        //Get model
        $this->material->pushCriteria(new \App\Criteria\Admin\MaterialCriteria());
        $materials = $this->material;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('material-grid')->setBaseUrl(route('admin.material'))
            ->setPaginator($materials, 'created_at', 'desc', 25)
            ->setMainActions( //Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.material', array('action' => 'refresh')),
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.material.add'),
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
                        },
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
                        },
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
                        },
                    ),
                    array(
                        'name' => 'material_type',
                        'label' => trans('Material Type'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => ['VIDEO' => 'Video', 'COURSE' => 'Course'],
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->material_type;
                        },
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
                        },
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
                        },
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
                            if ($row->materialGroups) {
                                return $row->materialGroups->title;
                            }

                        },
                    ),
                    array(
                        'name' => 'material_sub_group',
                        'label' => trans('Material Level'),
                        'sortable' => false,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => $materialSubGroups,
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            if ($row->materialSubGroups) {
                                return $row->materialSubGroups->title;
                            }

                        },
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('Action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => '120',
                        'value' => function ($row) {
                            if ($row->id != 1) {
                                return '<a href="' . route('admin.material.edit', ['id' => $row->id]) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                            <a href="' . route('admin.material.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                            }

                        },
                    ),
                )
            );

        return view('admin.material.index', ['grid' => $grid]);
    }

    public function add()
    {

        return view('admin.material.add');
    }

    public function edit($Id)
    {
        $material = $this->material->find($Id);
        return view('admin.material.edit', ['material' => $material]);
    }

    public function save(MaterialSaveRequest $request)
    {
        $data = $request->except(['_token', 'thumbnail']);

        $data['enable_payment_button'] = $request->input('enable_payment_button');
        // Check Payment Type button
        $materialGroup = $this->materialGroup->find($data['group_id']);
        $data['payment_type'] = $materialGroup->payment_type;
        $data['course_url'] = $request->input('url');

        // thumbnail
        $thumbnail = Storage::disk('uploads.thumbnails');
        if ($request->hasFile('thumbnail_url')) {
            $thumbnailFile = $request->file('thumbnail_url');
            $thumbnailFileName = date('Ymd_His') . '_' . $thumbnailFile->getClientOriginalName();
            $thumbFileRelativePath = $thumbnail->putFileAs('', $thumbnailFile, $thumbnailFileName);
            $thumbStoragePath = $thumbnail->url($thumbFileRelativePath);
            $thumbFileUrl = asset($thumbStoragePath);

            $data['thumbnail_url'] = $thumbFileUrl;

        }

        // video url
        $data['embed'] = $request->input('video_url_name');

        if ($this->material->create($data)) {
            return redirect()->route('admin.material')->with('success', trans('Material has been saved successfully.'));
        } else {
            return redirect()->route('admin.material.add')->withInput()->with('error', trans('Material has not been saved.'));
        }
    }

    public function update(MaterialUpdateRequest $request, $Id)
    {
        $data = $request->except(['_token']);

        $data['enable_payment_button'] = $request->input('enable_payment_button');
        $data['course_url'] = $request->input('course_url');
        // Check Payment Type button
        $materialGroup = $this->materialGroup->find($data['group_id']);
        $data['payment_type'] = $materialGroup->payment_type;
        //============Update PayPal Billing Plan
        if ($data['payment_type'] == 'RECURRING') {

            $material = $this->material->find($Id);
            $planId = $material->paypal_plan_id;

            try {
                $plan = Plan::get($planId, $this->apiContext);

                //=========Update Plan=============
                try {
                    $patch = new Patch();

                    $paymentDefinitions = $plan->getPaymentDefinitions();

                    $paymentDefinitionId = $paymentDefinitions[0]->getId();

                    $patch->setOp('replace')
                        ->setPath('/payment-definitions/' . $paymentDefinitionId)
                        ->setValue(json_decode(
                            '{
                                "amount": {
                                    "currency": "USD",
                                    "value": "' . $data['price'] . '"
                                }
                            }'
                        ));
                    $patchRequest = new PatchRequest();
                    $patchRequest->addPatch($patch);

                    $plan->update($patchRequest, $this->apiContext);

                    $newPlan = Plan::get($plan->getId(), $this->apiContext);

                } catch (Exception $ex) {
                    return redirect()->route('admin.material.edit')->withInput()->with('error', trans('Material has not been updated. Error: ') . $ex->getData());

                }
                //===========Update Plan End===========
            } catch (Exception $ex) {
                return redirect()->route('admin.material.edit')->withInput()->with('error', trans('Material has not been updated. Error: ') . $ex->getData());
            }

        }
        //======================================

        // thumbnail
        $thumbnail = Storage::disk('uploads.thumbnails');
        if ($request->hasFile('thumbnail_url')) {
            $thumbnailFile = $request->file('thumbnail_url');
            $thumbnailFileName = date('Ymd_His') . '_' . $thumbnailFile->getClientOriginalName();
            $thumbFileRelativePath = $thumbnail->putFileAs('', $thumbnailFile, $thumbnailFileName);
            $thumbStoragePath = $thumbnail->url($thumbFileRelativePath);
            $thumbFileUrl = asset($thumbStoragePath);

            $data['thumbnail_url'] = $thumbFileUrl;
        }

        if ($material = $this->material->update($data, $Id)) {
            DB::table('material')->where('id', $Id)->update([
                'embed' => $request->input('video_url_name'),
            ]);
            return redirect()->route('admin.material')->with('success', trans('Material has been updated successfully.'));
        } else {
            return redirect()->route('admin.material.edit', ['id' => $Id])->withInput()->with('error', trans('Material has not been updated.'));
        }
    }

    public function editSubscription($Id)
    {
        $material = $this->material->find($Id);
        return view('admin.subscription.edit', ['material' => $material]);
    }

    public function updateSubscription(SubscriptionUpdateRequest $request)
    {
        $data = $request->except(['_token']);

        // Subscription will always be recurring
        //if($data['payment_type'] == 'RECURRING'){

        // Create a new billing plan
        $plan = new Plan();
        $plan->setName(config('settings.sitename') . ' Monthly Subscription')
            ->setDescription('Monthly Subscription Billing to the ' . config('settings.sitename'))
            ->setType('infinite');

        // Set billing plan definitions
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Regular Monthly Payments for Subscription')
            ->setType('REGULAR')
            ->setFrequency('Month')
            ->setFrequencyInterval('1')
            ->setCycles('0')
            ->setAmount(new Currency(array('value' => $data['price'], 'currency' => 'USD')));

        // Set merchant preferences
        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl(route('online-payment.success'))
            ->setCancelUrl(route('online-payment.cancel'))
            ->setAutoBillAmount('yes')
            ->setInitialFailAmountAction('CONTINUE')
            ->setMaxFailAttempts('0');

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        //create the plan
        try {
            $createdPlan = $plan->create($this->apiContext);

            try {
                $patch = new Patch();
                $value = new PayPalModel('{"state":"ACTIVE"}');
                $patch->setOp('replace')
                    ->setPath('/')
                    ->setValue($value);
                $patchRequest = new PatchRequest();
                $patchRequest->addPatch($patch);
                $createdPlan->update($patchRequest, $this->apiContext);
                $plan = Plan::get($createdPlan->getId(), $this->apiContext);

                // Output plan id
                $data['paypal_plan_id'] = $plan->getId();

            } catch (PayPal\Exception\PayPalConnectionException $ex) {

                return redirect()->route('admin.subscription.edit', 1)->withInput()->with('error', trans('Subscription Fee has not been saved. Error: ') . $ex->getData());
            } catch (Exception $ex) {

                return redirect()->route('admin.subscription.edit', 1)->withInput()->with('error', trans('Subscription Fee has not been saved. Error: ') . $ex);
            }
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            return redirect()->route('admin.subscription.edit', 1)->withInput()->with('error', trans('Subscription Fee has not been saved. Error: ') . $ex->getData());
        } catch (Exception $ex) {

            return redirect()->route('admin.subscription.edit', 1)->withInput()->with('error', trans('Subscription Fee has not been saved. Error: ') . $ex);
        }
        //}

        // ======================================

        if ($material = $this->material->update($data, 1)) {
            return redirect()->route('admin.subscription.edit', 1)->with('success', trans('Subscription Fee has been updated successfully.'));
        } else {
            return redirect()->route('admin.material.edit', 1)->withInput()->with('error', trans('Subscription Fee has not been updated.'));
        }
    }

    public function delete(Request $request, $Id)
    {
        // Delete all childs

        // Delete all payments history for this selected Group
        $paymentDetails = $this->paymentDetails->findByField('material_id', $Id)->first();
        if ($paymentDetails) {
            $payment = $paymentDetails->payments()->first();

            $this->payment->delete($payment->id);
            $this->paymentDetails->deleteWhere(['material_id' => $Id]);
        }

        if ($this->material->delete($Id)) {
            return redirect()->route('admin.material')->with('success', trans('Video/Course has been deleted successfully.'));
        } else {
            return redirect()->route('admin.material')->with('error', trans('Video/Course has not been deleted successfully.'));
        }
    }
}
