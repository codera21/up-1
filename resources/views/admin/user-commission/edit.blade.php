@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Edit News') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        {!! Form::open(array('method' => 'put', 'files' => false,'class'=>'form-horizontal')) !!}
	
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('receiver_id', trans('Subscriber'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::selectUser('receiver_id', $userCommission->receiver_id, ['id'=>'receiver_id', 'class'=>'form-control']) !!}
                </div>
            </div>
                                                                
            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('commission_amount', trans('Amount'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('commission_amount', $userCommission->commission_amount, ['id'=>'commission_amount', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.level') }}">{{ trans('Cancel') }}</a>
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
            CKEDITOR.replace( 'description',
            {
                toolbar : 'Standard', /* this does the magic */
            });
        })
    </script>
@endpush