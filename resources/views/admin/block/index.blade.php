@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Block') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
