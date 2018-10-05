<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

// Facades
use Grid;
use Date;

// Models and Repo
use App\Repositories\BannerRepository;

// Form Requests
use App\Http\Requests\Admin\BannerSaveRequest;
use App\Http\Requests\Admin\BannerUpdateRequest;


class BannerController extends Controller
{

   /**
     * @var BannerRepository
     */
    protected $banner;

    public function __construct(BannerRepository $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Show all banners
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get model
        $this->banner->pushCriteria(new \App\Criteria\Admin\BannerCriteria());
        $banners = $this->banner;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('banner-grid')->setBaseUrl(route('admin.banner'))
            ->setPaginator($banners, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.banner', array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.banner.add')
                    )
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
                        'name' => '728_90_banner',
                        'label' => trans('728 x 90'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->banner_728_90;
                        }
                    ),
                    array(
                        'name' => 'see_more_ads',
                        'label' => trans('See More Ads'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->see_more_ads;
                        }
                    ),
                    array(
                        'name' => 'see_more_text',
                        'label' => trans('See More Text'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->see_more_text;
                        }
                    ),
                    array(
                        'name' => '300_250_banners',
                        'label' => trans('300 x 250 Banner'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->banner_300_250;
                        }
                    ),
                    array(
                        'name' => '160_600_banners',
                        'label' => trans('160 x 600 Banner'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->banner_160_600;
                        }
                    ),
                    array(
                        'name' => 'text_banners',
                        'label' => trans('Text Banner'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->text_banners;
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
                            return '<a href="' . route('admin.banner.edit', ['id' => $row->id]) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                            <a href="' . route('admin.banner.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );

        return view('admin.banner.index', ['grid' => $grid]);
    }

    /**
     * Show add banner form
     *
     * @return Response
     */
    public function add()
    {
        return view('admin.banner.add');
    }

    /**
     * Show edit banner form
     *
     * @param integer $Id
     * @return Response
     */
    public function edit($Id)
    {
        $banner = $this->banner->find($Id);
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    /**
     * Save Banner
     * 
     * @param BannerSaveRequest $request
     * @return Redirect
     */
    public function save(BannerSaveRequest $request)
    {
        $data = $request->except(['_token']);

        $data['banner_728_90'] = $request->input('banner_728_90');
        $data['banner_300_250'] = $request->input('banner_300_250');
        $data['see_more_ads'] = $request->input('see_more_ads');
        $data['see_more_text'] = $request->input('see_more_text');
        $data['text_banners'] = $request->input('text_banners');
        
        if ($banner = $this->banner->create($data)) {
            return redirect()->route('admin.banner')->with('success', trans('Banner Page has been saved successfully.'));
        } else {
            return redirect()->route('admin.banner.add')->withInput()->with('error', trans('Banner Page has not been saved.'));
        }
    }

     /**
     * Update Banner
     * 
     * @param BannerUpdateRequest $request
     * @param integer $Id
     * @return Redirect
     */
    public function update(BannerUpdateRequest $request, $Id)
    {
        $data = $request->except(['_token']);

        $data['banner_728_90'] = $request->input('banner_728_90');
        $data['banner_300_250'] = $request->input('banner_300_250');
        $data['see_more_ads'] = $request->input('see_more_ads');
        $data['see_more_text'] = $request->input('see_more_text');
        $data['text_banners'] = $request->input('text_banners');

        if ($banner = $this->banner->update($data, $Id)) {
            return redirect()->route('admin.banner.edit', ['id' => $Id])->with('success', trans('Banner Page has been updated successfully.'));
        } else {
            return redirect()->route('admin.banner.edit', ['id' => $Id])->withInput()->with('error', trans('Banner Page has not been updated.'));
        }
    }

    /**
     * Banner faq
     *
     * @param Request $request
     * @param integer $Id
     * @return Redirect
     */
    public function delete(Request $request, $Id)
    {
        if ($this->banner->delete($Id)) {
            return redirect()->route('admin.banner')->with('success', trans('Banner Page has been deleted successfully.'));
        } else {
            return redirect()->route('admin.banner')->with('error', trans('Banner Page has not been deleted successfully.'));
        }
    }
}
