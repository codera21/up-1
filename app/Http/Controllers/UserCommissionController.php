<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:59 PM
 */

namespace App\Http\Controllers;

use App\Model\UserCommission;
use Illuminate\Http\Request;

class UserCommissionController extends Controller
{
    public function index()
    {
        return response()->json(UserCommission::all());
    }

    public function getbyid($id)
    {
        return response()->json(UserCommission::find($id));
    }

    public function create(Request $request)
    {
        $data = UserCommission::create($request->all());
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $data = UserCommission::findOrFail($id);
        return response()->json($data, 200);
    }
    public function delete($id)
    {
        $data
    }
}