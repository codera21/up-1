<?php
/*foreach ($join_user_goals as $row)
 {
    dump($row->goal_question);
}
*/?>

@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('app.profile') }}
@endsection

@section('content')
    <!--Left Profile Column-->
    <div class="col-md-4">

        <!--Profile Photo-->
        <div class="panel">
            <div class="panel-body">
                <img src="{{ asset($user->photo) }}" class="img-responsive"/>
            </div>
        </div>

        <!--Profile Info-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="user" data-size="20" data-loop="true" data-c="#fff"
                       data-hc="white"></i>
                    {{ $user->first_name}} {{ $user->last_name}}
                </h3>
            </div>

            <div class="panel-body" style="padding:0px !important;">

                <div class="table-responsive">
                    <table class="table table-striped" id="users">
                        <tr>
                            <td>{{ trans('user.full_name') }}</td>
                            <td>{{ $user->first_name}} {{ $user->last_name}}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('register.username') }}</td>
                            <td>{{ $user->username}}</td>
                        </tr>

                        <tr>
                            <td>{{ trans('register.email') }}</td>
                            <td>{{ $user->email}}</td>
                        </tr>

                        <tr>
                            <td>{{ trans('user.location') }}</td>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <!--<tr>
                            <td>Member Status</td>
                            <td>Student</td>
                        </tr>-->
                        <tr>
                            <td>{{ trans('user.referring_affiliate') }}</td>
                            <td>
                                @if($user->parent !== null)
                                    <a href="{{ url('user/'.$user->parent->username)}}">{{ $user->parent->first_name}} {{ $user->parent->last_name}}</a>
                                @else
                                    {{ trans('user.no_referring_affiliate') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ trans('user.member_since') }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('user.message') }}</td>
                            @if($user->is_active == "NO")
                                <td><a href="{{ url('message/'.$user->username) }}" class="btn btn-primary text-white"
                                       disabled="disabled">Send
                                        Message</a></td>
                            @else
                                <td><a href="{{ url('message/'.$user->username) }}" class="btn btn-primary text-white">Send
                                        Message</a></td>
                            @endif
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Profile - Right Side -->

    <div class="col-md-8">
        <!--Profile Tabs-->
        <ul class="nav nav-tabs ul-edit responsive" style="margin-top: 10px;">
            <li class="active">
                <button href="#tab-activity" data-toggle="tab"
                        class="btn btn-success">{{ trans('user.goals') }}</button>
            </li>
            <li style="margin-left: 5px;">
                @if($user->is_active == "NO")
                    <button data-toggle="tab" href="#tab-goals"
                            class="btn btn-primary" disabled>{{ trans('user.comments') }}</button>
                @else
                    <button data-toggle="tab" href="#tab-goals"
                            class="btn btn-primary">{{ trans('user.comments') }}</button>
                @endif
            </li>
        </ul>

        <!--Profile Tabs Container Panel-->
        <div class="panel">
            <div class="panel-body">

                <div class="tab-content">
                    <!--Goals-->
                    <div id="tab-goals" class="tab-pane fade" style="min-height:150px">
                        <div id="goals">

                        {!! Form::open(array('id' => 'comment-add', 'url' => $route.'/comment', 'method' => 'post', 'files' => false,'class'=>'form-horizontal')) !!}

                        <!--Comment Textarea-->
                        {!! Form::textarea('comments', old('comments'), ['id'=>'comments', 'class'=>'form-control']) !!}

                        <!--Post Comment Button Container-->
                            <div style="padding-top:15px; background-color:#f0f0f0; border:1px solid #ddd; margin-bottom:20px; padding-bottom:15px">
                                <div class="text-center">

                                    {!! Form::submit( trans('user.post_comments'), ['class' => 'btn btn-primary']) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        {!! Form::close() !!}
                        <!--Begin Comments-->
                            @if($user->comments())
                                @foreach($user->comments as $comment)

                                    <div class="imgs-profile">
                                        <a class="pull-left" href="#"><img class="media-object img-circle"
                                                                           src="/img/avatar.png" alt=""></a>
                                        <div class="media-body">
                                            <strong>{{ $comment->commentingUser->username }}</strong> {{ trans('user.commented') }}
                                            :<br>
                                            <small class="text-muted">{{ $comment->created_at}}</small>
                                            <p>
                                            <p>{!! $comment->comments !!}</p></p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <!--//goals-->

                    <!--Activity / Comments-->
                    <div id="tab-activity" class="tab-pane fade in active" style="min-height:150px">
                        <div class="activity">
                            @php
                                $counter = 1;
                            @endphp

                            {!! Form::open(array('id' => 'goal-add', 'url' => $route.'/goal', 'method' => 'post', 'files' => false,'class'=>'form-horizontal')) !!}
                            @foreach($join_user_goals as $goal)
                                <div class="form-group">
                                    <h4 style="color: grey;font-weight: 700">{{'Q'.$counter.'-'.$goal->goal_question}}</h4>
                                    <p>{{$goal->user_answer}}</p>
                                </div>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach

                            {{--<div style="padding-top:15px; background-color:#f0f0f0; border:1px solid #ddd; margin-bottom:20px; padding-bottom:15px">
                                <div class="text-center">
                                    {!! Form::submit(trans('user.save_changes'), ['class' => 'btn btn-primary']) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>--}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!--//Activity / Comments-->
                </div>
                <!--//Tab Content-->

            </div>
        </div>
        <!--//Profile Tabs Container Panel-->
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {

        //Display CKEDITOR for content
        CKEDITOR.replace('comments',
            {
                toolbar: 'Standard', /* this does the magic */
            });

        CKEDITOR.instances.comments.updateElement();

    })
</script>
@endpush

