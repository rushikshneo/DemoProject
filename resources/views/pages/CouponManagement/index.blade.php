@extends('layouts.master')
@section('title', 'Coupon Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Coupon</b>Managment</h2>
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
        
    <a class="btn btn-primary btn-sm add" href="{{route('coupon.create')}}" class="btn_add">Add Coupon</a><br>
    <hr>
  

    <table class="table table-striped projects">
        <thead>
            <tr>
              <th>
                 Coupon Code
              </th>
              <th >
                Discount
              </th>
              <th>
                 No of Times 
              </th>         
              <th class="action">
              	 Action
              </th>
            </tr>
        </thead>
        <tbody>
        @foreach($coupon as $cop)
        <tr>
          <td>
            {{$cop->coupon_code}}
          </td>
          <td>
          {{$cop->percent_off}}%
          </td>
          <td>
           {{$cop->no_of_uses}}
          </td>   
          <td>
	          <a class="btn btn-info btn-sm" href="{{route('coupon.edit',$cop->id)}}"> Edit</a>
	          <div class="button">
	          <form action="" method="POST" >
	          @csrf
	           {{method_field('DELETE')}}
	          <input type="submit" class="btn btn-danger btn-sm del" value="Delete" onclick="return confirm('Are you sure?')"/>
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