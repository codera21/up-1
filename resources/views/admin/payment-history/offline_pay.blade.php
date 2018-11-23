@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Offline Payments History') }}
@endsection

@section('content')


    <div class="container-fluid">
        <br>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name of Subs</th>
                <th scope="col">Country</th>
                {{--<th scope="col">Means of Payment</th>
                <th scope="col">Payment receipt no.</th>
                <th scope="col">Account No.</th>--}}
                <th scope="col">Amount Paid</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name_of_subscriber}}</td>
                    <td>{{$item->country}}</td>
                    {{--<td>{{$item->payment_type}}</td>
                    <td>{{$item->bank_slip_no}}</td>
                    <td>{{$item->account_no}}</td>--}}
                    <td>{{$item->amount_paid}}</td>
                    <td><a class="btn btn-success btn-sm" href="offline_pay/details/{{$item->id}}" role="button">View Details</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
