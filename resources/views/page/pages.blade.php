@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('about') }}
@endsection
<style>
    body > div.container > div > div > div > div > div   a{
        color:red;
    }
    .container a{
        color:red;
    }
</style>
@section('content')
    <div class="row">

        <div class="col-md-12">
            @foreach($data as $list)
                <div>
                    <h1 id="heading">{{$list->title}}</h1>
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