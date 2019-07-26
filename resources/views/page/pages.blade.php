@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('about') }}
@endsection
<?php $baseUrl = URL::to('/');?>
@section('content')
    <div class="row">
        <div class="col-md-12" id="content">
            @foreach($data as $list)
                <div class="row1">
                    {{--Title of pages--}}
                    <h1 id="heading">{{$list->title}}</h1>
                    {{--other content according to url--}}
                    <br>
                    {{--Content of pages--}}
                    @if(Request::url() == "$baseUrl/pages/distributor")
                        <p class="text-danger"
                           style="font-size: 2rem;padding-bottom: 3px;">{{trans('backend.note_above_button')}}</p>
                    @endif
                    <div id="contentpara">
                        <p id="para"><?php echo $list->content ?></p>
                    </div>
                </div>
            @endforeach
            <div class="videosPage">
                <?php if (Request::url() == "$baseUrl/pages/videos"): ?>
                <div>
                    <?php if (env("SITE") == "ENG"): ?>
                    {{--get language for english site--}}
                    <?php $lang = App::getLocale();?>
                    <?php if ($lang == "en"): ?>
                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                        <iframe class='sproutvideo-player'
                                src='https://videos.sproutvideo.com/embed/7c9ddab3191ceaccf4/a01c4bcd20484085?playerTheme=dark&amp;playerColor=2f3437'
                                style='position:absolute;width:100%;height:100%;left:0;top:0' frameborder='0'
                                allowfullscreen></iframe>
                    </div>
                    <?php else: ?>
                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                        <iframe class='sproutvideo-player'
                                src='https://videos.sproutvideo.com/embed/489ddab31a1ce6c2c0/2ba3aa34a14cf04a?playerTheme=dark&amp;playerColor=2f3437'
                                style='position:absolute;width:100%;height:100%;left:0;top:0' frameborder='0'
                                allowfullscreen></iframe>
                    </div>
                    <?php endif;?>

                    <?php else: ?>
                    {{--get language for africa site--}}
                    <?php $lang = App::getLocale();?>
                    <?php if ($lang == "en"): ?>
                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                        <iframe class='sproutvideo-player'
                                src='https://videos.sproutvideo.com/embed/7c9ddab3191ceaccf4/a01c4bcd20484085?playerTheme=dark&amp;playerColor=2f3437'
                                style='position:absolute;width:100%;height:100%;left:0;top:0' frameborder='0'
                                allowfullscreen></iframe>
                    </div>
                    <?php else: ?>
                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                        <iframe class='sproutvideo-player'
                                src='https://videos.sproutvideo.com/embed/1c9ddab31a1de4c894/6287c5da6616e386?playerTheme=dark&amp;playerColor=2f3437'
                                style='position:absolute;width:100%;height:100%;left:0;top:0' frameborder='0'
                                allowfullscreen></iframe>
                    </div>

                    <?php endif;?>

                    <?php endif;?>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" id="myCheck">
                        <p class="text-danger">{{trans("backend.checkbox_note")}}</p></label>
                </div>
                <?php if (env("SITE") == "ENG"): //for site buttons?>
				                <a href="<?php echo $baseUrl ?>/register/<?php echo $_GET["id"] ?>"
				                   class="btn  btn-primary registerlink"
				                   style="color: black;cursor:grab ">Next</a>
				                <?php else: ?>
                <a href="<?php echo $baseUrl ?>/register/<?php echo $_GET["id"] ?>"
                   class="btn  btn-primary registerlink"
                   style="color: black;cursor:grab ">Next</a>
                <?php endif; //for site buttons else end here ?>
                <?php endif;?>
            </div>
            <div class="distributor">
                <?php if (Request::url() == "$baseUrl/pages/distributor"): ?>
                <a href="<?php echo $baseUrl ?>/register/<?php echo $_GET["id"] ?>" class="btn btn-primary registerlink"
                   >Next</a>
                <?php endif;?>
            </div>
            {{--<div class="terms_and_condition">
                @if(Request::url() == "$baseUrl/pages/terms-and-conditions")
                    <a href=""
                       class="btn  btn-primary registerlink"
                       style="color: black;cursor:grab ">Next</a>
                    @endif
            </div>--}}
        </div>
    </div>
    <br>
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
<?php if (Request::url() == "$baseUrl/pages/videos"): ?>
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $(".registerBlock").removeAttr("href");
        $(".checkbox").css({"margin-left": "75%", 'font-size': '1.6rem'});
        $("#contentpara p").addClass("text-center text-danger").css({
            "font-size": "25px", "padding-bottom": "10px"
        });
        $(document).mousemove(function () {
            let checkboxvalid = document.getElementById("myCheck").checked;
            if (checkboxvalid) {
                $(".registerlink").removeAttr("disabled");
            } else {
                $(".registerlink").attr("disabled", "disabled");
            }
        })
    });
</script>
<?php endif;?>
