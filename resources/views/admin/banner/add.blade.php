@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Add Banners on Page') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('id' => 'banner', 'route' => 'admin.banner.add', 'method' => 'post', 'files' => false,'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('page', trans('Page'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('page', old('page'), ['id'=>'page', 'class'=>'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('title', trans('Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('title', old('title'), ['id'=>'title', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('banner_728_90', trans('728 x 90 Banner'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('banner_728_90', 'YES') !!}
                </div>
            </div>
                  
            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('see_more_ads', trans('See More Ads'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('see_more_ads', 'YES') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('see_more_text', trans('See More Text'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('see_more_text', 'YES') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('banner_300_250', trans('300 x 250 Banner'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('banner_300_250', 'YES') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('text_banners', trans('Text Banner'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('text_banners', 'YES') !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('banner_160_60', trans('160 x 600 Banners'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!!  Form::select('banner_160_600', array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), null, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.banner') }}">{{ trans('Cancel') }}</a>
                    {!! Form::submit(trans('Save Changes'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection