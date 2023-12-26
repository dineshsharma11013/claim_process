
function userChangePassword()
{
	var password = $("#password").val();
  	var confirm_password = $("#confirm_password").val();
 
  if (password=="") 
    {
      $("#error_password").html("Please enter password.");
      // $("#password").css('border',brdr);
      $("#password").focus();
      return false;
    }

    if (password.length > 30) 
    {
      $("#error_password").html("Maximum 30 characters allowed.");
      // $("#password").css('border',brdr);
      $("#password").focus();
      return false;
    }

    if (confirm_password=="") 
    {
      $("#error_confirm_password").html("Please enter confirm password");
      // $("#confirm_password").css('border',brdr);
      $("#confirm_password").focus();
      return false;
    }


    if (confirm_password.length > 30) 
    {
      $("#error_confirm_password").html("Maximum 30 characters allowed.");
      // $("#password").css('border',brdr);
      $("#confirm_password").focus();
      return false;
    }

    if (password != confirm_password) 
    {
      $("#error_confirm_password").html("Confirm Password does not match.");
      // $("#password").css('border',brdr);
      $("#confirm_password").focus();
      return false;
    }

    
}