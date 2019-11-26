@extends('pages.frontend.master2')
@section('content')
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business"
     value="sb-d3jfw625226@business.example.com">	
    <input type="hidden" name="item_name" value="Donation">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="amount" value="{{Session::get('total')}}">

     <input type="hidden" name="first_name" value="{{Auth::user()->firstname}}">
     <input type="hidden" name="last_name" value="{{Auth::user()->lastname}}">
     @foreach($userinfo->user_addresses as $address)
     <input type="hidden" name="address1" value="{{$address->}}">
     <input type="hidden" name="address2" value="{{$address->}}">
     <input type="hidden" name="city" value="{{$address->}}">
     <input type="hidden" name="state" value="{{$address->}}">
     <input type="hidden" name="zip" value="{{$address->}}">
     @endforeach
    <input type="hidden" name="no_shipping" value="0">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="currency_code" value="INR">
    <input type="hidden" name="lc" value="AU">
    <input type="hidden" name="bn" value="PP-BuyNowBF">
    <input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
    <img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form>
@endsection