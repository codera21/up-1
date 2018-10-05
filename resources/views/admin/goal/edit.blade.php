@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Edit Goal') }}
@endsection

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">
            {!! Form::open(array('method' => 'put', 'files' => false, 'class'=>'form-horizontal')) !!}

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('goal_question', trans('Question'), ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('goal_question',$goal->goal_question, ['id'=>'goal_question', 'class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group required">
                <div class="col-md-4">
                    {!! Form::label('lang', 'Language', ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::select('lang', array('en'=> 'English', 'fr'=>'French') , $goal->lang ,['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.goal') }}">{{ trans('Cancel') }}</a>
                    {!! Form::submit(trans('Update Changes'), ['class' => 'btn btn-success']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection