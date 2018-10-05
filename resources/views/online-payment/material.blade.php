<table id="materials" class="table table-hover">
    <thead>
    <tr>
        <th>{{ trans('Sr #') }}</th>
        <th>&nbsp;</th>
        <th>{{ trans('Title') }}</th>
        *
        <th class="text-right">{{ trans('Price') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($materials as $material)
        <tr>
            <td class="col-sm-1 col-md-1" style="text-align: center">
                {{ $loop->iteration }}
            </td>
            <td class="col-sm-1 col-md-1">
                @if($material->payment_type == 'ONE TIME')
                    @if($disabled)
                        <input type="checkbox" name="material_id[]" value="{{ $material->id }}" onclick='return false;'
                               checked class='materialChkbox'/>
                    @else
                        {!! Form::checkbox('material_id[]', $material->id, null, ['class' => 'materialChkbox']) !!}
                    @endif
                @else
                    @if($disabled)
                        <input type="radio" name="material_id" value="{{ $material->id }}" onclick='return false;'
                               checked/>
                    @else
                        {!! Form::radio('material_id', $material->id, true) !!}
                    @endif
                @endif
                @php
                    $paymentType = $material->payment_type
                @endphp
            </td>
            <td class="col-sm-8 col-md-2">

                {{ $material->title }}
            </td>
            <td class="col-sm-1 col-md-1 text-right"><strong>${{ Helper::moneyFormat($material->price) }}</strong></td>
        </tr>
    @endforeach

    </tbody>
</table>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                @if($paymentType == 'ONE TIME')
                    <div id="paypal-button"></div>
                @else
                    {!! Form::submit(trans('Pay Recurring'), ['class' => 'btn btn-primary pull-right']) !!}
                @endif

            </div>
        </div>
    </div>
</div>


{{--@push('scripts')--}}
@if($paymentType == 'ONE TIME')
    <script>
        $(document).ready(function () {

            //var CREATE_ONE_TIME_PAYMENT_URL  = 'http://localhost/dnasbook_dm/public/index.php/online-payment/create-onetime-payment';
            //var EXECUTE_ONE_TIME_PAYMENT_URL = 'http://localhost/dnasbook_dm/public/index.php/online-payment/execute-onetime-payment';
            var CREATE_ONE_TIME_PAYMENT_URL = '{{ route('online-payment.create-onetime-payment') }}';
            var EXECUTE_ONE_TIME_PAYMENT_URL = '{{ route('online-payment.execute-onetime-payment') }}';

            paypal.Button.render({
                env: 'sandbox', // Or 'sandbox'
                commit: true, // Show a 'Pay Now' button

                payment: function (resolve, reject) {
                    //console.log('In Payment');
                    var materialIds = [];
                    $('.materialChkbox:checked').each(function (i, e) {
                        materialIds.push($(this).val());
                    });

                    return paypal.request.post(CREATE_ONE_TIME_PAYMENT_URL,
                        {
                            _token: "{{csrf_token()}}",
                            group_id: $('#group_id').val(),
                            sub_group_id: $('#sub_group_id').val(),
                            material_id: materialIds.join(),
                            paid_for: $('input[name=paid_for]:checked').val(),
                            payment_for: $('input[name=payment_for]:checked').val(),

                        }).then(function (data) {
                        //console.log(data);
                        return data.id;
                    });
                },

                onAuthorize: function (data) {
                    console.log('In Authorize');

                    return paypal.request.post(EXECUTE_ONE_TIME_PAYMENT_URL, {
                        /*paymentID: data.paymentID,
                         payerID:   data.payerID,*/
                        paymentId: data.paymentID,
                        PayerID: data.payerID,
                        _token: "{{csrf_token()}}"
                    }).then(function (data) {

                        // The payment is complete!
                        // You can now show a confirmation message to the customer
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success'
                            //html: true
                        })
                    });
                }

            }, '#paypal-button');

        });
    </script>
@endif
{{--@endpush--}}