<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{

    public function handle($request, Closure $next)
    {
        if (Auth::user()->is_admin !='YES')
        {
            return redirect('/');
        }else{
            return $next($request);
        }
    }
}
