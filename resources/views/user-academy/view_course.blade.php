@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('user_academy.my_academy') }}
@endsection

@section('content')
    @foreach ($materialList as $material)
        <div class="col-sm-6 col-lg-4 col-md-4">
            <div class="thumbnail">
                <a href="{!! url('user-academy/viewpdf/' . $material->id)   !!}">
                    <img src="https://challengepost-s3-challengepost.netdna-ssl.com/photos/production/user_photos/000/332/699/datas/profile.jpg"
                         style="width: 700px; height: 300px">
                </a>
                <div class="caption">
                    <h4 class="pull-right text-success">${{$material->price}}</h4>

                    <h4>

                        <a href="{!! url('user-academy/viewpdf/' . $material->id)   !!}">{{ $material->title }}</a>

                    </h4>
                    <hr>
                    <p class="description">{!!  str_limit($material->description,  $limit = 150 ,  $end ='... <a href="' . url('user-academy/viewpdf/' . $material->id) ) . '">read more</a>"'  !!}</p>
                </div>
            </div>
        </div>


    @endforeach
@endsection

<style>
    .description {
        /*height: 100px;*/
    }

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