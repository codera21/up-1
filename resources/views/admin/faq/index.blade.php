@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage FAQs') }}
@endsection

@section('content')

{!! $grid->render() !!}
	
@endsection
