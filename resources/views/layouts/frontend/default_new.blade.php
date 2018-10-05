<!DOCTYPE html>
<html lang="en">
<head>

        @include('layouts.frontend.partials.head')

</head>
<body>
    
    
        
        @include('layouts.frontend.partials.header')
                
        @include('layouts.frontend.partials.breadcrumbs')
                 
                <div class="container">

                        <div class="row">
                            <div class="col-md-2">@include('layouts.frontend.partials.ads-banner.banner-160-600')</div>
                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-md-12">@include('layouts.frontend.partials.ads-banner.banner-728-90')</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">@include('layouts.frontend.partials.ads-banner.banner-see-more-ads')</div>
                                    <div class="col-md-3">@include('layouts.frontend.partials.ads-banner.banner-300-250')</div>
                                    <div class="col-md-3">@include('layouts.frontend.partials.ads-banner.banner-text-banner')</div>
                                    <div class="col-md-3">@include('layouts.frontend.partials.ads-banner.banner-see-more-text')</div>
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                            
                                            @include('layouts.frontend.partials.message')    
                                            
                                            @yield('content')

                                        </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">@include('layouts.frontend.partials.ads-banner.banner-728-90')</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">@include('layouts.frontend.partials.ads-banner.banner-see-more-ads')</div>
                                    <div class="col-md-3">@include('layouts.frontend.partials.ads-banner.banner-300-250')</div>
                                    <div class="col-md-3">@include('layouts.frontend.partials.ads-banner.banner-text-banner')</div>
                                    <div class="col-md-3">@include('layouts.frontend.partials.ads-banner.banner-see-more-text')</div>
                                </div>                                 
                                
                            </div>

                            <div class="col-md-2">@include('layouts.frontend.partials.ads-banner.banner-160-600')</div>
                        </div>


                </div>
                           
        	
         @include('layouts.frontend.partials.footer')
	
        
</body>
</html>
