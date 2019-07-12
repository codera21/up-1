<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;


class formStep
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
        if (!$request->hasCookie("videoPage")) {
            $cookie = Cookie::make("videoPage", "videoPage");
            return redirect('pages/distributor')->withCookie($cookie);
        } else if (!$request->cookie("privacyandpolicy")) {
            $cookie1 = Cookie::make("privacyandpolicy", "privacypolicy");
            return redirect('pages/videos')->withCookie($cookie1);
        }
        return $next($request);
    }
}
