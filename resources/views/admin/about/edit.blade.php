@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage FAQs') }}
@endsection

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">
            {!! Form::open(array('id' => 'manage-faq', 'method' => 'put', 'files' => false,'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('Title', trans('Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    <input id="title" class="form-control" name="title" type="text" value="{{$about->title}}">
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('slug', trans('Slug'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    <input id="slug" class="form-control" name="slug" type="text" value="{{$about->slug}}">
                </div>
            </div>
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('Description', trans('Description'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {{--{!! Form::textarea('description', $about->description,old('description'), ['id'=>'description', 'class'=>'form-control']) !!}--}}
                    <textarea rows="4" cols="50" class="description" id="description" name="description">{{$about->description}} </textarea>
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('lang', 'Language', ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::select('lang', array('en'=> 'English', 'fr'=>'French') , 'en' ,['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close"
                       href="{{ URL::route('admin.about') }}">{{ trans('Cancel') }}</a>
                    {!! Form::submit(trans('Update'), ['class' => 'btn btn-success']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection
@push('scripts')
<script>

    $(document).ready(function () {
        //Generate Slug
        $('#slug').slugify('#title', {
                slugFunc: function (str) {
                    return jQuery.fn.buildSlug(str);
                }
            }
        );

        //Display CKEDITOR for content
        $('.description').summernote({
            height: 200,
        });
    })
</script>
@endpush