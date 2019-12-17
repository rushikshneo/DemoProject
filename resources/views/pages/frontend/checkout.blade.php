@extends('pages.frontend.master2')
@section('content') 
<style type="text/css">
	img.cart_image {
		height: 75px;
		width: 50px;
		}
</style>
<section id="cart_items">

   <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
		<div class="container">
				@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block" id="success">
		    <button type="button" class="close" data-dismiss="alert" style="color: red;">×</button> 
			<strong>{{ $message }}</strong>
		  </div>
		@endif
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

	<!-- 		<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div> -->

<!-- 
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input  type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div> --><!--/checkout-options-->
<!-- 
			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div> --><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<h2>Address:</h2>
						@foreach($userinfo as $info)
						 @foreach($info['user_addresses'] as $address)
							 <div class="card">
                          <div class="container">
                          	@if($address->defaultaddress == 1)
							 <input  type="radio" id="{{$address->id}}" name="defaultaddress" 
							   value="1" class="radio" {{($address->defaultaddress == 1) ? 'checked' : '' }} >
							 @else
							   <input  type="radio"  id="{{$address->id}}" name="defaultaddress" value="0" class="radio" {{($address->defaultaddress == 0) ? 'unchecked' : '' }} >
							 @endif
								<p> {{$address->address1}},<br>
									{{$address->address2}},<br>
									{{$address->city}} {{$address->state}},{{$address->country}}  -{{$address->zip}}
								</p>
							<!-- 	<a href="" id="editadd" class="btn btn-default" > Edit address</a> -->
							</div>
					   </div>
					   @endforeach
				
					</div>

					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									<label>Email :</label>									<input disabled type="text" value="{{$info->email}}" placeholder="Email*">
									<label>First Name :</label>	
									<input disabled type="text" value="{{$info->firstname}}" placeholder="First Name *">
									<label>Last Name :</label>	
									<input disabled type="text" value="{{$info->lastname}}" placeholder="Last Name *">
								<!-- 	<button type="submit" class="btn btn-primary"> Update </button> -->
								</form>
							@endforeach
							</div>

							<div class="form-two" id="address_edit">
							  @foreach($info['user_addresses'] as $address)
								 @if($address->defaultaddress==1)
								 <form action="{{route('shopping.updateaddress',$address->id)}}" method="POST">
								 	@csrf
									<label>Address1 : </label>								<input type="text"    name="address1" value="{{$address->address1}}">
									<label>Address2 : </label>	
									<input type="text"   name="address2" value="{{$address->address2}}">
									<label>City : </label>	
									<input type="text"  name="city" value="{{$address->city}}">
									<label>State : </label>	
									<input type="text"  name="state" value="{{$address->state}}">
									<label>Country : </label>	
									<input type="text" name="country" value="{{$address->country}}">
									<label>Zip : </label>	
									<input type="number" name="zip" value="{{$address->zip}}" >

									<button  type="submit" class="btn btn-primary" > update address</button>
								  </form>
								 @endif
							 @endforeach
							</div>


						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					    @foreach($item as $product)
						<tr>
							<td class="cart_product">
								<a href=""><img class="cart_image"  src="{{URL::asset($product->image_url)}}"alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$product->name}}</a></h4>
								<p>Product Id :{{$product->id}}</p>
							</td>
							<td class="cart_price">
								<p>&#x20b9;{{$product->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{route('shopping.addtocart',$product->id)}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$product->quantity}}" autocomplete="off" size="2">
									@if($product->quantity != 1)
									<a class="cart_quantity_down" href="{{route('shopping.updatecart',$product->id)}}"> - </a>
									@endif
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">&#x20b9;{{$product->price}}</p>
							</td>
							<td class="cart_delete">
								 <form action="{{route('shopping.removefromcart',$product->id)}}" method="POST">
                             {{method_field('DELETE')}}
                 @csrf
                 <button class="cart_quantity_delete" type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?')" ><i class="fa fa-times" ></i></button>
        		</form>
							</td>
						</tr>
						@endforeach
				<tr>
				 <td colspan="4">&nbsp;</td>
					<td colspan="2">
						<table class="table table-condensed total-result">
							<form method="POST" action="{{route('shopping.paypal')}}" id="from">
							@csrf	
							<tr>
								<td>Cart Sub Total</td>
								<td>&#x20b9;{{$sub_total}}</td>
							</tr>
							<tr>
								<td>Exo Tax</td>
								<td>&#x20b9;2</td>
							</tr>
							<tr class="shipping-cost">
								<td>Shipping Cost</td>
								<td>Free</td>										
							</tr>
							<tr>
								<td>Total</td>
								<td><span><input class="form-control" type="" name="amount" value="{{$total}}" disabled></span></td>
							</tr>

							<tr>
							<td>
								<div class="payment-options">
								<span>
							    <a href="{{route('shopping.paypal')}}" class="btn btn-primary">Pay using Paypal</a>
							     <a href="{{route('shopping.cod')}}" class="btn btn-primary">Cash On Delivery</a>
								</span>
								</div>
							</td> 
							</tr>
				    </form>
						</table>
					</td>
				</tr>
					</tbody>
				</table>
			</div>
			
	</div>
	</section>

  <script type="text/javascript">
  	$(document).on('change','.radio',function() {
	  var defaultaddress_id  = this.id;
		$.ajax({
			type: "GET",
			url: "/makedeafult/",
		data: {
			id: defaultaddress_id,
		   }
		}).done(
           alert("Default address is updated"),
           location.reload()
		  );
		});

  	  setTimeout(function(){
		$('#error').hide()
		}, 3000);

		setTimeout(function(){
		$('#success').hide()
		}, 3000);
  	// $(document).on('submit','#from',function() {

  	// });
  </script>
@endsection