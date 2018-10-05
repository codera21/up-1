@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Edit Material Group') }}
@endsection

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">
            {!! Form::open(array('method' => 'put', 'files' => true,'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('title', trans('Title'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('title', $materialGroup->title, ['id'=>'title', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('slug', trans('Slug'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('slug', $materialGroup->slug, ['id'=>'slug', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('price', trans('Price'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('price', $materialGroup->price, ['id'=>'slug', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required" id="thumbnail">
                <div class="col-md-4">
                    {!! Form::label('group_thumbnail_url', trans('Thumbnail'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::file('group_thumbnail_url') !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('payment_time', trans('Payment Type'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::selectPaymentType('payment_type', $materialGroup->payment_type, ['class'=>'form-control']) !!}
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
                <div class="col-md-4">
                    {!! Form::label('enable_payment_button', trans('Enable'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('enable_payment_button', 'YES', ($materialGroup->enable_payment_button=='YES' ? true:false)) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.news') }}">{{ trans('Cancel') }}</a>
                    {!! Form::submit(trans('Update Changes'), ['class' => 'btn btn-success']) !!}
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

            //Display CKEDITOR for long description
            CKEDITOR.replace('description',
                {
                    toolbar: 'Standard', /* this does the magic */
                });
        })
    </script>
@endpush