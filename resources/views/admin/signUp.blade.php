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
       .btn-primary {
    background-color: #db2352;
    border-color: #db2352;
}
 .btn-primary:hover {
    background-color: #db2352d6;
    border-color: #db2352d6;
}
.login-page, .register-page {
    background: #ccd4f836;
}

.login-box-body, .register-box-body {
        border: 2px solid #223544;
               background: #223544;
}
.form-control:focus {
    border-color: #a9b1b6;
    box-shadow: none;
}
.login-box-body .form-control-feedback, .register-box-body .form-control-feedback {
    /*color: #223544;*/
    color:#db2352;
}
.form-control {
   
    border-color: #5b5d60;
}
.login-box, .register-box {
    width: 360px;
    margin: 0% auto;
}
.login-logo, .register-logo {
    margin-top: 10px;
}
</style>

<div class="login-box">
  <div class="login-logo">
    <b style="color:#db2352;">Claim </b> Process  
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg" style="color:#fff;">  Sign up to start your session {{Session::get('admin_id')}}</p>

    <form id="signFrm">

      <div class="form-group has-feedback">
        <input type="text" name="name" id="name" onKeyUp="Removef('name')" class="form-control" placeholder="Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <div class="error_cls" id="error_name"></div>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="email" id="email" onKeyUp="Removef('email')" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <div class="error_cls" id="error_email"></div>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="address" id="address" onKeyUp="Removef('address')" class="form-control" placeholder="Address">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
        <div class="error_cls" id="error_address"></div>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="contact" id="contact" onKeyUp="Removef('contact')" class="form-control" placeholder="Contact">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <div class="error_cls" id="error_contact"></div>
      </div>

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
          <button type="button" onclick="signup('signFrm','saveBtn','/sign-up')" id="saveBtn" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
        <!-- /.col -->
      </div>
    </form><br>
    @if($url == 'ip')
    <p style="color:#fff;">Have account ? <a href="{{url(admin().'/login')}}" class="text-center"> Login Here </a></p>
    @endif
    <div id="errorSignup"></div>
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
