@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Comission Level') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
