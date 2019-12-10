@extends('layouts.master')
@section('title', 'Email Managment')
@section('content')
<section class="content">
<div>
   	<h2><b>Email</b>Managment</h2>
  <hr>
</div>
<style type="text/css">
  input.btn.btn-danger.btn-sm.del {
    margin-top: -54px;
    margin-right: 20p;
    margin-left: 44px;
}
</style>
 @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" style="color: white;">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif

   
    @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
        
<!--     <a class="btn btn-primary btn-sm add" href="{{route('email.create')}}" class="btn_add">Add </a><br><hr> -->
    <a  class="btn btn-primary btn-sm add" href="{{route('contactus.index')}}" class="btn_add">Contactus Management </a><br><br>
    
  

    <table class="table table-striped projects">
        <thead>
            <tr>
              <th>
                 Email templet name
              </th>         
              <th class="action">
              	 Action
              </th>
            </tr>
        </thead>
        <tbody>
        @foreach($email_templets as $email)
        <tr>
          <td>
           {{$email->email_name}}
          </td>  
          <td>
	          <a class="btn btn-info btn-sm" href="{{route('email.edit',$email->id)}}"> Edit</a>
          </td>
         
        </tr>
        @endforeach       
        </tbody>
    </table>
    </div>

</section>
@endsection