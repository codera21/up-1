@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('My Payments History') }}
@endsection

@section('content')



{!! $grid->render() !!}


	
@endsection
