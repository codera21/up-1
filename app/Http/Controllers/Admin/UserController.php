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
use Session;

// Models and Repo
use App\Repositories\UserRepository;
use App\Repositories\GoalRepository;
use App\Repositories\UserGoalRepository;

class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @var GoalRepository
     */
    protected $goal;

    /**
     * @var UserGoalRepository
     */
    protected $userGoal;

    public function __construct(UserRepository $user, GoalRepository $goal, UserGoalRepository $userGoal)
    {
        $this->user = $user;
        $this->goal = $goal;
        $this->userGoal = $userGoal;
    }

    /**
     * Show all users
     *
     * @return Response
     */
    public function index(Request $request)
    {

        //Get model
        $this->user->pushCriteria(new \App\Criteria\Admin\UserCriteria());
        $grid = new Grid();
        $users = $this->user;

        //Setup grid

        $grid->setGridName('user-grid')->setBaseUrl(route('admin.user'))
            ->setPaginator($users, 'created_at', 'desc', 25)
            ->setMainActions(//Optional
                array(
                    array(
                        'name' => 'refresh',
                        'title' => trans('Refresh'),
                        'url' => route('admin.user', array('action' => 'refresh'))
                    ),
                )
            )
            ->setColumns(
                array(
                    array(
                        'name' => 'id',
                        'label' => trans('User ID'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->id;
                        }
                    ),
                    array(
                        'name' => 'first_name',
                        'label' => trans('First Name'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => '200',
                        'value' => function ($row) {
                            return $row->first_name;
                        }
                    ),
                    array(
                        'name' => 'last_name',
                        'label' => trans('Last Name'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => '200',
                        'value' => function ($row) {
                            return $row->last_name;
                        }
                    ),
                    array(
                        'name' => 'parent_id',
                        'label' => trans('Parent'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => '200',
                        'value' => function ($row) {
                            return $row->first_name . ' ' . $row->last_name;
                        }
                    ),
                    array(
                        'name' => 'email',
                        'label' => trans('Email'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            return $row->email;
                        }
                    ),
                    array(
                        'name' => 'created_at',
                        'label' => trans('Date Joined'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => '100',
                        'value' => function ($row) {
                            return $row->created_at;
                        }
                    ),
                    array(
                        'name' => 'is_active',
                        'label' => trans('Active'),
                        'sortable' => true,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                            'attr' => array('class' => 'daterange'),
                        ),
                        'width' => '100',
                        'value' => function ($row) {
                            return $row->is_active;
                        }
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('Action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => '150',
                        'value' => function ($row) {

                            return '<a href="' . route('admin.user.detail', array('id' => $row->id)) . '" class="btn btn-info btn-xs edit" >' . trans('Detail') . '</a>
                                        <a href="' . route('admin.user.edit', array('id' => $row->id)) . '" class="btn btn-success btn-xs edit" >' . trans('Edit') . '</a>                                  
                                        <a href="' . route('admin.user.delete', ['id' => $row->id]) . '" class="btn btn-danger btn-xs delete">' . trans('Delete') . '</a>                                 
                                        <a href="' . route('admin.user.ban', ['id' => $row->id]) . '" class="btn btn-warning btn-xs edit"id="ban/unban">' . trans('ban') . '</a>
                                        <a href="' . route('admin.user.goals', ['id' => $row->id]) . '" class="btn btn-info btn-xs edit">' . trans('Goals') . '</a>';
                        }
                    ),
                )
            );
        return view('admin.user.index', ['grid' => $grid]);
    }

    /**
     * Show user detail
     *
     * @param integer $Id
     * @return Response
     */
    public function detail($Id)
    {
        $user = $this->user->find($Id);
        return view('admin.user.detail', ['user' => $user]);
    }

    //ban account code is here have a look thomas
    public function ban($id)
    {
        $check = DB::table('users')->where('id', $id)->first();
        if ($check->ban == 'NO') {
            $ban = DB::table('users')->where('id', $id)->update([
                'ban' => 'YES'
            ]);
            return redirect()->route('admin.user')
                ->with('success', 'Banned user successfully');
        } else {
            DB::table('users')->where('id', $id)->update([
                'ban' => 'NO'
            ]);
            return redirect()->route('admin.user')
                ->with('success', 'Unbanned successfully');
        }
    }

    /**
     * Show edit user form
     *
     * @param integer $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update User
     *
     * @param integer $id
     * @return Redirect
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token']);

        if ($user = $this->user->update($data, $id)) {
            return redirect()->route('admin.user')->with('success', trans('User has been updated successfully.'));
        } else {
            return redirect()->route('admin.user.edit', ['id' => $id])->withInput()->with('error', trans('User has not been updated.'));
        }
    }

    /**
     * Show user tree
     *
     * @return Response
     */
    function second($query)
    {
        foreach ($query as $item) {

            $second_level = DB::table('users')->where('parent_id', $item->id);
            return $second_level;
        }
    }

    function array_list($query)
    {
        $count = 0;
        $list = array();
        foreach ($query as $data) {
            array_push($list, $data->id);
        }
        return $list;
    }

    public function treeView(Request $request)
    {
        $user = Auth::user();
        $users = $this->user->findByField('parent_id', $user->id);
        $level = DB::table('levels')->get()->count();
        return view('admin.user.tree ', ['users' => $users, 'level' => $level]);
        /////////////////////////////////////////////////
    }

    /**
     * Delete User
     *
     * @param Request $request
     * @param integer $id
     * @return Redirect
     */
    public function delete(Request $request, $id)
    {
        if ($this->user->delete($id)) {
            return redirect()->route('admin.user')->with('success', trans('User has been deleted successfully.'));
        } else {
            return redirect()->route('admin.user')->with('error', trans('User has not been deleted.'));
        }
    }


    /**
     * Show user goals
     *
     * @param integer $id
     * @return Redirect
     */
    public function userGoals($id)
    {
        $user = $this->user->find($id);
        //$userGoals = $user->goals();

        $goals = $this->goal->all();

        $userGoals = array();
        foreach ($goals as $goal) {

            $userGoals[$goal->id] = $this->userGoal->findWhere(['user_id' => $user->id, 'goal_id' => $goal->id])->first();
        }

//dd($userGoals[1]->user_answer);
        return view('admin.user.goals', ['goals' => $goals, 'userGoals' => $userGoals]);
    }

    public function user_commission()
    {
        //Get model
        $this->user->pushCriteria(new \App\Criteria\Admin\UserCriteria());
        $users = $this->user;
        //Setup grid
        $grid = new Grid();
        $grid->setGridName('user-grid')->setBaseUrl(route('admin.user.user_commission'))
            ->setPaginator($users, 'created_at', 'desc', 15)
            ->setColumns(
                array(
                    array(
                        'name' => 'id',
                        'label' => trans('User ID'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => '30',
                        'value' => function ($row) {
                            return $row->id;
                        }
                    ),
                    array(
                        'name' => 'name',
                        'label' => trans('Full Name'),
                        'sortable' => true,
                        'searchable' => true,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => '200',
                        'value' => function ($row) {
                            return $row->first_name . ' ' . $row->last_name;
                        }
                    ),
                    array(

                        'name' => 'Levels',
                        'label' => trans('Levels'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => array(
                            'type' => 'text',
                        ),
                        'width' => 'auto',
                        'value' => function ($row) {
                            $levels = array();
                            $users = DB::table('users')->where('is_active', 'YES')->get()->toArray();

                            // todo: optimize this algorithm
                            // for level 1
                            $count = 0;
                            $levels['level_1'] = array();
                            foreach ($users as $item) {
                                if ($item->parent_id == $row->id) {
                                    array_push($levels['level_1'], $item);
                                    $count++;
                                }
                            }
                            // for level 2
                            $count2 = 0;

                            $levels['level_2'] = array();
                            foreach ($levels['level_1'] as $level1) {
                                foreach ($users as $user) {
                                    if ($user->parent_id == $level1->id) {
                                        array_push($levels['level_2'], $user);
                                        $count2++;
                                    }
                                }
                            }

                            // for level 3
                            $count3 = 0;
                            $levels['level_3'] = array();
                            foreach ($levels['level_2'] as $level2) {
                                foreach ($users as $user) {
                                    if ($user->parent_id == $level2->id) {
                                        array_push($levels['level_3'], $user);
                                        $count3++;
                                    }

                                }
                            }

                            // for level 4
                            $count4 = 0;
                            $levels['level_4'] = array();
                            foreach ($levels['level_3'] as $level3) {
                                foreach ($users as $user) {
                                    if ($user->parent_id == $level3->id)
                                        $count4++;
                                }
                            }
                            $totalCommission = (($count * 5) + ($count2 * 5) + ($count3 * 5) + ($count4 * 5));
                            $op = $count . ' Level 1  + ' . $count2 . ' Level 2 + ' . $count3 . ' Level 3 + ' . $count4 . ' Level 4 = $' . $totalCommission;
                            return $op;
                        }
                    ),
                    array(
                        'name' => 'action',
                        'label' => trans('Action'),
                        'sortable' => false,
                        'searchable' => false,
                        'searchfield' => null,
                        'width' => '150',
                        'value' => function ($row) {
                            return "<button type='button' class='btn btn-success btn-sm'> Pay</button>";
                        }
                    ),
                )
            );
        return view('admin.user.user_commission', ['grid' => $grid]);
    }

    public function test()
    {
        /*$admin_user = DB::table('users')->get();*/

        $admin_user = $this->user;
        $user = Auth::user();
        $users = $this->user->findByField('parent_id', $user->id);
        $level = DB::table('levels')->get()->count();
        return view('admin.user-commission.admin_tree', ['users' => $users, 'level' => $level, 'admin_user' => $admin_user]);
    }

    public function test2()
    {
        $admin['list'] = DB::table('users')->where('is_active', 'YES')->paginate(25);
        return view('admin.user-commission.user_list', $admin);
    }

    public function details($id)
    {
        $amount = Session::get('amount');
        $comm = Session::get('comm');
        $total1 = Session::get('total');
        $total_comm = Session::get('total_comm');
        $curr = Session::get('curr');
        $users = $this->user->findByField('parent_id', $id);
        $count = $this->user->findByField('parent_id', $id)->count();
        $admin = [
            'users' => $users,
            'count' => $count,
            'amount' => $amount,
            'comm' => $comm,
            'total1' => $total1,
            'total_comm' => $total_comm,
            'curr' => $curr,
        ];

        return view('admin.user-commission.details', $admin);
    }
}
        