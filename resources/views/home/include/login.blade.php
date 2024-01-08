<!-- Modal -->
<style>
    button#signInBtn {
    background: #223544;
    border-color:#223544;
}
button#signInBtn:hover{
	color: #fff;
	background-color: #304352;
	border-color: #304352;
}
.form-control:focus {
    color: #212529;
    background-color: #fff;
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
}
.form-control:focus {
    color: #212529;
    background-color: #fff;
    border-color: #223645;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(243 250 255 / 65%);
}
</style>

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-md">

      <div class="modal-content">

          <div class="modal-body p-10">

              <div class="container-fluid">

                

        <div class="loginmodal-container" style="border-radius: 20px 20px; margin-top: 10px;" >

          <!-- login page -->

                  <div id="login" >

                      <form id="loginForm">

                           <h4 class="logo-text mb-15 text-center" >Log-In Your Account </h4><br>



                     <div class="form-group">

                     <!--  <i class="fa fa-user"></i> -->

                      <input type="text" class="form-control mb-2" id="email" name="email" onKeyUp="Removefd('loginForm','email')" autocomplete="off" placeholder="Username" style="border-radius: 20px 20px">
                      <div class="error_cls" id="error_email"></div>
                     </div>





                     <div class="form-group">

                      <!-- <i class="fa fa-lock"></i> -->

                      <input type="password" class="form-control mb-2" name="password" onKeyUp="Removefd('loginForm','password')" autocomplete="off" placeholder="Password" id="password" style="border-radius: 20px 20px" >
                      <div class="error_cls" id="error_password"></div>
                     

                     </div>


                     <button type="button" id="signInBtn" onclick="signIn('loginForm','signInBtn','/sign-in',userSignIn)" class="btn btn-sm btn-primary text-center btn-flat m-b-30 m-t-30 mb-2">Sign In</button>

                <div class="col-md-12" id="errMessage_loginForm"></div>


          <!-- <div class="login-help">

          <a href="#">Register</a> - <a href="#">Forgot Password</a>

          </div> -->

                  <div class="d-flex align-items-center justify-content-center pb-4">

                    <p class="mb-0 me-2">Don't have an account?</p>

                    <a href="#" id='createnew' class="" style="color:#012270;,font-weight:bold">Create new</a>

                  </div>



                       <div class="modal-footer p-0">

                          <a href="#" id='forgotpassword' style="color:#1487c2" >Forgot Password?</a>

                       </div>

                      </form>

                    </div>

                    <!-- end login page -->





              <!-- sign up page -->

                  <div id="signup" style=  "display:none" >

                      <form id="signUpForm">

                           <h4 class="logo-text mb-15 text-center">SIGN UP </h4><br>



                     <div class="form-group">

                      <!-- <i class="fa fa-user"></i> -->

                      <input type="text" class="form-control mb-2" name="name" id="name" onKeyUp="Removefd('signUpForm','name')" placeholder="Name" style="border-radius: 20px 20px">
                      <div class="error_cls" id="error_name"></div>
                     </div>





                     <div class="form-group">

                      <!-- <i class="fa fa-envelope"></i> -->

                      <input type="text" class="form-control mb-2" name="email" id="email" onKeyUp="Removefd('signUpForm','email')" placeholder="Email" style="border-radius: 20px 20px">
                      <div class="error_cls" id="error_email"></div>
                     </div>

                     <div class="form-group">

                      <!-- <i class="fa fa-envelope"></i> -->

                      <input type="text" class="form-control mb-2" name="mobile" id="mobile" onKeyUp="Removefd('signUpForm','mobile')" placeholder="Mobile" style="border-radius: 20px 20px">
                      <div class="error_cls" id="error_mobile"></div>
                     </div>

                     <div class="form-group">

                      <!-- <i class="fa fa-envelope"></i> -->

                      <input type="text" class="form-control mb-2" name="unique_id" id="unique_id" onKeyUp="Removefd('signUpForm','unique_id')" placeholder="Username" style="border-radius: 20px 20px">
                      <div class="error_cls" id="error_unique_id"></div>
                     </div>


                     <div class="form-group">

                      <!-- <i class="fa fa-lock"></i> -->

                      <input type="password" class="form-control mb-2" name="password" id="password" onKeyUp="Removefd('signUpForm','password')" placeholder="Password" style="border-radius: 20px 20px">
                      <div class="error_cls" id="error_password"></div>
                     </div>

                     <button type="button" id="signUpBtn" onclick="signUp('signUpForm','signUpBtn','/sign-up',userSignUp)" class="btn btn btn-primary btn-flat m-b-30 m-t-30 mb-2" style="background:#223544;border-color:#223544">Submit</button>

                     <div class="col-md-12" id="errMessage_signUpForm">
                       
                      <!-- <div class='col-md-12 alert alert-dismissible alert-danger text-center text-capitalize'>its ok</div> -->

                     </div>
                    

                        <div class="d-flex align-items-center justify-content-center pb-4">

                          <p class="mb-0 me-2">Already a user?</p>

                          <a href="#" id='loginpage' class="" style="color:red">LOGIN</a>

                        </div>



                         <div class="modal-footer">

                            <a href="#" id='forgotepassword' >Forgot Password?</a>

                         </div>

                      </form>

                    </div>

          
                     <!-- end sign up page -->












              <!-- forgot password -->

                  <div id="fpass" style="display:none">

                      <form id="forgotPasswordForm">

                           <h4 class="logo-text mb-15 text-center">Enter Your Username </h4><br>

                     <div class="form-group">

                      <!-- <i class="fa fa-envelope"></i> -->

                      <input type="text" class="form-control mb-2" id="unique_id" name="unique_id" placeholder="Username" onKeyUp="Removefd('forgotPasswordForm','unique_id')" style="border-radius: 20px 20px">
                      
                      <div class="error_cls" id="error_unique_id"></div>
                     </div>

                     <button type="button" id="forgotPasswordBtn" onclick="forgotPassword('forgotPasswordForm','forgotPasswordBtn','/forgot-password',forgotPasswordCheck)" class="btn btn btn-primary btn-flat m-b-30 m-t-30 mb-2" style="background:#223544;border-color:#223544">Send</button>
                      


                        <div class="d-flex align-items-center justify-content-center pb-4">

                          <p class="mb-0 me-2">Already a user?</p>

                          <a href="#" id='ssd' class="" style="color:red">LOGIN</a>

                        </div>                         

                        <div class="col-md-12" id="errMessage_forgotPasswordForm"></div>

                      </form>

                    </div>

 <!-- user sign up otp -->

       <div id="signOtp" style="display: none;">

                      <form id="signOtpCheckForm">

                           <h4 class="logo-text mb-15 text-center">Please Enter OTP Sign Up</h4><br>

                     <div class="form-group">

                      <!-- <i class="fa fa-envelope"></i> -->

                      <input type="text" onKeyUp="Removefd('signOtpCheckForm','otp')" id="otp" class="form-control mb-2" autocomplete="off" name="otp" style="border-radius: 20px 20px">
                      <p class="text-muted" style="font-size: 12px;float: right;">OTP valid till 10 minutes.</p>
                      <div class="error_cls" id="error_otp"></div>
                      <a href="javascript:void(0);" style="text-decoration: none;" id="resendSignUpBtn" onclick="signUpResendOtp('signOtpCheckForm','/resend-sign-up','resendSignUpBtn')">Resend Otp</a>
                     </div>

                     <button type="button" id="signUpOtpBtn" style="margin-top: 15px;" onclick="signUpOtp('signOtpCheckForm','signUpOtpBtn','/sign-up-otp',userSignUpOtpCheck)" class="btn btn btn-primary btn-flat m-b-30 m-t-30 mb-2">Submit</button>

                      <div class="col-md-12" id="errMessage_signOtpCheckForm"></div>

                      </form>

                    </div>



<!-- end user sign up otp -->



 <!-- user sign in otp -->

       <div id="signInOtp" style="display: none;">

                      <form id="signInOtpCheckForm">

                           <h4 class="logo-text mb-15 text-center">Please Enter OTP Sign In</h4><br>

                     <div class="form-group">

                      <!-- <i class="fa fa-envelope"></i> -->

                      <input type="text" onKeyUp="Removefd('signInOtpCheckForm','otp')" id="otp" class="form-control mb-2" autocomplete="off" name="otp" style="border-radius: 20px 20px">
                      <p class="text-muted" style="font-size: 12px;float: right;">OTP valid till 10 minutes.</p>
                      <div class="error_cls" id="error_otp"></div>
                      <a href="javascript:void(0);" style="text-decoration: none;" id="resendSignInBtn" onclick="signUpResendOtp('signInOtpCheckForm','/resend-sign-in','resendSignInBtn')">Resend Otp</a>
                     </div>

                     <button type="button" id="signInOtpBtn" style="margin-top: 15px;" onclick="signUpOtp('signInOtpCheckForm','signInOtpBtn','/sign-up-otp',userSignInOtpCheck)" class="btn btn btn-primary btn-flat m-b-30 m-t-30 mb-2">Submit</button>

                      <div class="col-md-12" id="errMessage_signInOtpCheckForm"></div>

                      </form>

                    </div>



<!-- end user sign in otp -->







        </div>











  

              </div>

          </div>



      </div>

  </div>

</div>


<!-- Modal -->


<script>

  

  $(document).ready(function(){



 $("#createnew").click(function(){



  $('#login').hide();

  $('#signup').show();

  $('#fpass').hide();

  





});



});





















  $(document).ready(function(){



 $("#loginpage").click(function(){



  $('#login').show();

  $('#signup').hide();

  $('#fpass').hide();

  









});



$("#ssd").click(function(){



  $('#login').show();

  $('#signup').hide();

  $('#fpass').hide();

 





});



});















  $(document).ready(function(){



 $("#forgotpassword").click(function(){



  $('#fpass').show();

  $('#signup').hide();

  $('#login').hide(); 





});



});











  $(document).ready(function(){



 $("#forgotepassword").click(function(){



  $('#fpass').show();

  $('#signup').hide();

  $('#login').hide(); 





});



});

</script>





<!-- <script>

function myFunction() {

  var x = document.getElementById("myInput");

  if (x.type === "password") {

    x.type = "text";

  } else {

    x.type = "password";

  }

}

</script> -->

<script type="text/javascript">
 function loginFmOn()
{
  console.log("clicked");
  $("#exampleModal").modal('show');
  
}

</script>



<script type="text/javascript">

//    $(window).on('load', function() {

  //      $('#exampleModal').modal('show');

  //  });

</script>