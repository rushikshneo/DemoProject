@extends('layouts.master')
@section('title', 'Product Managment')
@section('content') 

<section class="content">
<div>
   	<h2><b>Create</b>Product</h2>
  <hr>
</div>


<form action="{{route('product.store')}}" method="POST" >
	@csrf

  <div class="form-row">
  	<div class="col">
  	 <label for="exampleInputEmail1"> Choose Category : </label>
  	<select class="form-control">
		<optgroup  label="Main Category">
		<option value="">Select</option>
		@foreach($category as $cat)
			@if($cat->parent_id == 0)
				<option value="{{$cat->parent_id}}"><strong>{{$cat->name}}</strong></option>
			@else
			 <option value="{{$cat->parent_id}}">{{$cat->name}}</option>
			 @endif
		@endforeach
	  </optgroup>
	
  </select>
 </div>
 
  </div>
    
	
  <div class="form-row">
    <div class="col">
      <label for="exampleInputEmail1"> Product Name  : </label>
      <input type="text" class="form-control" name="productname"placeholder="Product Name">
    </div>
    <div class="col">
      <label for="exampleInputEmail1">Product Short Description :</label>
      <input type="text" class="form-control" name="productshortdesc" placeholder="Short Description">
    </div>
   
  </div>
  <div class="form-row">
   <div class="col">
      <label for="exampleInputEmail1">Product Long Description :</label>
      <textarea type="text"  placeholder="Short Description" name="productlongdesc" class="form-control"></textarea>
    </div>
    <div class="col">
      <label for="exampleInputEmail1">Product Price :</label>
      <input type="number" step="any"  class="form-control"name="productprice"  placeholder="Product Price">
    </div>
</div>

<div class="form-row">
    
    <div class="col">
      <label for="exampleInputEmail1">Product Special Price :</label>
    <input type="number" step="any" class="form-control" name="productspecialprice"  placeholder="Product Special Price">
    </div>
    <div class="col">
      <label for="exampleInputEmail1">Special Price From :</label>
      <input type="date"  class="form-control" name="productspicalpricefrom"  placeholder="Product Price">
    </div>
</div>
<div class="form-row">
    
    <div class="col">
      <label for="exampleInputEmail1">Special Price To :</label>
    <input type="date" class="form-control"name="productspecialpriceto"  placeholder="Product Special Price">
    </div>
     <div class="col">
      <label for="exampleInputEmail1">Status:</label>
           <div class="form-control" >
              <input  type="radio" value="0" name="status" >
          <label>Active</label> 
           <input  type="radio"  value="1" name="status" >
          <label>InActive</label>
          </div>
    </div>
</div>

<div class="form-row">
   
    <div class="col">
      <label for="exampleInputEmail1">Quantity :</label>
    <input type="number" class="form-control" name="productquantity"  placeholder="Product Quantity">
    </div>
       <div class="col">
      <label for="exampleInputEmail1">Meta Title :</label>
      <input type="text"  placeholder="Meta Title" name="metatitle"  class="form-control"> 
    </div>

</div>

 <div class="form-row">

    <div class="col">
      <label for="exampleInputEmail1">Meta Description :</label>
     <textarea type="text"  placeholder="Meta Description" name="metadesc"  class="form-control"></textarea>
    </div>
     <div class="col">
      <label for="exampleInputEmail1">Meta Keyword :</label>
      <input  type="text"  placeholder="Meta Keyword" name="metakeyword" class="form-control">
    </div>
    
</div>

  <div class="form-row" style="margin-bottom: 50px; margin-top: 20px;margin-left: 40%;">
          <div class="col-4" >
            <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
            </button>
          </div>
    </div>
</form>

</section>
@endsection