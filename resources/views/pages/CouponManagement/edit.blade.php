@extends('layouts.master')
@section('title', 'Coupon Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Edit</b>Coupon</h2>
  <hr>
</div>
<div class="card card-default" style="width: 75%;">
<div class="card-body">
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

<form action="{{route('coupon.update',$coupon->id)}}" method="POST">
    	@csrf
    	<input type="hidden" name="_method" value="PATCH" >
    	 <div class="form-row">
           <div class="col">
           	 <label for="exampleInputEmail1"> Enter coupon code : </label>
           	<input type="text" name="coupon" placeholder="Enter Coupon Code" class="form-control" id="exampleInputEmail1"  value="{{$coupon->coupon_code}}">
           	@if($errors->has('coupon'))
			<div  class="error">
			  {{$errors->first('coupon')}}
			</div>
			@endif
           </div>
            <div class="col">


            </div>
         </div>
          <div class="form-row">
           <div class="col">
           	 <label for="exampleInputEmail1"> Percent off : </label>
           	<input type="number" name="noper" placeholder="Enter the discount" class="form-control" id="exampleInputEmail1"  value="{{$coupon->percent_off}}">
           	@if($errors->has('noper'))
			<div  class="error">
			  {{$errors->first('noper')}}
			</div>
			@endif

           </div>
            <div class="col">
            </div>
         </div>
          <div class="form-row">
           <div class="col">
           	 <label for="exampleInputEmail1"> No of time using this code : </label>
           	<input type="number" name="notimecode" placeholder="Enter no of time use this code" class="form-control" id="exampleInputEmail1"  value="{{$coupon->no_of_uses}}">
           	@if($errors->has('notimecode'))
			<div  class="error">
			{{$errors->first('notimecode')}}
			</div>
			@endif	
           </div>
            <div class="col">
            </div>
         </div>
          <hr>
       <button type="submit" >Update</button>
	</form>
  </div>
</div>
</section>
@endsection