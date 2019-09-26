@extends('layouts.master')
@section('title', 'Role Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Role</b>Managment</h2>
  <hr>
</div>
  <form method="POST" action="{{ route('roles.store') }}">
  	@csrf
		<div class="card-body">

		  <div class="form-group">
		    <label for="exampleInputEmail1">Name:</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
		  </div>
		  @foreach($permission as $value)
		 <div class="form-group clearfix">
			 <div class="icheck-primary d-inline">      	
              <input class="form-check-input" type="checkbox" name="permission[]" value="{{$value->id}}">
              <label class="form-check-label">{{$value->name}}</label>
			 </div>
          </div>
				@endforeach      
			<div class="col-4">
			<button type="submit" class="btn btn-primary">
			  {{ __('Submit') }}
			</button>
			</div>
		</div>
  </form>
</section>
@endsection