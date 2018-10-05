<?php

namespace App\Http\Middleware;

use Closure;
use Breadcrumbs;

class FrontendBreadcrumbs
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
        // Home
        Breadcrumbs::register('home', function($breadcrumbs)
        {
            $breadcrumbs->push('Home', route('home'));
        });

        // Academy
        Breadcrumbs::register('user-academy', function($breadcrumbs)
        {
            $breadcrumbs->push('My Academy', route('user-academy'));
        });
        
        // Home > Login
        Breadcrumbs::register('login', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('Login', route('login'));
        });

        // Home > Dashboard
        Breadcrumbs::register('user.dashboard', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('Dashboard', route('user.dashboard'));
        });

        // Home > Account
        Breadcrumbs::register('user.account', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('Account Settings', route('user.account'));
        });

        // Home > User Tree
        Breadcrumbs::register('user.tree', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('User Tree View', route('user.tree'));
        });

        // Home > Offline Payment
        Breadcrumbs::register('offline-payment.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('Add Offline Payment', route('offline-payment.add'));
        });

        // Home > Online Payment
        Breadcrumbs::register('online-payment.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('Add Online Payment', route('online-payment.add'));
        });
        
        // Home > Payment History
        Breadcrumbs::register('payment-history', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('My Payments History', route('payment-history'));
        });

        // Home > Payment History > Details
        Breadcrumbs::register('payment-history.detail', function($breadcrumbs)
        {
            $breadcrumbs->parent('payment-history');
            $breadcrumbs->push('Details');
        });

        // Home > User Commission History
        Breadcrumbs::register('commission', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('My Commission', route('commission'));
        });

        // Home > User pyament profiles
        Breadcrumbs::register('payment-profile', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('My Payment Profiles', route('payment-profile'));
        });

        // Home > User pyament profile > Add Payment Profile
        Breadcrumbs::register('payment-profile.add-profile', function($breadcrumbs)
        {
            $breadcrumbs->parent('payment-profile');
            $breadcrumbs->push('Add Payment Profile');
        });

        // Home > Message > Inbox
        Breadcrumbs::register('message', function($breadcrumbs)
        {
            $breadcrumbs->parent('home');
            $breadcrumbs->push('Inbox');
        });

        // Home > Message > Unread
        Breadcrumbs::register('message.unread', function($breadcrumbs)
        {
            $breadcrumbs->parent('message');
            $breadcrumbs->push('Unread');
        });

        // Home > Message > Sent
        Breadcrumbs::register('message.sent', function($breadcrumbs)
        {
            $breadcrumbs->parent('message');
            $breadcrumbs->push('Sent');
        });

        // Home > Message > Trash
        Breadcrumbs::register('message.trash', function($breadcrumbs)
        {
            $breadcrumbs->parent('message');
            $breadcrumbs->push('Trash');
        });

        // Help
        Breadcrumbs::register('help', function($breadcrumbs)
        {
            $breadcrumbs->push('Help', route('help'));
        });

        // News
        Breadcrumbs::register('news', function($breadcrumbs)
        {
            $breadcrumbs->push('News', route('news'));
        });

        // Home > News > Details
        Breadcrumbs::register('news.details', function($breadcrumbs)
        {
            $breadcrumbs->parent('news');
            $breadcrumbs->push('News Details');
        });

        Breadcrumbs::register('about-us', function($breadcrumbs)
        {
            $breadcrumbs->push('About Us', route('about-us'));
        });

        Breadcrumbs::register('contact', function($breadcrumbs)
        {
            $breadcrumbs->push('Contact Us', route('contact'));
        });
    
        // Content Pages
        Breadcrumbs::register('page', function($breadcrumbs, $page) {
            if($page){
                if ($page->parent){
                    $breadcrumbs->parent('page', $page->parent);
                } else {
                    $breadcrumbs->parent('home');
                }
                $breadcrumbs->push($page->title, route('page', $page->slug));
            }
            
            
        });

        
        
        return $next($request);
        
        
    }
}
