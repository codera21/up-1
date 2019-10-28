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

                <p class="text-danger"
                   style="font-size: 2rem;padding-bottom: 3px;">{{trans('backend.note_above_button')}}</p>

                <div id="contentpara">
                    <p id="para">{!! $pagesData->content !!}</p>
                </div>
            </div>
            <div class="distributor">
                <button
                   class="btn btn-primary registerlink"
                   style="color: black;cursor:grab">Next</button>
            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
    $(document).ready(function () {
        $(".distributor button").click(function () {
            var baseURL = "<?php echo $baseUrl ?>";
            var getID = "<?php echo $_GET['id'] ?>";
            document.cookie = "distributorPage=1;path=/";
            window.location = baseURL+"/register/"+getID;
        })
    })
</script>

