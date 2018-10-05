@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('Add Payment Method') }}
@endsection

@section('content')

{!! Form::open(['id' => 'payment-add-profile', 'route' => 'payment-profile.add-profile', 'method' => 'post', 'files' => false, 'class'=>'form-horizontal']) !!}
<!--https://developer.paypal.com/docs/api/vault/ -->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-4">
                {!! Form::label('payment_type', trans('Payment Method'), ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-8">
                {!! Form::radios('payment_type',['CARD' => 'Credit Card', 'OFFLINE BANK' => 'Offline Bank'] , old('payment_type', 'CARD'), []) !!}
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        
        <div class="card-info {{ old('payment_type', 'CARD') =='CARD' ? '' : 'hidden' }}">
            <h3>Credit Card Information</h3>
        
            <div class="form-group {{ $errors->has('card_no') ? ' has-error' : '' }} required">
                <div class="col-md-4">
                    {!! Form::label('card_no', trans('Card Number'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::text('card_no', old('card_no'), ['class'=>'form-control', 'maxlength'=>'47']) !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('card_exp_date') ? ' has-error' : '' }} required">
                <div class="col-md-4">
                    {!! Form::label('card_exp_date', trans('Expiration Date'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::text('card_exp_date', old('card_exp_date'), ['placeholder' => 'MM-YYYY', 'class' => 'form-control', 'maxlength' => '7']) !!}
                </div>
            </div>
        </div>
        
        <div class="bank-info {{ old('payment_type', 'CARD') =='OFFLINE BANK' ? '' : 'hidden' }}">
            <h3>Bank Account Holder Information</h3>
        
            <div class="form-group {{ $errors->has('bank_name') ? ' has-error' : '' }} required">
                <div class="col-md-4">
                    {!! Form::label('bank_name', trans('Bank Name'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::text('bank_name', old('bank_name'), ['class'=>'form-control', 'maxlength'=>'47']) !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('bank_routing_no') ? ' has-error' : '' }} required">
                <div class="col-md-4">
                    {!! Form::label('bank_routing_no', trans('Bank Routing Number'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::text('bank_routing_no', old('bank_routing_no'), ['class'=>'form-control', 'maxlength'=>'47']) !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('bank_account_no') ? ' has-error' : '' }} required">
                <div class="col-md-4">
                    {!! Form::label('bank_account_no', trans('Bank Account Number'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::text('bank_account_no', old('bank_account_no'), ['class'=>'form-control', 'maxlength'=>'47']) !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('bank_account_type') ? ' has-error' : '' }} required">
                <div class="col-md-4">
                    {!! Form::label('bank_account_type', trans('Bank Account Type'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::select('bank_account_type', ['CHECKING' => 'Checking', 'SAVINGS' => 'Savings'], old('bank_account_type'), ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        
        
        
        <div class="form-group">
            <div class="col-md-4">
                {!! Form::label('default', trans('Payment Method'), ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-8">
                {!! Form::radios('default',['YES' => 'Yes', 'NO' => 'No'] , 'YES', ['class'=>'']) !!}
            </div>
        </div>
        
        
        
        
    </div>
    <div class="col-md-6">
        <h3 class="card-info {{ old('payment_type', 'CARD') =='CARD' ? '' : 'hidden' }}">Card Holder Information</h3>
        <h3 class="bank-info {{ old('payment_type', 'CARD') =='BANK' ? '' : 'hidden' }}">Bank Account Holder Information</h3>
        
        
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} required">
            <div class="col-md-4">
                {!! Form::label('name', trans('Name on Card'), ['class' => 'control-label card-info ' . (old('payment_type', 'CARD') =='CARD' ? '' : 'hidden')]) !!}
                {!! Form::label('name', trans('Name on Bank Account'), ['class' => 'control-label bank-info '. (old('payment_type', 'CARD') =='BANK' ? '' : 'hidden')]) !!}
            </div>
            <div class="col-md-8">
                {!! Form::text('name', old('name', Auth::user()->name), ['class'=>'form-control validate-name', 'maxlength'=>'47']) !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} required">
            <div class="col-md-4">
                {!! Form::label('address', trans('Address'), ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-8">
                {!! Form::text('address', old('address'), ['class'=>'form-control validate-address', 'maxlength'=>'47']) !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} required">
            <div class="col-md-4">
                {!! Form::label('city', trans('City'), ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-8">
                {!! Form::text('city', old('city'), ['class'=>'form-control validate-city', 'maxlength'=>'50']) !!}
            </div>
        </div>
        
        
        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} required">
            <div class="col-md-4">
                {!! Form::label('state', trans('State'), ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-8">
                
                {!! Form::text('state', old('state'), ['class'=>'form-control', 'maxlength'=>'50']) !!}
            </div>
        </div>

        <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
            <div class="col-md-4">
                {!! Form::label('zip', trans('Zip'), ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::text('zip', old('zip'), ['class'=>'form-control validate-zip', 'maxlength'=>'5']) !!}
            </div>
           
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} required">
            <div class="col-md-4">
                {!! Form::label('phone', trans('Phone'), ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::text('phone', old('phone'), ['class'=>'form-control validate-phone', 'maxlength'=>'10']) !!}
            </div>
            <div class="col-md-4">
                Example: 91234441111
            </div>
        </div>
        
       
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-default btn-close" href="{{ route('payment-profile') }}">{{ trans('Back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ trans('Save Profile') }}</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
                        
{!! Form::close() !!}
@endsection
