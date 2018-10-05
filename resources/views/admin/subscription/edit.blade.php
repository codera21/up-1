@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Edit Subscription Fee') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('id' => 'material', 'method' => 'put', 'files' => true,'class'=>'form-horizontal')) !!}  

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('price', trans('Price'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('price', $material->price, ['id'=>'slug', 'class'=>'form-control']) !!}                    
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit(trans('Update Changes'), ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            

        {!! Form::close() !!}
    </div>
</div>

@endsection