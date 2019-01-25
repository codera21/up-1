@extends('layouts.frontend.home_page')

@section('page_title')
    {{ trans('Home') }}
@endsection

@section('content')
    <div class="main-wrapper">
        <!-- added by a21 -->
        <div class="main-content">

            <div class="hero-wrapper-one">
                <div class="video-content">
                    <video class="visible-desktop" id="hero-vid" poster="" autoplay
                           loop muted style="width: 100%">
                        <source type="video/mp4"
                                src="https://video.wixstatic.com/video/ea71bb_f91b98dc21b449f08046b5de2a2922e8/1080p/mp4/file.mp4">
                    </video>
                </div>
                <div class="hero-content">
                    <div class="hero-subheading">{{ __('home_page.subheading')}}</div>
                    <div class="hero-heading">{{ __('home_page.heading')}}</div>
                    <div class="btn hero-button">
                        @if(env('SITE') == 'ENG')
                        <a href="{{ url('register/2') }}" class="btn-black">{{ __('home_page.SignUp')}}</a>
                            @else
                            <a href="{{ url('register/345') }}" class="btn-black">{{ __('home_page.SignUp')}}</a>
                            @endif
                    </div>
                </div>
            </div>

            <section class="about-us section-light">
                <div class="about-us-content">
                    <div class="text col-md-6">
                        <div class="about-heading-pra" style="">
                            <hr class="hr-1">
                            <p class="heading-2"
                               style="font-size: 42px; font-weight: 400; line-height: 50.4px;  margin-bottom: 20px; text-align: center;
                           font-family: 'Raleway', sans-serif;">
                                {{ __('home_page.AboutUs')}}
                            </p>
                            <p class="about-us-description" style="font-family: 'Open Sans', sans-serif;">
                                {!! __('home_page.AboutUsDescription') !!}
                            </p>
                            <p style="text-align: center; margin-top: 20px;">
                                <a href="https://www.youtube.com/watch?v=OLSqdQCzCgo&t=2s" target="_blank"
                                   class=" btn-black">{{__('home_page.Watch')}}</a>
                            </p>

                        </div>
                    </div>

                    <div class=" col-md-6">
                        <img class="img img-responsive" id="big-logo-img" style=""
                             src="{{URL::asset('images/Logo.jpeg')}}"/>
                    </div>
                </div>
            </section>


            <section class="services section-transparent">

                <div class="hero-wrapper-two">

                    <div class="heading-2">
                        <hr class="hr-2"/>
                        <div style="text-transform: uppercase"
                             class="heading-2-top text-center">{{ __('home_page.HowWeCan') }}</div>
                        <div class="heading-2-bottom text-center">{{ __('home_page.HelpYou') }}</div>

                    </div>

                    <div class="card-container">
                        <div class="row">
                            <div class="col-md-6 left-side">
                                <h3 class="enterp-with" style="">{{ __('home_page.EntrepreneurshipWith') }}
                                    <br>
                                    DNAsbook Digital Marketing </h3>
                            </div>
                            <div class="col-md-6 right-side">
                                <p style="font-family: 'Open Sans', sans-serif; font-size: 15px; line-height: 1.5em ">
                                    {{ __('home_page.HowWeCanHelpYouDescription') }}
                                </p>
                                <div class="btn">
                                    @if(env('SITE') == 'ENG')
                                    <a href="{{ url('register/2') }}"
                                       class="btn-lt-blue">{{ __('home_page.SignUpNow') }}!</a>
                                        @else
                                        <a href="{{ url('register/345') }}"
                                           class="btn-lt-blue">{{ __('home_page.SignUpNow') }}!</a>
                                        @endif
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

        </div>
        <!-- end of addition -->
    </div>

    <div class="pre-footer" style="background-color: #57BBBF; padding: 250px 0;">
    </div>

    <script>
        // added by a21
        $(document).ready(function () {
            $(window).scroll(function (event) {
                var x = ($(this).scrollTop() - 50) / 10;
                var y = ($(this).scrollTop() - 770) / 10;
                var z = ($(this).scrollTop() - 50) / 10;


                $('.hero-wrapper-one').css('background-position', '0% ' + parseInt(-x) + 'px');
                $('.hero-wrapper-two').css('background-position', '0% ' + parseInt(-y) + 'px');
                $('#hero-vid').css('top', parseInt(-z) + 'px');
            });
        });

    </script>
@endsection

