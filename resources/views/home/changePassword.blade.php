@extends("home_layout/main")
@section('content')



<style>


#changePasswordForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}




button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}


/* Make circles that indicate the steps of the form: */

</style>


@php 
$authF = url('/').'/'.Config::get('site.authF');
@endphp


  <div class="m-4">
    <form id="changePasswordForm">
        <div class="row mb-3">
           
           <input type="hidden" name="unique_id" value="{{$val}}">
            <div class="col-sm-6 offset-sm-3">
                <input type="password" class="form-control" id="password" name="password" onKeyUp="Removefd('changePasswordForm','password')" autocomplete="off" placeholder="New Password">
                <div class="error_cls" id="error_password"></div>
            </div>
        </div>
        <div class="row mb-3">
            
            <div class="col-sm-6 offset-sm-3">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" onKeyUp="Removefd('changePasswordForm','confirm_password')" autocomplete="off" placeholder="Confirm Password">
                <div class="error_cls" id="error_confirm_password"></div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-9 offset-sm-3">
                <button type="button" id="changePasswordBtn" onclick="changePassword('changePasswordForm','changePasswordBtn','/change-password',userChangePassword)" class="btn btn-primary">Save</button>
            </div>
            <div class="col-md-12" id="errMessage_changePasswordForm">
            
                </div>
        </div>
    </form>
</div>
  
                       

{!! Form::close() !!}




@section('nwJS')
<x-js :file="$authF" />
<x-js :file="$jsl" />
@endsection
@endsection