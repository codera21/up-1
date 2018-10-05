<ul>
@foreach($childs as $child)
    <li>
        {{ $child->first_name }} {{ $child->last_name }}
        <?php
        if ($child->is_active == 'YES'){
            echo '&#9989';
        }
        else{
            echo '&#x274C';
        }
        ?>
            <?php  $child->children?>
        @if(count($child->children))
                <?php  $count++;
                $filter = $level-2;
                ?>
            @if($count<=$filter)
            @include('user.tree-nodes',['childs' => $child->children])
                    @endif
        @endif
    </li>
@endforeach
</ul>