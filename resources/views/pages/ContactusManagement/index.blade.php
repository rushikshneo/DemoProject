@extends('layouts.master')
@section('title', 'Contactus Managment')
@section('content')
<section class="content">
<div>
   	<h2><b>Contactus</b>Managment</h2>
  <br>
</div>
<style type="text/css">
  input.btn.btn-danger.btn-sm.del {
    margin-top: -60px;
   /* margin-right: 20px;*/
    margin-left:85px;
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
    <table class="table table-striped projects">
        <thead>
            <tr>
              <th>
                 Customer Name
              </th>
              <th >
                 Customer Email
              </th>
              <th>
                 Subject
              </th>    
              <th>
                 Status
              </th>         
              <th class="action">
              	 Action
              </th>
            </tr>
        </thead>
        <tbody>
         @foreach($contact as $cont)
         <tr>
          <td>
            {{$cont->name}}
          </td>
          <td>
            {{$cont->email}}
          </td>
          <td>
             {{$cont->subject}}
          </td>   
            @if(empty($cont->admin_note))
          <td>
              Not Replied
          </td>
          <td>
            <a class="btn btn-info btn-sm" href="{{route('contactus.edit',$cont->id)}}">Reply</a>
          </td>
            @else
            <td>
              Replied
            </td>
          <td>
	          <a class="btn btn-info btn-sm" href="{{route('contactus.edit',$cont->id)}}">Reply Back</a>
          </td>
            @endif
           </tr>
         @endforeach
        </tbody>
    </table>
    </div>

</section>
@endsection