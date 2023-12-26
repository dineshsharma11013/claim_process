<!DOCTYPE html>
<html lang="en">
<head>
<title>DEMO</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('public/public/media/css/theme.css')}}">
<link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/latest/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>  
<link rel="stylesheet" type="text/css" href="{{asset('public/public/media/login/login.css')}}">
<link href="{{ asset('public/access/toast/notific.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
 
<body>
	<style type="text/css">
   .error_cls{
      color: red;
      font-size:13px;
   }
   .required_cls{
     color:red;
   }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light ftco_navbar ftco-navbar-light" id="ftco-navbar">
<div class="container d-flex align-items-center">
<a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/access/media/general/logo.jpg')}}" alt="logo" width="100"> </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
<span class="oi oi-menu"></span> Menu
</button>
<div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav ml-auto">
<li class="nav-item active"><a href="{{url('/')}}" style="color:#000;" class="nav-link pl-0">Home</a></li>
<!-- <li class="nav-item" style="margin-top:30px;"><button type="button" class="btn btn-default btn-lg" id="myBtn">Claim Login</button> </li> -->
<!--<li class="nav-item" style="margin-top:25px;"><a  href="ClaimLogin.php" style="margin-top:30px;background:#00FFFF;border-color:#fff;border:none!important;padding:20px;color:red;" class=""><i class="fa fa-sign-in">Claim Process<br><span style="color:#000;padding-left:20px;font-weight:bold;">Login/Registration</span></i></a></li>-->
<li class="nav-item"><a href="javascript:void(0);" class="nav-link">About</a></li>

<li class="nav-item"><a href="javascript:void(0);" class="nav-link">Contact</a></li>
<li class="nav-item"><a href="javascript:void(0);" class="nav-link">FAQ</a></li>
<li class="nav-item"><a href="javascript:void(0);}" class="nav-link">Query</a></li>

</ul>
</div>
</div>
</nav>

 

  <!-- Modal -->
  

 @yield("content")

@include('home_layout.footer')
