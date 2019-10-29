@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Codes') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
