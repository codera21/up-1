<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

// Facades
use Date;
use Auth;

// Models and Repo
use App\Repositories\UserGoalRepository;


class UserGoalController extends Controller
{

    /**
     * @var UserGoalRepository
     */
    protected $userGoal;

    public function __construct(UserGoalRepository $userGoal)
    {
        $this->userGoal = $userGoal;
    }


    /**
     * Save User Goal
     *
     * @param Request $request
     * @return Redirect
     */
    public function save(Request $request, $username)
    {
        $data = $request->except(['_token']);

        $data['user_id'] = Auth::user()->id;
        $user = Auth::user();
        //delete all goals of this user first
        $this->userGoal->deleteWhere(['user_id' => $user->id]);


        $flag = 0;
        foreach ($data['userGoal'] as $item) {
            if (empty(($item))){
                $flag = 1;

            }
        }

        if($flag == 1 ) {
            // show error page
            return redirect('user/' . $username)->with('error', trans('Please fill in the empty fields'));
        }


        foreach ($data['userGoal'] as $key => $val) {
            $goals = array();
            $goals['user_id'] = $user->id;
            $goals['goal_id'] = $key;
            $goals['user_answer'] = ($val != '') ? $val : '';

            //print "Key=".$key."==Val==".$val."<br />";
            if (!$userGoal = $this->userGoal->create($goals)) {
                return redirect('user/' . $username)->withInput()->with('error', trans('Goals have not been saved.'));
            }
        }

        If ($user->is_active == 'NO') {
            return redirect('/online-payment/add');

        } else {
            return redirect('user/' . $username)->with('success', trans('Goals have been saved successfully.'));

        }

    }
}
