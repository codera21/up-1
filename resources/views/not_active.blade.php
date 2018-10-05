@extends('layouts.frontend.default')

@section('page_title')

@endsection

@section('content')
    <br>
    <div class="alert alert-success" role="alert">
        <a href="#" class="alert-link">
            {{ __('app.not_active') }}
        </a> &nbsp;&nbsp;&nbsp;
        <a style="color : #fff" type="button" class="btn btn-success"
           href="{{route('online-payment.activate')}}"> {{ __('app.click_here') }}</a>
    </div>
    <br>
    <br>
    <br>
@endsection
