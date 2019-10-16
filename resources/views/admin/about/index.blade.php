@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage About Us Page') }}
@endsection

@section('content')
    <div class="panel panel-default" style="padding-top: 2rem">
        <div class="panel-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">Language</th>
                    <th scope="col" style="width: 39%;">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($about_us as $about)
                    <tr>

                        <td> {{ $about->lang }}</td>
                        <td> {!! $about->description !!}</td>
                        <td>
                            <div class="row">
                                <div class="col-lg-3">
                                    <form action="about/edit/{{$about->id}}">
                                        <button type="submit" class="btn btn-Success">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {!! $about_us->links()!!}
        </div>
    </div>

@endsection
