@extends('layouts.backend.default')

@section('page_title')
    {{ trans('User Commission') }}
@endsection

@section('content')



{!! $grid->render() !!}


	
@endsection
