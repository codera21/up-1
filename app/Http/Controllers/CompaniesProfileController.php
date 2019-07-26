<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:19 PM
 */

namespace App\Http\Controllers;

use App\Model\CompanyProfiles;
use Illuminate\Http\Request;


// TODO: test the code below
class CompaniesProfileController extends Controller
{
    public function index()
    {
        return response()->json(CompanyProfiles::all());
    }

    public function getbyid($id)
    {
        $data = CompanyProfiles::find($id);
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $data = CompanyProfiles::create($request->all());
        return response()->json('$data', 200);
    }

    public function update(Request $request, $id)
    {
        $data = CompanyProfiles::findOrFail($id);
        $data->update($request->all());
        return response()->json('updated successfully', 200);
    }

    public function delete($id)
    {
        $data = CompanyProfiles::findOrFail($id)->delete();
        return response()->json('deleted successfully', 200);
    }
}