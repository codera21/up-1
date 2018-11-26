<!-- Basic -->

<meta charset="utf-8">

<meta https-equiv="X-UA-Compatible" content="IE=edge">





<meta name="robots" content="noindex,nofollow">





<title>{{ getenv('APP_NAME') }} :: @yield('page_title')</title>



<!-- CSRF Token -->

<meta name="csrf-token" content="{{ csrf_token() }}">



<!-- Scripts -->

<script>

    window.Laravel = <?php echo json_encode([

        'csrfToken' => csrf_token(),

    ]); ?>

</script>



<!-- JQuery -->

<script src="{{ asset('/jquery/jquery-2.1.4.min.js') }}"></script>

<script src="{{ asset('/jquery/jquery-migrate-1.0.0.min.js') }}"></script>



<!-- jQery UI -->

<script src="{{ asset('/jquery-ui-1.12.1/jquery-ui.js') }}"></script>



<!-- Bootstrap Core -->

<script src="{{ asset('/bootstrap-3.3.6/js/bootstrap.min.js') }}"></script>

<link href="{{ asset('/bootstrap-3.3.6/css/bootstrap.min.css') }}" rel="stylesheet">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">




<!-- Theme CSS -->

<link rel="stylesheet" href="{{ asset('/frontend/josh/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('/frontend/josh/css/custom.css') }}">

<link rel="stylesheet" href="{{ asset('/frontend/josh/css/blog.css') }}">

<link rel="stylesheet" href="{{ asset('/frontend/josh/css/tabbular.css') }}">

<link rel="stylesheet" href="{{ asset('/frontend/josh/css/features.css') }}">

<link rel="stylesheet" href="{{ asset('/frontend/josh/css/panel.css') }}">

<link rel="stylesheet" href="{{ asset('/frontend/josh/css/news.css') }}">

<link rel="stylesheet" href="{{ asset('/frontend/josh/css/timeline.css') }}">





<!-- 

/*

|--------------------------------------------------------------------------

| Josh Theme (END)

|--------------------------------------------------------------------------

*/

-->





<!-- Mobile Metas -->

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">



<!-- Web Fonts  -->

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">



<!-- Vendor CSS -->

<link rel="stylesheet" href="{{ asset('/frontend/josh/vendors/font-awesome/css/font-awesome.css') }}">

<link rel="stylesheet" href="{{ asset('/frontend/josh/vendors/owl-carousel/owl.carousel.css') }}">

<link rel="stylesheet" href="{{ asset('/frontend/josh/vendors/owl-carousel/owl.theme.css') }}">



<!--JQuery Validation-->

<!--<link href="{{ asset('/plugins/validation/css/style.css') }}" media="all" type="text/css" rel="stylesheet"/>-->

<script type="text/javascript" src="{{ asset('/plugins/validation/js/jquery.validate.js') }}"></script>

<script type="text/javascript" src="{{ asset('/plugins/validation/js/additional-methods.js') }}"></script>

<script type="text/javascript" src="{{ asset('/plugins/validation/js/jquery.metadata.js') }}"></script>



<!-- JQery Alphanum -->

<script src="{{ asset('/plugins/alphanum/jquery.alphanum.js') }}"></script>



<!--JQuery BlockUi-->

<script type="text/javascript" src="{{ asset('/plugins/jquery.blockUI.js') }}"></script>



<!-- Bootstrap Datepicker -->

<script src="{{ asset('/plugins/moment/moment.js') }}" type='text/javascript'></script>

<link href="{{ asset('/backend/admin-lte/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css"/>

<script src="{{ asset('/backend/admin-lte/plugins/datepicker/bootstrap-datepicker.js') }}" type='text/javascript'></script>



<!-- Bootstrap Daterangepicker -->

<link href="{{ asset('/backend/admin-lte/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>

<script src="{{ asset('/backend/admin-lte/plugins/daterangepicker/daterangepicker.js') }}" type='text/javascript'></script>



<!-- JQuery Grid -->

<link href="{{ asset('/plugins/grid/css/grid.css') }}" rel="stylesheet">

<script src="{{ asset('/plugins/grid/js/jquery.query-2.1.7.js') }}"></script>

<script src="{{ asset('/plugins/grid/js/jquery.grid.js') }}"></script>



<!-- Bootstrap iCheck -->

<link href="{{ asset('/backend/admin-lte/plugins/iCheck/all.css') }}" rel="stylesheet">

<script src="{{ asset('/backend/admin-lte/plugins/iCheck/icheck.min.js') }}"></script>



<!-- Bootstrap Chosen -->

<link href="{{ asset('/plugins/chosen/chosen.css') }}" rel="stylesheet" type="text/css"/>

<script src="{{ asset('/plugins/chosen/chosen.jquery.js') }}" type='text/javascript'></script>





<!--JQuery PNotify-->

<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/pnotify/pnotify.custom.min.css') }}" media="all" />

<script src="{{ asset('/plugins/pnotify/pnotify.custom.min.js') }}"></script>



<!-- JQuery Sweat Alert -->

<script src="{{ asset('/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/sweetalert/dist/sweetalert.css') }}">



<!--JQuery Chained-->

<script src="{{ asset('/plugins/chained/jquery.chained.js') }}"></script>

<script src="{{ asset('/plugins/chained/jquery.chained.remote.js') }}"></script>



<!-- JQuery Payment -->

<script src="{{ asset('/plugins/jquery.payment.js') }}"></script>



<!-- JQuery Common -->

<script src="{{ asset('/plugins/common.js') }}"></script>



<!-- Tree Style & Script -->

<link href="{{ asset('/frontend/css/tree.css') }}" rel="stylesheet">

<script src="{{ asset('/frontend/js/tree.js') }}"></script>



<!-- Style & Script -->

<link href="{{ asset('/frontend/css/style.css') }}" rel="stylesheet">

<script src="{{ asset('/frontend/js/script.js') }}"></script>



<!--global js starts-->

    <script src="{{ asset('/frontend/josh/js/raphael.js') }}"></script>

    <script src="{{ asset('/frontend/josh/js/livicons-1.4.min.js') }}"></script>

    <script src="{{ asset('/frontend/josh/js/josh_frontend.js') }}"></script>

    <!--global js end-->





    <script src="{{ asset('/frontend/josh/js/jquery.circliful.js') }}"></script>

    <script src="{{ asset('/frontend/josh/vendors/owl-carousel/owl.carousel.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/frontend/josh/js/carousel.js') }}"></script>

    <script src="{{ asset('/frontend/josh/js/index.js') }}"></script>

    <!--CKEditor-->

<script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>

<script src="{{ asset('/plugins/ckeditor/config.js') }}"></script>



<!-- PayPal Express CheckOut-->

@stack('scripts')

