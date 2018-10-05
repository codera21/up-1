<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ getenv('APP_NAME') }} :: @yield('page_title')</title>
    
    <!-- JQuery -->
    <script src="{{ asset('/jquery/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/jquery/jquery-migrate-1.0.0.min.js') }}"></script>

    <!-- Bootstrap Core -->
    <script src="{{ asset('/bootstrap-3.3.6/js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('/bootstrap-3.3.6/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('/font-awesome-4.6.3/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Inspinia Admin Theme -->
    <link href="{{ asset('/backend/inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/inspinia/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('/backend/inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('/backend/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/backend/inspinia/js/inspinia.js') }}"></script>
    <!--<script src="{{ asset('/backend/inspinia/js/plugins/pace/pace.min.js') }}"></script>-->

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        
        @yield('content')
        
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>