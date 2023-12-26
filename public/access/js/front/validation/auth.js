
function userSignUp()
{
  var name = $('#signUpForm [name="name"]').val();
  var email = $('#signUpForm [name="email"]').val();
  var mobile = $('#signUpForm [name="mobile"]').val();
  var unique_id = $('#signUpForm [name="unique_id"]').val();
  var password = $('#signUpForm [name="password"]').val();
 

  if (name=="") 
    {
      $('#signUpForm [id="error_name"]').html("Please enter name.");
      $('#signUpForm [name="name"]').css('border',brdr);
      $('#signUpForm [name="name"]').focus();
      return false;
    }

    if (name.length > 50) 
    {
      $('#signUpForm [id="error_name"]').html("Maximum 50 characters allowed.");
      $('#signUpForm [name="name"]').css('border',brdr);
      $('#signUpForm [name="name"]').focus();
      return false;
    }

    if (email=="") 
    {
      $('#signUpForm [id="error_email"]').html("Please enter email.");
      $('#signUpForm [name="email"]').css('border',brdr);
      $('#signUpForm [name="email"]').focus();
      return false;
    }
   
    if (IsEmail(email)==false) 
    {
      $('#signUpForm [id="error_email"]').html("Please enter valid email address.");
      $('#signUpForm [name="email"]').css('border',brdr);  
      $('#signUpForm [name="email"]').focus();
      return false;
    }

    if (mobile=="") 
    {
      $('#signUpForm [id="error_mobile"]').html("Please enter contact number.");
      $('#signUpForm [name="mobile"]').css('border',brdr);
      $('#signUpForm [name="mobile"]').focus();
      return false;
    }
    
    if (mobile.length > 15) 
    {
      $('#signUpForm [id="error_mobile"]').html("Please enter valid phone number.");
      $('#signUpForm [name="mobile"]').css('border',brdr);  
      $('#signUpForm [name="mobile"]').focus();
      return false;
    }


    // if (IsMobile(mobile)==false) 
    // {
    //   $('#signUpForm [id="error_mobile"]').html("Please enter valid phone number.");
    //   $('#signUpForm [name="mobile"]').css('border',brdr);  
    //   $('#signUpForm [name="mobile"]').focus();
    //   return false;
    // }

    if (unique_id=="") 
    {
      $('#signUpForm [id="error_unique_id"]').html("Please enter username.");
      $('#signUpForm [name="unique_id"]').css('border',brdr);
      $('#signUpForm [name="unique_id"]').focus();
      return false;
    }

    if (unique_id.length > 15 || unique_id.length < 6) 
    {
      $('#signUpForm [id="error_unique_id"]').html("Username should be between 6 to 15 characters.");
      $('#signUpForm [name="unique_id"]').css('border',brdr);
      $('#signUpForm [name="unique_id"]').focus();
      return false;
    }

    if (password=="") 
    {
      $('#signUpForm [id="error_password"]').html("Please enter password.");
      $('#signUpForm [name="password"]').css('border',brdr);
      $('#signUpForm [name="password"]').focus();
      return false;
    }

    if (password.length > 15) 
    {
      $('#signUpForm [id="error_password"]').html("Maximum 15 characters allowed.");
      $('#signUpForm [name="password"]').css('border',brdr);
      $('#signUpForm [name="password"]').focus();
      return false;
    }
}

function userSignUpOtpCheck()
{
  var otp = $('#signOtpCheckForm [name="otp"]').val();
  
  if (otp=="") 
    {
      $('#signOtpCheckForm [id="error_otp"]').html("Please enter otp.");
      $('#signOtpCheckForm [name="otp"]').css('border',brdr);
      $('#signOtpCheckForm [name="otp"]').focus();
      return false;
    }
if (isNaN(otp)) 
    {
      $('#signOtpCheckForm [id="error_otp"]').html("Please enter number only.");
      $('#signOtpCheckForm [name="otp"]').css('border',brdr);
      $('#signOtpCheckForm [name="otp"]').focus();
      return false;
    }
if (otp.length > 6 || otp.length < 6) 
    {
      $('#signOtpCheckForm [id="error_otp"]').html("Please enter 6 characters otp.");
      $('#signOtpCheckForm [name="otp"]').css('border',brdr);
      $('#signOtpCheckForm [name="otp"]').focus();
      return false;
    }

}

function userSignInOtpCheck()
{
  var otp = $('#signInOtpCheckForm [name="otp"]').val();
  
  if (otp=="") 
    {
      $('#signInOtpCheckForm [id="error_otp"]').html("Please enter otp.");
      $('#signInOtpCheckForm [name="otp"]').css('border',brdr);
      $('#signInOtpCheckForm [name="otp"]').focus();
      return false;
    }
if (isNaN(otp)) 
    {
      $('#signInOtpCheckForm [id="error_otp"]').html("Please enter number only.");
      $('#signInOtpCheckForm [name="otp"]').css('border',brdr);
      $('#signInOtpCheckForm [name="otp"]').focus();
      return false;
    }
if (otp.length > 6 || otp.length < 6) 
    {
      $('#signInOtpCheckForm [id="error_otp"]').html("Please enter 6 characters otp.");
      $('#signInOtpCheckForm [name="otp"]').css('border',brdr);
      $('#signInOtpCheckForm [name="otp"]').focus();
      return false;
    }

}

function userSignIn()
{

  var email = $('#loginForm [name="email"]').val();
  var password = $('#loginForm [name="password"]').val();
 

    if (email=="") 
    {
      $('#loginForm [id="error_email"]').html("Please enter username.");
      $('#loginForm [name="email"]').css('border',brdr);
      $('#loginForm [name="email"]').focus();
      return false;
    }

    if (password=="") 
    {
      $('#loginForm [id="error_password"]').html("Please enter password.");
      $('#loginForm [name="password"]').css('border',brdr);
      $('#loginForm [name="password"]').focus();
      return false;
    }

    if (password.length > 15) 
    {
      $('#loginForm [id="error_password"]').html("Maximum 15 characters allowed.");
      $('#loginForm [name="password"]').css('border',brdr);
      $('#loginForm [name="password"]').focus();
      return false;
    }
}

function forgotPasswordCheck()
{
  var password = $('#forgotPasswordForm [name="unique_id"]').val();
 

    if (password=="") 
    {
      $('#forgotPasswordForm [id="error_unique_id"]').html("Please enter username.");
      $('#forgotPasswordForm [name="unique_id"]').css('border',brdr);
      $('#forgotPasswordForm [name="unique_id"]').focus();
      return false;
    }

    if (password.length > 15) 
    {
      $('#forgotPasswordForm [id="error_unique_id"]').html("Maximum 15 characters allowed.");
      $('#forgotPasswordForm [name="unique_id"]').css('border',brdr);
      $('#forgotPasswordForm [name="unique_id"]').focus();
      return false;
    }
}

function userChangePassword()
{
  var password = $('#changePasswordForm [name="password"]').val();
  var confirm_password = $('#changePasswordForm [name="confirm_password"]').val();

    if (password=="") 
    {
      $('#changePasswordForm [id="error_password"]').html("Please enter password.");
      $('#changePasswordForm [name="password"]').css('border',brdr);
      $('#changePasswordForm [name="password"]').focus();
      return false;
    }

    if (password.length > 15) 
    {
      $('#changePasswordForm [id="error_password"]').html("Maximum 15 characters allowed.");
      $('#changePasswordForm [name="password"]').css('border',brdr);
      $('#changePasswordForm [name="password"]').focus();
      return false;
    } 

    if (confirm_password=="") 
    {
      $('#changePasswordForm [id="error_confirm_password"]').html("Please enter confirm password.");
      $('#changePasswordForm [name="confirm_password"]').css('border',brdr);
      $('#changePasswordForm [name="confirm_password"]').focus();
      return false;
    }

    if (confirm_password.length > 15) 
    {
      $('#changePasswordForm [id="error_confirm_password"]').html("Maximum 15 characters allowed.");
      $('#changePasswordForm [name="confirm_password"]').css('border',brdr);
      $('#changePasswordForm [name="confirm_password"]').focus();
      return false;
    }

    if (password !== confirm_password) 
    {
      $('#changePasswordForm [id="error_confirm_password"]').html("Password does not match.");
      $('#changePasswordForm [name="confirm_password"]').css('border',brdr);
      $('#changePasswordForm [name="confirm_password"]').focus();
      return false;
    }    

}