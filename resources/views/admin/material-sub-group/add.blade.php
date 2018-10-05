@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Add Material Level') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('route' => 'admin.material-sub-group.add', 'method' => 'post', 'files' => false,'class'=>'form-horizontal')) !!}

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
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.material-sub-group') }}">{{ trans('Cancel') }}</a>
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
        })
    </script>
@endpush