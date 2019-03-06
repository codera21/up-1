@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage Dashboard Video Link') }}
@endsection

@section('content')


    <form method="POST" action="{{route('admin.dashboard_video.edit',['id'=>$link->id])}}" accept-charset="UTF-8"
          id="manage-faq" class="form-horizontal">
        {!! csrf_field() !!}

        <div class="form-group">
            <div class="col-md-4">
                <label for="link" class="control-label">Link</label>
            </div>
            <div class="col-md-6">
                <input id="link" class="form-control" name="link" type="text" value="{{$link->link}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="lang" class="control-label">Language</label>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="lang" name="lang">
                    @if($link->lang == 'en')
                    <option value="en" selected="selected">English</option>
                        @elseif($link->lang == 'fr')
                    <option value="fr" selected>French</option>
                        @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <a class="btn btn-default btn-close" href="">Cancel</a>
                <input class="btn btn-success" type="submit" value="Update">
            </div>
        </div>

    </form>

@endsection
