@extends('pages.frontend.master2')
@section('content')
<section id="cart_items">
	<style type="text/css">
		img.cart_image {
		height: 75px;
		width: 50px;
		}
	</style>
		<div class="container">
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
		    <button type="button" class="close" data-dismiss="alert" style="color: red;">×</button> 
			<strong>{{ $message }}</strong>
		  </div>
		@endif

			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
					@if(count($item)!=0)
					  @foreach($item as $cartadded)
						<tr>
							<td class="cart_product">
								<a href=""><img class="cart_image" src="{{URL::asset($cartadded->image_url)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cartadded->name}}</a></h4>
								<p>Product Id : {{$cartadded->id}}</p>
							</td>
							<td class="cart_price">
								<p>&#x20b9;{{$cartadded->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">&#x20b9;{{$cartadded->price}}</p>
							</td>
			   <td class="cart_delete">
				 <form action="{{route('shopping.removefromcart',$cartadded->id)}}" method="POST">
                 {{method_field('DELETE')}}
                 @csrf
                 <button class="cart_quantity_delete" type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?')" ><i class="fa fa-times" ></i></button>
        		</form>
			   </td>
			</tr>
			 @endforeach
			@else
			 <tr> <td><p>No Products in Cart.</p></td></tr>
			@endif
						<!-- <tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/two.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/three.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr> -->
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input  type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input  type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input  type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>&#x20b9;{{$sub_total}}</span></li>
							<li>Eco Tax <span>2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>&#x20b9;{{$total}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							@if(count($item)!= 0)
									<a class="btn btn-default check_out" href="{{route('shopping.checkout')}}">Check Out</a>
							@endif
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection