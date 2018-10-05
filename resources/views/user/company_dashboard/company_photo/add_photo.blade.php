@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('Profile-dashboard') }}
@endsection
@section('content')
    <div class="panel panel-default" style="padding-top: 2rem">
        @include('layouts.user_backend.flash')
        <div class="panel-heading">
            <p>Add Photo</p>
        </div>
        <div class="panel-body">
            <div class="ibox-content">
               {{-- <form action="/photo/store" id="manage-faq" method="post" class="form-horizontal" enctype="multipart/form-data">--}}
                {!! Form::open(array('id' => 'company_pic', 'route' => 'photo.store', 'method' => 'post', 'files' => true,'class'=>'form-horizontal')) !!}


                {{ csrf_field() }}

                <fieldset>
                    <div class="form-group">
                       1 <label class="control-label col-sm-2">Pic Name:</label>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="name"></input>
                        </div>
                    </div>
                    <div class="form-group required" id="thumbnail">
                        <div class="col-md-4">
                            {!! Form::label('company_photo', trans('Thumbnail'), ['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::file('company_photo',['required'=>'']) !!}
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-success btn-md" style="margin-left: 50%">Add</button>
                </form>
                {{--{!! Form::close() !!}--}}
            </div>
        </div>
    </div>
@endsection
