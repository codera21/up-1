<?php /*dd($users[0]->children)*/?>
@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('app.tree') }}
@endsection

@section('content')
<!--Left Profile Column-->
                    <div class="col-md-8">
                        <h5>{{ trans('user.tree_sub_level') }} </h5>
                        <h5>&#9989 shows User is Active</h5>
                        <ul id="tree1">
                            @foreach($users as $user)
                                <?php  $count = 0; ?>
                            <li>
                                {{ $user->first_name }} {{ $user->last_name}}
                                <?php
                                if ($user->is_active == 'YES'){
                                    echo '&#9989';
                                }
                                else{
                                    echo '&#x274C';
                                }
                                ?>
                                <?php   ($user->children)?>
                                @if(count($user->children))
                                    @include('user.tree-nodes',['childs' => $user->children,'count'=>$count,'level'=>$level])
                                @endif
                            </li>
                                <?php $count++?>
                            @endforeach
                        </ul>
                    </div>
@endsection