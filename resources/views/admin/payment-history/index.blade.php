@extends('layouts.backend.default')

@section('page_title')
    {{ trans('User Payments History') }}
@endsection

@section('content')



{!! $grid->render() !!}


	
@endsection
