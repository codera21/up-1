<?php

namespace App\Http\Middleware;

use Closure;

class CheckSecureSite
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && env('MODE') == 'PRODUCTION') {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }
}
