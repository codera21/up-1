@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Edit FAQs') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('id' => 'manage-bank', 'method' => 'put', 'files' => false,'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('bank_name', trans('Bank Name'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('bank_name', $bank->bank_name, ['id'=>'bank_name', 'class'=>'form-control']) !!}                    
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('account_title', trans('Account Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('account_title', $bank->account_title, ['id'=>'account_title', 'class'=>'form-control']) !!}                    
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('account_no', trans('Account no'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('account_no', $bank->account_no, ['id'=>'account_no', 'class'=>'form-control']) !!}                    
                </div>
            </div>

                        
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.faq') }}">{{ trans('Cancel') }}</a>
                    {!! Form::submit(trans('Update Changes'), ['class' => 'btn btn-success']) !!}
                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection