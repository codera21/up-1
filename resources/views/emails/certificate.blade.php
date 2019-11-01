@extends('emails.template')

@section('content')
<p>
Name: {{ $name }}
</p>

<p>
email: {{ $email }}
</p>

<p>
Country: {{ $country }}
</p>
@endsection