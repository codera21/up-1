<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<br>
<br>
<br>
<div class="panel-body" style="border: 1px solid black">
    <div class="ibox-content">
        <form action="{{route('offline_pay.search')}}" enctype="multipart/form-data" id="manage-faq" method=""
              class="form-horizontal">
            {{ csrf_field() }}
            <fieldset>
                {{--//Name of subscriber--}}
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        Your Payment is recorded in our database. Still you can verify.
                    </div>
                </div>
                <div class="form-group container">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Payment receipt number</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="bank_slip_no" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="" placeholder="Payment Receipt No" required>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success btn-md" style="margin-left: 45%">Verify</button>
            <input type="hidden" value="{{csrf_token()}}" name="_token">
        </form>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>



