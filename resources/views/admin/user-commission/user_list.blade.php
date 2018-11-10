@extends('layouts.backend.default')

@section('page_title')
    {{ trans('User Commission') }}
@endsection

@section('content')
<h3>List Of All Subscriber.
</h3>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"style="width: 15%">User Id</th>
        <th scope="col" style="width: 15%">First Name</th>
        <th scope="col" style="width: 15%">Last Name</th>
        <th scope="col"style="width: 20%">Email</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->first_name}}</td>
            <td>{{$item->last_name}}</td>
            <td>{{$item->email}}</td>
            <td>
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('admin.user.details',array('id'=>$item->id))}}" class="btn btn-info btn-xs edit">Commission</a>
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $list->links() !!}
@endsection
<style>
    .names{
        font-size: 1.7rem;
    }
</style>