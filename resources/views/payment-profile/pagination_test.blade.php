<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        @foreach($users as $item)
            {{$item->first_name}} {{$item->last_name}}
            <br>
            @endforeach
        @for($count = 1;$count<=$no_of_page;$count++)
            <a href="{{route('user.pagination')}}?page={{$count}}"> {{$count}} <?php $count?> </a>
            @endfor
</body>
</html>