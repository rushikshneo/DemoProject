@extends('layouts.master')
@section('title', 'Role Managment')
@section('content') 
<section class="content">
  <style>
    input.btn.btn-danger {
      margin-top: -61px;
      margin-left: 121px;
    }
  </style>

  <div>
    <h2>
      <b>Role</b>Managment
    </h2><hr>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" style="color: white;">×</button> 
      <strong>{{ $message }}</strong>
    </div>
    @endif
  </div>

  <div>
    <a class="btn btn-primary" href="{{ route('roles.create') }}">Add New Roles</a><hr>
  </div>

  <table class="table table-striped projects" >
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Permissions</th>
      <th width="280px">Action</th>
    </tr>
    @foreach ($roles as $key => $role)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $role->name }}</td>
      <td>  
        @foreach($rolePermissions as $key=>$permissions)
        @if($role->id==$permissions->role_id)
        {{ $permissions->name}} -
        @endif
        @endforeach
      </td>
      <td>
        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show </a>
        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
        <form action="{{url('roles', [$role->id])}}" method="POST">
          {{method_field('DELETE')}}
          @csrf
          <input type="submit"class="btn btn-danger" value="Delete"
                 onclick="return confirm('Are you sure?')"/>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</section>
@endsection
