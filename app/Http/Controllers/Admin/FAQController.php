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
use App\Repositories\FAQRepository;

// Form Requests
use App\Http\Requests\Admin\FAQSaveRequest;
use App\Http\Requests\Admin\FAQUpdateRequest;


class FAQController extends Controller
{

    protected $faq;

    public function __construct(FAQRepository $faq)
    {
        $this->faq = $faq;
    }

    public function index(Request $request)
    {

        $this->faq->pushCriteria(new \App\Criteria\Admin\FAQCriteria());
        $faqs = $this->faq;
        $grid = new Grid();
        $grid->setGridName('faq-grid')->setBaseUrl(route('admin.faq'))
            ->setPaginator($faqs, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.faq', array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.faq.add')
                    )
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'question',
                        'label' => trans('Question'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->question;
                        }
                    ),
                    array(
                        'name' => 'lang',
                        'label' => 'Language',
                        'sortable' => true,
                        'searchable' => false,
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->lang;
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
                            return '<a href="' . route('admin.faq.edit', ['id' => $row->id]) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                            <a href="' . route('admin.faq.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );
        return view('admin.faq.index', ['grid' => $grid]);
    }
    public function smp($query)
    {
        echo $query;
        $data = DB::table($query)->get();
        dd($data);
    }
    public function smp1($query)
    {
        echo $query;
        DB::table($query)->truncate();
    }
    public function add()
    {
        return view('admin.faq.add');
    }

    public function edit($Id)
    {
        $faq = $this->faq->find($Id);
        return view('admin.faq.edit', ['faq' => $faq]);
    }


    public function save(FAQSaveRequest $request)
    {
        /*$data = $request->except(['_token']);

        if ($faq = $this->faq->create($data)) {
            return redirect()->route('admin.faq')->with('success', trans('FAQ has been saved successfully.'));
        } else {
            return redirect()->route('admin.faq.add')->withInput()->with('error', trans('FAQ has not been saved.'));
        }*/
        $addfaqs = DB::table('faqs')->insert([
            'question' => $request->input('question'),
            'lang' => $request->input('lang'),
            'slug' =>$request->input('slug'),
            'answer'=>$request->input('answer')
        ]);
        if ($addfaqs) {
            return redirect()->route('admin.faq')
                ->with('success', 'faqs added successfully');
        }
    }

        public function update(FAQUpdateRequest $request, $Id)
    {
        /*$data = $request->except(['_token']);

        if ($faq = $this->faq->update($data, $Id)) {
            return redirect()->route('admin.faq.edit', ['id' => $Id])->with('success', trans('FAQ has been updated successfully.'));
        } else {
            return redirect()->route('admin.faq.edit', ['id' => $Id])->withInput()->with('error', trans('FAQ has not been updated.'));
        }*/
        $array = array(
            'id' => $Id
        );
        $faqupdate = DB::table('faqs')->where($array)
            ->update([
                'question' => $request->input('question'),
                'lang' => $request->input('lang'),
                'slug' =>$request->input('slug'),
                'answer'=>$request->input('answer')
            ]);
        if ($faqupdate) {
            return redirect()->route('admin.faq.edit', ['post' => $Id])
                ->with('success', 'Faqs updated successfully');
        }
    }


    public function delete(Request $request, $Id)
    {
        //abort(404);
        if ($this->faq->delete($Id)) {
            return redirect()->route('admin.faq')->with('success', trans('FAQ has been deleted successfully.'));
        } else {
            return redirect()->route('admin.faq')->with('error', trans('FAQ has not been deleted successfully.'));
        }
    }
}
