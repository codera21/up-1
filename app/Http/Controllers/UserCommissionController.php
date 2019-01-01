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
use Session;
// Models and Repo
use App\Repositories\UserCommissionRepository;

class UserCommissionController extends Controller
{
    /**
     * @var UserCommissionRepository
     */
    protected $userCommission;

    public function __construct(UserCommissionRepository $userCommission)
    {
        $this->userCommission = $userCommission;
    }

    /**
     * Show User Commission
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get model
        $this->userCommission->pushCriteria(new \App\Criteria\UserCommissionCriteria());
        $userCommissions = $this->userCommission;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('user-commission-grid')->setBaseUrl(route('commission'))
            ->setPaginator($userCommissions, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('commission', array('action' => 'refresh'))
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'created_at',
                        'label' => trans('comm.commission_date'),
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
                        'name' => 'transaction_type',
                        'label' => trans('comm.commission_type'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => ['COMMISSION_FROM_CUSTOMER' => 'Commission From Customer', 'COMMISSION_FROM_ADMIN' => 'Commission From Admin'],
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->transaction_type;
                        }
                    ),
                    array(
                        'name' => 'commission_amount',
                        'label' => trans('app.amount'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return Session::get('curr').Helper::moneyFormat($row->commission_amount);
                        }
                    ),
                    array(
                        'name' => 'opening_balance',
                        'label' => trans('comm.opening_bal'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return Session::get('curr').Helper::moneyFormat($row->opening_balance);
                        }
                    ),
                    array(
                        'name' => 'closing_balane',
                        'label' => trans('comm.closing_bal'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return Session::get('curr').Helper::moneyFormat($row->closing_balance);
                        }
                    ),                    
                )
            );

        return view('commission.index', ['grid' => $grid]);
    }
}