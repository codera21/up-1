@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('Profile-dashboard') }}
@endsection
@section('content')
    <div class="panel panel-default" style="padding-top: 2rem">
        <div class="panel-heading">
            <p>Edit form</p>
        </div>
        <div class="panel-body">
            @include('layouts.user_backend.flash')
            <div class="ibox-content">
                <form action="/company/update/{{$user_id}}" id="manage-faq" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Company Name</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="name" name="name" class="form-control" id="company_name"
                                           aria-describedby="emailHelp" value="{{$company_data1->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Company Moto</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="name" name="company_moto" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" value="{{$company_data1->company_moto}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Description</label>
                                </div>
                                <div class="col-lg-7">
                                    <textarea name="description" id="answer" cols="30" rows="5">{{$company_data1->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Address</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="name" name="address" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" value="{{$company_data1->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Email</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="name" name="email" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" value="{{$company_data1->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Contact</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="name" name="contact" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" value="{{$company_data1->contact}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Company Description Title</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="name" name="change_description" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" value="{{$company_data1->company_description_title}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Company Image Title</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="name" name="change_images" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" value="{{$company_data1->company_image_title}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group container required" id="thumbnail">
                            <div class="row">
                                <div class="col-lg-4">
                                    {!! Form::label('back_photo', trans('photo'), ['class' => 'control-label']) !!}
                                </div>
                                <div class="col-lg-4">
                                    {!! Form::file('back_photo') !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success btn-md" style="margin-left: 50%">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        //Generate Slug
        $('#slug').slugify('#question', {
                slugFunc: function (str) {
                    return jQuery.fn.buildSlug(str);
                }
            }
        );

        //Display CKEDITOR for content
        CKEDITOR.replace('answer',
            {
                toolbar: 'Standard', /* this does the magic */
            });
    })
</script>
@endpush