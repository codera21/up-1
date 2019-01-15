<?php

namespace App\Http\Controllers;

use App\Model\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        return response()->json($about);
    }

    public function getbyid($id)
    {
        $about = About::find($id);
        return response()->json($about);
    }

    public function create(Request $request)
    {
        $testomonial = About::create($request->all());
        return response()->json($testomonial, 201);
    }

    public function update(Request $request, $id)
    {
        $update_about = About::findOrFail($id);
        $update_about->update($request->all());
        return response()->json($update_about, 200);
    }

    public function delete($id)
    {
        $delete_about = About::findOrFail($id)->delete();
        return response()->json('delete successfully', 200);
    }
}