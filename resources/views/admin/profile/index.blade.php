@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Profile') }}
@endsection

@section('content')


<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('method' => 'put', 'files' => true, 'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('email', trans('Email'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! $user->email !!}
                </div>
            </div>
           
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('first_name', trans('First Name'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('first_name',$user->first_name, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('last_name', trans('Last Name'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('last_name',$user->last_name, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('address1', trans('Address1'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('address1',$user->address1, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('address2', trans('Address2'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('address2',$user->address2, ['class'=>'form-control']) !!}
                </div>
            </div>
        
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('city', trans('City'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('city',$user->city, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('state', trans('State'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('state', $user->state, ['class'=>'form-control', 'maxlength'=>'50']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('zip', trans('ZIP'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('zip',$user->zip, ['class'=>'form-control', 'maxlength'=> 5]) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('phone', trans('Phone'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone',$user->phone, ['class'=>'form-control', 'maxlength'=> 10]) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                        <a class="btn btn-default btn-close" href="{{ URL::route('admin.user') }}">{{ trans('Cancel') }}</a>
                        {!! Form::submit(trans('Update Changes'), ['class' => 'btn btn-primary']) !!}

                </div>
            </div>

        {!! Form::close() !!}
    </div>    
</div>

<!-- Password Update Form -->
<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('method' => 'put', 'route'=>'admin.manage-profile.update-password', 'files' => true, 'class'=>'form-horizontal')) !!}

        <h2>Change Password</h2>
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('old_password', trans('Old Password'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::password('old_password', ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('password', trans('New Password'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('password_confirmation', trans('New Password Confirmation'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                        <a class="btn btn-default btn-close" href="{{ URL::route('admin.user') }}">{{ trans('Cancel') }}</a>
                        {!! Form::submit(trans('Update Changes'), ['class' => 'btn btn-primary']) !!}

                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection
