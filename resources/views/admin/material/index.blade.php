@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Material') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
