<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
     
        View::composer('layouts.frontend.partials.ads-banner.banner-728-90', 'App\Http\ViewComposers\AdsBannerComposer');
        View::composer('layouts.frontend.partials.ads-banner.banner-see-more-ads', 'App\Http\ViewComposers\AdsBannerComposer');
        View::composer('layouts.frontend.partials.ads-banner.banner-see-more-text', 'App\Http\ViewComposers\AdsBannerComposer');
        View::composer('layouts.frontend.partials.ads-banner.banner-300-250', 'App\Http\ViewComposers\AdsBannerComposer');
        View::composer('layouts.frontend.partials.ads-banner.banner-160-600', 'App\Http\ViewComposers\AdsBannerComposer');
        View::composer('layouts.frontend.partials.ads-banner.banner-text-banner', 'App\Http\ViewComposers\AdsBannerComposer');
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        
    }
    
    
}
