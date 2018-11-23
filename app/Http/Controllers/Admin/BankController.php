<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;use ok;
use App\Http\Controllers\Controller;

// Request & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Facades
use Grid;
use Date;
use Auth;

// Models and Repo
use App\Repositories\BankRepository;

// Form Requests
use App\Http\Requests\Admin\BankRequest;

class BankController extends Controller
{
    /**
     * @var BankRepository
     */
    protected $bank;

    public function __construct(BankRepository $bank)
    {
        $this->bank = $bank;
    }

    /**
     * Show all banks
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get model
        $this->bank->pushCriteria(new \App\Criteria\Admin\BankCriteria());
        $banks = $this->bank;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('page-grid')->setBaseUrl(route('admin.bank'))
            ->setPaginator($banks, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.bank', array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.bank.add')
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
                        'name' => 'bank_name',
                        'label' => trans('Bank Name'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->bank_name;
                        }
                    ),
                    array(
                        'name' => 'account_title',
                        'label' => trans('Account Title'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->account_title;
                        }
                    ),
                    array(
                        'name' => 'account_no',
                        'label' => trans('Account #'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->account_no;
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
                            return '<a href="' . route('admin.bank.edit', array('id' => $row->id)) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                                <a href="' . route('admin.bank.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );

        return view('admin.bank.index', ['grid' => $grid]);
    }

    /**
     * Show add bank form
     *
     * @return Response
     */
    public function add()
    {
        return view('admin.bank.add');
    }

    /**
     * Save Bank
     *
     * @param BlockRequest $request
     * @return Redirect
     */
    public function save(BankRequest $request)
    {
        $data = $request->except(['_token']);

        if ($bank = $this->bank->create($data)) {
            return redirect()->route('admin.bank')->with('success', trans('Bank has been saved successfully.'));
        } else {
            return redirect()->route('admin.bank.add')->withInput()->with('error', trans('Bank has not been saved.'));
        }
    }

    /**
     * Show edit bank form
     *
     * @param integer $bankId
     * @return Response
     */
    public function edit($bankId)
    {
        $bank = $this->bank->find($bankId);
        return view('admin.bank.edit', ['bank' => $bank]);
    }

    /**
     * Update Bank
     *
     * @param BankRequest $request
     * @param integer $bankId
     * @return Redirect
     */
    public function update(BankRequest $request, $bankId)
    {
        $data = $request->except(['_token']);

        if ($bank = $this->bank->update($data, $bankId)) {
            return redirect()->route('admin.bank')->with('success', trans('Bank has been updated successfully.'));
        } else {
            return redirect()->route('admin.bank.edit', ['id' => $bankId])->withInput()->with('error', trans('Bank has not been updated.'));
        }
    }

    /**
     * Delete Bank
     *
     * @param Request $request
     * @param integer $bankId
     * @return Redirect
     */
    public function delete(Request $request, $bankId)
    {
        if ($this->bank->delete($bankId)) {
            return redirect()->route('admin.bank')->with('success', trans('Bank has been deleted successfully.'));
        } else {
            return redirect()->route('admin.bank')->with('error', trans('Bank has not been deleted.'));
        }
    }

    public function offline_pay()
    {
        $data['data'] = DB::table('offline_pay')->get();
        return view('admin.payment-history.offline_pay',$data);
    }

    public function details($id)
    {
        $data['data'] = DB::table('offline_pay')->where('id',$id)->first();
        return view('admin.payment-history.details',$data);
    }
}
