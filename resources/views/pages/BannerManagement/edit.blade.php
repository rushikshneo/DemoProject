@extends('layouts.master')
@section('title', 'Banner Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Edit</b>Banner</h2>
  <hr>
</div>
<style>
th.action {
	text-align: center;
}

a.btn.btn-primary.btn-sm.add{
	margin-bottom: 14px;
	margin-left: 72%;
}

a.btn.btn-primary.btn-sm.role {
	margin-top: -16px;
	background-color: yellowgreen;
	border: none;
}
input.btn.btn-danger.btn-sm {
margin-top: 3px;
}

.button {
    margin-top: -34px;
    margin-left: 46px;
}
img.banner {
       height: 300px;
    width: 50%;
}
</style>

  <form enctype="multipart/form-data" action="{{route('banner.update',$banner->id)}}" method="POST">
    	@csrf
    	 <input type="hidden" name="_method" value="PATCH">
	     <div class="form-group">
			 <label for="exampleInputEmail1">Banner Name </label>
			 <input type="bannername" name="bannername" class="form-control" id="exampleInputEmail1" placeholder="Enter Banner Name" value="{{$banner_name}}">
		 </div>
		
          <div class="form-group">
                    <label for="exampleInputFile">Update Banner</label>
					<div>
						<img src="{{URL::asset($banner->banner_url)}}" class="banner" >
					</div>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="form-control btn"> 
                      </div>
                    </div>
          </div>
                 <button type="submit" class="btn btn-primary">Update</button>
	</form>
</section>
@endsection