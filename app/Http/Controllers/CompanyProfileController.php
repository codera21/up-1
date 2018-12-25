<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use grid;
use date;
use Storage;
use function Symfony\Component\VarDumper\Tests\Fixtures\bar;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $this->middleware('auth');
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $user['company_data'] = DB::table('companies_profiles')->where('user_id', $user['user_id'])->first();
        $user['testo_data'] = DB::table('testomonials')->where('user_id', $user['user_id'])->get();
        $user['company_photo'] = DB::table('companies_photo')->where('user_id', $user['user_id'])->get();
        return view('company_profile.default', $user);
    }

    Public function for_frontend($id)
    {
        $user['user'] = DB::table('users')->where("id",$id)->first();
        $user['company_data'] = DB::table('companies_profiles')->where('user_id', $id)->first();
        $user['data_no'] = DB::table('companies_profiles')->where('user_id', $id)->count();
        /*dd($user['company_data']->name);exit;*/
        $user['testo_data'] = DB::table('testomonials')->where('user_id', $id)->get();
        $user['company_photo'] = DB::table('companies_photo')->where('user_id', $id)->get();
        if ($user['data_no'] == 0 || $user['company_data']->name == null) {
            abort(404);
        } else {
            return view('company_profile.default', $user);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch_data()
    {
        $this->middleware('auth');
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $user['company_data'] = DB::table('companies_profiles')->where('user_id', $user['user_id'])->get();
        $user['company_data1'] = DB::table('companies_profiles')->where('user_id', $user['user_id'])->first();
        /*dd($user);exit;*/
        return view('user.company_dashboard.dashboard', $user);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CompanyProfile $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CompanyProfile $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($Id)
    {
        //
        $this->middleware('auth');
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $user['company_data'] = DB::table('companies_profiles')->where('user_id', $user['user_id'])->get();
        $user['company_data1'] = DB::table('companies_profiles')->where('user_id', $user['user_id'])->first();
        return view('user.company_dashboard.edit', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\CompanyProfile $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyProfile $companyProfile)
    {
        $this->middleware('auth');
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $thumbnail = Storage::disk('uploads.back_photo');
        if ($request->hasFile('back_photo')) {
            $thumbnailFile = $request->file('back_photo');
            $thumbnailFileName = date('Ymd_His') . '_' . $thumbnailFile->getClientOriginalName();
            $thumbFileRelativePath = $thumbnail->putFileAs('', $thumbnailFile, $thumbnailFileName);
            $thumbStoragePath = $thumbnail->url($thumbFileRelativePath);
            $thumbFileUrl = asset($thumbStoragePath);
            $data['photo_url'] = $thumbFileUrl;
        }
        $companyupdate = DB::table('companies_profiles')->where('user_id', $user['user_id'])
            ->update([
                'name' => $request->input('name'),
                'company_moto' => $request->input('company_moto'),
                'description' => $request->input('description'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'contact' => $request->input('contact'),
                'company_description_title' => $request->input('change_description'),
                'company_image_title' => $request->input('change_images')
            ]);
        if ($request->hasFile('back_photo')) {
            $companyupdate = DB::table('companies_profiles')->where('user_id', $user['user_id'])
                ->update([
                    'photo_url' => $data['photo_url']
                ]);
        }


        if ($companyupdate) {
            return redirect()->route('company_dashboard.edit', ['post' => $user['user_id']])
                ->with('success', 'Company updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CompanyProfile $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyProfile $companyProfile)
    {
        //

    }
}
