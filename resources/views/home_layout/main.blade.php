<!DOCTYPE html>

<html lang="en">

<head>





<title>DEMO</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 -->
<link rel="stylesheet" href="{{asset('public/public/media/css/theme.css')}}">

<link rel="stylesheet" href="{{asset('public/public/media/css/vishal.css')}}">

<link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/latest/css/bootstrap.min.css">

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>  

<link rel="stylesheet" type="text/css" href="{{asset('public/public/media/login/login.css')}}">



<!--fonts-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
<!--end fonts-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="{{ asset('public/access/toast/notific.css') }}" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

 

<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" id="ftco-navbar">

<div class="container d-flex align-items-center">

<a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/access/media/logo.jpeg')}}" alt="logo" width="100"> </a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">

<span class="oi oi-menu"></span> Menu

</button>

<div class="collapse navbar-collapse" id="ftco-nav">

<ul class="navbar-nav ml-auto">

<li class="nav-item active"><a href="{{url('/')}}" style="color:#000;" class="nav-link pl-0">Home</a></li>

@if(Session::has('user_id'))
<li class="nav-item"><a href="{{url('/dashboard')}}" class="nav-link">Dashboard</a></li>

<a href="{{route('signOut')}}" class="nav-link">
<button type="button" class="btn btn-outline-dark">Sign Out</button>
</a>

@else
<!-- <li class="nav-item"><a href="javascript:void(0);" id="loginBtn" onclick="loginFmOn()" class="nav-link">Login</a></li> -->
@endif

</ul>

</div>

</div>

</nav>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.0/swiper-bundle.min.js" integrity="sha512-Z24NgOqNs3e9xPPWyVl6bGugynX7N5rIWTiwpvdu2UXIAs8hRXdA7Qdk5EwtxylY/kVL2ie40g4hkClbVTh0iA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



 @yield("content")



@include('home_layout.footer')

