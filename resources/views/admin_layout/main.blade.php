
@if(session('admin_id'))
<?php 
$admn_id = Session('admin_id');

$chek_sts = DB::table('general_info_mdls')->where(['id'=>Session('admin_id')])->first();

$status = $chek_sts->status;
$usr_neme  = $chek_sts->first_name;
$user_type =$chek_sts->user_type; 
?>

@endif
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome | {{ucwords(userType()->first_name)}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('public/access/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/access/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/access/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
   <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/access/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- jvectormap -->
<!--   <link rel="stylesheet" href="{{asset('public/access/admin/bower_components/jvectormap/jquery-jvectormap.css')}}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/access/admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/access/admin/dist/css/skins/_all-skins.min.css')}}">
  <link href="{{ asset('public/access/toast/notific.css') }}" rel="stylesheet">
  <link href="{{ asset('public/access/NProgress/nprogress.css') }}" rel="stylesheet">
  <link href="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">


<style type="text/css">
   .error_cls{
      color: red;
      font-size:13px;
   }
   .required_cls{
     color:red;
   }
</style>

<?php if($status==2 and $user_type==2)
{
?>
<style>
    /* Styles for the overlay */
    #overldxvvxcvay {
      
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      
      z-index: 1000;
    }
  </style>
<div id="overldxvvxcvay" OnClick="consdifji()"></div>

<script>
//   document.addEventListener('click', function () {
//     // Show the modal
//     $('#exampleModal').modal('show');
//   });

function consdifji()
{
      $('#exampleModal').modal('show');
}
  // Close the modal when the "Close" button is clicked
 
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="font-weight:bold">Account Disabled</h4>
    
      </div>
      <div class="modal-body">
         <p style="font-size:18px; color:#d81b60;font-weight: 600;">Dear {{$usr_neme}},</p>
        <p>We want to inform you that your account is temporarily disabled for now. This could be due to your new Account.</p>
        <p>We appreciate your understanding and patience. If you have any questions or need further assistance, please contact our support team .</p>
        <p>Thank you for your cooperation.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


<?php 
}
?>
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <!--<a href="{{url(admin().'/')}}" class="logo">
     
      <span class="logo-mini"><b>A</b>LT</span>
     
   <div class="pull-left image">
          <img src="{{asset('public/public/user.jpg')}}" class="img-circle" alt="User Image" style="
    width: 35px;
">
        </div>   <span class="logo-lg"><b>{{ucwords(userType()->first_name)}}</b>
        
        
        </span>
    </a>-->
<style>
    
      .dropdown-toggle
      {
      background: #d81b60 !important;
    
}
.fa-envelope-o{
    color:white;
}

</style>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="MARGIN-LEFT:0PX;background: #d81b60;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="
    background: #d81b60;color:white
">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      
      
      
      
      
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu" id="totalNotificationMsg" style="
    background: #d81b60;
">
            
          </li>
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"style="
    background: #d81b60 !important;
">
              <img src="{{asset('public/public/user.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs" style="color:white">{{ucwords(userType()->first_name)}}</span>
            </a>
            <ul class="dropdown-menu">
             
              <li class="user-header">
                <img src="{{asset('public/public/user.jpg')}}" class="img-circle" alt="User Image">

         
              </li>
        
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('AchangePassword')}}" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="{{url(admin().'/sign-out')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>

    </nav>
  </header>
  @php $fd = Config::get('site.admin_type'); @endphp
  <!-- Left side column. contains the logo and sidebar -->
  
  <x-amenu :file="$fd" />  
  

  <!-- Content Wrapper. Contains page content -->
 @yield("container")
  <!-- /.content-wrapper -->

  <footer class="main-footer">
               <strong>Copyright &copy; {{now()->year}} <a target="_blank" href="{{url('/')}}">SABRE-EDGE</a>.</strong> All rights reserved.
            </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<script type="text/javascript">
    var admin_pth = "{{url(admin())}}";
    var base_path = "{{url('/')}}";
   var token = '{{ csrf_token() }}';
   var time_period = 2000;
   var position = 'right';
</script>
<!-- jQuery 3 -->
<script src="{{asset('public/access/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/access/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<!-- <script src="{{asset('public/access/admin/bower_components/fastclick/lib/fastclick.js')}}"></script> -->
<!-- AdminLTE App -->
<script src="{{asset('public/access/admin/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<!-- <script src="{{asset('public/access/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script> -->
<!-- jvectormap  -->
<!-- <script src="{{asset('public/access/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('public/access/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script> -->
<!-- SlimScroll -->
<!-- <script src="{{asset('public/access/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script> -->
<!-- ChartJS -->
<!-- <script src="{{asset('public/access/admin/bower_components/chart.js/Chart.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('public/access/admin/dist/js/demo.js')}}"></script> -->
<script src="{{ asset('public/access/sweetalert/sweetalert.min.js') }}"></script>

   <script src="{{asset('public/access/js/common.js')}}"></script> 
   <script src="{{asset('public/access/js/notification.js')}}"></script> 
   <script src="{{asset('public/access/NProgress/nprogress.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('public/access/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/access/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


    <script src="{{ asset('public/access/toast/notific.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>

 

  // window.addEventListener("online", function(){
  //   $("#connection_msg").removeClass('');
  //   $("#connection_msg").addClass('fa fa-circle text-success');

  //   document.getElementById('connection_status').innerHTML='';
  //   document.getElementById('connection_status').innerHTML="Online";
  //   $('#connection_status').val('Online');
  //   successMsg('you are online');
  //   console.log("online");
  // });
  // window.addEventListener("offline", function(){
  //   $("#connection_msg").removeClass('');
  //   $("#connection_msg").addClass('fa fa-circle text-warning');

  //   document.getElementById('connection_status').innerHTML='';
  //   document.getElementById('connection_status').innerHTML="Offline";
  //   //$('#connection_status').val('Offline');
  //   errorMsg("You are offline");
  //   console.log("offline");
  // });

  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    // $('#example3').DataTable({
    //   'paging'      : false,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : false,
    //   'autoWidth'   : true
    // })
  })


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

function timeOut()
{
  setTimeout(function() {
                location.reload(true);
             });
}

setTimeout(function() {

        $("#msg").fadeOut('fast');

    },3000);


</script>






@yield("script")


</body>
</html>
