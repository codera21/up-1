<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @yield('page_title')
  </h1>
        @if (Breadcrumbs::renderIfExists())
            {!! Breadcrumbs::render() !!}
        @endif
</section>