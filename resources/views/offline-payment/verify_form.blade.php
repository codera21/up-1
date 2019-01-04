@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('page_title.verify') }}
@endsection
@section('content')

    <div class="panel-body">
        <div class="ibox-content">
            <form action="{{route('offline_pay.search')}}" enctype="multipart/form-data" id="manage-faq" method="" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset>
                    {{--//Name of subscriber--}}
                    <div class="form-group container">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="exampleInputEmail1">Payment receipt number</label>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="bank_slip_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" placeholder="Payment Receipt No" required>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-success btn-md" style="margin-left: 45%">Verify</button>
                <input type="hidden" value="{{csrf_token()}}" name="_token">
            </form>
        </div>
    </div>

@endsection
