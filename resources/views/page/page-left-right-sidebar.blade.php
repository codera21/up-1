@extends('layouts.frontend.default')

@section('page_title')
    {{ trans($page->title) }}
@endsection

@section('content')
<div class="row">


    <div class="col-md-3">        
        {!! $page->leftBlock->content !!}
    </div>

    <div class="col-md-6">
        {!! $page->content !!}
    </div>

    <div class="col-md-3">        
        {!! $page->rightBlock->content !!}
    </div>

</div>
@endsection
