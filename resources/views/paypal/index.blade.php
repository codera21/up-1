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
<h1>Fully server integration</h1>
<form action="/subscription/create-payment" method="post">
    <input type="submit" value="payNow">
</form>

<br>
<h1>Subscribe</h1>
<form action="{{route('subscription.create-agreement','P-1WX58412X9730874EJ2GJN7Y')}}" method="post">
    <input type="submit"  value="Subscribe Now">
</form>
</body>
</html>
