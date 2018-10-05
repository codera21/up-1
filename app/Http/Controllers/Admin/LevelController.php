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
use App\Repositories\LevelRepository;

// Form Requests
use App\Http\Requests\Admin\LevelSaveRequest;
use App\Http\Requests\Admin\LevelUpdateRequest;


class LevelController extends Controller
{

   /**
     * @var LevelRepository
     */
    protected $level;

    public function __construct(LevelRepository $level)
    {
        $this->level = $level;
    }

    /**
     * Show all levels
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Get model
        $this->level->pushCriteria(new \App\Criteria\Admin\LevelCriteria());
        $levels = $this->level;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('level-grid')->setBaseUrl(route('admin.level'))
            ->setPaginator($levels, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.level', array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.level.add')
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
                        'name' => 'level_title',
                        'label' => trans('Level'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->level_title;
                        }
                    ),
                    array(
                        'name' => 'level_percentage',
                        'label' => trans('Percentage'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->level_percentage;
                        }
                    ),
                    array(
                        'name' => 'active',
                        'label' => trans('Active'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->active;
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
                            return '<a href="' . route('admin.level.edit', ['id' => $row->id]) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                            <a href="' . route('admin.level.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );

        return view('admin.level.index', ['grid' => $grid]);
    }

    /**
     * Show add level form
     *
     * @return Response
     */
    public function add()
    {
        return view('admin.level.add');
    }

    /**
     * Show edit level form
     *
     * @param integer $Id
     * @return Response
     */
    public function edit($Id)
    {
        $level = $this->level->find($Id);
        return view('admin.level.edit', ['level' => $level]);
    }

    /**
     * Save Level
     * 
     * @param LevelSaveRequest $request
     * @return Redirect
     */
    public function save(LevelSaveRequest $request)
    {
        $data = $request->except(['_token']);

        $data['active'] = $request->input('active');
        
        if ($level = $this->level->create($data)) {
            return redirect()->route('admin.level')->with('success', trans('Level has been saved successfully.'));
        } else {
            return redirect()->route('admin.level.add')->withInput()->with('error', trans('Level has not been saved.'));
        }
    }

     /**
     * Update Level
     * 
     * @param LevelUpdateRequest $request
     * @param integer $Id
     * @return Redirect
     */
    public function update(LevelUpdateRequest $request, $Id)
    {
        $data = $request->except(['_token']);

        $data['active'] = $request->input('active');

        if ($level = $this->level->update($data, $Id)) {
            return redirect()->route('admin.level.edit', ['id' => $Id])->with('success', trans('Level has been updated successfully.'));
        } else {
            return redirect()->route('admin.level.edit', ['id' => $Id])->withInput()->with('error', trans('Level has not been updated.'));
        }
    }

    /**
     * Delete level
     *
     * @param Request $request
     * @param integer $Id
     * @return Redirect
     */
    public function delete(Request $request, $Id)
    {
        
        if ($this->level->delete($Id)) {
            return redirect()->route('admin.level')->with('success', trans('Level has been deleted successfully.'));
        } else {
            return redirect()->route('admin.level')->with('error', trans('Level has not been deleted successfully.'));
        }
    }
}
