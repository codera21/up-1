<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Request & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Facades
use Grid;
use Date;
use Auth;

// Models and Repo
use App\Repositories\PageRepository;

// Form Requests
use App\Http\Requests\Admin\BlockRequest;

class BlockController extends Controller
{
    /**
     * @var PageRepository
     */
    protected $page;

    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    /**
     * Show all blocks
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get model
        $this->page->pushCriteria(new \App\Criteria\Admin\BlockCriteria());
        $pages = $this->page;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('page-grid')->setBaseUrl(route('admin.block'))
            ->setPaginator($pages, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.block', array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.block.add')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'created_at',
                        'label' => trans('Created At'),
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
                        'name' => 'language',
                        'label' => trans('Language'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->language;
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
                        'name' => 'action',
                        'label' => trans('Action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => 'auto',
                        'value' => function ($row) {
                            return '<a href="' . route('admin.block.edit', array('id' => $row->id)) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                                <a href="' . route('admin.block.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );

        return view('admin.block.index', ['grid' => $grid]);
    }

    /**
     * Show add block form
     *
     * @return Response
     */
    public function add()
    {
        return view('admin.block.add');
    }

    /**
     * Save Block
     *
     * @param BlockRequest $request
     * @return Redirect
     */
    public function save(BlockRequest $request)
    {
        $data = $request->except(['_token']);

        $data['user_id'] = Auth::user()->id;
        $data['type'] = 'BLOCK';

        if ($page = $this->page->create($data)) {
            return redirect()->route('admin.block')->with('success', trans('Block has been saved successfully.'));
        } else {
            return redirect()->route('admin.block.add')->withInput()->with('error', trans('Block has not been saved.'));
        }
    }

    /**
     * Show edit block form
     *
     * @param integer $page_id
     * @return Response
     */
    public function edit($page_id)
    {
        $page = $this->page->find($page_id);
        return view('admin.block.edit', ['block' => $page]);
    }

    /**
     * Update Block
     *
     * @param BlockRequest $request
     * @param integer $page_id
     * @return Redirect
     */
    public function update(BlockRequest $request, $page_id)
    {
        $data = $request->except(['_token']);

        if ($block = $this->page->update($data, $page_id)) {
            return redirect()->route('admin.block')->with('success', trans('Block has been updated successfully.'));
        } else {
            return redirect()->route('admin.block.edit', ['id' => $page_id])->withInput()->with('error', trans('Block has not been updated.'));
        }
    }

    /**
     * Delete Block
     *
     * @param Request $request
     * @param integer $page_id
     * @return Redirect
     */
    public function delete(Request $request, $page_id)
    {       
        if ($this->page->delete($page_id)) {
            return redirect()->route('admin.block')->with('success', trans('Block has been deleted successfully.'));
        } else {
            return redirect()->route('admin.block')->with('error', trans('Block has not been deleted.'));
        }
    }




}
