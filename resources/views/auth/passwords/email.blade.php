@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('forgot_password.page_title') }}
@endsection

@section('content')

<div class="featured-boxes">
    <div class="row">
        <div class="col-sm-8 col-md-offset-2">
            
            <div class="featured-box featured-box-primary align-left">
    
                <div class="box-content">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['id' => 'forgot-password', 'url' => '/password/email', 'method' => 'post', 'files' => false, 'class'=>'form-horizontal']) !!}
                        

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} required">
                                
                                <div class="col-md-12">  
                                    {!! Form::label('email', trans('forgot_password.email'), ['class' => 'control-label']) !!}
                                    {!! Form::email('email', old('email'), ['class'=>'form-control input-lg']) !!}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-lg btn-primary pull-right">
                                        <i class="fa fa-btn fa-envelope"></i> {{ trans('forgot_password.submit') }}
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
