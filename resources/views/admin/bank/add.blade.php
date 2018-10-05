@extends('layouts.backend.default')

@section('page_title')
    {{ trans('New Bank') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('id' => 'manage-bank', 'route' => 'admin.bank.add', 'method' => 'post', 'files' => false,'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('bank_name', trans('Bank Name'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('bank_name', old('bank_name'), ['id'=>'bank_name', 'class'=>'form-control']) !!}                    
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('account_title', trans('Account Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('account_title', old('account_title'), ['id'=>'account_title', 'class'=>'form-control']) !!}                    
                </div>
            </div>
                                                                
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('account_no', trans('Account no'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('account_no', old('account_no'), ['id'=>'account_no', 'class'=>'form-control']) !!}                    
                </div>
            </div>            
           
        
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.bank') }}">{{ trans('Cancel') }}</a>
                    {!! Form::submit(trans('Save Changes'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection