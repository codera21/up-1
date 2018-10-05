@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Users') }}
@endsection

@section('content')

    {!! $grid->render() !!}

@endsection
