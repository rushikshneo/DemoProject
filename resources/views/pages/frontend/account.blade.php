@extends('pages.frontend.master2')
@section('content')
<style type="text/css">
	.login-form label {
    font-family: 'Roboto', sans-serif;
    font-weight: 100;
</style>
<section id="form" style="margin-top:0px;"><!--form-->
		<div class="container">
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
						 <a href="{{route('shopping.address',$info->id)}}" class="btn btn-default">Add Address</a>
							<!-- <button type="submit" ></button> -->
							  @endforeach
							<div class="card">
							

							<!--  <div class="card-body">
							<h5 class="card-title">Special title treatment</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
							</div> -->
							</div>
						<!-- <form action="#">
							<label>First Name </label>
							<input type ="text"  name="firstname" value="{{$info->firstname}}" placeholder="First Name"/>
							<input type="email" placeholder="Email Address"/>
							<input type="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form> -->
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection