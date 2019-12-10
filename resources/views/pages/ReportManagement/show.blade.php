@extends('layouts.master')
@section('title', 'Reports Show')
@section('content') 


@if(!empty($data_order))
<div class="card card-default" style=" width:80%;margin-left:100px;overflow:scroll; height:400px;">
<div class="card-body">
<h2>Order Report</h2>
<table class="table table-striped projects" >
	 <thead>
            <tr>
               <th>
                  Ordered Product Name
               </th>
                <th>
                   Date
              </th>   
               <th>
                   Price 
               </th>      
            </tr>
        </thead>
     <tbody>
      @foreach($data_order as $order)
	    <tr>
			<td>
				{{$order->product->name}}
			</td>
			<td>
			   {{$order->created_at->toDateString()}}
			</td>
			<td>
		    	{{$order->total}}
			</td>
	</tr>
     @endforeach
</tbody>
</table>
</div>
</div>
@endif
@if(!empty($data_customer))

<div class="card card-default" style=" width:80%;margin-left:100px;overflow:scroll; height:400px;">
<div class="card-body">
<h2>Customer Report</h2>
	<!-- <a href="{{url('reports/dowanload')}}" class="btn btn-primary btn-sm">Dowanlod</a> -->
<table class="table table-striped projects">
	 <thead>
            <tr>
               <th>
                   Name
               </th>
                <th>
                   Register Date
              </th>   
               <th>
                  Email id  
               </th>      
            </tr>
        </thead>
     <tbody>
      @foreach($data_customer as $cust)
	    <tr>
			<td>
				{{$cust->firstname}} {{$cust->lastname}}
			</td>
			<td>
			   {{$cust->created_at->toDateString()}}
			</td>
			<td>
		    	{{$cust->email}}
			</td>
	</tr>
     @endforeach
</tbody>
</table>
<div style="margin-left: 20px; margin-top: 20px;">
   <strong>Total Registered Customer :</strong> {{count($data_customer)}}
</div>
</div>
</div>
@endif
@if(!empty($data_coupons))


<div class="card card-default" style=" width:80%;margin-left:100px;overflow:scroll; height:400px;">
<div class="card-body">

<h2>Coupons Report</h2>  

 <table class="table table-striped projects">
	 <thead>
            <tr>
               <th>
                   Coupon Code Name
               </th>
                <th>
                   Used date
              </th>   
                <th>
                   Remaining time for use
              </th>  
            </tr>
        </thead>
     <tbody>
      @foreach($data_coupons as $coupons)
	    <tr>
			<td>
				{{$coupons->coupon_code}}
			</td>
			<td>
			   {{$coupons->updated_at->toDateString()}}
			</td>
			<td>
			   {{$coupons->no_of_uses}}
			</td>

	</tr>
     @endforeach
</tbody>
</table>
</div>
</div>
@endif
@endsection