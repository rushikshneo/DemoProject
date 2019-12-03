@extends('pages.frontend.master2')
@section('content')
<style type="text/css">
 .card-body {
    margin-left: 200px;
  }
</style>

 <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<div class="signup-form">
   <h2 style="margin-left: 10%;">My Orders </h2>
  <hr>
</div>
@foreach($order as $ord )
	<div class="card card-default">
     <div class="card-body">
      <p class="card-text" id="productname"><h3>Product Name : {{$ord->name}}</h3></p>
       <div id="full_des">
          <h5 class="card-title"><strong>Order Id :</strong><br>{{$ord->id}}</h5>
          <p class="card-text"><strong>Payment Method :</strong><br>{{$ord->payment_method}}</p>
          <p> <strong> Order Status :</strong> @if($ord->status == 1)<br> Payment Successful @else <br>Payment Pending @endif </p>
          <p><strong>Billing Address:</strong><br>
    	    {{$ord->billing_address1}},<br>
			{{$ord->billing_address2}},<br>
		    {{$ord->billing_city}} {{$ord->billing_state}} , {{$ord->billing_country}}  -{{$ord->billing_zip}}
		   </p>
	</div>
   <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div><br><hr>
<!--  <script type="text/javascript">

 			// $("#full_des").hide()
 		$(document).ready(function(){
		    $(document).on('click','#productname',function() {
               $("#full_des").show()
		    })
		});
 </script> -->
@endforeach

@endsection