@extends('layouts.master')
@section('title', 'Category Managment')
@section('content') 
<section class="content">
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" 
      style="color: white;">×</button> 
      <strong>{{ $message }}</strong>
    </div>
@endif

<div>
   	<h2><b>Create</b>Category</h2>
  <hr>
</div>
	  <form method="POST" action="{{ route('category.store') }}">
	  	@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Category Name :</label>
		    <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Enter Category Name ">
		  </div>

    <label for="exampleInputEmail1">Category Level :</label>
    <div class="input-group mb-3">
      <select class="form-control" name="cat_level">
        <option>Select level</option>
           <option value="0">Main Catagory</option>
           @foreach($levels as $level)
           <option value="{{ $level->id }}">{{$level->name}}</option>
           @endforeach
      </select>
     </div>

      <div class="form-group">
		    <label for="exampleInputEmail1">Category Description :</label>
		    <textarea type="text" class="form-control" id="cat_desc" name="cat_desc" placeholder="Enter Category Description"></textarea>
		  </div>

		   <div class="input-group mb-3">
          <p class="status"><label >Status  :</label></p>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="0" name="status" >
            </div><br>
          <label>Active</label>
          <div class="form-check">
            <input class="form-check-input" type="radio"  value="1" name="status" >
          </div>
          <label>InActive</label>
        </div>

		 <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
            </button>
          </div>
        </div>
    
    </form>


</section>
@endsection