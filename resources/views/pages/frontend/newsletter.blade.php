@extends('pages.frontend.master2')
@section('content')

 @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" style="color: white;">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif
     @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert" style="color: white;">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif

<form action="{{route('shopping.newsletter_subscribe')}}" style="width:500px;margin-bottom: 
20px; margin-left: 300px;" method="post">
	@csrf
    <div class="form-group">
        <label for="exampleInputEmail">Email</label>
        <input type="email" name="user_email" placeholder="Enter the email" id="exampleInputEmail" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection