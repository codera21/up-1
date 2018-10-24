{{--
<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->first_name }} {{ $child->last_name }}
            @if(count($child->children))
                @include('user.tree-nodes',['childs' => $child->children])
            @endif
        </li>
    @endforeach
</ul>--}}
