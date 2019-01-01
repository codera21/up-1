@extends('layouts.backend.default')

@section('page_title')
    {{ trans('User Payments Details') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>Receipt Photo</h4>
                <img src="{{$data->receipt_photo}}"
                     alt="" width="400" height="400">
            </div>
            <div class="col-lg-6">
                <h4>
                    <mark>Information of Payment</mark>
                </h4>
                <div class="row">
                    <div class="col-lg-4">
                        <h4><b>Name of Subscriber:</b></h4>
                        <h4><b>Country</b></h4>
                        <h4><b>Payment Type</b></h4>
                        <h4><b>Account No</b></h4>
                        <h4><b>Amount Paid</b></h4>
                    </div>
                    <div class="col-lg-4">
                        <h4>{{ $data->name_of_subscriber}}</h4>
                        <h4>{{$data->country}}</h4>
                        <h4>{{$data->payment_type}}</h4>
                        <h4>{{$data->account_no}}</h4>
                        <h4><?php echo Session::get('curr') ?>{{$data->amount_paid}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
