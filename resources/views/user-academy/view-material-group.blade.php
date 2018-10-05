@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('user_academy.my_academy') }}
@endsection
@section('content')
    @foreach ($material as $materialItem)
        @if($materialItem->thumbnail_url != '' && $materialItem->thumbnail_url != null )
            <div class="col-sm-6 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        @if($materialItem->price > 0.00)
                            <h4 class="pull-right text-success">${{$materialItem->price}}</h4>
                        @endif
                        <h4>
                            <a href="{!! url('user-academy/view/' . $materialItem->id)   !!}">{{ $materialItem->title }}</a>
                        </h4>
                        <hr>
                    </div>
                    <a href="{!! url('user-academy/view/' . $materialItem->id)!!}">
                        <img src="{{$materialItem->thumbnail_url}}"
                             style="width: 700px; height: 300px"/>
                    </a>
                    <div class="caption">
                        <p class="description">{!! str_limit($materialItem->description , $limit = 150 , $end = '... <a href="' . url('user-academy/view/' . $materialItem->id) . '">read more</a>' )!!}</p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection

<style>

    .thumbnail {
        margin: 20px 20px 0 0;
        height: 500px;
    }

    .thumbnail:hover {
        -webkit-box-shadow: 10px 6px 67px -14px rgba(0, 0, 0, 0.56);
        -moz-box-shadow: 10px 6px 67px -14px rgba(0, 0, 0, 0.56);
        box-shadow: 10px 6px 67px -14px rgba(0, 0, 0, 0.56);
    }
</style>
