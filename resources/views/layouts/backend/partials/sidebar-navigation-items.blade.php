@foreach($items as $item)
    <li @if($item->hasChildren())@endif >
        @if($item->link) <a @if($item->hasChildren()) class="treeview" data-toggle="dropdown"
                            @endif href="{!! $item->url() !!}">
            {!! $item->title !!}
            @if($item->hasChildren()) <span class="fa arrow"></span> @endif
        </a>
        @else
            {!! $item->title !!}
        @endif
        @if($item->hasChildren())
            <ul class="treeview-menu">
                @include(config('laravel-menu.views.bootstrap-items'), array('items' => $item->children()))
            </ul>
        @endif
    </li>
    @if($item->divider)
        <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
    @endif
@endforeach
<script>
    if (window.outerWidth <= 768) {
        jQuery('li').click(function () {
            jQuery('li').removeClass('active');
            jQuery(this).toggleClass('active');
        });
    }
</script>