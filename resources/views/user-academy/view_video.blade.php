@extends('layouts.frontend.default')
@section('page_title')
    {{ trans('user_academy.my_academy') }}
@endsection

@section('content')
    @foreach ($materialGroup as $materialGrp)
        @if($materialGrp->group_thumbnail_url != '' && $materialGrp->group_thumbnail_url != null )
            <div class="col-sm-6 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        @if($materialGrp->price > 0.00)
                            <h4 class="pull-right text-success">F{{$materialGrp->price}}</h4>
                        @endif
                        <h4>
                            <a href="{!! url('user-academy/viewGroup/' . $materialGrp->id)   !!}">{{ $materialGrp->title }}</a>
                        </h4>
                        <hr>
                    </div>
                    <a href="{!! url('user-academy/viewGroup/' . $materialGrp->id)!!}">
                        <img src="{{$materialGrp->group_thumbnail_url}}"
                             style="width: 700px; height: 300px; margin-top: 0"/>
                    </a>
                </div>
            </div>
        @endif
    @endforeach
@endsection
<style>
    .thumbnail {
        margin: 20px 20px 0 0;
        height: 425px;
    }

    .thumbnail:hover {
        -webkit-box-shadow: 10px 6px 67px -14px rgba(0, 0, 0, 0.56);
        -moz-box-shadow: 10px 6px 67px -14px rgba(0, 0, 0, 0.56);
        box-shadow: 10px 6px 67px -14px rgba(0, 0, 0, 0.56);
    }
</style>
