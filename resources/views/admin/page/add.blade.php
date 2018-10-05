@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Add Page') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('id' => 'manage-page', 'route' => 'admin.page.add', 'method' => 'post', 'files' => true,'class'=>'form-horizontal')) !!}

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('language', trans('Language'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::select('language', ['en' => 'English', 'fr' => 'French'], old('language'), ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    {!! Form::label('parent_id', trans('Parent Page'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::selectPage('parent_id', old('parent_id'), ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('layout', trans('Layout'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!!  Form::select('layout', array('' => 'Select Layout', 'NO SIDEBAR' => 'No Sidebar', 'LEFT SIDEBAR' => 'Left Sidebar', 'RIGHT SIDEBAR' => 'Right Sidebar', 'LEFT & RIGHT SIDEBARS' => 'Left & Right Sidebars '), null, ['class'=>'form-control', 'onchange'=>'javascript:jQuery.fn.changeLeftRightSidebars(this.value);']) !!}
                </div>
            </div>

            <div class="form-group" id="left-sidebar-block-box" {!! ((old('layout') == 'LEFT SIDEBAR'  or old('layout') == 'LEFT & RIGHT SIDEBARS') ? 'style="display:block"': 'style="display:none"') !!}>
                <div class="col-md-4">
                    {!! Form::label('left_sidebar_block_id', trans('Left Sidebard Block'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::selectBlock('left_sidebar_block_id', old('left_sidebar_block_id'), ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group" id="right-sidebar-block-box" {!! ((old('layout') == 'RIGHT SIDEBAR'  or old('layout') == 'LEFT & RIGHT SIDEBARS') ? 'style="display:block"': 'style="display:none"') !!}>
                <div class="col-md-4">
                    {!! Form::label('right_sidebar_block_id', trans('Right Sidebard Block'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::selectBlock('right_sidebar_block_id', old('right_sidebar_block_id'), ['class'=>'form-control']) !!}
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
                    {!! Form::label('content', trans('Content'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-8">
                    {!! Form::textarea('content', old('content'), ['id'=>'page-content', 'class'=>'form-control']) !!}
                </div>
            </div>            

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('status', trans('Status'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!!  Form::select('status', array('' => 'Select Page Status', 'DRAFT' => 'Draft', 'PUBLISHED' => 'Published', 'TRASHED' => 'Trashed'), null, ['class'=>'form-control']) !!}
                </div>
            </div>            
        
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.page') }}">{{ trans('Cancel') }}</a>
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
            $('#slug').slugify('#title', {
                slugFunc: function(str) { return jQuery.fn.buildSlug(str); }
              }
            );

            //Display CKEDITOR for content
            CKEDITOR.replace( 'page-content',
            {
                toolbar : 'Standard', /* this does the magic */
            });
        })
    </script>
@endpush