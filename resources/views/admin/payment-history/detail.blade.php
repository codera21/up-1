@extends('layouts.backend.default')

@section('page_title')
    {{ trans('User Payment - Detail') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
         <table class="table table-bordered table-striped">
            <tbody>

                <tr>
                    <td width="30%">{{ trans('ID') }}</td>
                    <td width="70%">{!! $payment->id !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Payment Date') }}</td>
                    <td>{!! $payment->created_at !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('User ID') }}</td>
                    <td>{!! $payment->user_id !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('User Name') }}</td>
                    <td>{!! $payment->user->last_name !!} {!! $payment->user->first_name !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Payment Mode') }}</td>
                    <td>{!! $payment->payment_mode !!}</td>
                </tr>
                @if($payment->payment_mode == "OFFLINE")
                <tr>
                    <td>{{ trans('Bank Slip #') }}</td>
                    <td>{!! $payment->bank_slip_no !!}</td>
                </tr>
                <tr>
                    <td>{{ trans('Bank Name') }}</td>
                    <td>{!! $payment->bank->bank_name !!}</td>
                </tr>
                <tr>
                    <td>{{ trans('Account Title') }}</td>
                    <td>{!! $payment->bank->account_title !!}</td>
                </tr>
                <tr>
                    <td>{{ trans('Account #') }}</td>
                    <td>{!! $payment->bank->account_no !!}</td>
                </tr>
                @endif
                <tr>
                    <td>{{ trans('Payment Type') }}</td>
                    <td>{!! $payment->payment_type !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Payment For') }}</td>
                    <td>{!! $payment->paid_for !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Amount') }}</td>
                    <td>{!! $payment->amount_paid !!}</td>
                </tr>
                
                               
            </tbody>
        </table>

        @if($payment->paid_for != "SUBSCRIPTION")
        <div class="row">
            <table class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th><input type='checkbox' name='' value='' class="check-all" data-for=".order-item-id" /></th>
                        <th>{{ trans('Group') }}</th>
                        <th>{{ trans('Level') }}</th>
                        <th>{{ trans('Video / Material') }}</th>
                        <th>{{ trans('Start Date') }}</th>
                        <th>{{ trans('End Date') }}</th>
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
                <a href="{{ route('payment-history') }}" class="btn btn-default btn-close"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('Back') }}</a>
            </div>
        </div>

    </div>
</div>

@endsection
