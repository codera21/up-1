@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('Help') }}
@endsection

@section('content')
<div class="row">
    
    <div class="col-md-12">
    	
        <div class="col-md-6">
            <h2>{{trans('contact.contact_form')}}</h2>
                {!! Form::open(['id' => 'contact-us', 'method' => 'post', 'files' => false, 'class'=>'contact']) !!}
                <div class="form-group">
                    <input name="name" type="text" class="form-control input-lg" placeholder="{{trans('contact.name')}}">
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control input-lg" placeholder="{{trans('contact.email')}}">
                </div>
                <div class="form-group">
                    <textarea name="message" class="form-control input-lg no-resize" rows="6" placeholder="{{trans('contact.comment')}}"></textarea>
                </div>
                <div class="input-group">
                    <button class="btn btn-primary">{{trans('contact.submit')}}</button>
                    <button class="btn btn-danger">{{trans('contact.cancel')}}</button>
                </div>
                {!! Form::close() !!}
        </div>
        <!-- //Conatc Form Section End -->

        <!-- Address Section Start -->
        <div class="col-md-5 col-md-offset-1">
            <p class="clearfix" style="margin-top:20px;"></p>

            <div class="media padleft10">
                <div class="media-body">
                    <h4 class="media-heading">{{trans('contact.address')}}:</h4>
            
                    <address>
                        Pediatric Surgeons of Alaska
                        <br> 3340 Providence Drive #565
                        <br> Anchorage, AK(Alaska)
                        <br> North Las Vegas, NV
                    </address>
                </div>
            </div>
            <div class="media padleft10">
                
                <div class="media-body padbtm2">
                    <h4 class="media-heading">{{trans('contact.telephone')}}:</h4> (703) 717-4200
                    <br /> Fax:400 423 1456
                </div>
            </div>
        </div>
        <!-- //Address Section End -->

    </div>

</div>
@endsection
