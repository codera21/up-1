@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Edit Banners on Page') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('id' => 'banner', 'method' => 'put', 'files' => false,'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('page', trans('Page'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('page', old('page', $banner->page), ['id'=>'page', 'class'=>'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('title', trans('Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('title', old('title', $banner->title), ['id'=>'title', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('banner_728_90', trans('728 x 90 Banner'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('banner_728_90', 'YES', ($banner->banner_728_90=='YES' ? true:false)) !!}
                </div>
            </div>
                  
            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('see_more_ads', trans('See More Ads'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('see_more_ads', 'YES', ($banner->see_more_ads=='YES' ? true:false)) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('see_more_text', trans('See More Text'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('see_more_text', 'YES', ($banner->see_more_text=='YES' ? true:false)) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('banner_300_250', trans('300 x 250 Banner'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('banner_300_250', 'YES' , ($banner->banner_300_250=='YES' ? true:false)) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('text_banners', trans('Text Banner'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('text_banners', 'YES', ($banner->text_banners=='YES' ? true:false)) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('banner_160_60', trans('160 x 600 Banners'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!!  Form::select('banner_160_600', array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), $banner->banner_160_600, ['class'=>'form-control']) !!}
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