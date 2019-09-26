@extends('layouts.master')
@section('title', 'User Managment')
@section('content') 
<section class="content">
    <div>
    <h2><b>Edit</b>User</h2>
    <hr>
    <form method="POST" action="{{ route('users.update', $user->id)}}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">

        <!-- first Name -->
        <div class="input-group mb-3">
          <input id="firstname" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{$user->firstname}}" required autocomplete="name" placeholder="Enter First name" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('firstname')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Last Name -->
        <div class="input-group mb-3">
          <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="lastname" placeholder="Enter Last name" value="{{$user->lastname }}" required autocomplete="name" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
        </div>
        @error('lastname')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Email -->
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email Address" value="{{ $user->email }}" required autocomplete="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Password -->
        <div class="input-group mb-3">
        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" value="{{$user->password_confirmation}}" name="password" placeholder="Enter Your Password" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror


        <div class="input-group mb-3">
          <input id="password-confirm" type="text" class="form-control" name="password_confirmation" value="{{$user->password_confirmation}}" required placeholder="Enter Confirm Password" autocomplete="new-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
        </div>

        <div class="input-group mb-3">	
          <select class="form-control" name="role">
            <option>Select the role for User</option>
            @foreach($roles as $key => $value)
            @if ($key == old('role', $user->role))
            selected="selected"
            @endif
            <option value="{{$key}}" {{( $key == $user->role) ? 'selected' : '' }} >{{$value}} 
            </option>
          @endforeach
          </select>
        </div>
        @error('roles')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="input-group mb-3">
          <p class="status"><label >Status  :</label></p>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="1" {{($user->status ==  1 ) ? 'checked' : '' }}>
          </div><br>
          <label>Active  </label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="0" {{( $user->status == 0 ) ? 'checked' : ''}}>
          </div>
          <label>InActive </label>
        </div>

        <div class="row">
        <!-- /.col -->
        <div class="col-4">
        <button type="submit" class="btn btn-primary">
        {{ __('Submit') }}
        </button>
        </div>
        <!-- /.col -->
        </div>
    </form>


    </div>
</section>
@endsection