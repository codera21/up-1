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
        <div class="col-md-12">

            @include('layouts.frontend.partials.message')

            @yield('content')

        </div>
    </div>

</div>
@include('layouts.frontend.partials.footer')
</body>
</html>
