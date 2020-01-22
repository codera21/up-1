<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{

    public function index()
    {
        $videoData = DB::table("videolink")->get();
        return view('admin.video.index', ['videoData' => $videoData]);
    }

    public function add()
    {
        return view('admin.video.add');
    }

    public function save(Request $request)
    {
        $save = DB::table('videolink')->insert([
            'link' => $request->input('link'),
            'lang' => $request->input('lang')
        ]);
        if ($save) {
            return redirect('/admin/video/add')->with('success', 'Added Successfully');
        }
    }

    public function edit($id)
    {
        $linkData = DB::table('videolink')->where('id', $id)->first();
        return view('admin.video.edit', ['linkData' => $linkData]);
    }

    public function update($id, Request $request)
    {
        $updateData = DB::table('videolink')->where('id', $id)->update([
            'link' => $request->input('link'),
            'lang' => $request->input('lang')
        ]);
        if ($updateData) {
            return redirect('/admin/video')->with('success', "updated Successfully");
        }
    }

    public function delete($id)
    {
        $bool = DB::table('videolink')->where('id', $id)->delete();
        if ($bool) {
            return redirect('/admin/video')->with('success', 'Deleted Successfully');
        }
    }


    //
}
