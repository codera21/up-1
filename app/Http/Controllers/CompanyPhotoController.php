<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:00 PM
 */

namespace App\Http\Controllers;

use App\Model\CompanyPhoto;
use Illuminate\Http\Request;

class CompanyPhotoController extends Controller
{
    public function index()
    {
        $data = CompanyPhoto::all();
        return response()->json(CompanyPhoto::all());
    }

    public function getbyid($id)
    {
        $data = CompanyPhoto::find($id);
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $data = CompanyPhoto::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $companyphoto = CompanyPhoto::findOrFail($id);
        $companyphoto->update($request->all());
        return response()->json('Updated successfully', 200);
    }

    public function delete($id)
    {
        CompanyPhoto::findOrFail($id)->delete();
        return response()->json('Deleted successfully', 200);
    }
}
