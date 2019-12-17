@extends('layouts.master')
@section('title', 'User Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Edit</b>Product</h2>
  <hr>
</div>
<style>
 
</style>
 <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<div class="card card-default">
<div class="card-body">
<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
     {{ method_field('PATCH') }}
  @csrf

  <!-- choose category -->
    <div class="form-row">
      <div class="col">
        <label for="exampleInputEmail1">* Choose Category :</label>    
        <select class="form-control" id="category_id" name="category_id">
          <optgroup  label="Main Category">
            <option value="">Select</option>
             <?php echo  $category_menu ?>
          </optgroup>
        </select>

      </div>
    </div>
    <br>
    @if($errors->has('category_id'))
    <div  class="error">
    {{$errors->first('category_id')}}
    </div>
    @endif

    <div class="form-row">
     <!-- Product Name -->
      <div class="col">
        <label for="exampleInputEmail1">* Product Name  : </label>
        <input type="text" class="form-control" name="productname" placeholder="Product Name" value="{{$product->name}}">
        @if($errors->has('productname'))
          <div  class="error">
            <br> {{$errors->first('productname')}}
          </div>
        @endif
      </div>

      <!-- Product Short Description -->
      <div class="col">
        <label for="exampleInputEmail1">*Product Short Description :</label>
        <input type="text" class="form-control" name="productshortdesc" placeholder="Short Description"value="{{$product->short_description}}">
        @if($errors->has('productshortdesc'))
          <div  class="error">
            <br> {{$errors->first('productshortdesc')}}
          </div>
      @endif
      </div>
    </div>

  <div class="form-row">

    <!--Product Long Description  -->
    <div class="col">
      <label for="exampleInputEmail1">*Product Long Description :</label>
      <textarea type="text"  placeholder="Short Description" name="productlongdesc" class="form-control">{{$product->long_description}}</textarea>
        @if($errors->has('productlongdesc'))
          <div  class="error">
           <br> {{$errors->first('productlongdesc')}}
          </div>
        @endif
    </div>

    <!-- Product Price -->
    <div class="col">
      <label for="exampleInputEmail1">*Product Price :</label>
      <input type="number" step="any"  class="form-control"name="productprice"  placeholder="Product Price"value="{{$product->price}}">
        @if($errors->has('productprice'))
          <div  class="error">
            <br> {{$errors->first('productprice')}}
          </div>
        @endif
    </div>
  </div>

  <div class="form-row">
      <!-- Product Special Price -->
    <div class="col">
      <label for="exampleInputEmail1">*Product Special Price :</label>
      <input type="number" step="any" class="form-control" name="productspecialprice"  placeholder="Product Special Price"value="{{$product->special_price}}">
        @if($errors->has('productspecialprice'))
          <div  class="error">
           <br>{{$errors->first('productspecialprice')}}
          </div>
        @endif
    </div>
   <!-- Special Price From -->
    <div class="col">
      <label for="exampleInputEmail1">*Special Price From :</label>
      <input type="date"  class="form-control" name="productspicalpricefrom"  placeholder="Product Price"value="{{$product->special_price_from}}">
        @if($errors->has('productspicalpricefrom'))
          <div  class="error">
            <br>{{$errors->first('productspicalpricefrom')}}
          </div>
        @endif
    </div>
  </div>

  <div class="form-row">
    <!-- Special Price TO  -->
    <div class="col">
      <label for="exampleInputEmail1">*Special Price To :</label>
      <input type="date" class="form-control"name="productspecialpriceto"  placeholder="Product Special Price" value="{{$product->special_price_to}}">
        @if($errors->has('productspecialpriceto'))
          <div  class="error">
            <br>{{$errors->first('productspecialpriceto')}}
          </div>
        @endif
    </div>

    <!-- Status  -->
    <div class="col">
      <label for="exampleInputEmail1">*Status:</label>
      <div class="form-control" >
        <input  type="radio" value="0"  name="status" {{($product->status == 0) ? 'checked' : '' }} >
        <label>Active</label> 
        <input  type="radio"  value="1" name="status" {{($product->status == 1) ? 'checked' : '' }} >
        <label>InActive</label>
      </div>
        @if($errors->has('status'))
          <div  class="error">
            <br> {{$errors->first('status')}}
          </div>
        @endif 
    </div>  
  </div>

  <div class="form-row">
    <div class="col">
      <label for="exampleInputEmail1">*Quantity :</label>
      <input type="number" class="form-control" name="productquantity"  placeholder="Product Quantity"value="{{$product->quanity}}">
        @if($errors->has('productquantity'))
          <div  class="error">
            <br>{{$errors->first('productquantity')}}
          </div>
        @endif
    </div>  

    <div class="col">
      <label for="exampleInputEmail1">*Meta Title :</label>
      <input type="text" value="{{$product->meta_title}}" placeholder="Meta Title" name="metatitle"  class="form-control"> 
        @if($errors->has('metatitle'))
          <div  class="error">
           <br>{{$errors->first('metatitle')}}
          </div>
        @endif
    </div>
  </div>

 <div class="form-row">

    <div class="col">
      <label for="exampleInputEmail1">*Meta Description :</label>
     <textarea type="text"  placeholder="Meta Description" name="metadesc" class="form-control"> {{$product->meta_description}}</textarea>
      @if($errors->has('metadesc'))
    <div  class="error">
     <br> {{$errors->first('metadesc')}}
    </div>
    @endif
    </div>
    
     <div class="col">
      <label for="exampleInputEmail1">*Meta Keyword :</label>
    <input type="text" value="{{$product->meta_keywords}}" placeholder="Meta Keyword" name="metakeyword" class="form-control">
       @if($errors->has('metakeyword'))
     <div  class="error">
      <br> {{$errors->first('metakeyword')}}
     </div>
    @endif
    </div>

    
</div>

 <!-- <hr> -->
 
  <div class="form-row">
     <div class="col">
          @foreach($product->images as $image)
      <div class="form-group">
          <label for="exampleInputEmail1">*Product Image Name:</label>
          <input type="text"  name="productimagename[]" class="form-control" id="productimagename" value="{{$image->image_name}}" placeholder="Enter Product Image Name" value="{{old('productimagename')}}">
       </div>
          @endforeach
         @if($errors->has('productimagename'))
           <div  class="error">
             <br> {{$errors->first('productimagename')}}
           </div>
          @endif
    </div>
    <div class="col image">
     @foreach($product->images as $url)
    	<img src="{{URL::asset($url->image_url)}}"style="height: 100px;margin-left:100px;">
      @endforeach
    </div>
    <div class="col">
      @foreach($product->images  as $url)
        <div class="form-group">
          <label for="exampleInputFile">*Update Product Image :  </label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="image[]" class="form-control btn" multiple="multiple">
              </div>
            </div>
          </div>
        @endforeach
        @if($errors->has('image'))
        <div  class="error">
          <br> {{$errors->first('image')}}
        </div>
        @endif
   <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
    </div>
  </div>

   
<!-- <div id="extra">
</div> -->
<!-- <hr> -->
<!-- @foreach($product_attri_asso as $product_attris)
@if($product_attris->product_id == $product->id)


  <div class="form-row">
    <div class="col">
    <div class="form-group">
      <label>* Choose Attribute :</label>
      <select class="val form-control" name="attri_select[]" id="attri_select_1">
           <option value="">Select</option>
            @foreach($product_attri as $attri)
             @if ($attri->id == old('id',$product_attris->product_attribute_id))
                selected="selected"
               @endif
         <option value="{{$attri->id}}"  {{( $attri->id == $product_attris->product_attribute_id) ? 'selected' :''}}>{{$attri->name}}
          </option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col">
        <label for="exampleInputEmail1">* Choose Attribute Value :
        </label>
        <select class="form-control value" id="attri_val_1" name="attri_val[]">
          <option value="">Select</option>
            @foreach($product_att_value as $value)

              @foreach($product_attri as $attri)

                @if($attri->id == $value->product_attribute_id && $attri->id == $product_attris->product_attribute_id)

                 @if ($value->id == old('id',$product_attris->product_attribute_value_id))

                selected="selected"

               @endif
               <option value="{{$value->id}}" {{( $value->id == $product_attris->product_attribute_value_id) ? 'selected' :''}} >{{$value->attribute_value}}</option>
                @endif
              @endforeach
            @endforeach
        </select>
    </div>
  </div>
  @endif
        @endforeach -->

       <!--   <div class="col">
     <button type="button" name="add" id="add_attri" class="btn btn-success">Add More</button>
    </div>
   <hr>
    <div class="col" id="attri_values">
    </div> -->


     <div class="form-row" style="margin-bottom: 50px; margin-top: 20px;margin-left: 40%;">
          <div class="col-4" >
            <button type="submit" class="btn btn-primary">
             {{ __('Update') }}
            </button>
          </div>
    </div>
</form>
</div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
  
   var i=1; 
 $('#add').click(function(){
             i++;  
      $('#extra').append('<div id="row'+i+'"><hr><div class="form-row"><div class ="col"></div><div class ="col"><div class ="form-group"><label id="row" for="exampleInputFile">* Choose Product Image :</label><input type="file" id="image'+i+'" name="image[]" multiple="multiple" class="form-control btn"></div></div><div class="col"><button type="button" name="remove" id="'+i+'"class="btn btn-danger btn_remove">X</button></div></div></div></div>');
    });

     $(document).on('click', '.btn_remove', function(){ 
           var button_id = $(this).attr("id");  
           $('#row'+button_id+'').remove();  
       });

$('#add_attri').click(function(){
             i++;  
      $('#attri_values').append('<div id="row'+i+'"><div class="form-row"><div class ="col"><label>* Choose Attribute :</label><select class="val form-control" name="attri_select[]"  id ="attri_select_'+i+'" ><option value="">Select</option> @foreach($product_attri as $attri)<option value="{{$attri->id}}">{{$attri->name}}</option>@endforeach</select></div><div class ="col"><div class="form-group"> <select class="form-control" id="attri_val_'+i+'"  name="attri_val[]">  <option value="">Select</option> </select></div></div><div class="col"><button type="button" name="remove" id="'+i+'"class="btn btn-danger btn_remove">X</button></div></div><hr></div></div>');
    });

 $(document).on('change','.val',function() {
        var value     = $(this).val();
        var attri_id  = this.id;
        var attri_val = 'attri_val_'+ attri_id.split("_")[2];
        if(value)
        {
    $.ajax({
        type: "GET",
        url: "/attribute",
        data: {
                id: value
              }
      })
      .done(
        function(value) {
          $('#'+attri_val).empty();
          $('#'+attri_val).append('<option  value="">Select</option>');
          for (var i =0 ; i < value.length; i++) {
           $('#'+attri_val).append('<option  value="'+ value[i].id +'">'+ value[i].attribute_value +'</option>'      
         );
        }
      });
      } 
    });

     $(document).on('click', '.btn_remove', function(){ 
           var button_id = $(this).attr("id");  
           $('#row'+button_id+'').remove();  
       });



  });
   
</script>
</section>
@endsection