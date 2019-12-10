@extends('layouts.master')
@section('title', 'Email Create')
@section('content')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
  <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
  
  <form method="POST" action="{{route('email.store')}}" id="form" style="width: 600px;margin-left: 200px;">
	  	@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email Name :</label>
		    <input type="text" class="form-control" id="" name="email" placeholder="" value="">
		  </div>	
      <label for="exampleInputEmail1">Email header :</label>
		  <textarea rows="4"  cols="40"class="form-control" id="summary-ckeditor" name="emailheader"> </textarea>
        <label for="exampleInputEmail1">Email Main Content :</label>
        <textarea rows="10"  cols="80"class="form-control" id="ckeditor" name="emailmaincontent"> </textarea>

        <label for="exampleInputEmail1">Email footer :</label>
        <textarea rows="10"  cols="80"class="form-control" id="editor" name="emailfooter"> </textarea>  
		    <div class="row">
          <div class="col-4">
            <button type="submit" style="margin-top:10px;" class="btn btn-primary">
            {{ __('Submit') }}
            </button>
          </div>
        </div>
      
    </form>

<script>
    CKEDITOR.replace( 'summary-ckeditor' );
    CKEDITOR.replace( 'ckeditor' );
    CKEDITOR.replace( 'editor' );
</script>
@endsection