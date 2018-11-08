@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Page') }}
@endsection

@section('content')

    <div class="panel panel-default" style="padding-top: 2rem">
        <div class="panel-heading">
            <a href="about/add">
                <button type="button" class="btn btn-primary" style="margin-left: 90%;">Add</button>
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Title</th>
                    <th scope="col" style="width: 39%;">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($about_us as $about)
                    <tr>
                        <th scope="row">{{$about->id}}</th>
                        <td>{{$about->title}}</td>
                        <td><?php echo $about->description?></td>
                        <td>
                            <div class="row">
                                <div class="col-lg-3">
                                    <form action="about/edit/{{$about->id}}">
                                        <button type="submit" class="btn btn-Success">Edit</button>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <form action="about/delete/{{$about->id}} ">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
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
        <div class="text-center">
            {!! $about_us->links()!!}
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