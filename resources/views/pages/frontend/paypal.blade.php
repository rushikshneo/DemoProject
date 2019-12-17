@extends('pages.frontend.master2')
@section('content')
  <form action="{{route('shopping.payWithpaypal')}}" method="POST">
  	@csrf
  	<div class="col">
  		     <p style="margin-left:35%;">You are Redirect to paypal form here</p>
        <label hidden for="exampleInputEmail1">Amount Payable : </label>
        <input hidden name="amount" value="{{Session::get('total')*0.014}}">
        <button value="submit" class="btn btn-primary btn-sm" style="margin-bottom: 20px;margin-left:500px;">pay now</button>
      </div>
  </form>
@endsection