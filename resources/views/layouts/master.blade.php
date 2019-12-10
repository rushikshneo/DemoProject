<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../theme/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
<link rel="stylesheet" href="../../theme/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<style>
 ul.breadcrumb {
    width: 96%;
    height: -3px;
    font-style: oblique;
} 
</style>

   
  </head>
  <body class="hold-transition sidebar-mini sidebar-collapse fixed">
 
    <div id="wrapper">
            @include('layouts.navbar')
            @include('layouts.sidebar')

       <div class="content-wrapper">
           <div class="strip">
         <ul class="breadcrumb">
            <li> <a class="title" href="{{url('/')}}">DashBoard</a> / <span class="breadcrumb-item active">@yield('title')
            </span></li>
          </ul>
           </div>
           <hr>
            @yield('content')
        </div>
         @include('layouts.footer')
    </div>

    <!-- /#wrapper -->
  <!-- jQuery -->
  <script src="../../theme/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../theme/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../theme/dist/js/demo.js"></script>

  </body>
</html>
