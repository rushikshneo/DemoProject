@extends('layouts.master')
@section('title', 'Banner Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Banner</b>Managment</h2>
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
    height: 46px;
    width: 50px;
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
        
    <a class="btn btn-primary btn-sm add" href="{{ route('banner.create')}}" class="btn_add">Add Banner</a>
  

    <table class="table table-striped projects">
        <thead>
            <tr>
              <th style="width: 1%">
                  #
              </th>
              <th style="width: 20%">
                Banner Name
              </th>
              <th style="width: 20%">
                Banner Image
              </th>         
              <th class="action" style="width: 20%;">
              	 Action
              </th>
            </tr>
        </thead>
        <tbody>
      @foreach($banners as $ban)
        <tr>
          <td>
           <!--  {{$ban->id}} -->
          </td>
          <td>
            {{$ban->banner_name}}
          </td>
          <td>
            <img class="banner" src="{{$ban->banner_url}}">
          </td>
         
          <td>
	          <a class="btn btn-info btn-sm" href="{{route('banner.edit',$ban->id)}}"> Edit</a>
	          <div class="button">
	          <form action="{{route('banner.destroy', $ban->id)}}" method="POST" >
	          @csrf
	           {{method_field('DELETE')}}
	          <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure?')"/>
	          </form>
	          </div>
          </td>
          
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>


</section>
@endsection