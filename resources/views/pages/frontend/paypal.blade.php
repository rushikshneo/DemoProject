@extends('pages.frontend.master2')
@section('content')
  <form action="{{route('shopping.payWithpaypal')}}" method="POST">
  	@csrf
  	<div class="col">
        <label for="exampleInputEmail1">Amount Payable : </label>
        <input  name="amount" value="{{Session::get('total')*0.014}}">
        <button value="submit">pay now</button>
      </div>
  	
  </form>
@endsection