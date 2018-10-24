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
use App\Repositories\GoalRepository;

// Form Requests
use App\Http\Requests\Admin\GoalSaveRequest;
use App\Http\Requests\Admin\GoalUpdateRequest;

use Illuminate\Support\Facades\DB;
class GoalController extends Controller
{
    protected $goal;

    public function __construct(GoalRepository $goal)
    {
        $this->goal = $goal;
    }

    public function index(Request $request)
    {
        //Get model
        $this->goal->pushCriteria(new \App\Criteria\Admin\GoalCriteria());
        $goals = $this->goal;

        //Setup grid
        $grid = new Grid();
        $grid->setGridName('goal-grid')->setBaseUrl(route('admin.goal'))
            ->setPaginator($goals, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.goal', array('action' => 'refresh'))
                    ),
                    array(
                        'name' => 'add',
                        'title' => trans('New'),
                        'url' => route('admin.goal.add')
                    )
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'goal_question',
                        'label' => trans('Gogal Question'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array('type' => 'text'),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->goal_question;
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
                            return '<a href="' . route('admin.goal.edit', ['id' => $row->id]) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>
                            <a href="' . route('admin.goal.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>';
                        }
                    ),
                )
            );

        return view('admin.goal.index', ['grid' => $grid]);
    }

    /**
     * Show add goal form
     *
     * @return Response
     */
    public function add()
    {
        return view('admin.goal.add');
    }

    /**
     * Show edit goal form
     *
     * @param integer $Id
     * @return Response
     */
    public function edit($Id)
    {
        $goal = $this->goal->find($Id);
        return view('admin.goal.edit', ['goal' => $goal]);
    }

    /**
     * Save Goal
     *
     * @param GoalSaveRequest $request
     * @return Redirect
     */
    public function save(GoalSaveRequest $request)
    {
        /*$data = $request->except(['_token']);

        if ($goal = $this->goal->create($data)) {
            return redirect()->route('admin.goal')->with('success', trans('Goal has been saved successfully.'));
        } else {
            return redirect()->route('admin.goal.add')->withInput()->with('error', trans('Goal has not been saved.'));
        }*/
        $addgoal = DB::table('goals')->insert([
            'goal_question' => $request->input('goal_question'),
            'lang' => $request->input('lang')
        ]);
        if ($addgoal) {
            return redirect()->route('admin.goal')
                ->with('success', 'Goals added successfully');
        }
    }

    /**
     * Update Goal
     *
     * @param GoalUpdateRequest $request
     * @param integer $Id
     * @return Redirect
     */
    public function update(GoalUpdateRequest $request, $Id)
    {
        $data = $request->except(['_token']);

        if ($goal = $this->goal->update($data, $Id)) {
            return redirect()->route('admin.goal.edit', ['id' => $Id])->with('success', trans('Goal has been updated successfully.'));
        } else {
            return redirect()->route('admin.goal.edit', ['id' => $Id])->withInput()->with('error', trans('Goal has not been updated.'));
        }
    }

    /**
     * Delete Goal
     *
     * @param Request $request
     * @param integer $id
     * @return Redirect
     */
    public function delete(Request $request, $id)
    {
        if ($this->goal->delete($id)) {
            return redirect()->route('admin.goal')->with('success', trans('Goal has been deleted successfully.'));
        } else {
            return redirect()->route('admin.goal')->with('error', trans('Goal has not been deleted.'));
        }
    }
}
