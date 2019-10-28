<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;


class formStep
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
        $arrayofurl = array();
        $url = $request->url();
        $arrayofurl = explode("/", "$url");
        end($arrayofurl);
        $key = key($arrayofurl);
        $value = $arrayofurl[$key];
        $value = intval($value);
        if (!isset($_COOKIE['distributorPage'])) {
            return redirect("pages/distributor?id=$value");
        } elseif ( !isset($_COOKIE['distributor-distributor-payment'])) {
            unset($_COOKIE['distributorPage']);
            return redirect("pages/dnasbook-distributor-payment?id=$value");
        } else if (!isset($_COOKIE['videos'])) {
            unset($_COOKIE['distributor-distributor-payment']);
            return redirect("pages/videos?id=$value");
        } else if (!isset($_COOKIE['videos'])) {
            unset($_COOKIE['questions']);
            return redirect("pages/dnasbook-webinar-questions?id=$value");
        } else if (!isset($_COOKIE['certificate'])) {
            unset($_COOKIE['questions']);
            return redirect("pages/certificate?id=$value");
        }
        return $next($request);
    }
}
