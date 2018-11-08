@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Manage FAQs') }}
@endsection

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">
            {!! Form::open(array('id' => 'manage-faq', 'route' => 'admin.about.add', 'method' => 'post', 'files' => false,'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('Title', trans('Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('title', old('title'), ['id'=>'title', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('slug', trans('Slug'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('slug', old('slug'), ['id'=>'slug', 'class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('Description', trans('Description'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::textarea('description', old('description'), ['id'=>'description', 'class'=>'form-control']) !!}
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
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.about') }}">{{ trans('Cancel') }}</a>
                    {!! Form::submit(trans('Save Changes'), ['class' => 'btn btn-primary']) !!}
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
        CKEDITOR.replace('description',
            {
                toolbar: 'Standard', /* this does the magic */
            });
    })
</script>
@endpush