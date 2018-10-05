<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Menu;
use Request;

class BackendNavigation
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
        Menu::make('MainNav', function ($menu) {

            // Dashboard
            $menu->add('Dashboard', ['route' => 'admin.dashboard'])
                ->prepend('<i class="glyphicon glyphicon-home"></i> <span class="nav-label">')
                ->append('</span>');
            //->data('permission', 'access.admin.dashboard');

            // Manage Website
            $menu->add('Manage Website', '#')
                ->prepend('<i class="fa fa-list"></i> <span class="nav-label">')
                ->append('</span>');
            //->data('permission', 'access.admin.user.view|access.admin.role.view|access.admin.permission.view');

            // Goal
            $menu->get('manageWebsite')
                ->add('Goals', ['route' => 'admin.goal'])
                ->active('admin.goal.*');

            // News
            $menu->get('manageWebsite')
                ->add('News', ['route' => 'admin.news'])
                ->active('admin.news.*');

            // FAQs
            $menu->get('manageWebsite')
                ->add('FAQs', ['route' => 'admin.faq'])
                ->active('admin.faq.*');

            // Blocks
            $menu->get('manageWebsite')
                ->add('Blocks', ['route' => 'admin.block'])
                ->active('admin.block.*');

            // Pages
            $menu->get('manageWebsite')
                ->add('Pages', ['route' => 'admin.page'])
                ->active('admin.page.*');

            // Banners
            $menu->get('manageWebsite')
                ->add('Banners', ['route' => 'admin.banner'])
                ->active('admin.banner.*');

            // Manage Materials
            $menu->add('Manage Materials', '#')
                ->prepend('<i class="fa fa-list"></i> <span class="nav-label">')
                ->append('</span>');
            //->data('permission', 'access.admin.user.view|access.admin.role.view|access.admin.permission.view');

            // Material Group
            $menu->get('manageMaterials')
                ->add('Material Group', ['route' => 'admin.material-group'])
                ->active('admin.material-group.*');

            // Material Sub Group
            $menu->get('manageMaterials')
                ->add('Material Level', ['route' => 'admin.material-sub-group'])
                ->active('admin.material-sub-group.*');
            //->data('permission', 'access.admin.user.view');

            // Material
            $menu->get('manageMaterials')
                ->add('Material', ['route' => 'admin.material'])
                ->active('admin.material.*');

            // Subscription
            $menu->get('manageMaterials')
                ->add('Subscription', ['route' => ['admin.subscription.edit', 'id' => 30]])
                ->active('admin.material.*');

            // Manage Commissions
            $menu->add('Manage Commissions', '#')
                ->prepend('<i class="fa fa-list"></i> <span class="nav-label">')
                ->append('</span>');

            // User Commission
            $menu->get('manageCommissions')
                ->add('User Commissions', ['route' => 'admin.user-commission'])
                ->active('admin.user-commission.*');

            // Level
            $menu->get('manageCommissions')
                ->add('Levels', ['route' => 'admin.level'])
                ->active('admin.level.*');

            // User
            $menu->get('manageCommissions')
                ->add('Users', ['route' => 'admin.user'])
                ->active('admin.user.*');

            // Users Tree
            $menu->get('manageCommissions')
                ->add('Subscribers Tree', ['route' => 'admin.user.tree'])
                ->active('admin.user.tree*');

            //Manage User Commission
            $menu->get('manageCommissions')
                ->add('User Commission List', ['route' => 'admin.user.user_commission'])
                ->active('admin.user.*');


            // Manage E-Commerece
            $menu->add('E-Commerece', '#')
                ->prepend('<i class="fa fa-list"></i> <span class="nav-label">')
                ->append('</span>');

            // Manage Company Banks
            $menu->get('eCommerece')
                ->add('Manage Banks', ['route' => 'admin.bank'])
                ->active('admin.bank.*');

            // Manage Payments
            $menu->add('Payments', '#')
                ->prepend('<i class="fa fa-list"></i> <span class="nav-label">')
                ->append('</span>');

            // Manage Payment Profiles
            $menu->get('payments')
                ->add('Users Payment Profiles', ['route' => 'admin.payment-profile'])
                ->active('admin.payment-profile.*');

            // Manage Payment History
            $menu->get('payments')
                ->add('User Payments History', route('admin.payment-history'))
                ->active('admin.payment-history.*');


        })->filter(function ($item) {

            if (Auth::check()) {

                /*if(Auth::user()->hasRole('super-administrator'))
                {
                    return true;
                } else {
                    if(!empty($item->data('permission')) and Auth::user()->can($item->data('permission')) ) {
                        return true;
                    } elseif(empty($item->data('permission'))) {
                        return true;
                    } else {
                        return false;
                    }
                }*/
                return true;


            } else {
                return false;
            }

        });
        return $next($request);
    }
}
