

{{--this is company dashboard--}}
@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('Profile-dashboard') }}
@endsection
@section('content')
    <div class="panel panel-default" style="padding-top: 2rem">
        <div class="panel-heading">
            <a href="/company/edit/{{$company_data1->id}}"><button type="button" class="btn btn-primary" style="margin-left: 90%;">Edit</button></a>
        </div>
        <div class="panel-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Company Moto</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                </tr>
                </thead>
                <tbody>
                @foreach($company_data as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->company_moto }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{$company->contact}}</td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection