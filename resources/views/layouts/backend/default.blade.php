<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.backend.partials.head')

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('layouts.backend.partials.header')

    @include('layouts.backend.partials.sidebar-navigation')

    <div class="content-wrapper">
    @include('layouts.backend.partials.breadcrumbs')
    <!-- Main content -->
        <section class="content">

        @include('layouts.backend.partials.message')

        <!-- Actual Page Content-->
            <div id="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <p class="clearfix"></p>

                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('layouts.backend.partials.footer')

</div><!-- ./wrapper -->

<!-- ./wrapper -->

</body>
</html>
