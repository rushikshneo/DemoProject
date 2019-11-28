@extends('pages.frontend.master2')
@section('content')

@foreach($order as $ord )


	<div class="card card-default">
  <div class="card-body">
    <h5 class="card-title">Order Id :{{$ord->id}}</h5>
    <p class="card-text">Product Name : {{$ord->name}}</p>
    <p>  Order Status : @if($ord->status == 1) Payment Successful @else Payment Pending @endif </p>
   <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div><br><hr>

@endforeach

@endsection