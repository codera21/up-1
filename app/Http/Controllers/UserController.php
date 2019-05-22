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

    public function getbyid($id)
    {
        return response()->json(Users::find($id));
    }

    public function create(Request $request)
    {
        $data = Users::create($request->all());
        $array = array();
        $array["register"] = array();
        if($data)
        {
            $array["success"]= "1";
        }
        return response()->json($array,201);
    }

    public function update(Request $request, $id)
    {
        $data = Users::findOrFail($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Users::findOrFail($id)->delete();
        return response("deleted successfully", 200);
    }
}
