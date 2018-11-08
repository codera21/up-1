@extends('layouts.backend.default')

@section('page_title')
    {{ trans('User Commission') }}
@endsection

@section('content')
<h3>List Of All Subscriber.
</h3>
    <ul class="list-group list-group-flush">
        @foreach($list as $item)
        <li class="list-group-item names"><a href="{{route('admin.user.details',['post'=>$item->id])}}">{{$item->first_name}} {{$item->last_name}}</a></li>
            @endforeach
    </ul>
@endsection
<style>
    .names{
        font-size: 1.7rem;
    }
</style>