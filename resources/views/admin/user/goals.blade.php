@extends('layouts.backend.default')

@section('page_title')
    {{ trans('User Goals') }}
@endsection

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-content">
        
        @foreach($goals as $goal)
            <div class="form-group">
                <div class="col-md-10">
                    {!! Form::label('goal_id', $goal->goal_question, ['class' => 'control-label']) !!}
                </div>
            </div>
                                                                
            <div class="form-group">
                <div class="col-md-10">
                    {!! ($userGoals[$goal->id]) ? $userGoals[$goal->id]->user_answer : 'No Answer' !!}
                </div>
            </div>
        @endforeach
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-default btn-close" href="{{ URL::route('admin.user') }}">{{ trans('Cancel') }}</a>
                </div>
            </div>

    </div>
</div>

@endsection