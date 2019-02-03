@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('user_academy.my_academy') }}
@endsection

@section('content')
    <div class="container video-controller">
        <div class="panel panel-primary">
            <div class="panel-body">
                <?php if($material_details->embed == null) : ?>
                <video class="video" controls controlsList="nodownload">
                    <source src="{{ $material['video_url'] }}"
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
    </div>
@endsection



<style>
    .panel-body > iframe{
        margin-left: 10%;
    }
    .video-controller {
        margin-top: 4%;
    }

    img {
        max-width: 100%;
        width: 100%;
    }

    .video {
        width: 100%;
        height: auto;
    }

    .embed-responsive .embed-responsive-item, .embed-responsive embed, .embed-responsive iframe, .embed-responsive object, .embed-responsive video {
        position: unset;
        margin-left: 8%;
        top: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .panel-primary {
        margin-left: 10%;
        width: 74%;
        height: auto;
    }

    .panel-body .text-dark {
        padding: 0;
    }

    .panel h3 {
        padding: 1%;
        font-size: 2rem;
        color: black;
    }

    .panel-body {
        padding: 10px 15px 15px 15px;
    }

    .text-success {
        padding: 0 0 1.35rem 0;
    }

    /*for image gallery*/

    .views-text {
        font-size: 1.9rem;
        font-family: 'Markazi Text', serif;

    !important;
        font-weight: bold;
        letter-spacing: 1.7px;
    }

    .heading-text {
        font-family: 'Lato', sans-serif;
        letter-spacing: 2px;
        font-weight: 700;
    }

    .show-text {
        font-size: 2rem;
        font-weight: 600;
    }

    .thumbnail:hover {
        -webkit-box-shadow: 10px 6px 67px -14px rgba(0, 0, 0, 0.56);
        -moz-box-shadow: 10px 6px 67px -14px rgba(0, 0, 0, 0.56);
        box-shadow: 10px 6px 67px -14px rgba(0, 0, 0, 0.56);
    }
    iframe {
        height : 455px !important;
    }
</style>