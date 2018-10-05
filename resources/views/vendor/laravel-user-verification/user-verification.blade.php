@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('Error - User Verification') }}
@endsection

@section('content')
<section class="page-not-found">
        <div class="row">
                <div class="col-md-9">
                        <div class="page-not-found-main">
                                <h2>{!! trans('laravel-user-verification::user-verification.verification_error_header') !!}<i class="fa fa-file"></i></h2>
                                <p>{!! trans('laravel-user-verification::user-verification.verification_error_message') !!}.</p>
                        </div>
                </div>
                <div class="col-md-3">
                        <h4 class="heading-primary">Here are some useful links</h4>
                        <ul class="nav nav-list">
                                <li><a href="{{ route('home')}}">Home</a></li>
                                <li><a href="{{ route('contact')}}">Contact Us</a></li>
                        </ul>
                </div>
        </div>
</section>
    
@endsection


