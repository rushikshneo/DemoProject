@extends('pages.frontend.master2')
@section('content')
 <style type="text/css">
  input.btn.btn-danger.btn-sm.just {
    margin-top: -56px;
    margin-left: 104px;
  }
 </style>
 <h2 style="margin-left: 300px;">User Wishlist</h2>
<br><br>

@if(count($user)!= 0)
<table class="table table-striped projects" style="width: 50%;margin-left: 25%;">
    <tr>
      <th>Product Id</th>
      <th>Product</th>
      <th>Price</th>
      <th width="280px">Action</th>
    </tr>
     @foreach($user as $userwishlist)
    <tr>
      <td>{{$userwishlist->product->id}}</td>
      <td>{{$userwishlist->product->name}}</td>
      <td>{{$userwishlist->product->price}}</td>
      <td>
       <a class="btn btn-info" href="{{route('shopping.addtocart',$userwishlist->product_id)}}">Add To Cart</a>
       <form action="{{route('shopping.removewishlist', $userwishlist->id)}}" method="POST">
	          @csrf
            {{method_field('DELETE')}}
	          <input type="submit" class="btn btn-danger btn-sm just" value ="Delete" onclick="return confirm('Are you sure?')"/>
	    </form>
       <!--  <a class="btn btn-danger" href="">Delete</a> -->
      </td>
    </tr>
   @endforeach  
  </table>
  @else
  <p style="margin-left:30%;margin-bottom:30px; color:red;">you have no Wishlist .</p>
  <br><br>
  @endif
  @endsection