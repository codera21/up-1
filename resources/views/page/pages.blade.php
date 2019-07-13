@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('about') }}
@endsection
<style>
    body > div.container > div > div > div > div > div a {
        color: blue;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach($data as $list)
                <div>
                    {{--Title of pages--}}
                    <h1 id="heading">{{$list->title}}</h1>
                    {{--other content according to url--}}
                    <div>
                        <?php
                        $baseUrl = URL::to('/');
                        if(Request::url() == "$baseUrl/pages/videos"): ?>
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
                    <p id="para"><?php echo $list->content?></p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    #heading {
        color: black;
        font-size: 2.3rem;
        text-align: center;
    }

    #para {
        font-size: 1.5rem;
    }
</style>