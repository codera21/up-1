@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('about') }}
@endsection
<?php $baseUrl = URL::to('/');?>
@section('content')
    @if(env('SITE') == 'ENG')
        <div class="row">
            <h1 class="text-center text-primary">Submit Your Token To watch Video</h1>

            <form action="/token" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Token:</label>
                        </div>

                        <div class="col-lg-6">
                            @if(isset($_COOKIE['token']))
                                <input type="text" class="form-control" name="token" value="{{$_COOKIE['token']}}">
                            @else
                                <input type="text" class="form-control" name="token" value="No token">
                            @endif
                        </div>

                    </div>
                    <div class="text-center">
                        <input type="submit" class=" btn btn-primary" value="Submit Token">
                    </div>
                </div>
            </form>
            @if(session()->get('canWatch'))
                <div class="col-md-12" id="content">
                    <div class="row1">
                        <h1 id="heading">{{$pagesData->title}}</h1>
                        <br>
                        <div id="contentpara">
                            <p id="para">{!! $pagesData->content !!}</p>
                        </div>
                    </div>
                    <div class="videosPage">
                        <div>
                            @if(env("SITE") == "ENG")
                                {{--get language for english site--}}
                                <?php $lang = App::getLocale();?>
                                @if($lang == 'en')
                                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                                        <iframe class='sproutvideo-player'
                                                src='https://videos.sproutvideo.com/embed/7c9ddab3191ceaccf4/a01c4bcd20484085?playerTheme=dark&amp;playerColor=2f3437'
                                                style='position:absolute;width:100%;height:100%;left:0;top:0'
                                                frameborder='0'
                                                allowfullscreen></iframe>
                                    </div>
                                @else
                                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                                        <iframe class='sproutvideo-player'
                                                src='https://videos.sproutvideo.com/embed/489ddab31a1ce6c2c0/2ba3aa34a14cf04a?playerTheme=dark&amp;playerColor=2f3437'
                                                style='position:absolute;width:100%;height:100%;left:0;top:0'
                                                frameborder='0'
                                                allowfullscreen></iframe>
                                    </div>
                                @endif

                            @else
                                {{--get language for africa site--}}
                                <?php $lang = App::getLocale();?>
                                @if($lang == 'en')
                                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                                        <iframe class='sproutvideo-player'
                                                src='https://videos.sproutvideo.com/embed/7c9ddab3191ceaccf4/a01c4bcd20484085?playerTheme=dark&amp;playerColor=2f3437'
                                                style='position:absolute;width:100%;height:100%;left:0;top:0'
                                                frameborder='0'
                                                allowfullscreen></iframe>
                                    </div>
                                @else
                                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                                        <iframe class='sproutvideo-player'
                                                src='https://videos.sproutvideo.com/embed/1c9ddab31a1de4c894/6287c5da6616e386?playerTheme=dark&amp;playerColor=2f3437'
                                                style='position:absolute;width:100%;height:100%;left:0;top:0'
                                                frameborder='0'
                                                allowfullscreen></iframe>
                                    </div>

                                @endif

                            @endif
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" id="myCheck">
                                <p class="text-danger">{{trans("backend.checkbox_note")}}</p></label>
                        </div>
                        <div class="distributor">
                            @if(env("SITE") == "ENG")
                                <button
                                   class="btn  btn-primary registerlink"
                                   style="color: black;cursor:grab ">Next</button>
                            @else
                                <button
                                   class="btn  btn-primary registerlink"
                                   style="color: black;cursor:grab ">Next</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <br>
    @else
        <div class="row">
            <h1 class="text-center text-primary">Submit Your Voucher Number To watch Video</h1>

            <form action="/token" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Voucher:</label>
                        </div>

                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="token" placeholder="VOucher NO">
                        </div>

                    </div>
                    <div class="text-center">
                        <input type="submit" class=" btn btn-primary" value="Submit Voucher Number">
                    </div>
                </div>
            </form>
            
            
			@if(!session()->get('canWatch') || @$_GET["code"])
            <h1 class="text-center text-primary">Submit Your Video Code To Watch</h1>
            <form action="/videocode" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Video Code:</label>
                        </div>

                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="videocode" placeholder="Video Code">
                        </div>

                    </div>
                    <div class="text-center">
                        <input type="submit" class=" btn btn-primary" value="Submit Code">
                    </div>
                </div>
            </form>
            @endif
            @if(session()->get('canWatch'))
                <div class="col-md-12" id="content">
                    <div class="row1">
                        <h1 id="heading">{{$pagesData->title}}</h1>
                        <br>
                        <div id="contentpara">
                            <p id="para">{!! $pagesData->content !!}</p>
                        </div>
                    </div>
                    <div class="videosPage">
                        <div>
                            @if(env("SITE") == "ENG")
                                {{--get language for english site--}}
                                <?php $lang = App::getLocale();?>
                                @if($lang == 'en')
                                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                                        <iframe class='sproutvideo-player'
                                                src='https://videos.sproutvideo.com/embed/7c9ddab3191ceaccf4/a01c4bcd20484085?playerTheme=dark&amp;playerColor=2f3437'
                                                style='position:absolute;width:100%;height:100%;left:0;top:0'
                                                frameborder='0'
                                                allowfullscreen></iframe>
                                    </div>
                                @else
                                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                                        <iframe class='sproutvideo-player'
                                                src='https://videos.sproutvideo.com/embed/489ddab31a1ce6c2c0/2ba3aa34a14cf04a?playerTheme=dark&amp;playerColor=2f3437'
                                                style='position:absolute;width:100%;height:100%;left:0;top:0'
                                                frameborder='0'
                                                allowfullscreen></iframe>
                                    </div>
                                @endif

                            @else
                                {{--get language for africa site--}}
                                <?php $lang = App::getLocale();?>
                                @if($lang == 'en')
                                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                                        <iframe class='sproutvideo-player'
                                                src='https://videos.sproutvideo.com/embed/7c9ddab3191ceaccf4/a01c4bcd20484085?playerTheme=dark&amp;playerColor=2f3437'
                                                style='position:absolute;width:100%;height:100%;left:0;top:0'
                                                frameborder='0'
                                                allowfullscreen></iframe>
                                    </div>
                                @else
                                    <div style='position:relative;height:0;padding-bottom:56.25%'>
                                        <iframe class='sproutvideo-player'
                                                src='https://videos.sproutvideo.com/embed/1c9ddab31a1de4c894/6287c5da6616e386?playerTheme=dark&amp;playerColor=2f3437'
                                                style='position:absolute;width:100%;height:100%;left:0;top:0'
                                                frameborder='0'
                                                allowfullscreen></iframe>
                                    </div>

                                @endif

                            @endif
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" id="myCheck">
                                <p class="text-danger">{{trans("backend.checkbox_note")}}</p></label>
                        </div>
                        <div class="distributor">
                            @if(env("SITE") == "ENG")
                                <button
                                    class="btn  btn-primary registerlink"
                                    style="color: black;cursor:grab ">Next
                                </button>
                            @else
                                <button
                                    class="btn  btn-primary registerlink"
                                    style="color: black;cursor:grab ">Next
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <br>
    @endif
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

<script>
    $(document).ready(function () {
        $(".distributor button").click(function () {
            var baseURL = "<?php echo $baseUrl ?>";
            var getID = "<?php echo $_GET['id'] ?>";
            document.cookie = "videos=1;path=/";
            window.location = baseURL + "/register/" + getID;
        })
    })
</script>
