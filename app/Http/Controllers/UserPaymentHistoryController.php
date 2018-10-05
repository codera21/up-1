<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// Request & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Facades
use Grid;
use Date;
use Helper;

// Models and Repo
use App\Repositories\PaymentRepository;
use App\Repositories\PaymentDetailsRepository;

class UserPaymentHistoryController extends Controller
{
    /**
     * @var PaymentRepository
     */
    protected $payment;

    /**
     * @var PaymentDetailsRepository
     */
    protected $paymentDetails;

    public function __construct(PaymentRepository $payment, PaymentDetailsRepository $paymentDetails)
    {
        $this->payment = $payment;
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * Show User Payments
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get model
        $this->payment->pushCriteria(new \App\Criteria\UserPaymentHistoryCriteria());
        $payments = $this->payment;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('user-payment-history-grid')->setBaseUrl(route('payment-history'))
            ->setPaginator($payments, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('payment-history', array('action' => 'refresh'))
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'created_at',
                        'label' => trans('payment_history.payment_date'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                    array(
                        'name' => 'payment_mode',
                        'label' => trans('payment_history.type'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => ['OFFLINE' => 'Offline', 'ONLINE' => 'Online'],
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->payment_mode;
                        }
                    ),
                    array(
                        'name' => 'bank_name',
                        'label' => trans('payment_history.bank_account'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            //'options' => ['RECURRING' => 'Recurring', 'ONE TIME' => 'One Time'],
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            //if($row->bank())
                            //return $row->bank->bank_name.' '.$row->bank->account_title.' '.$row->bank->account_no;
                        }
                    ),
                    array(
                        'name' => 'payment_type',
                        'label' => trans('payment_history.payment_type'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => ['RECURRING' => 'Recurring', 'ONE TIME' => 'One Time'],
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->payment_type;
                        }
                    ),
                    array(
                        'name' => 'paid_for',
                        'label' => trans('payment_history.payment_for'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => ['GROUP' => 'Group', 'LEVEL' => 'Level', 'MATERIAL' => 'Material'],
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->paid_for;
                        }
                    ),
                    array(
                        'name' => 'amount_paid',
                        'label' => trans('payment_history.amount'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return '$'.Helper::moneyFormat($row->amount_paid);
                        }
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('app.action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => '120',
                        'value' => function ($row) {
                            return '<a href="' . route('payment-history.detail', ['id' => $row->id]) . '" class="btn btn-primary btn-xs text-white edit" >' . trans('app.details') . '</a>';
                        }
                    ),                    
                )
            );

        return view('payment-history.index', ['grid' => $grid]);
    }

    /**
     * Show payment detail
     *
     * @param integer $id
     * @return Response
     */
    public function detail($id)
    {
        $payment = $this->payment->find($id);
        return view('payment-history.detail', ['payment' => $payment]);
    }
}