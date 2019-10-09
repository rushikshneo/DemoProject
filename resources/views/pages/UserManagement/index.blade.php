@extends('layouts.master')
@section('title', 'User Managment')
@section('content') 
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
</style>
<section class="content">
    <div>
    <h2><b>User</b>Managment</h2><hr>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" style="color: white;">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif

    @if(Auth::user()->role =="SuperAdmin")
    <a class="btn btn-primary btn-sm role" href="{{ route('roles.index')}}" >Role Management</a>
    @endif 

    @if( Auth::user()->role =="Admin" || Auth::user()->role =="SuperAdmin")
    <a class="btn btn-primary btn-sm add" href="{{ route('users.create')}}" class="btn_add">Add User</a>
    @endif  

    <table class="table table-striped projects">
        <thead>
            <tr>
              <th style="width: 1%">
                  #
              </th>
              <th style="width: 20%">
                  Name
              </th>
              <th style="width: 20%">
                  E-mail
              </th>
              <th style="width: 20%">
                 Status
              </th>

              @if(Auth::user()->role =="SuperAdmin")
              <th style="width: 8%" class="text-center">
                  Role
              </th>
              @endif 


              @if( Auth::user()->role =="Admin" || Auth::user()->role =="SuperAdmin")
              <th class="action" style="width: 20%;">
              	 Action
              </th>
              @endif  

            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
          <td>
             {{$user->id}}
          </td>
          <td>
            <a>
              {{$user->firstname}} {{$user->lastname}}
            </a>
           </td>
           <td>
             {{$user->email}}
          </td>
          <td>
            @if($user->status==1)
            <span class="badge badge-success">Active</span>
              @else
             <span class="badge badge-danger">InActive</span>
            @endif
          </td>

          @if(Auth::user()->role =="SuperAdmin")
          <td class="project-state">
            <span class="badge badge-success">{{$user->role}}</span>
          </td>
          @endif 

          <td class="project-actions text-right">

           @if( Auth::user()->role =="Admin" || Auth::user()->role =="SuperAdmin")
           <a class="btn btn-info btn-sm" href="{{route('users.edit',$user->id)}}">
                  Edit
              </a>
           @endif  
           
          <div>
          @if( Auth::user()->role =="SuperAdmin")
          <form action="{{url('users', [$user->id])}}" method="POST">
          {{method_field('DELETE')}}
          @csrf
          <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure?')"/>

          </form>
          @endif  
          </div>
          </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection