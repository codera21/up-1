@extends('layouts.company_profile.default_new')
@section('profile')
    <div class="jumbotron" style="background-image: url('{{ $company_data->photo_url }}')">
        <div class="container">
            <p class="text-white">{{ $company_data->name }}</p>
            <p class="text-blue">{{ $company_data->company_moto }}</p>
        </div>
    </div>
    <div class="desc">
        <h1 class="text-dark text-description">{{$company_data->company_description_title}}</h1>
        <hr>
        <div class="paragraph-content container">
            <p class="text-dark desc-paragraph"><span>
                    {!! $company_data->description !!}
           </span></p>
        </div>

    </div>
    <!--gallery-->
    <div class="company-gallery">
        <div class="gal-color">
            <h1 class="text-description text-testo">{{$company_data->company_image_title}}</h1>
            <hr>
            {{--<div class="autoplay container">
                @foreach($company_photo as $item)
                <div class="">
                    <a data-fancybox="images"
                       href="{{$item->photo_url}}"><img
                                id="myImg"
                                src="{{$item->photo_url}}"
                                alt="" width="350px" height="20%"></a></div>
                @endforeach
            </div>--}}
            <div class="row">
                <div class="row">
                    @foreach($company_photo as $item)
                        <div class="col-lg-3 col-md-6 col-xs-6">
                            <a class="thumbnail" href="{{$item->pic_url}}">
                                <img class="img-thumbnail"
                                     src="{{$item->photo_url}}"
                                     alt="Another alt text">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        {{--<button class="btn btn-primary btn-next-prev previous"><span class="glyphicon glyphicon-menu-left"></span></button>--}}
        {{--<button class="btn btn-primary btn-next-prev next"><span class="glyphicon glyphicon-menu-right"></span></button>--}}
        <!--end of gallery-->
            <div class="testo">
                <div class="container">
                    <h1 class="text-description text-testo">Testomonials</h1>
                    <hr>
                    <h5 style="font-weight: bold" class="text-center">See, what other say about us</h5>
                    <br>
                    @foreach($testo_data as $testo)
                        <div class="row" style="font-size: 1.3em; padding: 1em 0;">

                            <div class="text-dark text-center">
                                {{$testo->testomonial}} <span class="for-name">- by: {{$testo->name}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="contact-section container">
                <h1 class="text-dark text-contact">Contact Us</h1>
                <hr>
                <div class="contact-box">
                    <div class="row info" style="background-color: #F9F9F9">
                        <div class="email col-lg-4">
                            <h3>Email</h3>
                            <p style="text-align: center">{{$company_data->email }}</p>
                        </div>
                        <div class="contact col-lg-4">
                            <h3>Contact info</h3>
                            <p style="text-align: center"> {{ $company_data->contact }} </p>
                        </div>
                        <div class="address col-lg-4">
                            <h3>Address</h3>
                            <p style="text-align: center">{{ $company_data->address}} </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h4 style="color: black">Follow us</h4>
                <div class="row">
                    <a href="{{$user->twitter_url}}" class="btn btn-social-icon btn-twitter btn-lg"
                       style="font-size: 200%;">
                        <span class="fa fa-twitter"></span>
                    </a>
                    <a href="{{$user->facebook_url}}" class="btn btn-social-icon btn-facebook btn-lg"
                       style="font-size: 200%;">
                        <span class="fa fa-facebook"></span>
                    </a>
                    <a href="{{$user->instagram_url}}" class="btn btn-social-icon btn-instagram btn-lg"
                       style="font-size: 200%;">
                        <span class="fa fa-instagram"></span>
                    </a>
                    <a href="{{$user->snapchat_url}}" class="btn"><span class='fab fa-snapchat'
                                                                        style="font-size: 200%"></span></a>
                </div>
            </div>
@endsection
