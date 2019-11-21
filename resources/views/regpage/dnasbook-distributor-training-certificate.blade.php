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
    <form action="/pages/certificate?id=" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-4">
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Enter name"
                    name="name"
                    required
                />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-4">
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter email"
                    name="email"
                    required
                />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="Country">Country:</label>
            <div class="col-sm-4">
                <input
                    type="Country"
                    class="form-control"
                    id="Country"
                    placeholder="Enter Country"
                    name="Country"
                    required
                />
            </div>
        </div>
        <input
            type="submit"
            id="next-page"
            value="NEXT PAGE"
        />
    </form>
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

    .form-group label.control-label.col-sm-2 {
        width: 10%;
        vertical-align: middle;
    }

    .form-group {
        WIDTH: 100%;
        display: flex;
    }

    .form-control {
        margin-top: 5px;
        background-color: #fff;
    }
</style>
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('form').removeAttr('action').attr('action', '/pages/certificate?id=<?php echo $_GET['id'] ?>');
        $('input[type="submit"]').addClass('btn btn-primary');
    })
</script>

