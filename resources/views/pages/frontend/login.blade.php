@extends('pages.frontend.master2')
@section('content') 
<style type="text/css">
	.error{
		color: red;
	}
</style>
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<section id="form" style="margin-top:-10px; margin-bottom:50px "><!--form-->
		<div class="container">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block" id="success">
			<button type="button" class="close" data-dismiss="alert" style="color: red;">×</button> 
			<strong>{{ $message }}</strong>
			</div>
			@endif
			@if ($message = Session::get('error'))
			<div class="alert alert-danger alert-block" id="error">
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
						 <a href="{{ url('auth/facebook') }}"  class="btn btn-primary" style="background: #0c75f3;"><i class="fa fa-facebook"></i>  Login with Facebook</a>
						<!-- <a href="{{ url('auth/google') }}" ><strong>Login With Google</strong> -->
     
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
					</div>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
		$('#error').hide()
		}, 3000);
		setTimeout(function(){
		$('#success').hide()
		}, 3000)
     });
</script>
@endsection