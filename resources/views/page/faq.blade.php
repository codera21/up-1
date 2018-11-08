@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('Help') }}
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            <ul>

                @foreach($faqs as $faq)
                    <li>{{ $faq->question }}</li>
                @endforeach
            </ul>
            <ul>

                @foreach($faqs as $faq)
                    <li>
                        <a name="{{ $faq->question }}">{!! $faq->answer !!}</a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
@endsection
