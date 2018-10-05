@extends('layouts.backend.default')

@section('page_title')
    {{ trans('User Detail') }}
@endsection

@section('content')
http://itsolutionstuff.com/post/laravel-5-category-treeview-hierarchical-structure-example-with-demoexample.html
<div class="ibox float-e-margins">
    <div class="ibox-content">
         <table class="table table-bordered table-striped">
            <tbody>

                <tr>
                    <td width="30%">{{ trans('ID') }}</td>
                    <td width="70%">{!! $user->id !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Joined Date') }}</td>
                    <td>{!! $user->created_at !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('First Name') }}</td>
                    <td>{!! $user->first_name !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Last Name') }}</td>
                    <td>{!! $user->last_name !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Email') }}</td>
                    <td>{!! $user->email !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Phone') }}</td>
                    <td>{!! $user->phone !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Address') }}</td>
                    <td>{!! $user->address !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Disable System Comments') }}</td>
                    <td>{!! $user->disable_system_comments !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Facebook URL') }}</td>
                    <td>{!! $user->facebook_url !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Twitter URL') }}</td>
                    <td>{!! $user->twitter_url !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Instagram URL') }}</td>
                    <td>{!! $user->instagram_url !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Snapchat URL') }}</td>
                    <td>{!! $user->snapchat_url !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Google Hangout ID') }}</td>
                    <td>{!! $user->google_hangout_id !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Bio Graphy') }}</td>
                    <td>{!! $user->bio !!}</td>
                </tr>

                <tr>
                    <td>{{ trans('Parent User') }}</td>
                    <td>
                        @if($user->parent)
                            {!! $user->parent->first_name !!}
                        @else
                            {!! 'No Parent' !!}
                        @endif
                    </td>
                </tr>


            </tbody>
        </table>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a href="{{ route('admin.user') }}" class="btn btn-default btn-close"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('Back') }}</a>
            </div>
        </div>

    </div>
</div>

@endsection
