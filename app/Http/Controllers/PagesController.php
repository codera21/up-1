<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:23 PM
 */

namespace App\Http\Controllers;

use App\Model\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return response()->json(Pages::all());
    }

    public function getbyid($id)
    {
        return response()->json(Pages::find($id));
    }

    public function create(Request $request)
    {
        $data = Pages::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Pages::findOrFail($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Pages::findOrFail($id)->delete();
        return response('delete successfully', 200);
    }
}