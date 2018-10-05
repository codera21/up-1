<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckMaterialPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $materialID = $request->route('id');
        $material = DB::table('material')
            ->select('price')
            ->where('id', $materialID)
            ->first();

        if ($material->price > 0.00) {
            $isPaid = DB::table('payments_details')
                ->where('user_id', Auth::user()->id)
                ->where('material_id', $materialID)
                ->first();
            if ($isPaid) {
                return $next($request);
            } else {
                return redirect('/user-academy/material-payment/' . $materialID);
            }
        }
        return $next($request);
    }
}
