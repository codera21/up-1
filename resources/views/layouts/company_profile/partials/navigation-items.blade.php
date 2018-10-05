
@foreach($items as $item)

  <li@lm-attrs($item) @if($item->hasChildren())class ="dropdown"@endif @lm-endattrs>
    @if($item->link) <a@lm-attrs($item->link) @if($item->hasChildren()) class="dropdown-toggle" data-toggle="dropdown" @endif @lm-endattrs href="{!! $item->url() !!}">
      {!! $item->title !!}
      @if($item->hasChildren()) @endif
    </a>
    @else
      {!! $item->title !!}
    @endif
    @if($item->hasChildren())
      <ul class="dropdown-menu">
        @include('layouts.frontend.partials.navigation-subitems',
array('items' => $item->children()))
      </ul>
    @endif
  </li>
  @if($item->divider)
  	<li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
  @endif
@endforeach
