<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:29 PM
 */

namespace App\Http\Controllers;

use App\Model\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        return response()->json(Payments::all());
    }

    public function getbyid($id)
    {
        return response()->json(Payments::find($id));
    }

    public function create(Request $request)
    {
        $data = Payments::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Payments::findOrFail($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Payments::findOrFail($id)->delete();
        return response('deleted successfully', 200);
    }
}
