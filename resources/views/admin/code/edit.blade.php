@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Edit Code') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('id' => 'update-code', 'method' => 'put', 'files' => false,'class'=>'form-horizontal')) !!}

                    
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('code', trans('Code'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    
                    {!! Form::text('code', $code->code, ['id'=>'code', 'class'=>'form-control']) !!}
                    
                </div>
            </div>
                        
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.code') }}">{{ trans('Cancel') }}</a>
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
           
        })
    </script>
@endpush