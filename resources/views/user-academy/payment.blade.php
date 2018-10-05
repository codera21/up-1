@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('user_academy.my_academy') }}
@endsection

@section('content')

    <div class="container text-center">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="TNLWEGAVHBL34">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="Purchase Material/Group">
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="no_note" value="1">
            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="rm" value="1">
            <input type="hidden" name="return"
                   value="{{ url('user-academy/payment-success/'.$type.'/' .  $item->id) }}">
            <input type="hidden" name="cancel_return" value="{{ url('user-academy/payment-failure') }}">
            <input type="hidden" name="amount" value="{{ $item->price }}"/>
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0"
                   name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </div>




@endsection





