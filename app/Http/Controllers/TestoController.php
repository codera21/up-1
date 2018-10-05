<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Testomonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestoController extends Controller
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
        $array = array(
            'user_id' => $user['user_id']
        );
        $user['testo_data'] = DB::table('testomonials')->where($array)->get();
        $user['testo_data1'] = DB::table('testomonials')->where($array)->first();
        return view('user.company_dashboard.testomonial', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {

        return view('user.company_dashboard.add_testo');
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
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $addtesto = DB::table('testomonials')->insert([
            'name' => $request->input('name'),
            'testomonial' => $request->input('testomonial'),
            'user_id' => $user['user_id']
        ]);
        if ($addtesto) {
            return redirect()->route('testo.dashboard')
                ->with('success', 'Company added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testomonial $testomonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testomonial $testomonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testomonial $testomonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testomonial $testomonial, $id)
    {
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $array = array(
            'user_id' => $user['user_id'],
            'id' => $id
        );
        $user['heavy'] = DB::table('testomonials')->where($array)->first();
        return view('user.company_dashboard.edit_testo', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Testomonial $testomonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testomonial $testomonial, $id)
    {
        $user['user'] = Auth::user();
        $user['user_id'] = $user['user']->id;
        $array = array(
            'user_id' => $user['user_id'],
            'id' => $id
        );
        $testoupdate = DB::table('testomonials')->where($array)
            ->update([
                'name' => $request->input('name'),
                'testomonial' => $request->input('testomonial')
            ]);
        if ($testoupdate) {
            return redirect()->route('testo.dashboard', ['post' => $id])
                ->with('success', 'Company updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testomonial $testomonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletetesto = DB::table('testomonials')->where('id', $id)->delete();
        if ($deletetesto){
            return redirect()->route('testo.dashboard')
                ->with('success', 'Company Deleted successfully');
        }
    }
}
