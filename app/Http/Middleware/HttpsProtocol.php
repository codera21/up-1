<?php

namespace App\Http\Middleware;

use Closure;

class HttpsProtocol
{
    public function handle($request, Closure $next)
    {
        /*if (!$request->secure() && App::environment() === 'production') {
            return redirect()->secure($request->getRequestUri());
        }*/

        return $next($request);

    }
}
