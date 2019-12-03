@extends('layouts.master')
@section('title', 'Product Attribute')
@section('content') 
<section class="content">
<div>
   	<h2><b>Order</b>Management</h2>
  
</div>

<style>
		input.btn.btn-danger.btn-sm.just {
    margin-top: -10px;
    margin-left: 45px;
}
a.btn.btn-primary.btn-sm.add {
    margin-bottom: 15px;
    margin-left: 85%;
}
	</style>
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" 
      style="color: white;">×</button> 
      <strong>{{ $message }}</strong>
    </div>
@endif
<!--  <a class="btn btn-primary btn-sm add" href="" 
  class="btn_add">Add Product Attribute</a> -->



  <table class="table table-striped projects">
        <thead>
            <tr>
              <th>
                 Order Id
              </th>
              <th>
                 User Id
              </th>
              <th>
                 Product Name
              </th>
              <th>
              	 Payment Status
              </th>
              <th>
                 Payment Method
              </th>
               <th>
                Action
              </th>
            </tr>
        </thead>
        <tbody>
       @foreach($order as $orders)
        <tr>
          <td>
            {{$orders->id}}
          </td>
            <td>
            {{$orders->user_id}}             
            </td>

            <td style="width:300px;">
            {{$orders->name}}             
            </td>

            <td>
              @if($orders->status==0)
              Payment Pending
              @else
              Payment Successful
              @endif   
            </td>
              <td>
                {{$orders->payment_method}}
              </td>
           <td>
      <a href="{{route('order.show',$orders->id)}}" class="btn btn-sm btn-info">Show Info</a>
    				<!-- <form action="" method="POST" >
    				 @csrf
    				 {{method_field('DELETE')}}
    				 <input type="submit" class="btn btn-danger btn-sm just" value ="Delete" onclick="return confirm('Are you sure?')"/>
    				</form> -->
          </td> 
        </tr>
      @endforeach 
      </tbody>
    </table>
  {{$order->links()}}
</section>
@endsection