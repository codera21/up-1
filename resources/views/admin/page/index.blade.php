@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Page') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
