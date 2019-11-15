@extends('pages.frontend.master2')
@section('content')
<style type="text/css">
	.login-form label {
    font-family: 'Roboto', sans-serif;
    font-weight: 100;
}


</style>
 <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<section id="form" style="margin-top:0px;"><!--form-->

		<div class="container">
				@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert" style="color: red;">×</button> 
			<strong>{{ $message }}</strong>
			</div>
			@endif
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>User Account </h2>
						<form action="#">
							@foreach($userinfo as $info)
							<label>First Name </label>
							<input type ="text"  name="firstname" value="{{$info->firstname}}" placeholder="First Name"/>
							<label>Last Name </label>
							<input type ="text"  name="lastname" value="{{$info->lastname}}" placeholder="Last Name"/>
							<label>Email </label>
							<input type="email"  name="email" value="{{$info->email}}" placeholder="Email Address"/>
						 
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<!-- <div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div> -->
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Address</h2>
						 <a href="{{route('shopping.address',$info->id)}}" class="btn btn-primary">Add Address</a><br><br>
							  @foreach($info['user_addresses'] as $address)
							 <div class="card">
                          <div class="container">
                          	@if($address->defaultaddress == 1)
							 <input  type="radio" id="{{$address->id}}" name="defaultaddress" 
							   value="1" class="radio" {{($address->defaultaddress == 1) ? 'checked' : '' }} >
							 @else
							   <input  type="radio" id="{{$address->id}}" name="defaultaddress" value="0" class="radio" {{($address->defaultaddress == 0) ? 'unchecked' : '' }} >
							 @endif
								<p> {{$address->address1}},<br>
									{{$address->address2}},<br>
									{{$address->city}} {{$address->state}},{{$address->country}}  -{{$address->zip}}
								</p>
								<a href="{{route('shopping.addressedit',$address->id)}}" class="btn btn-default" > Edit address</a>
							</div>
							</div><br>
						    @endforeach
					  @endforeach
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.radio',function() {
			 var defaultaddress_id  = this.id;
			  
			   $.ajax({
        type: "GET",
        url: "/makedeafult/",
        data: {
                id: defaultaddress_id,
              }
          }).done(
          	      
          	      alert("added")
      	    );
		});
	});
	
</script>
@endsection