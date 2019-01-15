<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/14/2019
 * Time: 5:53 PM
 */

namespace App\Http\Controllers;

use App\model\Testomonial as Testo;
use Illuminate\Http\Request;

class TestoController extends Controller
{
    public function index()
    {
        return response()->json(Testo::all());
    }

    public function getbyid($id)
    {
        return response()->json(Testo::find($id));
    }

    public function create(Request $request)
    {
        $testomonial = Testo::create($request->all());
        return response()->json($testomonial, 201);
    }

    public function update(Request $request, $id)
    {
        $testomonial = Testo::findOrFail($id);
        $testomonial->update($request->all());

        return response()->json($testomonial, 200);
    }

    public function delete($id)
    {
        Testo::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}