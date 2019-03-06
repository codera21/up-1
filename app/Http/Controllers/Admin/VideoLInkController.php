<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VideoLInkController extends Controller
{
    public function index()
    {
        $link = DB::table('link')->get();
        $array = [
            'link' => $link,
        ];
        return view('admin.DashboardVideo.index', $array);
    }

    public function show($id)
    {
        $link = DB::table('link')->where('id', $id)->first();

        $array = [
            'link' => $link,
        ];
        return view('admin.DashboardVideo.edit', $array);
    }

    public function update(Request $request, $id)
    {
       $update =  DB::table('link')->where('id', $id)->update([
            'link'=> $request->link,
            'lang'=> $request->lang
        ]);
        if ($update) {
            return redirect()->route('admin.dashboard_video')
                ->with('success', 'Dashboard Link successfully');
        }
    }
}
