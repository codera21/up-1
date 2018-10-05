<?php

namespace App\Http\Middleware;

use Closure;
use Breadcrumbs;

class BackendBreadcrumbs
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
        // Dashboard
        Breadcrumbs::register('admin.dashboard', function($breadcrumbs)
        {
            $breadcrumbs->push('Dashboard', route('admin.dashboard'));
        });

        // Dashboard > Material Group
        Breadcrumbs::register('admin.material-group', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Material Group', route('admin.material-group'));
        });

        // Dashboard > Material Group > Add Material Group
        Breadcrumbs::register('admin.material-group.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.material-group');
            $breadcrumbs->push('Add Material Group');
        });

        // Dashboard > Material Group > Edit Material Group
        Breadcrumbs::register('admin.material-group.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.material-group');
            $breadcrumbs->push('Edit Material Group');
        });

        // Dashboard > Material Sub Group
        Breadcrumbs::register('admin.material-sub-group', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Material Level', route('admin.material-sub-group'));
        });

        // Dashboard > Material Sub Group > Add Material Sub Group
        Breadcrumbs::register('admin.material-sub-group.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.material-sub-group');
            $breadcrumbs->push('Add Material Level');
        });

        // Dashboard > Material Sub Group > Edit Material Sub Group
        Breadcrumbs::register('admin.material-sub-group.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.material-sub-group');
            $breadcrumbs->push('Edit Material Level');
        });

        // Dashboard > Material
        Breadcrumbs::register('admin.material', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Material', route('admin.material'));
        });

        // Dashboard > Material > Add Material
        Breadcrumbs::register('admin.material.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.material');
            $breadcrumbs->push('Add Material');
        });

        // Dashboard > Material > Edit Material
        Breadcrumbs::register('admin.material.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.material');
            $breadcrumbs->push('Edit Material');
        });

        // Dashboard > Material > Edit Subscription
        Breadcrumbs::register('admin.subscription.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.material');
            $breadcrumbs->push('Edit Subscription Fee');
        });

        // Dashboard > Goals
        Breadcrumbs::register('admin.goal', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage Goals', route('admin.goal'));
        });

        // Dashboard > Manage Goals > Add Goal
        Breadcrumbs::register('admin.goal.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.goal');
            $breadcrumbs->push('Add Goal');
        });

        // Dashboard > Manage Goals > Edit Goal
        Breadcrumbs::register('admin.goal.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.goal');
            $breadcrumbs->push('Edit Goal');
        });

         // Dashboard > Manage News
        Breadcrumbs::register('admin.news', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage News', route('admin.news'));
        });

        // Dashboard > Manage News > Add News
        Breadcrumbs::register('admin.news.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.news');
            $breadcrumbs->push('Add News');
        });

        // Dashboard > Manage News > Edit News
        Breadcrumbs::register('admin.news.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.news');
            $breadcrumbs->push('Edit News');
        });

        // Dashboard > Manage FAQs
        Breadcrumbs::register('admin.faq', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage FAQs', route('admin.faq'));
        });

        // Dashboard > Manage FAQs > Add FAQs
        Breadcrumbs::register('admin.faq.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.faq');
            $breadcrumbs->push('Add FAQs');
        });

        // Dashboard > Manage FAQs > Edit FAQs
        Breadcrumbs::register('admin.faq.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.faq');
            $breadcrumbs->push('Edit FAQs');
        });


        // Dashboard > Manage Blocks
        Breadcrumbs::register('admin.block', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage Blocks', route('admin.block'));
        });

        // Dashboard > Manage Blocks > Add Block
        Breadcrumbs::register('admin.block.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.block');
            $breadcrumbs->push('Add Block');
        });

        // Dashboard > Manage Blocks > Edit Block
        Breadcrumbs::register('admin.block.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.block');
            $breadcrumbs->push('Edit Block');
        });

        // Dashboard > Manage Pages
        Breadcrumbs::register('admin.page', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage Pages', route('admin.page'));
        });

        // Dashboard > Manage Pages > Add Page
        Breadcrumbs::register('admin.page.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.page');
            $breadcrumbs->push('Add Page');
        });

        // Dashboard > Manage Pages > Edit Page
        Breadcrumbs::register('admin.page.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.page');
            $breadcrumbs->push('Edit Page');
        });

        // Dashboard > Manage Banners
        Breadcrumbs::register('admin.banner', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage Banners', route('admin.banner'));
        });

        // Dashboard > Manage Banners > Add Banner
        Breadcrumbs::register('admin.banner.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.banner');
            $breadcrumbs->push('Add Banner');
        });

        // Dashboard > Manage FAQs > Edit FAQs
        Breadcrumbs::register('admin.banner.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.banner');
            $breadcrumbs->push('Edit Banner');
        });

        // Dashboard > Manage Levels
        Breadcrumbs::register('admin.level', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage Levels', route('admin.level'));
        });

        // Dashboard > Manage Levels > Add Level
        Breadcrumbs::register('admin.level.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.level');
            $breadcrumbs->push('Add Level');
        });

        // Dashboard > Manage FAQs > Edit FAQs
        Breadcrumbs::register('admin.level.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.level');
            $breadcrumbs->push('Edit Level');
        });

        // Dashboard > Manage Users
        Breadcrumbs::register('admin.user', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage Users', route('admin.user'));
        });

        // Dashboard > Manage Users > User Details
        Breadcrumbs::register('admin.user.detail', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.user');
            $breadcrumbs->push('User Details', route('admin.user'));
        });

        // Dashboard > User Commission
        Breadcrumbs::register('admin.user-commission', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('User Commission', route('admin.user-commission'));
        });

        // Dashboard > User Commission > Add User Commission
        Breadcrumbs::register('admin.user-commission.add', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.user-commission');
            $breadcrumbs->push('Pay Commission');
        });

        // Dashboard > User Commission > Edit
        Breadcrumbs::register('admin.user-commission.edit', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.user-commission');
            $breadcrumbs->push('Edit User Commission');
        });

        // Dashboard > Users Tree View
        Breadcrumbs::register('admin.user.tree', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Users Tree View', route('admin.user.tree'));
        });

        // Dashboard > Profile
        Breadcrumbs::register('admin.manage-profile', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage Profile');
        });

        // Dashboard > Banks
        Breadcrumbs::register('admin.bank', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Manage Banks');
        });

        // Home > Payment History
        Breadcrumbs::register('admin.payment-history', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('User Payments History', route('admin.payment-history'));
        });

        // Home > Payment History > Details
        Breadcrumbs::register('admin.payment-history.detail', function($breadcrumbs)
        {
            $breadcrumbs->parent('admin.payment-history');
            $breadcrumbs->push('Details');
        });
        
        return $next($request);
    }
}
