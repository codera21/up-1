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
        if (!$request->hasCookie("distributorPage")) {
//            $cookie = Cookie::make("distributorPage", "1");
            return redirect("pages/distributor?id=$value");

        } elseif (!$request->cookie("payment-page")) {
            $cookie1 = Cookie::make("payment-page", '1');
            return redirect("pages/dnasbook-distributor-payment?id=$value")->withCookie($cookie1);
        } else if (!$request->cookie("privacyandpolicy")) {
            $cookie2 = Cookie::make("privacyandpolicy", "1");
            return redirect("pages/videos?id=$value")->withCookie($cookie2);
        } else if (!$request->cookie('questions')) {
            $cookie3 = Cookie::make("questions", "1");
            return redirect("pages/dnasbook-webinar-questions?id=$value")->withCookie($cookie3);
        }/* else if (!$request->cookie('dnasbook-distributor-training-certificate')) {
            $cookie4 = Cookie::make("dnasbook-distributor-training-certificate", "dnasbook-distributor-training-certificate");
            return redirect("pages/dnasbook-distributor-training-certificate?id=$value")->withCookie($cookie4);
        }*/ else if (!$request->cookie('certificate')) {
            $cookie5 = Cookie::make("certificate", "1");
            return redirect("pages/certificate?id=$value")->withCookie($cookie5);
        }
        return $next($request);
    }
}
