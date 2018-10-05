@extends('emails.template')

@section('content')

<p>
Dear {{ $name}},
</p>

<p>
    {{ trans('password.reset_password_link') }}
 
    If you are having trouble clicking the "<a href="{{ url('password/reset/'.$token) }}">Reset Password</a>" link above, copy and paste the URL below into your web browser.<br/>
    {{ url('password/reset/'.$token) }} <br/><br/>

    Thank you for using {{ Config::get('settings.sitename') }}.
    
</p>
@endsection
