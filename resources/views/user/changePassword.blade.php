@extends("user_layout/layout")
@section('user_content')

@php 
$authF = url('/').'/'.Config::get('site.userChangePassword');

@endphp

<main>
<div class="container-fluid" >
<ol class="breadcrumb mb-30 mt-2"><li class="breadcrumb-item active breadcrumb_heading" style="font-weight:bold;">Change Password {{Session::get('user_id')}}</li></ol>

<div class="container-fluid border border-dark p-4">

<form id="changePasswordForm1">
<div class="row">
<div class="col-md-8 col-sm-12 mx-auto">

<!-- <div class="form-group col-md-12 col-xs-12">
<label class="form-label">Enter name <span class="text-danger">*</span></label>
<input type="text" name="neme"   class="form-control" maxlength="35"  placeholder="Enter name" required>
</div> -->

<div class="form-group col-md-12 col-xs-12">
<label class="form-label">Password <span class="text-danger">*</span></label>
<input type="password" name="password" id="password" onKeyUp="Removefd('changePasswordForm1','password')" class="form-control" placeholder="New Password">
<div class="error_cls" id="error_password"></div>
</div>

<div class="form-group col-md-12 col-xs-12">
<label class="form-label"> Confirm Password <span class="text-danger">*</span></label>
<input type="password" name="confirm_password" id="confirm_password" onKeyUp="Removefd('changePasswordForm1','confirm_password')" class="form-control" placeholder="Confirm Password">
<div class="error_cls" id="error_confirm_password"></div>
</div>

<div class="form-group col-md-12 d-flex justify-content-center mb-3">
<button type='button' id="changePasswordBtn" onclick="changePassword('changePasswordForm1','changePasswordBtn','/user-change-password',userChangePassword)" class='btn w-25'style="background:#f55d2c; color:#fff;">Submit</button>

</div>
<div class="errMsg" id="errMessage_changePasswordForm1">
            
</div>
</div>
</div>

</form>



</div>
</div>
</main>

@section('userJS')
<x-js :file="$authF" />
<x-js :file="$jsl" />


@endsection

@endsection