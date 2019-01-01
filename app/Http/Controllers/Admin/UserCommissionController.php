<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// Request & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Facades
use Grid;
use Date;
use Helper;
use Auth;
use Session;
// Form Requests
use App\Http\Requests\Admin\UserCommissionSaveRequest;
use App\Http\Requests\Admin\UserCommissionUpdateRequest;

// Models and Repo
use App\Repositories\UserCommissionRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class UserCommissionController extends Controller
{
    /**
     * @var UserCommissionRepository
     */
    protected $userCommission;

    /**
     * @var UserRepository
     */
    protected $user;

    public function __construct(UserCommissionRepository $userCommission, UserRepository $user)
    {
        $this->userCommission = $userCommission;
        $this->user = $user;
    }

    /**
     * Show User Commission
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get all material groups
        /*$users = array();
        $this->user->all()->map(function($item) use(&$users) {
            $users[$item->id] = $item->first_name. ' - '.$item->last_name;
        });*/


        //Get model
        $this->userCommission->pushCriteria(new \App\Criteria\Admin\UserCommissionCriteria());
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
                    array(
                        'name' => 'add',
                        'title' => trans('Pay Commission'),
                        'url' => route('admin.user-commission.add')
                    )
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'created_at',
                        'label' => trans('Date'),
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
                        'name' => 'receiver_id',
                        'label' => trans('Sub. ID'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->receiver_id;
                        }
                    ),
                    array(
                        'name' => 'subscriber_name',
                        'label' => trans('Sub. Name'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->user->first_name . " " . $row->user->last_name;
                        }
                    ),
                    array(
                        'name' => 'transaction_type',
                        'label' => trans('Type'),
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
                        'label' => trans('Amount'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return Session::get('curr') . Helper::moneyFormat($row->commission_amount);
                        }
                    ),
                    array(
                        'name' => 'opening_balance',
                        'label' => trans('Opening Bal.'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return Session::get('curr') . Helper::moneyFormat($row->opening_balance);
                        }
                    ),
                    array(
                        'name' => 'closing_balane',
                        'label' => trans('Closing Bal.'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return Session::get('curr') . Helper::moneyFormat($row->closing_balance);
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
                            $buttons = '';
                            if ($row->transaction_type == 'COMMISSION_FROM_ADMIN') {
                                $buttons = '<a href="' . route('admin.user-commission.edit', ['id' => $row->id]) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>';;
                            }//else{
                            //     return '';
                            // }

                            $buttons = '<a href="' . route('admin.user-commission.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                            return $buttons;

                        }
                    ),
                )
            );

        return view('admin.user-commission.index', ['grid' => $grid]);
    }

    /**
     * Show add user commission form
     *
     * @return Response
     */
    public function add()
    {
        return view('admin.user-commission.add');
    }

    /**
     * Show edit user commission form
     *
     * @param integer $Id
     * @return Response
     */
    public function edit($Id)
    {
        $userCommission = $this->userCommission->find($Id);
        return view('admin.user-commission.edit', ['userCommission' => $userCommission]);
    }

    /**
     * Save User Commission
     *
     * @param UserCommissionSaveRequest $request
     * @return Redirect
     */
    public function save(UserCommissionSaveRequest $request)
    {
        $data = $request->except(['_token']);

        $data['payer_id'] = Auth::user()->id;
        $data['transaction_type'] = 'COMMISSION_FROM_ADMIN';
        $data['payment'] = 0;

        // find last commission transaction
        $lastCommission = $this->userCommission->findWhere(['receiver_id' => $data['receiver_id']])->last();
        $data['opening_balance'] = $lastCommission['closing_balance'];
        $data['closing_balance'] = $data['opening_balance'] - $data['commission_amount'];


        if ($userCommission = $this->userCommission->create($data)) {
            return redirect()->route('admin.user-commission')->with('success', trans('User Commission has been saved successfully.'));
        } else {
            return redirect()->route('admin.user-commission.add')->withInput()->with('error', trans('User Commission has not been saved.'));
        }
    }

    /**
     * Update User Commission
     *
     * @param UserCommissionUpdateRequest $request
     * @param integer $Id
     * @return Redirect
     */
    public function update(UserCommissionUpdateRequest $request, $Id)
    {
        $data = $request->except(['_token']);

        $userCommission = $this->userCommission->find($Id);
        $data['closing_balance'] = $userCommission->opening_balance - $data['commission_amount'];

        if ($userCommission = $this->userCommission->update($data, $Id)) {
            return redirect()->route('admin.user-commission.edit', ['id' => $Id])->with('success', trans('User Commission has been updated successfully.'));
        } else {
            return redirect()->route('admin.user-commission.edit', ['id' => $Id])->withInput()->with('error', trans('User Commission has not been updated.'));
        }
    }

    /**
     * Delete User Commission
     *
     * @param Request $request
     * @param integer $Id
     * @return Redirect
     */
    public function delete(Request $request, $Id)
    {

        if ($this->userCommission->delete($Id)) {
            return redirect()->route('admin.user-commission')->with('success', trans('User Commission has been deleted successfully.'));
        } else {
            return redirect()->route('admin.user-commission')->with('error', trans('User Commission has not been deleted successfully.'));
        }
    }

    public function update_commission(Request $request)
    {
        // ...

    }


}

