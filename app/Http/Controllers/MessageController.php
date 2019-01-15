<?php
/**
 * Created by PhpStorm.
 * User: Ashish Bhandari
 * Date: 1/15/2019
 * Time: 6:57 PM
 */

namespace App\Http\Controllers;

use App\Model\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return response()->json(Message::all());
    }

    public function getbyid($id)
    {
        return response()->json(Message::find($id));
    }

    public function create(Request $request)
    {
        $data = Message::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Message::findOrFail($id);
        $data->update($request ->all());
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $data = Message::findOrFind($id)->delete();
        return response('Deleted successfully');
    }
}