<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckGroupPayment
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

        $materialGroupID = $request->route('id');
        $materialGroup = DB::table('material_group')
            ->select('price')
            ->where('id', $materialGroupID)
            ->first();

        if ($materialGroup->price > 0.00) {
            $payment = DB::table('payments_details')
                ->where('user_id', Auth::user()->id)
                ->where('group_id', $materialGroupID)
                ->first();
            if ($payment) {
                return $next($request);
            } else {
                return redirect('/user-academy/group-material-payment/' . $materialGroupID);
            }
        }


        return $next($request);
    }
}
