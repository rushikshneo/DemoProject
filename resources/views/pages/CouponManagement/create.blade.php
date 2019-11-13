@extends('layouts.master')
@section('title', 'Coupon Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Create</b>Coupon</h2>
  <hr>
</div>
<style type="text/css">
		 .error {
	    color: red;
	    font-weight: bold;
	    margin-left: 5px;
	}
</style>
<div class="card card-default">
<div class="card-body">
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

<form action="{{route('coupon.store')}}" method="POST">
    	@csrf
    	 <div class="form-row">
           <div class="col">
           	 <label for="exampleInputEmail1"> Enter coupon code : </label>
           	<input type="text" name="coupon" placeholder="Enter Coupon Code" class="form-control" id="exampleInputEmail1"  value="">

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
           	<input type="number" name="noper" placeholder="Enter the discount" class="form-control" id="exampleInputEmail1"  value="">
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
           	<input type="number" name="notimecode" placeholder="Enter no of time use this code" class="form-control" id="exampleInputEmail1"  value="">
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
       <button type="submit" >Submit</button>
	</form>
  </div>
</div>
</section>
@endsection