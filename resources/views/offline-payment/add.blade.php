@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('offline_payment.title') }}
@endsection

@section('content')

    {!! Form::open(['id' => 'offline-payment-add', 'route' => 'offline-payment.add', 'method' => 'post', 'files' => false, 'class'=>'form-horizontal']) !!}
        <div class="col-md-12">

            <h5>{{ trans('offline_payment.note_1') }}<br />
            {{ trans('note_2') }}<br />
            {{ trans('note_3') }}<br />
            {{ trans('note_4') }} </h5>
            <p class="cleafix"></p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        {!! Form::label('payment_for', trans('offline_payment.payment_for'), ['class' => 'control-label']) !!}
                                    </div>
                                    <div class="col-md-8">
                                        {!! Form::radios('payment_for',['MATERIAL' => 'Video / Course', 'SUBSCRIPTION' => 'Subscription'] , old('payment_for', 'MATERIAL'), []) !!}
                                        {{ Form::text('paid_for', 'SUBSCRIPTION', ['class' => 'hidden']) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('slip_no') ? ' has-error' : '' }} required">

                                    <div class="col-md-3">
                                        {!! Form::label('bank_id', trans('offline_payment.bank_account'), ['class' => 'control-label']) !!}
                                    </div>
                                    <div class="col-md-9">
                                        {!! Form::selectBankAccount('bank_id', old('bank_id'), ['class'=>'form-control']) !!}

                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('slip_no') ? ' has-error' : '' }} required">

                                    <div class="col-md-3">
                                        {!! Form::label('bank_slip_no', trans('offline_payment.bank_slip_no'), ['class' => 'control-label']) !!}
                                    </div>

                                    <div class="col-md-9">
                                        {!! Form::text('bank_slip_no', old('bank_slip_no'), ['class'=>'form-control']) !!}

                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('amount_paid') ? ' has-error' : '' }} required">

                                    <div class="col-md-3">
                                        {!! Form::label('amount_paid', trans('offline_payment.amount_paid'), ['class' => 'control-label']) !!}
                                    </div>
                                    <div class="col-md-9">
                                        {!! Form::text('amount_paid', old('amount_paid'), ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="material_info row clearfix {{ old('payment_for', 'MATERIAL') =='MATERIAL' ? '' : 'hidden' }}">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <div class="col-md-3">
                                        {!! Form::label('group_id', trans('offline_payment.group'), ['class' => 'control-label']) !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::label('paid_for', trans('offline_payment.purchase'), ['class' => 'control-label']) !!}
                                        {{ Form::radio('paid_for', 'GROUP', true) }}
                                    </div>
                                    <div class="col-md-7">

                                        {!! Form::selectGroup('group_id', old('group_id'), ['id'=>'group_id', 'class'=>'form-control']) !!}

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-3">
                                        {!! Form::label('sub_group_id', trans('offline_payment.level'), ['class' => 'control-label']) !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::label('paid_for', trans('offline_payment.purchase'), ['class' => 'control-label']) !!}
                                        {{ Form::radio('paid_for', 'LEVEL') }}
                                    </div>
                                    <div class="col-md-7">

                                        {!! Form::selectSubGroup('sub_group_id', old('sub_group_id'), ['id'=>'sub_group_id', 'class'=>'form-control']) !!}

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-3">
                                        {!! Form::label('material_id[]', trans('offline_payment.material'), ['class' => 'control-label']) !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::label('paid_for', trans('offline_payment.purchase'), ['class' => 'control-label']) !!}
                                        {{ Form::radio('paid_for', 'MATERIAL') }}
                                    </div>
                                    <div class="col-md-7" id="material-box">


                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        {!! Form::submit(trans('app.save_changes'), ['class' => 'btn btn-primary pull-right']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>

    {!! Form::close() !!}

@endsection
