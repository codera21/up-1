@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('Testomonial-dashboard') }}
@endsection
@section('content')
    @include('layouts.user_backend.flash')
    <div class="panel panel-default" style="padding-top: 2rem">
        <div class="panel-heading">
            <a href="/testo/add">
                <button type="button" class="btn btn-primary" style="margin-left: 90%;">Add</button>
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="width: 39%;">Testomonial</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testo_data as $testo)
                    <tr>
                        <th scope="row">{{$testo->id}}</th>
                        <td>{{$testo->name}}</td>
                        <td>{{$testo->testomonial}}</td>
                        <td>
                            <div class="row">
                                <div class="col-lg-3">
                                    <form action="/testo/edit/{{$testo->id}}">
                                        <button type="submit" class="btn btn-Success">Edit</button>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <form action="/testo/delete/{{$testo->id}}">
                                        <button id="demo" type="submit" class="btn btn-danger" data-toggle="modal"
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
