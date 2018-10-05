@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Users Payment Profiles') }}
@endsection

@section('content')



{!! $grid->render() !!}


    
@endsection
