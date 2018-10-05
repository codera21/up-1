@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Edit User') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('method' => 'put', 'files' => true,'class'=>'form-horizontal')) !!}

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('id', trans('ID'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! $user->id !!}
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('created_at', trans('Joined Date'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! $user->created_at !!}
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('first_name', trans('First Name'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! $user->first_name !!}
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('last_name', trans('Last Name'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! $user->last_name !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('is_active', trans('Active'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!!  Form::select('is_active', array('YES' => 'Yes', 'NO' => 'No'), $user->is_active, ['class'=>'form-control']) !!}
                </div>
            </div>
                            
            
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.user') }}">{{ trans('Back') }}</a>
                    {!! Form::submit(trans('Update Changes'), ['class' => 'btn btn-success']) !!}
                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection