<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Claim Process</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('public/access/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/access/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/access/admin/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <style type="text/css">
   .error_cls{
      color: red;
      font-size:13px;
   }
   .required_cls{
     color:red;
   }
</style>

<div class="login-box">
  <div class="login-logo">
    <b>Claim</b>Process
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session {{Session::get('admin_id')}}</p>

    <form id="loginFrm">
      <div class="form-group has-feedback">
        <input type="text" name="username" id="username" onKeyUp="Removef('username')" class="form-control" placeholder="User Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <div class="error_cls" id="error_username"></div>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" onKeyUp="Removef('password')" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <div class="error_cls" id="error_password"></div>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" onclick="login('loginFrm','saveBtn','/login')" id="saveBtn" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form><br>
    @if($url == 'ip')
    <p>Don't have account ? <a href="{{url(admin().'/sign-up')}}" class="text-center">Sign Up Here</a></p>
    @endif
    <div id="errorLogin"></div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('public/access/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/access/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<!-- <script src="{{asset('public/access/admin/plugins/iCheck/icheck.min.js')}}"></script> -->
<script src="{{asset('public/access/js/common.js')}}"></script>
<x-js :file="$jsl" />
<script type="text/javascript">var admin_pth = "{{url(admin())}}";</script>
</body>
</html>
