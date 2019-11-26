<!DOCTYPE html>
<html>
<head>
	<title>Shopping | Home</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 <!--    <title>Home | E-Shopper</title> -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/main.css')}}" rel="stylesheet">
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('images/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
  <body>

@include('pages.frontend.navbar')
		@yield('content')
@include('pages.frontend.footer')
</body>
    <script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('js/price-range.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
</html>