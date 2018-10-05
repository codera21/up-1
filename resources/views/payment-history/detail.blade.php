@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('payment_history.payment_details') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
         <table class="table table-bordered table-striped">
            <tbody>

                <tr>
                    <td width="30%">{{ trans('app.id') }}</td>
                    <td width="70%">{!! $payment->id !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('payment_history.payment_date') }}</td>
                    <td>{!! $payment->created_at !!}</td>
                </tr>
                
                <tr>
                    <td>{{ trans('payment_history.payment_mode') }}</td>
                    <td>{!! $payment->payment_mode !!}</td>
                </tr>
                @if($payment->payment_mode == "OFFLINE")
                <tr>
                    <td>{{ trans('payment_history.bank_slip_no') }}</td>
                    <td>{!! $payment->bank_slip_no !!}</td>
                </tr>
                <tr>
                    <td>{{ trans('payment_history.bank_name') }}</td>
                    <td>{!! $payment->bank->bank_name !!}</td>
                </tr>
                <tr>
                    <td>{{ trans('payment_history.account_title') }}</td>
                    <td>{!! $payment->bank->account_title !!}</td>
                </tr>
                <tr>
                    <td>{{ trans('payment_history.account_no') }}</td>
                    <td>{!! $payment->bank->account_no !!}</td>
                </tr>
                @endif
                <tr>
                    <td>{{ trans('payment_history.payment_type') }}</td>
                    <td>{!! $payment->payment_type !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('payment_history.payment_for') }}</td>
                    <td>{!! $payment->paid_for !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('payment_history.amount') }}</td>
                    <td>{!! $payment->amount_paid !!}</td>
                </tr>
                
                               
            </tbody>
        </table>

        @if($payment->paid_for != "SUBSCRIPTION")
        <div class="row">
            <table class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th>{{ trans('app.group') }}</th>
                        <th>{{ trans('app.level') }}</th>
                        <th>{{ trans('app') }}</th>
                        <th>{{ trans('app.start_date') }}</th>
                        <th>{{ trans('app.end_date') }}</th>
                        <th>{{ trans('app.amount') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if($payment->paymentDetails->count() > 0)
                        @foreach($payment->paymentDetails as $item)                              
                            <tr>
                                <td>{{ $item->materialGroup->title }}</td>
                                <td>{{ $item->materialSubGroup->title }}</td>
                                <td>{{ $item->material->title }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>${{ Helper::moneyFormat($item->amount) }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        @endif
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ route('payment-history') }}" class="btn btn-default btn-close"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('app.back') }}</a>
            </div>
        </div>

    </div>
</div>

@endsection
