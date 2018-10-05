@extends('emails.template')

@section('content')
<p>
Name: {{ $name }}
</p>

<p>
{{ $email }}
</p>

<p>
{{ $user_message }}
</p>
@endsection