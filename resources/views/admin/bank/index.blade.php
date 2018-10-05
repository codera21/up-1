@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Banks') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
