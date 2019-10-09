@extends('layouts.master')
@section('title', 'Banner Managment')
@section('content') 
<section class="content">
	<div>
		<h2><b>Banner</b>Managment</h2>
	<hr>
	</div>

    <form enctype="multipart/form-data" action="{{route('banner.store')}}" method="POST">
    	@csrf
    	 

	     <div class="form-group">
			 <label for="exampleInputEmail1">Banner Name </label>
			 <input type="bannername" name="bannername" class="form-control" id="exampleInputEmail1" placeholder="Enter Banner Name" value="{{old('bannername')}}">
		 </div>
     
        @error('bannername')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror


          <div class="form-group">
                    <label for="exampleInputFile">Choose Banner</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="form-control btn">
                      </div>
                    </div>
          </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</section>
@endsection