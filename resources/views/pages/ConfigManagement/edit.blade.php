@extends('layouts.master')
@section('title', 'Configuration Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Configuration</b>Managment</h2>
  <hr>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" style="color: white;">×</button> 
      <strong>{{ $message }}</strong>
    </div>
@endif



      <form method="POST" action="{{ route('config.update', $keys->id)}}">  
      @csrf      
      <input type="hidden" name="_method" value="PATCH">
        <div class="input-group mb-3">
          <input id="define_key" type="text" class="form-control @error('define_key') is-invalid @enderror" name="define_key"  value="{{$keys->define_key }}" placeholder="Enter key" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
        </div>
        
        @error('define_key')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="input-group mb-3">
          <input id="define_values" type="text" class="form-control @error('define_values') is-invalid @enderror" name="define_values" value="{{$keys->define_values}}" placeholder="Enter value" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
        </div>

        @error('define_values')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror

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