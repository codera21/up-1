@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Add Level') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('route' => 'admin.level.add', 'method' => 'post', 'files' => false,'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('level_title', trans('Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('level_title', old('level_title'), ['id'=>'title', 'class'=>'form-control']) !!}
                </div>
            </div>
                                                                
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('level_percentage', trans('Percentage'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('level_percentage', old('level_percentage'), ['id'=>'title_percentage', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('active', trans('Active'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('active', 'YES') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.level') }}">{{ trans('Cancel') }}</a>
                    {!! Form::submit(trans('Save Changes'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection
@push('scripts')
    <script>

        $(document).ready(function(){
            //Generate Slug
            $('#slug').slugify('#title');

            //Display CKEDITOR for content
            CKEDITOR.replace( 'description',
            {
                toolbar : 'Standard', /* this does the magic */
            });
        })
    </script>
@endpush