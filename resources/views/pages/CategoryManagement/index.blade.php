@extends('layouts.master')
@section('title', 'Category Managment')
@section('content') 
<section class="content">
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
<div>
   	<h2><b>Category</b>Managment - Main Category</h2>
  <hr>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" 
      style="color: white;">×</button> 
      <strong>{{ $message }}</strong>
    </div>
@endif
  <a class="btn btn-primary btn-sm add" href="{{ route('category.create')}}" class="btn_add">Add Category</a>
  
    <table class="table table-striped projects">
        <thead>
            <tr>
              <th >
                   Category Name
              </th>
              <th >
                Category description
              </th>
              <th >
                Category Status
              </th>   
                <th>
                	Sub Category
                </th>      
              <th  >
              	 Action
              </th>
            </tr>
        </thead>
        <tbody>
        @foreach($category as $cat)	
        <tr>
          @if($cat->parent_id == 0)
          <td>{{$cat->name}}</td>
          <td>{{$cat->description }}</td>
          <td>
          	@if($cat->status == 0)
            	Active
          	 @else
          	 InActive
          	 @endif
          </td>
          <td>
          	  <a class="btn btn-success btn-sm" href="{{route('category.show',$cat->id)}}">Show Sub Category</a>
          </td>
          
          
          
         <td>
	           <a class="btn btn-info btn-sm" href="{{route('category.edit',$cat->id)}}"> Edit</a>
	          <!-- <div class="button"> -->
	          <form action="{{route('category.destroy',$cat->id)}}" method="POST" >
	          @csrf
            {{method_field('DELETE')}}
	          <input type="submit" class="btn btn-danger btn-sm just" value ="Delete" onclick="return confirm('Are you sure?')"/>
	          </form>
	          <!-- </div> -->
          </td> 
 		@endif
        </tr>
        @endforeach
        </tbody>
    </table>
</section>
@endsection