@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage News') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
