@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('online_payment.title') }}
@endsection

@section('content')
    <div class="container">
        <br>
        <div class="alert alert-info" role="alert">
            {!!  __('app.payment_message') !!}
        </div>

        <div class="text-center" style="padding : 50px 0">
            <a class="btn btn-primary" style="color:#fff"
               href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=37MF4DYE7RXKE">Pay for this
                month</a>
        </div>
        <h3>Make your offline payment</h3>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="/offline_pay" allowfullscreen></iframe>
        </div>
        <br>
        <br>
        @if($notNow == 0)
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
        @endif
    </div>

@endsection
