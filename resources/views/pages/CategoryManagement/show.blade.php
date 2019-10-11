@extends('layouts.master')
@section('title', 'Category Managment')
@section('content') 
<section class="content">
	<style>
		input.btn.btn-danger.btn-sm.just {
    margin-top: -60px;
    margin-left: 45px;
}
	</style>
<div>
   	<h2><b>Sub</b>Category  -{{$main_catname->name}}</h2>
  <hr>
</div>
<table class="table table-striped projects">
	<thead>
		<th>SubCategory Name</th>
		<th>SubCategory description</th>
		<th>SubCategory Status</th>
		<th>Action</th>
	</thead>
	<tbody>
		
		@foreach($category as $cat)
		<tr>
		<td>{{$cat->name}}</td>
		<td>{{$cat->description}}</td>
		<td>
			@if($cat->status == 0)
            	Active
          	 @else
          	 InActive
          	 @endif
          </td>
		<td>
			<a href="{{route('category.edit',$cat->id)}}" class="btn btn-info btn-sm"  >Edit</a>
			 <form action="" method="POST" >
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