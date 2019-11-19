@extends('pages.frontend.master2')
@section('content') 
<style type="text/css">
	.error{
		color: red;
	}
</style>
<section id="form" style="margin-top:-10px; margin-bottom:50px "><!--form-->
		<div class="container">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert" style="color: red;">×</button> 
			<strong>{{ $message }}</strong>
			</div>
			@endif
			@if ($message = Session::get('error'))
			<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert" style="color: red;">×</button> 
			<strong>{{ $message }}</strong>
			</div>
			@endif
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{route('shopping.userverify')}}" enctype="multipart/form-data" method="POST" id="login-form">
							@csrf
							<input type="email"  name="email" placeholder="Email Address" />
							<input type="password" name="password" placeholder="Password" /><br>
							<span>
							<input type="checkbox" class="checkbox"> 
							Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>

						</form>
						<!--  <a href="{{ url('/login/facebook') }}" class="btn btn-facebook" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a> -->
     
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
					<form method="POST" action="{{route('shopping.user_register')}}" id="register-form">
						@csrf
							<input type ="text"  name="firstname" placeholder="First Name"/>
							<input type ="text"  name="lastname" placeholder="Last Name"/>
							<input type ="email" name="email" placeholder="Email Address"/>
							<input type ="password"  name="password" id="password" placeholder="Password"/>
							<input type="password"  name="password_confirmation"
							 placeholder="Confirm Password"/><br>
							<span><a href="{{route('shopping.forgot')}}">Forgot Password ?</a></span> 
							<button type="submit" class="btn btn-defaul " style="
							margin-top: 20px;">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection