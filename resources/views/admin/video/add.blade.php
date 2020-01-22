@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Add video Link') }}
@endsection

@section('content')

    <div class="container">
        <div class="container">
            <form action="{{route('admin.video.add')}}" method="post">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-group">
                            <label for="link">Link</label>
                            <textarea class="form-control" id="link" name="link" cols="5"
                                      rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lang">Language</label>
                            <select class="form-control" name="lang" id="lang">
                                <option value="en">English</option>
                                <option value="fr">French</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
