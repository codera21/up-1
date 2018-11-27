
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <br>
    <br>
    <?php if ($count != 0) : ?>
    <div class="container">
        <div class="alert alert-success" role="alert">
            Your Payment is recorded in our database as follows.
        </div>
    </div>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Payment id</th>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col">Amount Paid</th>
            <th scope="col">Account no.</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$payment->id}}</th>
            <td>{{$payment->name_of_subscriber}}</td>
            <td>{{$payment->country}}</td>
            <td>{{$payment->amount_paid}}</td>
            <td>{{$payment->account_no}}</td>
        </tr>
        </tbody>
    </table>
    <?php else:;?>
    <div class="container">
        <div class="alert alert-danger" role="alert">Sorry! Your payment is not Recorded.</div>
    </div>
    <?php endif;?>
    </head>
</div>
<body>
<br>
<br>
<br>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>



