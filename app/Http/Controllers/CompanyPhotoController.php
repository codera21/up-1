<?php

namespace App\Http\Controllers;

use App\Models\CompanyPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Storage;

class CompanyPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $user['company_data'] = DB::table('companies_photo')->where('user_id', $user['user_id'])->first();
        $user['company_data1'] = DB::table('companies_photo')->where('user_id', $user['user_id'])->get();
        return view('user.company_dashboard.company_photo.index', $user);
    }

    public function add(Request $request)
    {
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        return view('user.company_dashboard.company_photo.add_photo', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token', 'company_photo']);
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $thumbnail = Storage::disk('uploads.company_photo');
        if ($request->hasFile('company_photo')) {
            $thumbnailFile = $request->file('company_photo');
            $thumbnailFileName = date('Ymd_His') . '_' . $thumbnailFile->getClientOriginalName();
            $thumbFileRelativePath = $thumbnail->putFileAs('', $thumbnailFile, $thumbnailFileName);
            $thumbStoragePath = $thumbnail->url($thumbFileRelativePath);
            $thumbFileUrl = asset($thumbStoragePath);
            $data['photo_url'] = $thumbFileUrl;
        }
        $addphotourl = DB::table('companies_photo')->insert([
            'name' => $request->input('name'),
            'photo_url' => $data['photo_url'],
            'pic_url' => $request->input('pic_url'),
            'user_id' => $user['user_id']
        ]);
        if ($addphotourl) {
            return redirect()->route('photo.dashboard')
                ->with('success', 'Photo added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyPhoto $companyPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyPhoto $companyPhoto)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyPhoto $companyPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyPhoto $companyPhoto, $id)
    {
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $array = array(
            'user_id' => $user['user_id'],
            'id' => $id
        );
        $user['company_data'] = DB::table('companies_photo')->where($array)->first();
        return view('user.company_dashboard.company_photo.edit_photo', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\CompanyPhoto $companyPhoto
     * @return \Illuminate\Http\Response
     */
    /* public function update(Request $request, CompanyPhoto $companyPhoto, $id)
     {
         $data = $request->except(['_token', 'company_photo']);
         $user['user'] = Auth::user();
         $user['user_id'] = $user['user']->id;
         $thumbnail = Storage::disk('uploads.company_photo');
         if ($request->hasFile('company_photo')) {
             $thumbnailFile = $request->file('company_photo');
             $thumbnailFileName = date('Ymd_His') . '_' . $thumbnailFile->getClientOriginalName();
             $thumbFileRelativePath = $thumbnail->putFileAs('', $thumbnailFile, $thumbnailFileName);
             $thumbStoragePath = $thumbnail->url($thumbFileRelativePath);
             $thumbFileUrl = asset($thumbStoragePath);
             $data['photo_url'] = $thumbFileUrl;

         }
         $array = array(
             'id' => $id,
             'user_id' => $user['user_id']
         );
         $photo_update = DB::table('companies_photos')->where($array)
             ->update([
                 'name' => $request->input('name'),
                 'photo_url' => $data['photo_url'],
             ]);
         if ($photo_update) {
             return redirect()->route('photo.dashboard', ['post' => $id])
                 ->with('success', 'Photo updated successfully');
         }
     }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyPhoto $companyPhoto
     * @return \Illuminate\Http\Response
     */

    public function destroy(CompanyPhoto $companyPhoto, $id)
    {
        $deletephoto = DB::table('companies_photo')->where('id', $id);
        if ($deletephoto) {
            $deletephoto->delete();
        }
        if ($deletephoto) {
            return redirect()->route('photo.dashboard')
                ->with('success', 'Photo Deleted successfully');
        }
    }
}
