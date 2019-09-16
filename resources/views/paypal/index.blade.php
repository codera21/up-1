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
<script
    src="https://www.paypal.com/sdk/js?client-id=AQSM8lBJQigwgjMbB-N33Sf0jotGwy9WtCxljG_ZoLzVKkhw66VzdcOf1yYR6WombijyPMJGaIVSsKmG">
</script>
<h1>Hello world</h1>
<div id="paypal-button-container"></div>
<script>
    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '100'
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            // Capture the funds from the transaction
            return actions.order.capture().then(function (details) {
                // Show a success message to your buyer
                alert('Transaction completed by ' + details.payer.name.given_name);
                return fetch('')
            });
        }
    }).render('#paypal-button-container');
</script>
</body>
</html>
