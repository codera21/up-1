@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('About') }}
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            @foreach($about_us as $about)
                <div>
                    <h1 id="heading">{{$about->title}}</h1>
                    <p id="para"><?php echo $about->description?></p>
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

    div.row div.col-md-12 {
        margin-bottom: 1.2em;
    }
</style>