@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Goals') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
