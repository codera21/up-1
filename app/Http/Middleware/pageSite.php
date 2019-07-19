<?php

namespace App\Http\Middleware;

use Closure;

class pageSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            if(!isset($_GET["id"]))
            {
                $url = $request->url();
                $url = $url."?id=";
                return redirect($url);
            }

        return $next($request);
    }
}
