@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('Offline-Payment') }}
@endsection
@section('content')

    <?php if ($count != 0) : ?>
    <div class="container">
        <div class="alert alert-success" role="alert">
            Your Payment is recorded in our database as follows.
        </div>
    </div>

    <table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Payment id</th>
        <th scope="col">Name</th>
        <th scope="col">Country</th>
        <th scope="col">Amount Paid</th>
        <th scope="col">Account no.</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{{$payment->id}}</th>
        <td>{{$payment->name_of_subscriber}}</td>
        <td>{{$payment->country}}</td>
        <td>{{$payment->amount_paid}}</td>
        <td>{{$payment->account_no}}</td>
    </tr>
    </tbody>
    </table>
    <?php else:;?>
    <div class="container">
        <div class="alert alert-danger" role="alert">Sorry! Your payment is not Recorded.</div>

    </div>
    <?php endif;?>
@endsection
