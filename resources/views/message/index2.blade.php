@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('message.inbox') }}
@endsection

@section('content')

    @include('layouts.frontend.partials.message.message-heading')

    {!! $grid->render() !!}


    @include('layouts.frontend.partials.message.message-compose')

@endsection
