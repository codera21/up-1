@extends('layouts.backend.default')
@section('page_title')
    {{ trans('Dashboard') }}
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('Dashboard') }}</div>
        <div class="panel-body">
            You are logged in! admin-dashboard by-ashish bhandari
        </div>
</div>
@endsection
