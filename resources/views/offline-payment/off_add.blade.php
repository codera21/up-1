<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<br>
<br>
<br>
<div class="panel-body container" style="border: 1px solid black">
    <div class="ibox-content">
        <form action="{{route('offline_pay.add')}}" enctype="multipart/form-data" id="manage-faq" method="POST"
              class="form-horizontal">
            {{ csrf_field() }}
            <fieldset>
                {{--//Name of subscriber--}}
                <div class="form-group container">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Name of Subscriber</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="name_of_subscriber" class="form-control"
                                   id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="" placeholder="Name of Subscriber" required>
                        </div>
                    </div>
                </div>
                {{--//name of bank--}}

                {{--Name of country--}}
                <div class="form-group container">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Country of Subscriber</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="country" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="" placeholder="country" required>
                        </div>
                    </div>
                </div>
                {{--//means of payment--}}
                <div class="form-group container">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Means of Payment</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="payment_type" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="" placeholder="Paymnet's Means" required>
                        </div>
                    </div>
                </div>
                {{--//Account number--}}
                <div class="form-group container">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Payment receipt number</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="bank_slip_no" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="" placeholder="Bank slip no" required>
                        </div>
                    </div>
                </div>

                <div class="form-group container">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Account Number the payment is sent to</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="account_no" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="" placeholder="Account No" required>
                        </div>
                    </div>
                </div>
                <div class="form-group container">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Amount paid</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="amount_paid" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" value="" placeholder="Amount paid" required>
                        </div>
                    </div>
                </div>

                <div class="form-group container">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="exampleInputEmail1">Upload Receipt copy</label>
                        </div>
                        <div class="col-lg-4">
                            <input name="receipt_photo" type="file">
                        </div>
                    </div>
                </div>
            </fieldset>
            <input type="hidden" value="{{csrf_token()}}" name="_token">
            <button type="submit" class="btn btn-success btn-md" style="margin-left: 45%">Save Changes</button>
        </form>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>


