
@extends("admin_layout.main")

@section("container")


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


@include('admin.includes.'.$fd[userType()->user_type].'.case_dashboard')


</div>





@endsection  