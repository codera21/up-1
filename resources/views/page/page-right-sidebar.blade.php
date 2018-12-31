@extends('layouts.frontend.home_page')

@section('page_title')
    {{ trans('Home') }}
@endsection

@section('content')

    <div class="main-wrapper">
        <!-- added by a21 -->
        <div class="main-content">

            <div class="hero-wrapper-one">
                <video class="visible-desktop" id="hero-vid" poster="" autoplay
                       loop muted>
                    <source type="video/mp4"
                            src="https://video.wixstatic.com/video/ea71bb_f91b98dc21b449f08046b5de2a2922e8/1080p/mp4/file.mp4">
                </video>
                <div class="hero-content">
                    <div class="hero-subheading">{{ __('home_page.subheading')}}</div>
                    <div class="hero-heading">{{ __('home_page.heading')}}</div>
                    <div class="btn hero-button">
                        <a href="{{ url('register/2') }}" class="btn-black">{{ __('home_page.SignUp')}}</a>
                    </div>
                </div>
            </div>

            <section class="about-us section-light">
                <div class="about-us-content">
                    <div class="text col-md-6">
                        <div style="width: 70%; margin: auto;">
                            <hr class="hr-1">
                            <p class="heading-2"
                               style="font-size: 42px; font-weight: 400; line-height: 50.4px;  margin-bottom: 20px; text-align: center;
                           font-family: 'Raleway', sans-serif;">
                                {{ __('home_page.AboutUs')}}
                            </p>
                            <p style="font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 25.5px ">
                                {!! __('home_page.AboutUsDescription') !!}
                            </p>
                            <p style="text-align: center; margin-top: 20px;">
                                <a href="https://www.youtube.com/watch?v=OLSqdQCzCgo&t=2s" target="_blank"
                                   class=" btn-black">{{__('home_page.Watch')}}</a>
                            </p>

                        </div>
                    </div>

                    <div class=" col-md-6">
                        <img class="img img-responsive" style="height: 571px; width: 810px; margin-left: 15px"
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
                                <h3 style="font-weight: 900; color: black; margin-top: 50px;">{{ __('home_page.EntrepreneurshipWith') }}
                                    <br>
                                    DNAsbook Digital Marketing </h3>
                            </div>
                            <div class="col-md-6 right-side">
                                <p style="font-family: 'Open Sans', sans-serif; font-size: 15px; line-height: 1.5em ">
                                    {{ __('home_page.HowWeCanHelpYouDescription') }}
                                </p>
                                <div class="btn">
                                    <a href="{{ url('register/2') }}"
                                       class="btn-lt-blue">{{ __('home_page.SignUpNow') }}!</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

        </div>
        <!-- end of addition -->
    </div>

    <div class="pre-footer" style="background-color: #57BBBF; padding: 250px;">
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

