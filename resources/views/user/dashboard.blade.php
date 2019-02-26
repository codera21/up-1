@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('app.dashboard') }}
@endsection
@section('content')
<div class="panel panel-default">
        <div class="panel-heading">{{ trans('app.dashboard') }}</div>
    <br>
    @if(Auth::user()->not_now == 1)
    <div class="alert alert-info" role="alert">
        <b class="text-danger">Important</b>: {{trans('app.combine_message')}}
        <a href="/online-payment/addnew1" style="font-weight:bold;color:blue"> {{ trans('app.click_here') }}</a>
        <br>
        <b class="text-danger">Important</b>: {{trans('app.this_is_how')}}
    <a href="{{trans('app.this_is_link')}}" style="font-weight:bold;color:blue"> {{ trans('app.click_here') }}</a>
    </div>
    <br>
    @endif
    {{-- <div class="alert alert-info" role="alert">
        <b class="text-danger">Important</b>: {{trans('app.flash-message')}} 
    </div> --}}
    <div class="panel-body">
        <h3>copy your referral link</h3>
            <div class="row">
                <div class="col-lg-5">
                    <input type="text" id= "myInput" class="form-control" value="{{ asset('/register').'/'.$user }}" id="inputDefault"  readonly>
                </div>
                <div class="col-lg-1">
                    <button type="button" data-toggle="tooltip" data-html="true" title="copy to clipboard" class="btn btn-default btn-sm" onclick="myFunction()">
                        <span class="glyphicon glyphicon-paperclip" aria-hidden="true" style="font-size: 2rem"></span>
                    </button>
                </div>
            </div>
        </div>
    <div class="flash-message" role="alert">
        <div>
            <p><?php echo trans('app.p_one')?></p>
            <p>
            <?php echo trans('app.p_two') ?>
            </p>
            <p>
            <?php echo trans('app.p_three') ?>
            </p>
            <p>
            <?php echo trans('app.p_four') ?>
            </p>
            <p>
                <?php  echo trans('app.p_five') ?>
            </p>
            <p>
                <?php echo trans('app.p_six') ?>
            </P>
            <p>
            <?php echo trans('app.p_seven') ?>
            </p>
        </div>
    </div>
        
    <br>
    <div class="fb-share-button" data-href="{{asset('/register').'/'.$user  }}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fregister%2F71&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-url="{{asset('/register').'/'.$user}}" data-related="asdf" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <div class="g-plus" data-action="share" data-height="24" data-href="{{asset('/register').'/'.$user}}"></div>
</div>
@endsection
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        document.execCommand("copy");
    }
    function myFunction1() {
        var copyText = document.getElementById("myInput1");
        copyText.select();
        document.execCommand("copy");
    }
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Place this tag where you want the share button to render. -->
<style>
    .flash-message{
        font-size : 16px;
        border: 1px solid red;
        padding: 20px;
        text-align: justify;
        margin : 30px;
    }
</style>