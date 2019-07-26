<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 6:03 PM
 */

namespace App\Http\Controllers;

use App\Model\MaterialGroup as Mgroup;
use Illuminate\Http\Request;

class MaterialGroupController extends Controller
{
    public function index()
    {
        $data = Mgroup::all();
        return response()->json($data);
    }

    public function getbyid($id)
    {
        return response()->json(Mgroup::find($id));
    }

    public function create(Request $request)
    {
        $data = Mgroup::create($request->all());
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $data = Mgroup::findOrFail($id);
        $data->update($request->all());
        return response()->json('Updated Successfully', 201);
    }

    public function delete($id)
    {
        Mgroup::findOrFail($id)->delete();
        return response()->json('Deleted successfully',200);
    }
}