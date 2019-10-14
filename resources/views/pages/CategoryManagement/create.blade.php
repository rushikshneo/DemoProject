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
	  <form method="POST" action="{{ route('category.store') }}" id="form">
	  	@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Category Name :</label>
		    <input type="text" class="form-control {{$errors->has('categoryname ')?'has-error':''}}" id="cat_name" name="categoryname" placeholder="Enter Category Name" value="{{old('categoryname')}}">
		  </div>

         @if($errors->has('categoryname'))
       <div  class="alert alert-danger">
         {{$errors->first('categoryname')}}
        </div>
         @endif

    <label for="exampleInputEmail1">Category Level :</label>
     <div class="input-group mb-3">
      <select class="form-control {{$errors->has('categorylevel ')?'has-error':''}}" name="categorylevel" >
        <option value="">Select level</option>
           <option value="0">Main Catagory</option>
           @foreach($levels as $level)
           <option value="{{$level->id}}">{{$level->name}}</option>
           @endforeach
      </select>
     </div>
      @if($errors->has('categorylevel'))
       <div  class="alert alert-danger">
         {{$errors->first('categorylevel')}}
       </div>
      @endif

      <div class="form-group">
		    <label for="exampleInputEmail1">Category Description :</label>
		    <textarea type="text" class="form-control {{$errors->has('categorydescription ')?'has-error':''}}" id="cat_desc" name="categorydescription" value="{{old('categorydescription')}}" placeholder="Enter Category Description"></textarea>
		  </div>
       @if($errors->has('categorydescription'))
       <div  class="alert alert-danger">
         {{$errors->first('categorydescription')}}
       </div>
         @endif

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
         @if($errors->has('status'))
         <div  class="alert alert-danger">
           {{$errors->first('status')}}
        </div>
         @endif

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