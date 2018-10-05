@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('News') }}
@endsection

@section('content')
<div class="row">
    
    <div class="col-md-12">
    	
        @foreach($news as $newsItem)
            <h3>{{ $newsItem->title }}</h3>

            @php
                //$string = strip_tags($newsItem->description);
                $string = $newsItem->description;
                if (strlen($string) > 500) {

                    // truncate string
                    $stringCut = substr($string, 0, 500);
                    $endPoint = strrpos($stringCut, ' ');

                    // if the string doesn't contain any space then it will cut without word basis.
                    $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                    $string .= '... <a href="'.route('news.details', array('id' => $newsItem->id)).'" style="font-weight:bold; font-size:17px;">read more</a>';
                }
            @endphp

        	<p>{!! $string !!}</p>
            <br /><br />
            <hr />
        @endforeach

    </div>

</div>
@endsection
