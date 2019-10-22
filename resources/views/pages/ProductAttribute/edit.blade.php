@extends('layouts.master')
@section('title', 'Product Attribute')
@section('content') 
<section class="content">
<div>
   	<h2><b>Edit</b>ProductAttribute</h2>
  <hr>
</div>
<style>
	button.btn.btn-primary {
	    margin-top: 35px;
	    margin-left: 30px;
	}
	button#add {
	    margin-top: 25px;
	}
	.error {
	    color: red;
	    font-weight: bold;
	}
</style>
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
 <form action="{{route('product_attri.update',$productattribute->id)}}" method="POST">
  {{ method_field('PATCH') }}
 	@csrf
 	<div class="form-row">
		<div class="col">
			<table class="table table-bordered" >  
		<tr>  
			<td>
			<label for="exampleInputEmail1">Product Attribute Name :</label>
				<input type="text" name="name" value="{{$productattribute->name}}" placeholder="Enter Product Attribute Name" 
				class="form-control"/>
				@if($errors->has('name'))
			 	<div  class="error">
				 {{$errors->first('name')}}
				</div>
                @endif
			</td>
		</tr>
	</table>
		</div>

<div class="col">
  <div class="table-responsive">  
	<table class="table table-bordered" id="dynamic_field">  
		<tr>  
			<td>
			<div class="form-row">
				<div class="col" id="justvalues">
					<label for="exampleInputEmail1">
					 Product Attribute Values :
					</label>
					<br>
					@foreach($value['attribute'] as $val)
					<input type="text" name="values[]" value="{{$val->attribute_value}}" class="form-control" placeholder="Enter Attribute Values"><br>
					 @if($errors->has('values[]'))
					 <div  class="error">
					  {{$errors->first('values[]')}}
					 </div>
					 @endif 
					@endforeach
					
				</div>
			</div>
			</td> 
					
		<!-- <td>
		<button type="button" name="add" id="add" class="btn btn-success">Add More</button>
		</td>  --> 
		</tr>  
	</table>  
		
				</div>
			</div>
   <div class="col-3" >
            <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
            </button>
          </div>
		</div>
</form>
	<script type="text/javascript">
    $(document).ready(function(){      
      var i=1; 
      $('#add').click(function(){  
           i++;  
          $('#dynamic_field').append('<tr id="row'+i+
           	                     '" class="dynamic-added"><td><div class="col"><input type="text" name="values[]" placeholder="Enter values" class="form-control" /></div>	</div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){ 
           var button_id = $(this).attr("id");  
           $('#row'+button_id+'').remove();  
      });

     });  
</script>



</section>
@endsection