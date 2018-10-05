@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('reset_password.page_title') }}
@endsection

@section('content')
<div class="featured-boxes">
    <div class="row">
        <div class="col-sm-8 col-md-offset-2">
            
            <div class="featured-box featured-box-primary">
    
                <div class="box-content">

                    {!! Form::open(['id' => 'reset-password', 'url' => '/password/reset', 'method' => 'post', 'files' => false, 'class'=>'form-horizontal']) !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} required">
                            {!! Form::label('email', trans('reset_password.email'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::email('email', old('email'), ['class'=>'form-control']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} required">
                            {!! Form::label('password', trans('reset_password.password'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} required">
                            {!! Form::label('password_confirmation', trans('reset_password.password_confirmation'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-primary pull-right">
                                    <i class="fa fa-btn"></i> {{ trans('reset_password.submit') }}
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
            
        </div>

    </div>
</div>

@endsection
