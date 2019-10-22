@extends('layouts.master')
@section('title', 'Product Attribute')
@section('content') 
<section class="content">
<div>
   	<h2><b>Product</b>Attributes</h2>
  <hr>
</div>

<style>
		input.btn.btn-danger.btn-sm.just {
    margin-top: -60px;
    margin-left: 45px;
}
a.btn.btn-primary.btn-sm.add {
    margin-bottom: 15px;
    margin-left: 85%;
}
	</style>
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" 
      style="color: white;">×</button> 
      <strong>{{ $message }}</strong>
    </div>
@endif
 <a class="btn btn-primary btn-sm add" href="{{ route('product_attri.create')}}" 
  class="btn_add">Add Product Attribute</a>



  <table class="table table-striped projects">
        <thead>
            <tr>
              <th>
                 Product Attribute
              </th>
              <th>
                  Product Attribute Values
               </th>
               <th>
              	  Action
              </th>
            </tr>
        </thead>
        <tbody>
      @foreach($productattribute as $attri)  
        <tr>
          <td>{{$attri->name}}</td>
            <td>
             @foreach($attri['attribute'] as $value)
              {{$value->attribute_value}}<br>
             @endforeach
            </td>
           <td>
    		  <!-- 	<a class="btn btn-info btn-sm" href="{{route('product_attri.edit', $attri->id )}}"> Edit</a> -->
    				<form action="{{route('product_attri.destroy',$attri->id)}}" method="POST" >
    				 @csrf
    				 {{method_field('DELETE')}}
    				 <input type="submit" class="btn btn-danger btn-sm just" value ="Delete" onclick="return confirm('Are you sure?')"/>
    				</form>
          </td> 
        </tr>
       @endforeach
      </tbody>
    </table>

</section>
@endsection