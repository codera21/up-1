@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('My Payment Profiles') }}
@endsection

@section('content')



{!! $grid->render() !!}


    
@endsection
