@extends('layouts.master')
@section('title', 'Show Orders')
@section('content') 
<style type="text/css">
	h3 {
       margin-left: 37px;
    }
</style>
  <h2 style="text-align:center;"><b>Order</b>Details</h2>
 <table class="table table-striped projects" style="width:500px; margin-left: 30px; align-content: center; margin-bottom: 20px;">
        <tbody>
      @foreach($order as $userdet)
         <tr>
          <td>
            <b> Order Id :</b> 	
          </td>
          <td>{{$userdet->id}}</td>
          </tr>

          <tr>
          	<td><b>Product Name :</b></td>
          	<td>{{$userdet->name}}</td>
          </tr>

           <tr>
          	<td><b>Customer Name  :</b></td>
          	<td>{{$userdet->firstname}} {{$userdet->lastname}} 
          </tr>
          <tr>
          	<td><b>Customer Email  :</b></td>
          	<td>{{$userdet->email}}
          </tr>
           <tr>
            <td><b>Billing Address  :</b>  </td>
            <td>{{$userdet->billing_address1}} {{$userdet->billing_address2}},<br>
                {{$userdet->billing_city}} {{$userdet->billing_state}}        <br>
                {{$userdet->billing_country}} {{$userdet->billing_zip}}       </td>
          </tr>
      </tbody>
    </table>


<table class="table table-striped projects" style="width:500px; margin-top:-310px; margin-left:550px; align-content: center; margin-bottom: 20px;">
        <tbody>
          <tr>
            <td><b>Order Price  :</b></td>
            <td>{{$userdet->total}} INR</td>
            <td></td>
          </tr>
          <tr>
            <td><b>Payment Method  :</b></td>
            <td>{{$userdet->payment_method}}</td>
             <td> 
              @if($userdet->payment_method == "cod" && $userdet->status == 0 )
                <form method="POST" action="{{route('order.update', $userdet->id)}}">
                   {{ method_field('PATCH') }}
                @csrf 
                <div>
                 <select name="payment_status">
                   <option value="">select</option>
                   <option value="1">Payment Successful</option>
                 </select>
                </div>
                 <button style="margin-top:5px;" type="submit" class="btn btn-sm btn-info">update Payment Status</button>
               </form>
               @endif
             </td>
          </tr>
           <tr>
            <td><b>Payment Status  :</b></td>
            <td>@if($userdet->status == 0) Pending @else Successful @endif</td>
            <td></td>
          </tr>
          <tr>
            <td><b>Applied Coupon  :</b></td>
            <td>
              @if(empty($userdet->applied_coupons))
                   N/A
                  @else
              {{$userdet->applied_coupons}}
              @endif
            </td>
            <td></td>
          </tr>
        </tbody>
      </table>
 @endforeach
@endsection