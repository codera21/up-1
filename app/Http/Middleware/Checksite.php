<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Checksite
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
        if (env('SITE') == 'ENG') {
            //usercommission page url
            Session::put('amount', '$50');
            Session::put('comm', '$5');
            Session::put('total', 50);
            Session::put('total_comm', 5);
            Session::put('curr', '$');
            //site urls
            Session::put('facebook_url', 'https://www.facebook.com/DNAsbook-Digital-Marketing-2137757206287284/?modal=admin_todo_tour');
            Session::put('twitter_url', 'https://twitter.com/?lang=en');
            Session::put('instagram_url', 'https://www.instagram.com/dnasbookdigimarket/?fbclid=IwAR3LgDXQfRxvagyOJGn9MMdJTZtKxCtrx0XMcRQVbvHxbnDOVzL3PxShTy4');
            Session::put('youtube_url', 'https://www.youtube.com/channel/UCY6gIihF58UEZhHy5mnks5g?view_as=subscriber&fbclid=IwAR27zvtui43k6UejNaEjvW6cM3ar-DkTpl3p8XqeMmPJz9CfjWB3WR7KC38');
            //flash message for online-payment/add and active and addnew1
            Session::put('flash-message-english','Our monthly fees payment is $59.7(monthly fees $50 and taxes and other fees: $9.7)');
            Session::put('flash-message-french','Le paiement de nos frais mensuels est de 59,7 $ (frais mensuels de 50 $ et taxes et autres frais: 9,7 $)');

        } else {
            //usercommission page url
            Session::put('amount', '1000F');
            Session::put('comm', '100F');
            Session::put('total', 1000);
            Session::put('total_comm', 100);
            Session::put('curr', 'F');
            //site urls
            Session::put('facebook_url', 'https://www.facebook.com/DNAsbookDigitaarketingAfrica/?modal=admin_todo_tour');
            Session::put('twitter_url', 'https://twitter.com/?lang=en');
            Session::put('instagram_url', 'https://www.instagram.com/dnasbookdigimarket/?fbclid=IwAR3LgDXQfRxvagyOJGn9MMdJTZtKxCtrx0XMcRQVbvHxbnDOVzL3PxShTy4');
            Session::put('youtube_url', 'https://www.youtube.com/channel/UCY6gIihF58UEZhHy5mnks5g?view_as=subscriber&fbclid=IwAR27zvtui43k6UejNaEjvW6cM3ar-DkTpl3p8XqeMmPJz9CfjWB3WR7KC38');
            //flash message for online-payment/add and active and addnew1
            Session::put('flash-message-english','Our monthly fees payment is 1600F(monthly fees 1000F and taxes and other fees: 600F)');
            Session::put('flash-message-french','Le paiement de nos frais mensuels est de 1600F (frais mensuels de 1000F et taxes et autres frais: 600F)');
        }
        return $next($request);
    }
}
