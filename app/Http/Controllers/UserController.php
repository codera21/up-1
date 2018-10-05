<?php

namespace App\Http\Controllers;

// Request & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
// Facades
use Auth;
use Grid;

// Models and Repo
use App\Repositories\UserRepository;
use App\Repositories\GoalRepository;

// Form Requests
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{

    protected $user;

    protected $goal;


    public function __construct(UserRepository $user, GoalRepository $goal)
    {
        $this->user = $user;
        $this->goal = $goal;
    }

    public function index(Request $request)
    {

    }

    public function add()
    {
        return view('user.add');
    }

    public function save(UserSaveRequest $request)
    {

        $data = $request->only(['first_name', 'last_name', 'company', 'address1', 'address2', 'city', 'state', 'zip', 'zip4', 'phone', 'email', 'website_signup']);
        $data['name'] = $request->input('name');
        $data['password'] = bcrypt($request->input('password'));
        $data['company_id'] = Auth::user()->company_id;
        $data['admin'] = 'NO';

        if ($user = $this->user->create($data)) {
            $userPrivilege = $request->only(['manage_payments', 'manage_mailing_profiles', 'manage_refunds', 'manage_users', 'manage_reports']);
            $userPrivilege['user_id'] = $user->id;
            $userPrivilege['company_id'] = $user->company_id;

            if ($this->userPrivilege->create($userPrivilege)) {
                $response = array(
                    'status' => 'success',
                    'message' => trans('New user has been added successfully.'),
                    'redirect_url' => route('user')
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => trans('New user has been added but privileges are not set.'),
                );
            }
        } else {
            $response = array(
                'status' => 'error',
                'message' => trans('User has not been added.'),
            );
        }

        return $response;


    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.account', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request)
    {
        $data = $request->except(['_token']);
        $user = Auth::user();

        $data['prevent_users_to_see_email'] = $request->input('prevent_users_to_see_email');
        $data['prevent_users_to_see_phone'] = $request->input('prevent_users_to_see_phone');
        $data['prevent_users_to_see_comments_messages'] = $request->input('prevent_users_to_comments_messages');
        //dd($data);        
        /*if($user->id === $user_id){
            $data['disabled'] = 'NO';
        }
        
        if($request->has('password')){
            $data['password'] = bcrypt($request->input('password'));
        }*/

        if ($user = $this->user->update($data, $user->id)) {
            return redirect()->route('user.account')->with('success', trans('Account Settings have been updated successfully.'));
        } else {
            return redirect()->route('user.account')->withInput()->with('error', trans('Account Settings have not been updated.'));
        }

    }

    public function dashboard()
    {
        $user = Auth::user()->id;
        return view('user.dashboard', ['user' => $user]);
    }

    public function profile(Request $request, $username)
    {
        $loggedUser = Auth::user();
        $username1 = DB::table('users')->where('id', $loggedUser->id)->first();

        if ($username1->username == $username) {
            $array = array('username' => $username);
            $user = $this->user->findByField($array)->first();
      //      $goals = $this->goal->pushCriteria(new \App\Criteria\Admin\GoalCriteria())->all();
            $goals_table = DB::table('goals')->get();
            $goals = DB::table('goals')->where('lang', App::getLocale())->get();
            $userGoals = [];
            foreach ($user->goals as $userGoal) {
                $userGoals[$userGoal->goal_id] = $userGoal->user_answer;
            }
            return view('user.profile', ['goals_table' => $goals_table, 'user' => $user, 'loggedUser' => $loggedUser, 'route' => 'user/' . $user->username, 'goals' => $goals, 'userGoals' => $userGoals]);
        } else {
            abort(404);
        }
    }

    public function public_profile($id)
    {
        $loggedUser = Auth::user();
        $user = $this->user->findByField('id', $id)->first();
        $goals = $this->goal->pushCriteria(new \App\Criteria\Admin\GoalCriteria())->all();

        $join_user_goals = DB::table('user_goals')
            ->join('goals', 'user_goals.goal_id', '=', 'goals.id')
            ->select('user_goals.*', 'goals.goal_question')->where('user_id', $id)->get();
        $userGoals = [];
        foreach ($user->goals as $userGoal) {
            $userGoals[$userGoal->goal_id] = $userGoal->user_answer;
        }
        return view('user.public_profile', ['join_user_goals' => $join_user_goals, 'user' => $user, 'loggedUser' => $loggedUser, 'route' => 'user/' . $user->username, 'goals' => $goals, 'userGoals' => $userGoals]);
    }


    /**
     * Show user tree
     *
     * @return Response
     */
    public function treeView(Request $request)
    {
        $user = Auth::user();
        $users = $this->user->findByField('parent_id', $user->id);
        $level = DB::table('levels')->get()->count();
        return view('user.tree', ['users' => $users, 'level' => $level]);
    }
}
