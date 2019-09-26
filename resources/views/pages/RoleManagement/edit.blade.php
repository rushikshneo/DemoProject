@extends('layouts.master')
@section('title', 'Role Managment')
@section('content') 
<section class="content">
<style>
.check {
    margin-left: 25px;
    margin-bottom: 20px;
}

label.form-check-label {
    margin-right: 29px;
}
</style>
<div>
   	<h2><b>Edit</b>Role</h2>
  <hr>
</div>

 <form method="POST" action="{{route('roles.update' ,['id' => $role->id])}}">
 	  {{ method_field('PATCH') }}
     	@csrf
		<div class="card-body">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Name:</label>
		    <input type="text" value="{{$role->name}}" class="form-control" id="name" name="name" placeholder="Enter Name">
		  </div>
			
			 <div class="check">
			 	@foreach($permission as $values)	
		 		<input class="form-check-input" type="checkbox" name="permission[]" value="{{$values->id}}" {{in_array($values->id, $rolePermissions) ? 'checked' : ''}}>
		 		<label class="form-check-label">{{$values->name}}</label>
		 		@endforeach
			</div>
			    


			<div class="col-4">
			<button type="submit" class="btn btn-primary">
			  {{ __('Submit') }}
			</button>
			</div>
		</div>
  </form>

</section>
@endsection