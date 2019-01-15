<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:42 PM
 */

namespace App\Http\Controllers;

use App\Model\Goals as Goal;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function index()
    {
        $data = Goal::all();
        return response()->json($data);
    }

    public function getbyid($id)
    {
        $data = Goal::find($id);
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $data = Goal::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Goal::findOrfail($id);
        $data->update($request->all());
        return response()->json('Table updated successfully', 200);
    }

    public function delete($id)
    {
        Goal::findOrFail($id)->delete();
        return response()->json('deleted successfully', 200);
    }
}