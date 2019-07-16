<!-- Head section Start -->
<?php
//dump(env('SITE'))
//?>
<header class="nav-header">
    <!-- Icon Section Start -->
    <div class="icon-section">
        <div class="container">
            <ul class="list-inline">
                <li class="ix-center">
                    <a href= <?php echo Session::get('facebook_url');?>> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                    </a>
                </li>
                <li class="ix-center">
                    <a href=<?php echo Session::get('twitter_url')?>> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                    </a>
                </li>
                <li class="ix-center">
                    <a href=<?php echo Session::get('instagram_url');?>> <i class="livicon" data-name="instagram" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                    </a>
                </li>
                <li class="ix-center">
                    <a href=<?php echo Session::get('youtube_url')?>> <i class="livicon" data-name="youtube" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                    </a>
                </li>
                <li class="pull-right">
                    <ul class="list-inline icon-position">
                    <!--<li>
                                <a href="mailto:"><i class="livicon" data-name="mail" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="mailto:" class="text-white">info@joshadmin.com</a></label>
                            </li>
                            <li>
                                <a href="tel:"><i class="livicon" data-name="phone" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="tel:"class="text-white">(703) 717-4200</a></label>
                            </li>-->
                        <li><a href="#"><i class="livicon" data-name="login" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a><label class=""><a href="{{ url('/locale/en') }}" class="text-white">{{ trans('English') }}</a></label></li>
                        <li><a href="#"><i class="livicon" data-name="login" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a><label class=""><a href="{{ url('/locale/fr') }}" class="text-white">{{ trans('French') }}</a></label></li>
                        @if (Auth::guest())
                            <li><a href="#"><i class="livicon" data-name="login" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a><label class=""><a href="{{ url('/login') }}" class="text-white">{{ trans('frontend.login') }}</a></label></li>
                        @if(env('SITE') == 'ENG')
                            <li><a href="#"><i class="livicon" data-name="register" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a><label class=""><a href="{{ url('/register/2') }}" class="text-white registerBlock">{{ trans('frontend.register') }}</a></label></li>
                            @else
                                <li><a href="#" ><i class="livicon" data-name="register" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a><label class=""><a href="{{ url('/register/345') }}" class="text-white registerBlock">{{ trans('frontend.register') }}</a></label></li>
                            @endif
                        @else
                            <li>
                                <a href="{{ route('user.dashboard') }}" class="text-white"><i class="glyphicon glyphicon-user"></i> {{ trans('frontend.dashboard') }}</a>
                            </li>


                            <li>




                                <!-- Drop Menus -->
                                <ul class="nav" id="account-nav">
                                    <li class="dropdown">

                                        <a class="dropdown-toggle disabled text-white" data-toggle="dropdown" href="#">
                                            Hello, {{ Auth::user()->first_name }} <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('user/'.Auth::user()->username) }}"><i class="glyphicon glyphicon-user"></i>{{trans('navigation.profile')}}</a></li>
                                            <li><a href="{{ route('user.account') }}"><i class="glyphicon glyphicon-cog"></i>{{trans('navigation.account_settings')}}</a></li>
                                            <li>
                                                <a href="{{ url('/logout') }}"  class="top-menu-bgcolor">
                                                    <i class="glyphicon glyphicon-off"></i> {{ trans('navigation.logout') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- End Drop Menus -->


                            </li>



                        <!--<li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" class="text-white">
                                        <i class="glyphicon glyphicon-off"></i> {{ trans('frontend.logout') }}
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                            </li>-->
                        @endif

                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- //Icon Section End -->
    <!-- Nav bar Section Start -->
@include('layouts.frontend.partials.navigation')
<!-- //Nav bar Section End -->
</header>
<!-- //Head section End -->