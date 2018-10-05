@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('Commission') }}
@endsection

@section('content')



{!! $grid->render() !!}


	
@endsection
