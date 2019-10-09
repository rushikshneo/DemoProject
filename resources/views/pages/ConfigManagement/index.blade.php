@extends('layouts.master')
@section('title', 'Configuration Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Configuration</b>Managment</h2>
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
</style>

    <div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" style="color: white;">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif

   
    <a class="btn btn-primary btn-sm add" href="{{ route('config.create')}}" class="btn_add">Add key and value</a>
  

    <table class="table table-striped projects">
        <thead>
            <tr>
              <th style="width: 1%">
                  #
              </th>
              <th style="width: 20%">
                Key
              </th>
              <th style="width: 20%">
                values
              </th>         
              <th class="action" style="width: 20%;">
              	 Action
              </th>
           

            </tr>
        </thead>
        <tbody>
        @foreach($keys as $key)
        <tr>
          <td>
            {{$key->id}}
          </td>
          <td>
          	{{$key->define_key}}
          </td>
          <td>
          	{{$key->define_values}} 
          </td>
         
          <td>
	           <a class="btn btn-info btn-sm" href="{{route('config.edit',$key->id)}}"> Edit</a>
	          <div class="button">
	          <form action="{{url('config', [$key->id])}}" method="POST" >
	          @csrf
            {{method_field('DELETE')}}
	          <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure?')"/>
	          </form>
	          </div>
          </td>
           @endforeach
        </tr>
        
        </tbody>
    </table>
    </div>

</section>
@endsection