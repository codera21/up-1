@extends('emails.template')

@section('content')
<p>
Name: {{ $name }}
</p>

<p>
{{ $email }}
</p>

<p>
{{ $country }}
</p>
@endsection