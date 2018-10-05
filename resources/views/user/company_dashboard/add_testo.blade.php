@extends('layouts.user_backend.default')
@section('page_title')
    {{ trans('Profile-dashboard') }}
@endsection
@section('content')
    <div class="panel panel-default" style="padding-top: 2rem">
        @include('layouts.user_backend.flash')
        <div class="panel-heading">
            <p>Edit form</p>
        </div>
        <div class="panel-body">
            <div class="ibox-content">
                <form action="/testo/store" id="manage-faq" method="" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="Put">
                    <fieldset>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Name</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="name" name="name" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" value="" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1">Testomonial</label>
                                </div>
                                <div class="col-lg-4">
                                    <textarea name="testomonial" cols="80" rows="10"
                                              placeholder="Add what other say about your company"></textarea>
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
