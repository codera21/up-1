<?php

namespace App\Http\Controllers;

use App\model\Users;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(Users::all());
    }
}