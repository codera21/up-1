@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('Unread') }}
@endsection

@section('content')
    @include('layouts.frontend.partials.message.message-heading')
    {!! $grid->render() !!}
    @include('layouts.frontend.partials.message.groupmessage-compose')
@endsection
