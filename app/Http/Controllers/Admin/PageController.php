<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
use App\Http\Requests\Admin\PageRequest;
use App\Http\Requests\Admin\PageUpdateRequest;

class PageController extends Controller
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
     * Show all pages
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get model
        $this->page->pushCriteria(new \App\Criteria\Admin\PageCriteria());
        $pages = $this->page;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('page-grid')->setBaseUrl(route('admin.page'))
            ->setPaginator($pages, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.page',
                            array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.page.add')
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'created_at',
                        'label' => trans('Created At'),
                        'sortable' => true,
                        'searchable' => false,
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
                        'name' => 'slug',
                        'label' => trans('Slug'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->slug;
                        }
                    ),
                    array(
                        'name' => 'status',
                        'label' => trans('Status'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => ['DRAFT' => 'Draft', 'PUBLISHED' => 'Published',
                                'TRASHED' => 'Trashed'],
                        ),
                        'width' => '200',
                        'value' => function ($row) {
                            return $row->status;
                        }
                    ),
                    array(
                        'name' => 'layout',
                        'label' => trans('Layout'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'select',
                            'attr' => array(),
                            'options' => ['NO SIDEBAR' => 'No Sidebar', 'LEFT SIDEBAR' => 'Left Sidebar',
                                'RIGHT SIDEBAR' => 'Right Sidebar', 'LEFT & RIGHT SIDEBARS' => 'Left & Right Sidebar'],
                        ),
                        'width' => '200',
                        'value' => function ($row) {
                            return $row->layout;
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
                            return '<a href="' . route('admin.page.edit',
                                    array('id' => $row->id)) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                                <a href="' . route('admin.page.delete',
                                    ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );

        return view('admin.page.index', ['grid' => $grid]);
    }

    /**
     * Show add page form
     *
     * @return Response
     */
    public function add()
    {
        return view('admin.page.add');
    }

    /**
     * Save Page
     *
     * @param PageRequest $request
     * @return Redirect
     */
    public function save(PageRequest $request)
    {
        $data = $request->except(['_token']);

        $data['user_id'] = Auth::user()->id;
        $data['type'] = 'PAGE';

        if ($page = $this->page->create($data)) {
            return redirect()->route('admin.page')->with('success',
                trans('Page has been saved successfully.'));
        } else {
            return redirect()->route('admin.page.add')->withInput()->with('error',
                trans('Page has not been saved.'));
        }
    }

    /**
     * Show edit page form
     *
     * @param integer $page_id
     * @return Response
     */
    public function edit($page_id)
    {
        $page = $this->page->find($page_id);
        return view('admin.page.edit', ['page' => $page]);
    }

    /**
     * Update Page
     *
     * @param PageRequest $request
     * @param integer $page_id
     * @return Redirect
     */
    public function update(PageUpdateRequest $request, $page_id)
    {
        $data = $request->except(['_token']);

        if ($page = $this->page->update($data, $page_id)) {
            return redirect()->route('admin.page')->with('success',
                trans('Page has been updated successfully.'));
        } else {
            return redirect()->route('admin.page.edit')->withInput()->with('error',
                trans('Page has not been updated.'));
        }
    }

    /**
     * Delete Page
     *
     * @param Request $request
     * @param integer $page_id
     * @return Redirect
     */
    public function delete(Request $request, $page_id)
    {
        $page = $this->page->find($page_id);
        if ($page->slug == 'home') {
            abort(403, trans('Sorry, you are not authorized to access this information'));
        }
        if ($page->delete($page_id)) {
            return redirect()->route('admin.page')->with('success',
                trans('Page has been deleted successfully.'));
        } else {
            return redirect()->route('admin.page')->with('error',
                trans('Page has not been deleted.'));
        }
    }

//about page backend perspective only for frontend go directly to pagecontroller.php in controller
    public function aboutindex()
    {
        $about_us = DB::table('about')->paginate(1);
        return view('admin.about.index', ['about_us' => $about_us]);
    }

    public function aboutadd()
    {
        return view('admin.about.add');
    }

    public function aboutsave(request $request)
    {
        $addabout = DB::table('about')->insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
            'lang' => $request->input('lang'),
        ]);
        if ($addabout) {
            return redirect()->route('admin.about')
                ->with('success', 'About page added successfully');
        }
    }

    public function aboutedit($id)
    {
        $about = DB::table('about')->where('id', $id)->first();
        return view('admin.about.edit', ['about' => $about]);
    }

    public function aboutupdate(request $request, $id)
    {
        $array = array(
            'id' => $id
        );
        $faqupdate = DB::table('about')->where($array)
            ->update([
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'lang' => $request->input('lang'),
            ]);
        if ($faqupdate) {
            return redirect()->route('admin.about')
                ->with('success', 'About pages updated successfully');
        }
    }

    public function aboutdelete(request $request, $id)
    {
        $data = DB::table('about')->where('id', $id)->delete();
        if ($data) {
            return redirect()->route('admin.about')
                ->with('success', 'Deleted successfully');
        }
    }
}