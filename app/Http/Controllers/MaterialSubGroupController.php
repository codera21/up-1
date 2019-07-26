<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 6:16 PM
 */

namespace App\Http\Controllers;

use App\Model\MaterialSubGroup as Msub;
use Illuminate\Http\Request;

class MaterialSubGroupController extends Controller
{
    public function index()
    {
        return response()->json(Msub::all());
    }

    public function getbyid($id)
    {
        return response()->json(Msub::find($id));
    }

    public function create(Request $request)
    {
        $data = Msub::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Msub::findOrFail($id);
        $data->update($request->all());
        return response()->json("updated successfully", 200);
    }

    public function delete($id)
    {
        Msub::findOrFail($id)->delete();
        return response()->json('delete successfully', 200);
    }
}