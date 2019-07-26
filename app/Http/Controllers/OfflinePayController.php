<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:15 PM
 */

namespace App\Http\Controllers;

use App\Model\OfflinePay;
use Illuminate\Http\Request;

class OfflinePayController extends controller
{
    public function index()
    {
        return response()->json(OfflinePay::all());
    }

    public function getbyid($id)
    {
        return response()->json(OfflinePay::find($id));
    }

    public function create(Request $request)
    {
        $data = OfflinePay::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = OfflinePay::findOrFail($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        OfflinePay::findOrFail($id)->delete();
        return response("deleted successfully", 200);
    }
}