@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Users') }}
@endsection

@section('content')
    {!! $grid->render() !!}
@endsection
<script type="text/javascript">
    function confirmmodel() {
        confirm("Are you sure want to ban this account");
        document.getElementById('ban').innerText = 'Unban';
    }
</script>