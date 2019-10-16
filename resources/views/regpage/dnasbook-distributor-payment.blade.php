@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('about') }}
@endsection
<?php $baseUrl = URL::to('/');?>
@section('content')
    <div class="row">
        @if(session()->has('PaymentSuccess'))
            <br>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session()->get('PaymentSuccess') !!}</strong>
                {!! session()->forget('PaymentSuccess')  !!}
            </div>
        @endif
        <div class="col-md-12" id="content">
            <div class="row1">
                <h1 id="heading">{{$pagesData->title}}</h1>
                <br>
                <div id="contentpara">
                    <p id="para">{!! $pagesData->content !!}</p>
                </div>
                <div class="text-center">
                    <a href="/makeOneTimePayment">
                        <button class="btn btn-warning" role="button">Pay Now</button>
                    </a>
                </div>
                <br>
                <div class="form-group" style="padding-top: 30px">
                    <h4 class=" text-danger">Copy Your Code from Here To SomeDocument File</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    @if(isset($_COOKIE['token']))
                                        <input type="text" class="form-control" name="token" id="password"
                                               placeholder="Token" value="{{$_COOKIE['token']}}" readonly>
                                    @else
                                        <input type="text" class="form-control" name="token" id="password"
                                               placeholder="Token" value="NO token yet" readonly>
                                    @endif
                                </div>
                                <div class="col-lg-3">
                                    <button onclick="copyText()" type="button" data-toggle="tooltip" data-html="true"
                                            title=""
                                            class="btn btn-default btn-sm"
                                            onclick="myFunction()" data-original-title="copy to clipboard">
                            <span class="glyphicon glyphicon-paperclip" aria-hidden="true"
                                  style="font-size: 2rem"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
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

<script>
    function copyText() {
        var copyText = document.getElementById("password");
        copyText.select();
        document.execCommand("copy");
    }
</script>
