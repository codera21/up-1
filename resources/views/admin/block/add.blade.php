@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Add BLock') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('route' => 'admin.block.add', 'method' => 'post', 'files' => true,'class'=>'form-horizontal')) !!}

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('language', trans('Language'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::select('language', ['en' => 'English', 'fr' => 'French'], old('language'), ['class'=>'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('title', trans('Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('title', old('title'), ['id'=>'title', 'class'=>'form-control']) !!}
                    {!! Form::hidden('slug', old('slug'), ['id'=>'slug', 'class'=>'form-control']) !!}
                </div>
            </div>
                                                                
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('content', trans('Content'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::textarea('content', old('content'), ['id'=>'block-content', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.block') }}">{{ trans('Cancel') }}</a>
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
            CKEDITOR.replace( 'block-content',
            {
                toolbar : 'Standard', /* this does the magic */
            });
        })
    </script>
@endpush