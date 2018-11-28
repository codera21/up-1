<?php

namespace App\Http\Middleware;

use Closure;
use Menu;

class FrontendNavigation
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
        Menu::make('MainNav', function($menu){
            $menu->add(trans('navigation.home'), ['route' => 'home']);
            // My Academy
            $menu->add(trans('navigation.my_academy'),array('nickname'=>'academy'));
            $menu->get('academy')
                ->add(trans('navigation.video'),route('user-academy.video'));
            $menu->get('academy')
                ->add(trans('navigation.course'),route('user-academy.course'));
            $menu->get('academy')
                ->add(trans('navigation.company_profile'), route('company-profile.index'));
            //end of my academy edited by ashish bhandari roll no 336.
            $menu->add(trans('navigation.payment'), array('nickname'=>'payments'));
            $menu->get('payments')
                    ->add(trans('navigation.payment_profiles'), route('payment-profile'))
                    ->active('payment.*');

            $menu->get('payments')
                    ->add(trans('navigation.online_purchase'), route('online-payment.add'))
                    ->active('online-payment.*');
            $menu->get('payments')
                    ->add(trans('navigation.my_payment_histroy'), route('payment-history'))
                    ->active('payment-history.*');
            $menu->get('payments')
                ->add('OFFLINE PAYMENT', route('offline_pay.offline_pay'))
                ->active('payment-history.*');
            $menu->get('payments')
                ->add('VERIFY', route('offline_pay.verify'))
                ->active('payment-history.*');
            $menu->add(trans('navigation.commission'), array('nickname'=>'commissions'));
            $menu->get('commissions')
                    ->add(trans('navigation.my_subscriber_tree'), route('user.tree'))
                    ->active('user.tree.*');
            $menu->get('commissions')
                    ->add(trans('navigation.my_commission'), route('commission'))
                    ->active('commission.*');
            // Help
            $menu->add(trans('navigation.help'), route('faq'));
            $menu->add(trans('navigation.news'), route('news'));
            $menu->add(trans('navigation.about'), route('about'));
            $menu->add(trans('navigation.contact_us'), route('contact'));
        });

        return $next($request);
    }
}
