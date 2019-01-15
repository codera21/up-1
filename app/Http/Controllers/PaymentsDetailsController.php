<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:40 PM
 */

namespace App\Http\Controllers;

use App\Model\PaymentsDetails as Pde;
use Illuminate\Http\Request;

class PaymentsDetailsController extends Controller
{
    public function index()
    {
        return response()->json(Pde::all());
    }

    public function getbyid($id)
    {
        return response()->json(Pde::find($id));
    }

    public function create(Request $request)
    {
        $data = Pde::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Pde::findOrFail($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Pde::findOrFail($id)->delete();
        return response("deleted successfully",200);
    }
}