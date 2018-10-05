<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

// Facades
use Date;
use Auth;
use Grid;

// Models and Repo
use App\Repositories\PaymentProfileRepository;
use App\Repositories\UserRepository;

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
    }

    /**
     * Show all banks
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get model
        $this->paymentProfile->pushCriteria(new \App\Criteria\Admin\PaymentProfileCriteria());
        $paymentProfiles = $this->paymentProfile;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('payment-profile-grid')->setBaseUrl(route('admin.payment-profile'))
            ->setPaginator($paymentProfiles, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.payment-profile', array('action' => 'refresh'))
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
                        'name' => 'fname',
                        'label' => trans('User First'),
                        'sortable' => false,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->user->first_name;
                        }
                    ),
                    array(
                        'name' => 'lname',
                        'label' => trans('User Last'),
                        'sortable' => false,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->user->last_name;
                        }
                    ),                    
                    array(
                        'name' => 'payment_type',
                        'label' => trans('Type'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => ['CARD' => 'Credit Card', 'OFFLINE BANK' => 'Bank'],
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
                )
            );
        return view('admin.payment-profile.index', ['grid' => $grid]);
    }

}
