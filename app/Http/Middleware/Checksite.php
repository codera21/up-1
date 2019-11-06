<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Checksite
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

        // this is how to
        session::put("this_is_how_eng", ' This is how to pay on Opportunity "4": ');
        session::put("this_is_how_fr", 'Voici comment payer sur Opportunité "4": ');


        //flash message for online-payment/add and active and addnew1
        Session::put('flash-message-english', 'Our monthly fees payment is $59.7(monthly fees $50 and taxes and other fees: $9.7)');
        Session::put('flash-message-french', 'Le paiement de nos frais mensuels est de 59,7 $ (frais mensuels de 50 $ et taxes et autres frais: 9,7 $)');
        Session::put('youtube_video_link', 'https://www.youtube.com/watch?v=sYqB8Gl45os&feature=youtu.be&fbclid=IwAR0RqL_twhvA6fIEKp-TLV4qdNtcdKteN6NKG9r_Io253WOKAqe_wYZX9WM');
        session::put('youtube_video_link_fr', 'https://www.youtube.com/watch?v=nmMcEircrxU&feature=youtu.be&fbclid=IwAR0cvNaU_36HcogtV_18iK45c8yDMXHnbiW3Z0bWt9QAmZ5XxCOcoWcrsuo');
        session::put('combine_eng', "You are in your trial period. You have to pay your fees before the 30th of this month to keep your account open. Our monthly fees are 59.7(monthly fees $50 and taxes and other fees: $9.7). To pay your fees");
        session::put('combine_fr', "Vous êtes dans votre période d'essai. Vous devez payer vos frais avant le 30 de ce mois pour que votre compte reste ouvert. Nos frais mensuels sont de  59,7 $  (frais mensuels de 50 $ et taxes et autres frais: 9,7 $). Pour payer vos frais");


        //site urls
        Session::put('facebook_url', 'https://www.facebook.com/DNAsbookDigitaarketingAfrica/?modal=admin_todo_tour');
        Session::put('twitter_url', 'https://twitter.com/?lang=en');
        Session::put('instagram_url', 'https://www.instagram.com/dnasbookdigimarket/?fbclid=IwAR3LgDXQfRxvagyOJGn9MMdJTZtKxCtrx0XMcRQVbvHxbnDOVzL3PxShTy4');
        Session::put('youtube_url', 'https://www.youtube.com/channel/UCY6gIihF58UEZhHy5mnks5g?view_as=subscriber&fbclid=IwAR27zvtui43k6UejNaEjvW6cM3ar-DkTpl3p8XqeMmPJz9CfjWB3WR7KC38');


        if (env('SITE') == 'ENG') {

            Session::put('amount', '$50');
            Session::put('amount_tax', '$59.7');
            Session::put('comm', '$5');
            Session::put('total', 50);
            Session::put('total_comm', 5);
            Session::put('curr', '$');

        } else {

            Session::put('amount', '1000F');
            Session::put('amount_tax', '1600F');
            Session::put('comm', '100F');
            Session::put('total', 1000);
            Session::put('total_comm', 100);
            Session::put('curr', 'F');

        }
        return $next($request);
    }
}
