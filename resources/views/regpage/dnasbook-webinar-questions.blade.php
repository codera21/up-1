@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('about') }}
@endsection
<?php $baseUrl = URL::to('/');?>
@section('content')
    <div class="row">
        <div class="col-md-12" id="content">
            <div class="row1">
                <h1 id="heading">{{$pagesData->title}}</h1>
                <br>
                <div id="contentpara">
                    <p id="para">{!! $pagesData->content !!}</p>
                </div>
            </div>
        </div>
        <div class="distributor">
            <a href="{{$baseUrl}}/register/<?php echo $_GET["id"] ?>"
               class="btn btn-primary registerlink"
               style="color: black;cursor:grab">Next</a>
        </div>
    </div>
    <br>
@endsection
<style>


    #content > a {
        background: blue;
        color: white;
    }

    #heading {
        color: black;
        font-size: 2.3rem;
        text-align: center;
    }

    #para {
        font-size: 1.5rem;
    }
</style>

