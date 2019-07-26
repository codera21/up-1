<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 5:33 PM
 */

namespace App\Http\Controllers;

use App\Model\Faq;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class FaqController
{
    public function index()

    {
        return response()->json(Faq::all());
    }

    public function getbyid($id)
    {
        $data = Faq::find($id);
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $data = Faq::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Faq::findOrFail($id);
        $data->update($request->all());
        return response()->json('Created successfully', 200);
    }

    public function delete($id)
    {
        Faq::findOrFail($id)->delete();
        return response()->json('Deleted successfully', 200);
    }
}