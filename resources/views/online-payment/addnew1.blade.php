<?php //dd($cancel); ?>
@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('online_payment.title') }}
@endsection

@section('content')
    <div class="container">
        <br>
        <div class="alert alert-info" role="alert">
            <b class="text-danger">Important</b>: {{trans('app.flash-message')}}
        </div>
        @if(env('SITE') =='ENG')
            <h3>
                <mark>1. Make one time Payment</mark>
            </h3>
            <br>
            <div class="alert alert-info" role="alert">
                {!!  __('app.payment_message') !!}
            </div>

            <div class="text-center" style="padding : 50px 0">
                <a class="btn btn-primary" style="color:#fff"
                   href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=37MF4DYE7RXKE">Pay for
                    this
                    month</a>
            </div>
        @endif
        @if(env('SITE')=='ENG')
            <h3>
                <mark>2. Make recurring payment</mark>
            </h3>

            <div class="text-center" style="padding : 50px 0">
                @if($cancel == 0)
                    <a class="btn btn-primary" style="color:#fff" href="{{url('/subscription/makeRecurringPayment')}}">Start
                        Subscription</a>
                @endif
                @if($cancel == 1)
                    <a class="btn btn-primary" href="{{url('subscription/cancelSubscription')}}" style="color:#fff">Cancel
                        Subscription</a>
                @endif

            </div>
        @endif
        <br>
        <br>
        {{--@if($notNow == 0)
            <div class="alert alert-danger" role="alert">
                {!!  __('app.not_now_message') !!}
            </div>
            <!-- not now btn -->
            <div class="row">
                <div class="text-center">
                    <div class="form-group">
                        <a href="{{url('online-payment/not_now')}}" class="btn btn-success"
                           style="color : #fff">
                            Not now!
                        </a>
                    </div>
                </div>
            </div>

            <!-- //-not now btn -->
        @endif--}}
    </div>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="https://dnasbookdigimarket.com/online-payment/cancelrecurring/?profile_id={{$profile_id}}"
                      method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Reason for Cancellation</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="control-label">Reason</label>
                            <textarea name="reason" id="reason" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Cancel Subscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <h3>
        <mark>3. Make your offline payment</mark>
    </h3>
    <form action="{{route('offline_pay.add')}}" enctype="multipart/form-data" id="manage-faq" method="POST"
          class="form-horizontal">
        {{ csrf_field() }}
        <fieldset>
            {{--//Name of subscriber--}}
            <div class="form-group container">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="exampleInputEmail1">Name of Subscriber</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="name_of_subscriber" class="form-control"
                               id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="" placeholder="Name of Subscriber" required>
                    </div>
                </div>
            </div>
            {{--//name of bank--}}

            {{--Name of country--}}
            <div class="form-group container">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="exampleInputEmail1">Country of Subscriber</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="country" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="" placeholder="country" required>
                    </div>
                </div>
            </div>
            {{--//means of payment--}}
            <div class="form-group container">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="exampleInputEmail1">Means of Payment</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="payment_type" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="" placeholder="Paymnet's Means" required>
                    </div>
                </div>
            </div>
            {{--//Account number--}}
            <div class="form-group container">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="exampleInputEmail1">Payment receipt number</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="bank_slip_no" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="" placeholder="Bank slip no" required>
                    </div>
                </div>
            </div>

            <div class="form-group container">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="exampleInputEmail1">Account Number the payment is sent to</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="account_no" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="" placeholder="Account No" required>
                    </div>
                </div>
            </div>
            <div class="form-group container">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="exampleInputEmail1">Amount paid</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="amount_paid" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="" placeholder="Amount paid" required>
                    </div>
                </div>
            </div>

            <div class="form-group container">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="exampleInputEmail1">Upload Receipt copy</label>
                    </div>
                    <div class="col-lg-4">
                        <input name="receipt_photo" type="file" required>
                    </div>
                </div>
            </div>
        </fieldset>
        <input type="hidden" value="{{csrf_token()}}" name="_token">
        <button type="submit" class="btn btn-success btn-md" style="margin-left: 45%">Save Changes</button>
    </form>
    <br>
    <br>
@endsection
