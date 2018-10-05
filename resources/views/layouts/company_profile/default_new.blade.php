<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.frontend.partials.head')
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700" rel="stylesheet">
    <!--end of font linking-->

    <!--Slick.js cdn-->
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!--end of slick.js cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>
    <style>

        /* Arrows */
        .slick-prev,
        .slick-next {
            font-size: 0;
            line-height: 0;

            position: absolute;
            top: 50%;

            display: block;

            width: 20px;
            height: 20px;
            padding: 0;
            -webkit-transform: translate(0, -50%);
            -ms-transform: translate(0, -50%);
            transform: translate(0, -50%);

            cursor: pointer;

            color: transparent;
            border: none;
            outline: none;
            background: transparent;
        }

        .slick-prev:hover,
        .slick-prev:focus,
        .slick-next:hover,
        .slick-next:focus {
            color: transparent;
            outline: none;
            background: transparent;
        }

        .slick-prev:hover:before,
        .slick-prev:focus:before,
        .slick-next:hover:before,
        .slick-next:focus:before {
            opacity: 1;
        }

        .slick-prev.slick-disabled:before,
        .slick-next.slick-disabled:before {
            opacity: .25;
        }

        .slick-prev:before,
        .slick-next:before {
            font-family: 'slick';
            font-size: 20px;
            line-height: 1;

            opacity: .75;
            color: white;

            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .slick-prev {
            left: -25px;
        }

        [dir='rtl'] .slick-prev {
            right: -25px;
            left: auto;
        }

        .slick-prev:before {
            content: '←';
        }

        [dir='rtl'] .slick-prev:before {
            content: '→';
        }

        .slick-next {
            right: -25px;
        }

        [dir='rtl'] .slick-next {
            right: auto;
            left: -25px;
        }

        .slick-next:before {
            content: '→';
        }

        [dir='rtl'] .slick-next:before {
            content: '←';
        }

        /* Dots */
        .slick-dotted.slick-slider {
            margin-bottom: 30px;
        }

        .slick-dots {
            position: absolute;
            bottom: -25px;

            display: block;

            width: 100%;
            padding: 0;
            margin: 0;

            list-style: none;

            text-align: center;
        }

        .slick-dots li {
            position: relative;

            display: inline-block;

            width: 20px;
            height: 20px;
            margin: 0 5px;
            padding: 0;

            cursor: pointer;
        }

        .slick-dots li button {
            font-size: 0;
            line-height: 0;

            display: block;

            width: 20px;
            height: 20px;
            padding: 5px;

            cursor: pointer;

            color: transparent;
            border: 0;
            outline: none;
            background: transparent;
        }

        .slick-dots li button:hover,
        .slick-dots li button:focus {
            outline: none;
        }

        .slick-dots li button:hover:before,
        .slick-dots li button:focus:before {
            opacity: 1;
        }

        .slick-dots li button:before {
            font-size: 20px;
            line-height: 20px;

            position: absolute;
            top: 0;
            left: 0;

            width: 20px;
            height: 20px;

            content: '•';
            text-align: center;

            opacity: .25;
            color: black;

            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .slick-dots li.slick-active button:before {
            opacity: .75;
            color: black;
        }

    </style>
    <style>
        body {
            background: #F9F9F9;
        }

        .jumbotron {
            background-image: url('{{asset("css/office.jpg") }}');
            -webkit-filter: grayscale(20%);
            filter: grayscale(20%);
            height: 600px;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .jumbotron .text-white {
            font-size: 15rem;
            text-align: center;
            font-weight: 700;
            padding-bottom: 50px;
            padding-top: 1.5em;
            line-height: 37px;
            font-family: 'Roboto', sans-serif;
            color: #000 !important;
        }

        .jumbotron .text-blue {
            text-align: center;
            font-size: 4rem !important;
            font-weight: 600;
            line-height: 57px;
            letter-spacing: 5px;
            size: 57px;
            font-family: 'Poppins', sans-serif;
            color: #000 !important;
        }

        /*html css */
        .text-description {
            padding-top: 2.6rem;
            text-align: center;
            margin-top: 73px;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 2px;
            line-height: 40px;
            font-size: 3rem;
            font-weight: 600;
        }

        .paragraph-content {
            padding-bottom: 3rem;
        }

        .desc, .testo {
            background-color: #ffffff;
        }

        .desc-paragraph {
            font-size: 1.8rem;
            letter-spacing: 2px;
            margin: 0 7%;
            font-family: 'Roboto', sans-serif;
        }

        .for-center {
            margin-left: 24%;
            margin-right: 29%;
            font-size: 18px;
            padding-bottom: 14px;
        }

        .one {
            font-size: 16px;
        }

        .photo-section {
            width: auto;
            height: auto;
            text-align: center;
            padding: 0 0 40px 0;
        }

        .testo-content {
            background-color: #F9F9F9;
        }

        .text-testo {
            padding-bottom: 0px;
            font-weight: 600;
            margin-top: 10px;
            font-size: 3rem;
        }

        hr {
            border: 2px solid #02c6d8;
            margin: 24px auto 30px;
            width: 60px;
        }

        /*contact section css*/
        .text-contact {
            font-size: 3rem;
            padding-top: 0.8rem;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 2px;
            line-height: 40px;
            font-weight: 600;
        }

        .contact-box {
            padding-bottom: 3rem;
            text-align: center;
        }

        .contact-section {
            height: auto;
            width: 100%;
            background-color: #ffffff;
        }

        .info h3 {
            font-size: 2rem;
            font-family: 'Roboto', sans-serif;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .info p {
            font-size: 15px;
            font-weight: 400;
            letter-spacing: 2px;
        }

        .btn-next-prev {
            border-radius: 30px;
            position: relative;
            top: -188px;
            color: #F9F9F9;
            opacity: 0.5;

        }

        button:hover {
            opacity: 1;
        }

        .next {
            margin-right: 11%;
            float: right;
        }

        .previous {
            margin-left: 7.7%;
        }

        .gal-color, .contact-section {
            background-color: #F9F9F9;
            padding-bottom: 2rem;
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: .7;
        }

        .for-name {
            color: #00c0ef;
            font-weight: bold;
        }


    </style>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>


</head>
<body>


@include('layouts.frontend.partials.header')

@include('layouts.frontend.partials.breadcrumbs')


@yield('profile')


<script>
    $('.autoplay').slick({
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        prevArrow: $('.previous'),
        nextArrow: $('.next'),
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
</script>

@include('layouts.frontend.partials.footer')

</body>
</html>
