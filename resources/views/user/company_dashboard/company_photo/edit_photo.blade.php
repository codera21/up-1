{{--
@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('Profile-dashboard') }}
@endsection
@section('content')
    <div class="panel panel-default" style="padding-top: 2rem">
        @include('layouts.user_backend.flash')
        <div class="panel-heading">
            <p>Edit Photo</p>
        </div>
        <div class="panel-body">
            <div class="ibox-content">
                <form action="" id="manage-faq" method="" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="Put">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pic Name:</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="name"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Upload Pic:</label>
                            <div class="col-xs-3">
                                <input type="file" name="photo_url"></input>
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success btn-md" style="margin-left: 50%">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
--}}
>>>>>>> c00e088594c7225db25ffde7a9090d083b4949f0
