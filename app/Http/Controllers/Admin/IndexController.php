<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Request & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;


// Models and Repo
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$logged_in = Auth::user();
        $logged_id = $logged_in->id;
        $admin = DB::table('users')->where('id', $logged_id)->first();
        if ($admin->is_admin == 'YES') {

        } else {
            return view('error');
        }*/
        return view('admin.index.index');
    }
}