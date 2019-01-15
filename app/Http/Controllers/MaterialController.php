<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:52 PM
 */

namespace App\Http\Controllers;

use App\Model\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        return response()->json(Material::all());
    }

    public function getbyid($id)
    {
        return response()->json(Material::find($id));
    }

    public function create(Request $request)
    {
        $data = Material::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Material::findOrfail($id);
        $data->update($request->all());
        return response()->json('updated successfully', 200);
    }

    public function delete($id)
    {
        Material::findOrFail($id)->delete();
        return response()->json("deleted sucessfully", 200);
    }
}