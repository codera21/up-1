<div class="breadcum">
        <div class="container">
            
            @if (Breadcrumbs::renderIfExists())

                @php
                    $breadcrumbs = Breadcrumbs::generate();

                @endphp

                @if (count($breadcrumbs))

                    <ol class="breadcrumb">
                        @foreach ($breadcrumbs as $breadcrumb)

                            @if ($breadcrumb->url && $loop->first)
                                <li>
                                    <a href="{{ $breadcrumb->url }}">
                                        <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>
                                        {{ $breadcrumb->title }}
                                    </a>
                                </li>
                            @elseif ($breadcrumb->url && !$loop->last)
                                
                                <li class="hidden-xs">
                                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                                </li>
                            @else
                                <li class="active hidden-xs">
                                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                                    {{ $breadcrumb->title }}
                                </li>
                            @endif

                        @endforeach
                    </ol>

                @endif
            @endif


            <div class="pull-right">
                <i class="livicon icon3" data-name="users" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>{{trans('navigation.home')}}
            </div>

        </div>
    </div>
{{--@if(Breadcrumbs::renderIfExists())
    <div class="hero-title">
        {{ $breadcrumb->title }}
    </div>--}}
