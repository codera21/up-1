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
use App\Repositories\NewsRepository;

// Form Requests
use App\Http\Requests\Admin\NewsSaveRequest;
use App\Http\Requests\Admin\NewsUpdateRequest;

class NewsController extends Controller
{
    protected $news;

    public function __construct(NewsRepository $news)
    {
        $this->news = $news;
    }

    public function index(Request $request)
    {
        $this->news->pushCriteria(new \App\Criteria\Admin\NewsCriteria());
        $newses = $this->news;
        $grid = new Grid();
        $grid->setGridName('news-grid')->setBaseUrl(route('admin.news'))
            ->setPaginator($newses, 'created_at', 'desc', 25)
            ->setMainActions(
                array(
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.news.add')
                    )
                )
            )
            ->setColumns(
                array(
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
                        'name' => 'lang',
                        'label' => trans('Language'),
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
                            return '<a href="' . route('admin.news.edit', ['id' => $row->id]) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                            <a href="' . route('admin.news.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );
        return view('admin.news.index', ['grid' => $grid]);
    }

    public function add()
    {
        return view('admin.news.add');
    }

    public function edit($Id)
    {
        $news = $this->news->find($Id);
        return view('admin.news.edit', ['news' => $news]);
    }

    public function save(NewsSaveRequest $request)
    {
        /*$data = $request->except(['_token']);*/
/*
        if ($news = $this->news->create($data)) {
            return redirect()->route('admin.news')->with('success', trans('News has been saved successfully.'));
        } else {
            return redirect()->route('admin.news.add')->withInput()->with('error', trans('News has not been saved.'));
        }*/
        $addnews = DB::table('news')->insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'lang' => $request->input('lang'),
            'slug' => $request->input('slug'),
        ]);
        if ($addnews) {
            return redirect()->route('admin.news')
                ->with('success', 'News added successfully');
        }
    }

    public function update(NewsUpdateRequest $request, $Id)
    {
        /*$data = $request->except(['_token']);

        if ($news = $this->news->update($data, $Id)) {
            return redirect()->route('admin.news.edit', ['id' => $Id])->with('success', trans('News has been updated successfully.'));
        } else {
            return redirect()->route('admin.news.edit', ['id' => $Id])->withInput()->with('error', trans('News has not been updated.'));
        }*/
        $array = array(
            'id' => $Id
        );
        $newsupdate = DB::table('news')->where($array)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'lang' => $request->input('lang'),
                'slug' => $request->input('slug'),
            ]);
        if ($newsupdate) {
            return redirect()->route('admin.news.edit', ['post' => $Id])
                ->with('success', 'News updated successfully');
        }
    }

    public function delete(Request $request, $Id)
    {

        if ($this->news->delete($Id)) {
            return redirect()->route('admin.news')->with('success', trans('News has been deleted successfully.'));
        } else {
            return redirect()->route('admin.news')->with('error', trans('News has not been deleted successfully.'));
        }
    }
}
