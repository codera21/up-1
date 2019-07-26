<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 7:07 PM
 */

namespace App\Http\Controllers;

use App\Model\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return response()->json(News::all());
    }

    public function getbyid($id)
    {
        return response()->json(News::find($id));
    }

    public function create(Request $request)
    {
        $data = News::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = News::findOrFail($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $data = News::findOrFail($id)->delete();
        return response("Deleted successfully", 201);
    }
}