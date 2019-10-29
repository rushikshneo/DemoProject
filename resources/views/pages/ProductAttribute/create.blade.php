@extends('layouts.master')
@section('title', 'Product Attribute')
@section('content') 
<section class="content">
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
button.btn.btn-danger.btn_remove {
    margin-top: 22px;
}
</style>
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<div>
   	<h2><b>Create</b>ProductAttribute</h2>
  <hr>
</div>
 <form action="{{route('product_attri.store')}}" method="POST">
 	@csrf
 	
 	<div class="form-row">
		<div class="col">
			<table class="table table-bordered" >  
		<tr>  
			<td>
			<label for="exampleInputEmail1">Product Attribute Name :</label>
				<input type="text" name="name"  placeholder="Enter Product Attribute Name" 
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
					<label for="exampleInputEmail1">Product Attribute Values :</label>
					<br>
					<input  type="text" name="values[]" class="form-control" placeholder="Enter Attribute Values">
					@if($errors->has('values[]'))
					<div  class="error">
					{{$errors->first('values[]')}}
					</div>
					@endif
				</div>
			</div>
			</td> 
					
		<td>
		<button type="button" name="add" id="add" class="btn btn-success">Add More</button>
		</td>  
		</tr>  
	</table>  
		
				</div>
			</div>
   <div class="col-3" >
            <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
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
           	                     '" class="dynamic-added"><td><div class="col"><input type="text" name="values[]" placeholder="Enter values" class="form-control" /></div>	</div></td><td><button type="button" name = "remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){ 
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();  
      });

     });  
</script>
</section>
@endsection