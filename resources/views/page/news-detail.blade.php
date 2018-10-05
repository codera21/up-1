@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('News Details') }}
@endsection

@section('content')
<div class="row">
    
    <div class="col-md-12">
    	
            <h1>{{ $news->title }}</h1>
        	<p>{!! $news->description; !!}</p>

    </div>

</div>
@endsection
