@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Edit Block') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('method' => 'put', 'files' => true,'class'=>'form-horizontal')) !!}
	
            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('language', trans('Language'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::select('language', ['en' => 'English', 'fr' => 'French'], $block->language, ['class'=>'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('title', trans('Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('title', $block->title, ['id'=>'title', 'class'=>'form-control']) !!}
                    {!! Form::hidden('slug', $block->slug, ['id'=>'slug', 'class'=>'form-control']) !!}
                </div>
            </div>
                            
            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('content', trans('Content'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::textarea('content',$block->content, ['id'=>'block-content', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.block') }}">{{ trans('Cancel') }}</a>
                    {!! Form::submit(trans('Update Changes'), ['class' => 'btn btn-success']) !!}
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

            //Display CKEDITOR for long description
            CKEDITOR.replace( 'block-content',
            {
                toolbar : 'Standard', /* this does the magic */
            });
        })
    </script>
@endpush