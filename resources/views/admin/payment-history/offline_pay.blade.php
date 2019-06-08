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
                <th>Order No.</th>
                <th scope="col">Date</th>
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
            <?php $count = 1?>
            @foreach($data as $item)
                <tr>
                    <th>{{$count++}}</th>
                    <th>{{$item->created_at}}</th>
                    <td>{{$item->name_of_subscriber}}</td>
                    <td>{{$item->country}}</td>
                    {{--<td>{{$item->payment_type}}</td>
                    <td>{{$item->bank_slip_no}}</td>
                    <td>{{$item->account_no}}</td>--}}
                    <td>{{$item->amount_paid}}</td>
                    <td><a class="btn btn-success btn-sm" href="offline_pay/details/{{$item->id}}" role="button">View
                            Details</a>
                        <a onclick="return deleteevent()" class="btn btn-danger btn-sm"
                           href="offline_pay/delete/{{$item->id}}"
                           role="button">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $data->links() !!}
    </div>
@endsection
<script>
    function deleteevent() {
        if (confirm("Are you sure want to delete")) {
            return true;
        } else {
            return false;
        }
    }
</script>
