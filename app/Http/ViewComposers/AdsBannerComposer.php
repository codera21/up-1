<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\BannerRepository;
use Request;

class AdsBannerComposer
{
    /**
     * The adsbanner repository implementation.
     *
     * @var SettingRepository
     */
    protected $banner;

    /**
     * Create a new maintenance composer.
     *
     * @param  BannerRepository  $setting
     * @return void
     */
    public function __construct(BannerRepository $banner)
    {
        // Dependencies automatically resolved by service container...
        $this->banner = $banner;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $url = Request::url();
        $banner = $this->banner->findByField('page', $url, ['banner_728_90', 'see_more_ads', 'see_more_text', 'banner_300_250', 'banner_160_600', 'text_banners'])->first();

        if($banner){
            $view->with('banner_728_90', $banner->banner_728_90);
            $view->with('banner_see_more_ads', $banner->see_more_ads);
            $view->with('banner_see_more_text', $banner->see_more_text);
            $view->with('banner_300_250', $banner->banner_300_250);
            $view->with('banner_160_600', $banner->banner_160_600);
            $view->with('banner_text_banners', $banner->text_banners);
        }
        
    }
}