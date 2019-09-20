@extends('layouts.master')

@section('content')  
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="content">
        <h1><b>Dash</b>Board</h1>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-3 col-6">
          <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$users_count}}</h3>
             <a class="title1" href="{{ url('users') }}"> <p>User<br>Management</p></a>
           </div>
          <div class="icon">
           <i class="ion ion-person-add"></i>
          </div>
            <a href="{{ url('users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>
          <a class="title1" href="{{ url('/config') }}"><p>Configuration<br>Management</p></a>
              </div>
              <div class="icon">
                <i class="fa fa-cogs" aria-hidden="true"></i>
              </div>
              <a href="{{url('/config')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>
              <a class="title1" href="{{ url('/banner') }}"> <p> Banner<br>Management</p></a>
              </div>
              <div class="icon">
                 <i class="fas fa-image"></i>
              </div>
              <a href="{{ url('/banner') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>
            <a class="title1" href="{{ url('/category') }}"><p>Category<br> Management</p></a>
              </div>
              <div class="icon">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
              </div>
              <a href="{{ url('/category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>
             <a class="title1" href="{{ url('/product') }}"><p>Product<br>Management</p></a>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </div>
              <a href="{{ url('/product') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

             <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>
             <a class="title1" href="{{ url('/coupon') }}"><p>Coupon<br> Management</p></a>
              </div>
              <div class="icon">
               <i class="fas fa-tags"></i>
              </div>
              <a href="{{ url('/coupon') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
    </section>

        <!-- Main row -->
        
@endsection
