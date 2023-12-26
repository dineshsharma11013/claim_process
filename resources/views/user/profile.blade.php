@extends("user_layout/layout")
@section('user_content')

@php 
$authF = url('/').'/'.Config::get('site.userChangeProfile');

@endphp

<main>
<div class="container-fluid" >
<ol class="breadcrumb mb-30 mt-2"><li class="breadcrumb-item active breadcrumb_heading" style="font-weight:bold;">Update Profile</li></ol>

<div class="container-fluid border border-dark p-4">

<form id="changeProfileForm">
<div class="row">

<div class="form-group col-md-6 col-xs-6">
<label class="form-label">Name <span class="text-danger">*</span></label>
<input type="text" name="neme" id="neme" value="{{$user->name}}" onKeyUp="Removefd('changeProfileForm','name')" class="form-control" placeholder="Enter name" >
<div class="error_cls" id="error_name"></div>
</div>


<div class="form-group col-md-6 col-xs-6">
<label class="form-label">Email <span class="text-danger">*</span> </label>
<input type="email" name="email" id="email" value="{{$user->email}}"  class="form-control"  placeholder="Enter  email" readonly >
<div class="error_cls" id="error_email"></div>
</div>


<div class="form-group col-md-6 col-xs-6">
<label class="form-label">Mobile <span class="text-danger">*</span> </label>
<input type="text" name="mobile" id="mobile" value="{{$user->mobile}}"  class="form-control" autocomplete="off" placeholder="Enter Mobile" >
<div class="error_cls" id="error_mobile"></div>
</div>

<div class="form-group col-md-6 col-xs-6">
<label class="form-label">Alternate Mobile  </label>
<input type="text" name="alt_mobile" id="alt_mobile" value="{{$user->alt_mobile}}"  class="form-control"  autocomplete="off"  placeholder="Enter Alternate Mobile" >
<div class="error_cls" id="error_alt_mobile"></div>
</div>


<!-- <div class="form-group col-md-6 col-xs-6">
<label class="form-label">Gender <span class="text-danger">*</span></label>
<select name="gndr"  class="form-control"  >
<option value="">Choose gender</option>
<option value="male">male</option>
<option value="female">female</option>
</select>
</div>
 -->

<div class="form-group col-md-6 col-xs-6">
<label class="form-label">Permanent  Address</label>
<input type="text" name="address" id="address" value="{{$user->address}}"  class="form-control"  placeholder="Enter Address"  >
</div>

<div class="form-group col-md-6 col-xs-6">
<label class="form-label">Correspondence Address </label>
<input type="text" name="correspondance_address" id="correspondance_address" value="{{$user->correspondance_address}}"  class="form-control"  placeholder="Enter Address" >
</div>

<div class="form-group col-md-6 col-xs-6">
<label class="form-label">City </label>
<input type="text" name="city" id="city" value="{{$user->city}}"  class="form-control"  placeholder="Enter Address" >
</div>

<div class="form-group col-md-6 col-xs-6">
<label class="form-label">State </label>
<input type="text" name="state" id="state" value="{{$user->state}}"  class="form-control"  placeholder="Enter Address" >
</div>

<div class="form-group col-md-6 col-xs-6">
<label class="form-label">Pincode </label>
<input type="text" name="pincode" value="{{$user->pincode}}" class="form-control"  placeholder="Pincode"  >
</div>

<div class="col-md-6 col-xs-6">
<label class="form-label">Profile Upload </label>
<div class="input-group ">

  <div class="input-group-prepend d-block">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="file" id="file"
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
</div>


<div class="form-group col-md-12 d-flex justify-content-center mb-3">

<button type='button' id="userProfileBtn" onclick="changeProfile('changeProfileForm','userProfileBtn','/user-profile',userChangeProfile)" class='btn w-25'style="background:#f55d2c; color:#fff;">Submit</button>
</div>
<div class="errMsg col-md-12 offset-4" id="errMessage_changeProfileForm">
            <div class='col-md-4 alert alert-dismissible alert-danger text-center'>Technical Error. Try Again Later...</div>
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