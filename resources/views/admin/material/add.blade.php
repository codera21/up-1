@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Add Material') }}
@endsection

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">
            {!! Form::open(array('id' => 'material', 'route' => 'admin.material.add', 'method' => 'post', 'files' => true,'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('group_id', trans('Group'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::selectGroup('group_id', old('group_id'), ['id'=>'group_id', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('sub_group_id', trans('Sub Group'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::selectSubGroup('sub_group_id', old('sub_group_id'), ['id'=>'sub_group_id', 'class'=>'form-control']) !!}
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
                    {!! Form::label('material_type', trans('Material Type'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::select('material_type', ['VIDEO' => 'Video', 'COURSE' => 'Course','WEBINAR'=> 'Webinar'], old('material_type'), ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required" id="material-video">
                <div class="col-md-4">
                    {!! Form::label('video_url', trans('Video Link'), ['class' => 'control-label']) !!}
                </div>

                <div class="col-md-6">
                    {!! Form::text('video_url_name', old('video_url_name'), ['id'=>'video_url_name', 'class'=>'form-control']) !!}

                </div>

            </div>


            <div class="form-group required" id="thumbnail">
                <div class="col-md-4">
                    {!! Form::label('thumbnail_url', trans('Thumbnail'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::file('thumbnail_url') !!}
                </div>
            </div>


            <div class="form-group required" id="material-course" style="display:none;">
                <div class="col-md-4">
                    {!! Form::label('url', trans('Material Page Url'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('url', old('url'), ['id'=>'url', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required" id="material-course" style="display:none;">
                <div class="col-md-4">
                    {!! Form::label('thumbnail', trans(' Thumbnail'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::file('thumbnail') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('description', trans('Description'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::textarea('description', old('description'), ['id'=>'description', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('price', trans('Price'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('price', old('price'), ['id'=>'slug', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('enable_payment_button', trans('Enable'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('enable_payment_button', 'YES') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close"
                       href="{{ URL::route('admin.material') }}">{{ trans('Cancel') }}</a>
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
            $('#slug').slugify('#title');

            //Display CKEDITOR for content
            $('#description').summernote({
                height: 150,
            });
        })
    </script>
@endpush