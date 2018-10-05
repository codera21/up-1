@extends('layouts.backend.default')

@section('page_title')
    {{ trans('app.tree') }}
@endsection

@section('content')
<!--Left Profile Column-->
                    {{--<div class="col-md-8">
                        <h5>Click on the name of the subscriber will show sub level subscribers. </h5>
                        <ul id="tree1">
                            @foreach($users as $user)
                            <li>
                                {{ $user->first_name }} {{ $user->last_name}}

                                @if(count($user->children))
                                    @include('admin.user.tree-nodes',['childs' => $user->children])
                                @endif

                            </li>
                            @endforeach
                        </ul>
                        
                    </div>--}}
<div class="col-md-8">
    <h5>{{ trans('user.tree_sub_level') }} </h5>
    <ul id="tree1">
        @foreach($users as $user)
            <?php  $count = 0; ?>
            <li>
                {{ $user->first_name }} {{ $user->last_name}}
                <?php   $user->children?>
                @if(count($user->children))
                    @include('admin.user.tree-nodes',['childs' => $user->children,'count'=>$count,'level'=>$level])
                @endif
            </li>
            <?php $count++?>
        @endforeach
    </ul>
</div>
@endsection