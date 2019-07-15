@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('about') }}
@endsection
<style>

</style>
<?php $baseUrl = URL::to('/'); ?>
@section('content')
    <div class="row">
        <div class="col-md-12" id="content">
            @foreach($data as $list)
                <div class="row1">
                    {{--Title of pages--}}
                    <h1 id="heading">{{$list->title}}</h1>
                    {{--other content according to url--}}
                    <div>
                        <?php if(Request::url() == "$baseUrl/pages/videos"): ?>
                        <div>
                            <?php if(env("SITE") == "ENG"): ?>
                            {{--get language for english site--}}
                            <?php $lang = App::getLocale();?>
                            <?php if($lang == "en"): ?>
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
                            <?php endif; ?>

                            <?php else: ?>
                            {{--get language for africa site--}}
                            <?php $lang = App::getLocale(); ?>
                            <?php if($lang == "en"): ?>
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

                            <?php endif; ?>

                            {{--videos for world site in french--}}
                            <?php endif;?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <br>
                    {{--Content of pages--}}
                    <div id="contentpara">
                        <p id="para"><?php echo $list->content?></p>
                    </div>
                </div>
            @endforeach
            <?php if (Request::url() == "$baseUrl/pages/distributor"): ?>
            <p class="text-danger">{{trans('backend.note_above_button')}}</p>
            <div class="checkbox">
                <label><input type="checkbox" value="" id="myCheck" required>{{trans("backend.checkbox_note")}}</label>
            </div>
            <?php if (env("SITE") == "ENG"): ?>
            <a href="<?php echo $baseUrl ?>/register/2" class="btn btn-primary registerlink"
               disabled="disabled">Next</a>
            <?php else: ?>
            <a href="<?php echo $baseUrl ?>/register/345" class="btn  btn-primary registerlink" disabled="disabled"
               style="color: black;cursor:grab ">Next</a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <br>
@endsection
<style>
    body > div.container > div > div > div > div > div a {
        color: blue;
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
<?php if (Request::url() == "$baseUrl/pages/distributor"): ?>
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('#contentpara a').attr("target", "_blank");
        $('#contentpara a').click(function (e) {
            $(e.target).addClass("clicked");
        });
        var noOfLinkClicked;
        $("#contentpara a").click(function () {
            noOfLinkClicked = $("#contentpara").find(".clicked").length;
            localStorage.count = noOfLinkClicked;
        });
        $(document).mousemove(function () {
            var nooflink = parseInt(localStorage.count);
            console.log(nooflink);
            let checkboxvalid = document.getElementById("myCheck").checked;
            console.log(checkboxvalid);
            if (nooflink >= 7) {
                if (checkboxvalid) {
                    $(".registerlink").removeAttr("disabled");
                } else {
                    $(".registerlink").attr("disabled", "disabled");
                }
            }
        });
    });
</script>
<?php endif; ?>