@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Goals') }}
@endsection

@section('content')

    <div class="panel-body">
        <div class="container text-center">
            <a href="/admin/video/add" class="btn btn-primary">Add NEW</a>
        </div>
        <table class="table table-sm">
            <thead>

            <tr>
                <th scope="col">Video Link</th>
                <th scope="col" style="width: 39%;">Language</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($videoData as $item)
                <tr>
                    <td>{{$item->link}}</td>
                    <td> {{$item->lang}}</td>
                    <td>
                        <div class="row">
                            <div class="col-lg-3">
                                <form action="video/edit/{{$item->id}}">
                                    <button type="submit" class="btn btn-info">Edit</button>
                                </form>
                                <form action="video/delete/{{$item->id}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
