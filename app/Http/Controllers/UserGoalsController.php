<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 8:22 PM
 */

namespace App\Http\Controllers;

use App\Model\UserGoals;
use Illuminate\Http\Request;

class UserGoalsController extends Controller
{
    public function index()
    {
        return response()->json(UserGoals::all());
    }

    public function getbyid($id)
    {
        return response()->json(UserGoals::find($id));
    }

    public function create(Request $request)
    {
        $data = UserGoals::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = UserGoals::findOrFail($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        UserGoals::findOrFail($id)->delete();
        return response('Delete successfully', 200);
    }
}