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
			 		<form action="{{route('shopping.addressstore',$id)}}" method="POST" id="address">
			 			@csrf
			 			<div>
				 			<label>Address 1 *</label>
							<input type="text" name="address1" placeholder="Address 1 *">
						</div>
						<div>
							<label>Address 2 </label>
							<input type="text" name="address2" placeholder="Address 2">
						</div>
						<div>
							<label>Zip / Postal Code * </label>
							<input type="number" name="zip" placeholder="Zip / Postal Code *">
						</div>
						<div>
							<label>City</label>
							<input type="text" name="city" placeholder="city">
						</div>
						<div>
							<label>State </label>
							<input type="text" name="state" placeholder="state">
						</div>
						<div>
							<label>Country </label>
							<input type="text" name="country" placeholder="country">
						</div>

						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					
				
			</div>
		</div>
	</section>
@endsection