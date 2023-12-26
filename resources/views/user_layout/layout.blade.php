@php
    $com = DB::table('general_info_mdls')->select('company_name')->where([['user_type', 1],['status',1]])->latest()->first();
    $user = DB::table(Config::get('site.userMdl'))->select('name', 'id')->where('id', Session::get('user_id'))->first();
@endphp    
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="Claim_process" content="">
<meta name="Claim_process" content="">

<title>{{ucwords($com->company_name)}} - {{ucwords($user->name)}}</title>
<link href="{{asset('public/access/user/css/styles.css')}}" rel="stylesheet">
<link href="{{asset('public/access/user/css/admin-style.css')}}" rel="stylesheet">
<link href="{{asset('public/access/user/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('public/access/user/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<link href="{{ asset('public/access/toast/notific.css') }}" rel="stylesheet">
<link href="{{ asset('public/access/NProgress/nprogress.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

<Style>
    .error_cls{

      color: red;

      font-size:13px;

   }
.form-control{
	background-color: #ececec;
}
.sb-sidenav-dark .sb-sidenav-menu .nav-link:hover {
    color: #fff;
    background: #e755266e;
}
.table {
    color: #00478f;
}
.form-label {
    color: #00478f;
}
</style>

</head>
<!-- header menu -->
<script>
function myFunction() {
var body = document.getElementById("body");
if (body.className == "sb-nav-fixed") {
body.classList.add("sb-nav-fixed");
body.classList.add("sb-sidenav-toggled");
} else {
body.classList.remove("sb-nav-fixed");
body.classList.remove("sb-sidenav-toggled");
body.classList.add("sb-nav-fixed");
}
}
</script>
<!-- header menu -->

<body id="body" class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-light bg-clr">
<a class="navbar-brand logo-brand" href="{{route('home')}}"><span style="color:#293042;">Welcome {{ucwords($user->name)}}</span></a>
<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i onclick="myFunction()" class="fas fa-bars"></i></button>
<a href="{{url('/')}}" target="_blank" class="frnt-link"><i class="fas fa-external-link-alt"></i>Home</a>
<ul class="navbar-nav ml-auto mr-md-0">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw" style="color:rgb(41 48 66);"></i></a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
<!-- <a class="dropdown-item sub_admin-dropdown-item" href="edit_profile.php">Edit Profile</a> -->
  
  <a class="dropdown-item admin-dropdown-item" href="{{url('/sign-out')}}">Logout</a>
</div>
</li>
</ul>
</nav>



<div id="layoutSidenav">
<div id="layoutSidenav_nav">


<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
<div class="sb-sidenav-menu">
<div class="nav">
<a class="nav-link active" href="{{route('userDashboard')}}" style="background: #f55d2c;">
<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
Dashboard
</a>




<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsdfs" aria-expanded="false" aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-user"></i> </div>
 Users
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseLayoutsdfs" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<!-- <a class="nav-link sub_nav_link" href="{{url('/add_users')}}">Add Users</a> -->
<a class="nav-link sub_nav_link" href="{{url('/view-profile')}}">View Users</a>
<a class="nav-link sub_nav_link" href="{{url('/user-change-password')}}">Change User Password</a>
</nav>
</div>







<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouddddtsdfs" aria-expanded="false" aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
Form List
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseLayouddddtsdfs" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">

<a class="nav-link sub_nav_link" href="{{url('/form-b')}}">Form B</a> 
<a class="nav-link sub_nav_link" href="{{url('/form-c')}}">Form C</a>
<a class="nav-link sub_nav_link" href="{{url('/form-d')}}">Form D</a>
<a class="nav-link sub_nav_link" href="{{url('/form-e')}}">Form E</a>
<a class="nav-link sub_nav_link" href="{{url('/form-f')}}">Form F</a>
<a class="nav-link sub_nav_link" href="{{url('/form-ca')}}">Form CA</a>

</nav>
</div>

<a class="nav-link collapsed" href="{{route('signOut')}}">
<div class="sb-nav-link-icon"> <i class="fa fa-user-times" aria-hidden="true"></i></div>
Logout
</a>

</div>
</div>
</nav>


</div>


<!-- container -->

<Style>
.text-warning {
    color: #078ddf!important;
}
</style>
<div id="layoutSidenav_content">

 @yield("user_content")






<!-- 
<footer class="py-3 bg-footer mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer> -->
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{asset('public/access/user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('public/access/toast/notific.js') }}"></script>
<script src="{{asset('public/access/NProgress/nprogress.js')}}"></script>
<script src="{{asset('public/access/js/common.js')}}"></script>

<script type="text/javascript">


$(".errMsg").hide();

     var b_pth = "{{url('/')}}";
   var token = '{{ csrf_token() }}';
   var time_period = 2000;
   var home_url = "{{route('home')}}";
   var position = 'right';

function errorMsg(msg)
{
  Message.add(msg,{skin:'ico-medium',type:'warning',vertical:'top',horizontal:position,icon:true,close:false,life:time_period});
}

function successMsg(msg)
{
  Message.add(msg,{skin:'ico-medium',type:'success',vertical:'top',horizontal:position,icon:true,close:false,life:time_period});
}

function serverError()
{
  Message.add('Server Error. Try Again Later.',{skin:'ico-medium',type:'warning',vertical:'top',horizontal:position,icon:true,close:false,life:time_period});
}

</script>

@yield("userJS")

</body>

</html>



