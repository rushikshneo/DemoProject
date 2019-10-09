@extends('layouts.master')
@section('title', 'User Managment')
@section('content') 
<section class="content">
    <style>
    p.status {
    margin-left: 6px;
    margin-right: 23px;
    }
    </style>

    <div>
    <h2><b>Create</b>User</h2><hr>
    </div>                                                                        

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <!-- First Name -->
        <div class="input-group mb-3">
          <input id="firstname" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter First name" autofocus>
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
          <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="lastname" placeholder="Enter Last name" value="{{ old('name') }}" required autocomplete="name" autofocus>       
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

        <!-- Email id -->
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email Address" value="{{ old('email') }}" required autocomplete="email">
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
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password" required autocomplete="new-password">
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

        <!-- c_password -->
        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Enter Confirm Password" autocomplete="new-password">
            <div class="input-group-append">
              <div class="input-group-text">
               <span class="fas fa-lock"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="role">
            <option>Select the role for User</option>
            @foreach($roles as $key=>$value)
               <option value="{{$key}}">{{$value}}</option>
            @endforeach
          </select>
        </div>
        @error('roles')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror

        <!-- Status -->
        <div class="input-group mb-3">
          <p class="status"><label >Status  :</label></p>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="0" name="status" >
            </div><br>
          <label>Active</label>
          <div class="form-check">
            <input class="form-check-input" type="radio"  value="1" name="status" >
          </div>
          <label >InActive</label>
        </div>


        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
            </button>
          </div>
        </div>
    </form>


</section>


@endsection