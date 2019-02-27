<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.frontend.partials.head')
    @include('layouts.backend.partials.head')

</head>
<style>
    @import url("https://fonts.googleapis.com/css?family=Lato");
    @import url("https://fonts.googleapis.com/css?family=Anton");
    @import url('https://fonts.googleapis.com/css?family=Raleway:900');
    @import url('https://fonts.googleapis.com/css?family=Raleway:900|Work+Sans:200');
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:300');

    html,
    body {
        height: 100%;
        margin: 0;
    }

    .nav-header {
        background-color: #fff !important;
    }

    .main-content {
        height: 100%;
        margin: 0;
        font-size: 16px;
        font-family: 'Lato', sans-serif;
        font-weight: 400;
        line-height: 1.8em;
        color: #000;
    }

    .btn-black {
        background-color: #000;
        color: #fff !important;
        border: none;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        -webkit-transition: all .8s;
        transition: all .8s;
    }

    .btn-black:hover {
        background-color: rgba(255, 255, 255, 0.4);
        /* Green */
        color: #000 !important;
        outline: 2px solid #000;
    }

    .btn-lt-blue {
        background-color: #57BBBF;
        color: #fff !important;
        border: none;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        -webkit-transition: all .8s;
        transition: all .8s;
    }

    .btn-lt-blue:hover {
        background-color: rgba(255, 255, 255, 0.4);
        /* Green */
        color: #000 !important;
        outline: 2px solid #57BBBF;
    }

    .hero-wrapper-one {

        /*overflow: hidden;
        position: relative;
        width: 100%;
        background-image: url("../img/2.webp");
        background-attachment: fixed;
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;*/

    }

    .hero-wrapper-two {

        padding-top: 10px;
        padding-bottom: 10px;
        overflow: hidden;
        position: relative;
        width: 100%;
        background-image: url("https://static.wixstatic.com/media/84770f_0cf5b6c1550a4b8c92f92f1064cc68de~mv2.jpg/v1/fill/w_1900,h_1074,al_c,q_85/84770f_0cf5b6c1550a4b8c92f92f1064cc68de~mv2.webp");
        background-attachment: fixed;
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;

    }

    .hero-wrapper-three {

        padding-top: 10px;
        padding-bottom: 10px;
        overflow: hidden;
        position: relative;
        width: 100%;
        background-image: url("https://static.wixstatic.com/media/ea71bb_e7959a5be116482b9727a9be900d2d35~mv2_d_5454_3840_s_4_2.jpg");
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;

    }

    .hero-content {
        text-align: center;
        height: 100%;
        padding: 8% 0 13% 0;
    }

    .hero-subheading {
        letter-spacing: 0.18em;
        line-height: 1.4em;
        margin: 20px 0;
        font-size: 2rem;
        font-weight: lighter;
    }

    .hero-heading {
        line-height: 1em;
        letter-spacing: 23px;
        font-weight: 900;
        font-size: 14rem;
    }

    .hero-button {
        margin: 2rem 0;
    }

    .card-container {

        background-color: #fff;
        width: 60%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
        margin-bottom: 60px;
        padding: 5rem 4rem;
        color: #555;

    }

    .hr-1 {
        display: block;
        margin-top: 50px;
        margin-left: 150px;
        margin-right: 120px;
        margin-bottom: 10px;
        /*border-style: inset;*/
        border-color: black;
        border-width: 1.5px;

    }

    .hr-2 {
        display: block;
        margin-top: 50px;
        margin-bottom: 0px;
        margin-left: 620px;
        margin-right: 580px;
        /*border-style: inset;*/
        border-color: black;
        border-width: 1.5px;

    }

    .heading-2 {
        font-size: 52px;
        font-weight: 400;
        line-height: 50.4px;
        margin-bottom: 20px;
        margin-left: 100px;
        font-family: 'Raleway', sans-serif;
    }

    .heading-2-top {
        line-height: 1.2em;
    }

    .left-side, .right-side {
        text-align: center;
    }

    .left-side > span {
        font-weight: lighter;
        line-height: 2em;
    }

    .right-side {
        border-left: 1.5px solid #000;
    }

    .right-side > p {
        line-height: 1.4em;
        font-family: Arial, sans-serif;
        font-size: .9em;

    }

    .right-side > .btn {
        margin: 5rem 0 0 0;
    }

    .heading-3 {
        font-family: 'Lato', sans-serif;
        font-size: 2rem;
        letter-spacing: 4px;
        text-transform: uppercase;
        font-weight: 500;

    }

    #hero-vid {
        position: fixed;
        width: 100%;
        top: 5px;
        z-index: -999;

    }

    .about-us-content > .col-md-6 {
        background-color: #fff !important;
    }

    .about-us-content > .text {
        height: 571px;
        background-color: #fff !important;
    }
</style>
<body>
@include('layouts.user_backend.partials.header')
<div class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        {{--@include('layouts.backend.partials.header')--}}
        @include('layouts.user_backend.partials.sidebar-navigation')
        <div class="content-wrapper">
        @include('layouts.backend.partials.breadcrumbs')
            <div class="section">
                @yield('content')
            </div>
        </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
</div>
@include('layouts.frontend.partials.footer')

</body>
</html>
