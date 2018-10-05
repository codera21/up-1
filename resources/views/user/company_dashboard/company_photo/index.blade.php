@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('Company-Photo') }}
@endsection
@section('content')
    @include('layouts.user_backend.flash')
    <div class="panel panel-default" style="padding-top: 2rem">
        <div class="panel-heading">
            <a href="/photo/add">
                <button type="button" class="btn btn-primary" style="margin-left: 90%;">Add</button>
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($company_data1 as $company)
                    <tr>
                        <th scope="row">{{$company->id}}</th>
                        <td style="width: 60%"><img src="{{ $company->photo_url }}" alt="" width="200px" height="200px">
                        </td>
                        <td>
                            <div class="row">
                               {{-- <div class="col-lg-2">
                                    <form action="{{route('photo.delete',[$company->id])}}">
                                        <button type="submit" class="btn btn-Success">Edit</button>
                                    </form>
                                </div>--}}
                                <div class="col-lg-2">
                                    <form action="/photo/delete/{{$company->id}}">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <!-- Button trigger modal -->
                                        <button type="submit" class="btn btn-danger" data-toggle="modal"
                                                data-target="#myModal" onclick="ConfirmDelete()">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
<script>
    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (!x)
            event.preventDefault();
    }

</script>
