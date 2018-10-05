@extends('layouts.frontend.default')
@section('page_title')
    {{ trans($page->title) }}
@endsection

@section('content')
<div class="row">
    
    <div class="col-md-12">
        {!! $page->content !!}
    </div>

</div>
@endsection
