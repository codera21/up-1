@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Dashboard Video Link') }}
@endsection

@section('content')


    <div class="panel panel-default" style="padding-top: 2rem">
        {{--<div class="panel-heading">
            <a href="about/add">
                <button type="button" class="btn btn-primary" style="margin-left: 90%;">Add</button>
            </a>
        </div>--}}
        <div class="panel-body">
            <table class="table table-sm">
                <thead>

                <tr>
                    <th scope="col"></th>
                    <th scope="col" style="width: 39%;"></th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($link as $item)
                    <?php if ($item->lang == 'en'){
                        $english = "English";
                    }else{
                        $english = "French";
                    } ?>
                    <tr>
                        <td> Edit {{$english}} Video Link here</td>
                        <td> {{$item->lang}}</td>
                        <td>
                            <div class="row">
                                <div class="col-lg-3">
                                    <form action="dashboardVideo/edit/{{$item->id}}">
                                        <button type="submit" class="btn btn-info">Edit</button>
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
