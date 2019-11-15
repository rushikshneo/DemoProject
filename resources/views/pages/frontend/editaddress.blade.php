@extends('pages.frontend.master2')
@section('content')
<style type="text/css">
	.error{
		color: red;
	}
</style>
<section id="form" style="margin-top:0px;">
		<div class="container">


			<div class="row">
					<div class="login-form">
					<h2>Add Address </h2>
					@foreach($user_add as $add)
			 		<form action="{{route('shopping.updateaddress',$add->id)}}" method="POST" id="address">
			 			@csrf
			 			<div>
				 			<label>Address 1 *</label>
							<input type="text" name="address1" value="{{$add->address1}}" placeholder="Address 1 *">
						</div>
						<div>
							<label>Address 2 </label>
							<input type="text" name="address2" value="{{$add->address2}}" placeholder="Address 2">
						</div>
						<div>
							<label>Zip / Postal Code * </label>
							<input type="number" name="zip" value="{{$add->zip}}" placeholder="Zip / Postal Code *">
						</div>
						<div>
							<label>City *</label>
							<input type="text" name="city" value="{{$add->city}}" placeholder="city">
						</div>
						<div>
							<label>State *</label>
							<input type="text" name="state" value="{{$add->state}}" placeholder="state">
						</div>
						<div>
							<label>Country *</label>
							<input type="text" name="country" value="{{$add->country}}" placeholder="country">
						</div>

						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					@endforeach
				
			</div>
		</div>
	</section>
@endsection