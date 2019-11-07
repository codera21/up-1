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
    </div>
    <br>
 <!-- <div class="container video-controller">
        <div class="panel panel-primary">
            <div class="panel-body">
                <?php if($material_details->embed == null) : ?>
                <video class="video" controls controlsList="nodownload">
                    <source src="{{ $material['video_url'] }}"
                    
                            type="video/mp4">
                </video>
            <?php else:?>
            <?php echo $material_details->embed?>
            <?php endif;?>
                <h3 class="text-dark heading-text">{{$material['title']}}</h3>
                <p class="text-dark views-text" style="color: gray;"></p>
                <hr>
                <p class="text-dark show-text" data-toggle="collapse" data-target="#demo" style="cursor:pointer; ">
                    Description </p>
                <div id="demo" class="">
                    {!! $material['description']  !!}
                </div>
            </div>
        </div>
    </div>	-->
@endsection
<style>

    body > div.container > div > div > div > div > div a {
        color: blue;
    }

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

