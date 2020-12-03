@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('register.page_title') }}
@endsection

@section('content')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <div class="featured-boxes" id="content">
        <div class="row">
            <div class="col-sm-12 pull-left">

                <div class="featured-box featured-box-primary">
                    <br>
                    <div class="box-content">
                        {{-- <div class="alert alert-danger">
                            <span class="fas fa-exclamation-triangle" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;
                            {{trans('auth.register_warning')}} <a href="{{trans('auth.video_link')}}" style="color: blue">click here</a>
                        </div> --}}
                        @if(!is_null($parentid))

                            {!! Form::open(['id' => 'register', 'method' => 'post', 'files' => false, 'class'=>'form-horizontal']) !!}

                            {!! Form::hidden('parent_id', old('parent_id', $parentid)) !!}

                            <div class="form-group{{ ($errors->has('first_name') or $errors->has('last_name')) ? ' has-error' : '' }} required">
                                {!! Form::label('first_name', trans('register.name'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-3">
                                    {!! Form::text('first_name', old('first_name'), ['placeholder'=> trans('register.first_name'),'class'=>'form-control validate-name', 'maxlength'=>'47']) !!}
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    {!! Form::text('last_name', old('last_name'), ['placeholder'=>trans('register.last_name'), 'class'=>'form-control validate-name', 'maxlength'=>'47']) !!}
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }} required">
                                {!! Form::label('address1', trans('register.address1'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('address1', old('address1'), ['class'=>'form-control validate-address', 'maxlength'=>'47']) !!}
                                    @if ($errors->has('address1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                {!! Form::label('country', trans('country'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('country', old('country'), ['class'=>'form-control validate-address', 'maxlength'=>'47']) !!}
                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }} required">
                                {!! Form::label('Sex', trans('sex'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-3">
                                    {{-- {!!Form::select('size', array('L' => 'Large', 'S' => 'Small'), 'S');!!} --}}
                                    <select name="sex" class="form-control validate-address" aria-invalid="false">
                                        <option value="Male" selected="selected">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @if ($errors->has('sex'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{-- <div class="col-md-3">
                                    {!! Form::text('state', old('state'), ['class'=>'form-control', 'placeholder' => trans('register.state'), 'maxlength'=>'50']) !!}
                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> --}}

                                {{-- <div class="form-group">
                                    {!! Form::label('zip', trans('register.zip').' & '.trans('register.zip4'), ['class' => 'col-md-3 control-label']) !!}
                                    <div class="col-md-3">
                                        {!! Form::text('zip', old('zip'), ['placeholder'=>'Zip', 'class'=>'form-control']) !!}
                                    </div> --}}

                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} required">
                                {!! Form::label('phone', trans('register.phone'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('phone', old('phone'), ['class'=>'form-control validate-phone', 'maxlength'=>'10']) !!}
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    {{ trans('register.example') }}: 1234441112
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} required">
                                {!! Form::label('username', trans('register.username'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('username', old('username'), ['class'=>'form-control', 'maxlength'=>'64']) !!}
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} required">
                                {!! Form::label('email', trans('register.email'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::email('email', old('email'), ['class'=>'form-control', 'maxlength'=>'64']) !!}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} required">
                                {!! Form::label('password', trans('register.password'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::password('password', ['class'=>'form-control']) !!}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} required">
                                {!! Form::label('password_confirmation', trans('register.password_confirmation'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} required">
                                {!! Form::label('code', trans('register.code'), ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                {!! Form::text('code', old('code'), ['placeholder'=> trans('register.code'),'class'=>'form-control validate-name', 'maxlength'=>'255']) !!}
                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{ url('/terms-of-use')}}"
                                       target="_blank">{{ trans('register.download_terms') }}</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    {!! Form::checkbox('agree', 'YES') !!}<?= trans('register.agree')?>
                                </div>

                            </div>
                            <div class="col-md-offset-4 col-md-4" style="padding-bottom: 15px">
                                <div class="col-md-12 pull-right">
                                    <div class="g-recaptcha"
                                         data-sitekey="6Ld0aaoUAAAAAIBLykzBDEYrNyfaYA_j9PMzzXrV"></div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div style="margin-left: 30%">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <i class="fa fa-btn fa-user-plus"></i> {{ trans('register.submit') }}
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <br>
                        @else
                            <h1>{{ trans('register.no_referal') }}</h1>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
    <br>
@endsection
