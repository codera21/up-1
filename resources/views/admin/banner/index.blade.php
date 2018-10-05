@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Banners') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
