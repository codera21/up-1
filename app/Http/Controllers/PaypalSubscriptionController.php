<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:51 PM
 */

namespace App\Http\Controllers;

use App\Model\PaypalSubs;
use Illuminate\Http\Request;

class PaypalSubscriptionController extends Controller
{
    public function index()
    {
        return response()->json(PaypalSubs::all());
    }

    public function getbyid($id)
    {
        return response()->json(PaypalSubs::find($id));
    }

    public function create(Request $request)
    {
        $data = PaypalSubs::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = PaypalSubs::findOrFail($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        PaypalSubs::findOrFail($id)->delete();
        return response('Deleted successfully', 200);
    }
}