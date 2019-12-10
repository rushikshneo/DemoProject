@extends('layouts.master')
@section('title', 'Email Edit')
@section('content')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
  <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
   @foreach($email as $em)
  <form method="POST" action="{{route('email.update',$em->id)}}" id="form" style="width: 600px;margin-left: 200px;">
	  	@csrf
	  	<input type="hidden" name="_method" value="PATCH" >
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email Name :</label>
		    <input type="text" class="form-control" id="" name="email" placeholder="" value="{{$em->email_name}}">
		  </div>	
      <label for="exampleInputEmail1">Email header :</label>
		  <textarea rows="4"  cols="40"class="form-control" id="summary-ckeditor" name="emailheader">{{$em->email_header}}</textarea>
        @if(!empty($em->email_main_content))
        <label for="exampleInputEmail1">Email Main Content :</label>
        <textarea rows="10"  cols="80"class="form-control" id="ckeditor" name="emailmaincontent">
        	{{$em->email_main_content}}
         </textarea>
         @endif

        <label for="exampleInputEmail1">Email footer :</label>
        <textarea rows="10"  cols="80"class="form-control" id="editor" name="emailfooter">{{$em->email_footer}}</textarea>  
		    <div class="row">
          <div class="col-4">
            <button type="submit" style="margin-top:10px;" class="btn btn-primary">
            {{ __('Submit') }}
            </button>
          </div>
        </div>
      @endforeach      
    </form>

<script>
    CKEDITOR.replace( 'summary-ckeditor' );
    CKEDITOR.replace( 'ckeditor' );
    CKEDITOR.replace( 'editor' );
</script>

@endsection