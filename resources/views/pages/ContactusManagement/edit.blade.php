@extends('layouts.master')
@section('title', 'Contactus Reply')
@section('content')
	 @foreach($contact as $con)
<form  action="{{route('contactus.update',$con->id)}}" method="POST" style="width:700px; margin-left: 300px;">
	@csrf
	<input type="hidden" name="_method" value="PATCH" >
		<div>
		<label>Message :</label><br>
		<textarea class="form-control" disabled>{{$con->message}}</textarea>
	</div>
	<div>
		<label>Reply to Customer :</label><br>
		<input class="form-control" name="reply_message">
	</div><br>
	 <button type="submit" class="btn btn-sm btn-primary">Submit</button>
</form>
	 @endforeach

@endsection