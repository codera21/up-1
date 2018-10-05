@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('Error 401 - Un Authorized') }}
@endsection

@section('content')
<section class="page-not-found">
        <div class="row">
                <div class="col-md-9">
                        <div class="page-not-found-main">
                                <h2>401 <i class="fa fa-file"></i></h2>
                                <p>{{ trans('errors.error_verified') }}</p>
                        </div>
                </div>
                <div class="col-md-3">
                        <h4 class="heading-primary">{{ trans('errors.useful_links') }}</h4>
                        <ul class="nav nav-list">
                                <li><a href="{{ route('home')}}">{{ trans('errors.home') }}</a></li>
                                <li><a href="{{ route('contact')}}">{{ trans('errors.contact_us') }}</a></li>
                        </ul>
                </div>
        </div>
</section>
    
@endsection

