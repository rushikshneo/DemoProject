@extends('pages.frontend.master2')
@section('content')
<style type="text/css">
img.thankyou {
    height: 250px;
    margin-left: 40%;
}
h3.textorder {
    text-align: center;
}
.backbtn {
    margin-left: 45%;
    margin-bottom: 20px;
}
</style>
@if($message == "success")
<img class="thankyou" src="{{asset('images/images/thank_you.png')}}">
<h3 class="textorder">Your Payment Will be completed suceessfully.</h3>
@endif
@if($message=="failed")
<h3 class="textorder" style="color: red;">Your Payment not completed suceessfully</h3>
<div class="backbtn">
 <a href="{{route('shopping.home')}}" class="btn btn-primary" >Go back to home </a>
</div>
@endif
@endsection