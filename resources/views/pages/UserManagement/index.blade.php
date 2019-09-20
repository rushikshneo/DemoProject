@extends('layouts.master')
@section('title', 'User Managment')
@section('content') 
<style>
	th.action {
    text-align: center;
}

a.btn.btn-primary.btn-sm.add{
    margin-bottom: 7px;
    margin-top: -9px;
    margin-left: 81%;
}
</style>
<section class="content">
<div>
   	<h2><b>User</b>Managment</h2>
  <hr>
  @if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
   <a class="btn btn-primary btn-sm add" href="{{ route('users.create')}}" class="btn_add">Add User</a>

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
                      <th style="width: 8%" class="text-center">
                          Roles
                      </th>
                      <th class="action" style="width: 20%;">
                      	 Action
                      </th>
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
                      @if($user->role=="SuperAdmin"||$user->role=="Admin")
                      <td class="project-state">
                          <span class="badge badge-success">{{$user->role}}</span>
                      </td>
                      @endif
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                       <a class="btn btn-info btn-sm" href="{{route('users.edit',$user->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
</div>
</section>
@endsection