@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('login.page_title') }}
@endsection

@section('content')
    <div class="featured-boxes">
        <div class="row">
            <div class="col-sm-8 col-md-offset-2">

                <div class="featured-box featured-box-primary align-left">

                    <div class="box-content">

                        {!! Form::open(['id' => 'login', 'url' => '/login', 'method' => 'post', 'files' => false, 'class'=>'form-horizontal contact']) !!}


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} required">

                            <div class="col-md-12">
                                {!! Form::label('email', trans('login.email'), ['class' => 'control-label']) !!}
                                {!! Form::email('email', old('email'), ['class'=>'form-control input-lg', 'tabindex'=>'1']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} required">

                            <div class="col-md-12">
                                {!! Form::label('password', trans('login.password'), ['class' => 'control-label']) !!}
                                <a class="pull-right"
                                   href="{{ url('/password/reset') }}">{{ trans('login.forgot_password') }}</a>

                                {!! Form::password('password', ['class'=>'form-control input-lg' , 'tabindex'=>'2']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-md-6 pull-left">
                                {!! Form::checkbox('remember',null) !!} {{ trans('login.remember_me') }}
                            </div>

                            <div class="col-md-6 pull-right">
                                <button type="submit" class="btn btn-lg btn-primary pull-right" tabindex="3">
                                    <i class="fa fa-btn fa-sign-in"></i> {{ trans('login.submit') }}
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
