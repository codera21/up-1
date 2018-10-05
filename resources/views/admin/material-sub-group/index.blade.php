@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Material Levels') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
