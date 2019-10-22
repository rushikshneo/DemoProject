@extends('layouts.master')
@section('title', 'Product Managment')
@section('content') 

<section class="content">
  <style>
    .error {
    color: red;
    font-weight: bold;
    margin-top: -24px;
    margin-left: 5px;
}
  </style>

<div>
   	<h2><b>Create</b>Product</h2>
  <hr>
</div>
<link rel="stylesheet" href="../../theme/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<div class="card card-default">
<div class="card-body">
  <form action="{{route('product.store')}}" method="POST" >
  @csrf

  <!-- choose category -->
    <div class="form-row">
      <div class="col">
        <label for="exampleInputEmail1">* Choose Category :</label>    
        <select class="form-control" id="category_id" name="category_id">
          <optgroup  label="Main Category">
            <option value="">Select</option>
            @foreach($category as $cat)
              @if($cat->parent_id == 0)
                <option value="{{$cat->parent_id}}">{{$cat->name}}</option>
              @else
                <option value="{{$cat->parent_id}}">-> {{$cat->name}}</option>
              @endif
            @endforeach
          </optgroup>
        </select>
      </div>
    </div><br>
    @if($errors->has('category_id'))
    <div  class="error">
    {{$errors->first('category_id')}}
    </div>
    @endif

    <div class="form-row">
     
     <!-- Product Name -->
      <div class="col">
        <label for="exampleInputEmail1">* Product Name  : </label>
        <input type="text" class="form-control" name="productname"placeholder="Product Name">
        @if($errors->has('productname'))
          <div  class="error">
            <br> {{$errors->first('productname')}}
          </div>
        @endif
      </div>

      <!-- Product Short Description -->
      <div class="col">
        <label for="exampleInputEmail1">*Product Short Description :</label>
        <input type="text" class="form-control" name="productshortdesc" placeholder="Short Description">
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
      <textarea type="text"  placeholder="Short Description" name="productlongdesc" class="form-control"></textarea>
        @if($errors->has('productlongdesc'))
          <div  class="error">
           <br> {{$errors->first('productlongdesc')}}
          </div>
        @endif
    </div>

    <!-- Product Price -->
    <div class="col">
      <label for="exampleInputEmail1">*Product Price :</label>
      <input type="number" step="any"  class="form-control"name="productprice"  placeholder="Product Price">
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
      <input type="number" step="any" class="form-control" name="productspecialprice"  placeholder="Product Special Price">
        @if($errors->has('productspecialprice'))
          <div  class="error">
           <br>{{$errors->first('productspecialprice')}}
          </div>
        @endif
    </div>
   <!-- Special Price From -->
    <div class="col">
      <label for="exampleInputEmail1">*Special Price From :</label>
      <input type="date"  class="form-control" name="productspicalpricefrom"  placeholder="Product Price">
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
      <input type="date" class="form-control"name="productspecialpriceto"  placeholder="Product Special Price">
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
        <input  type="radio" value="0" name="status">
        <label>Active</label> 
        <input  type="radio"  value="1" name="status">
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
      <input type="number" class="form-control" name="productquantity"  placeholder="Product Quantity">
        @if($errors->has('productquantity'))
          <div  class="error">
            <br>{{$errors->first('productquantity')}}
          </div>
        @endif
    </div>  

    <div class="col">
      <label for="exampleInputEmail1">*Meta Title :</label>
      <input type="text"  placeholder="Meta Title" name="metatitle"  class="form-control"> 
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
     <textarea type="text"  placeholder="Meta Description" name="metadesc"  class="form-control"></textarea>
      @if($errors->has('metadesc'))
    <div  class="error">
     <br> {{$errors->first('metadesc')}}
    </div>
    @endif
    </div>
    
     <div class="col">
      <label for="exampleInputEmail1">*Meta Keyword :</label>
      <input  type="text"  placeholder="Meta Keyword" name="metakeyword" class="form-control">
       @if($errors->has('metakeyword'))
     <div  class="error">
      <br> {{$errors->first('metakeyword')}}
     </div>
    @endif
    </div>

    
</div>

 <hr>
  <div class="form-row">
     <div class="col">
   <div class="form-group">
       <label for="exampleInputEmail1">*Product Image Name:</label>
       <input type="bannername" name="productimagename" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Image Name" value="{{old('productimagename')}}">
     </div>
       @if($errors->has('productimagename'))
        <div  class="error">
         <br> {{$errors->first('productimagename')}}
        </div>
        @endif
    </div>
    <div class="col">
     <div class="form-group">
          <label for="exampleInputFile">* Choose Product Image :  </label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="image" class="form-control btn">
              </div>
            </div>
          </div>
        @if($errors->has('image'))
        <div  class="error">
        <br> {{$errors->first('image')}}
        </div>
        @endif
    </div>

  </div>


  <div class="form-row">
    <div class="col">
      <div class="form-group">
                  <label>* Choose Attribute :</label>
                <select class="form-control" name="attri_select" id="attri_select">
                     <option value="" >Select</option>
                      @foreach($product_attri as $attri)
                   <option value="{{$attri->id}}">{{$attri->name}}
                    </option>
                    @endforeach
                  </select>
                </div>
    </div>
    <div class="col" >
        <label for="exampleInputEmail1">* Choose Attribute Value :</label>    
        <select class="form-control" id="attri_val" name="attri_val">
            <option value="">Select</option>
           
        </select>
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
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      $('#attri_select').click(function(){
        var value = $('#attri_select').val();
        $("#attri_val").append(       value+
                                   '@foreach($product_attri_values as $attri)'+
                                      '<option value="{{$attri->id}}">{{$attri->attribute_value}} </option>'+
                                      
                                     '@endforeach'
                                 
                              );
    });
  });
</script>

</section>
@endsection