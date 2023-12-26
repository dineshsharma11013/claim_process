
function userChangeProfile()
{
	var neme = $("#neme").val();
  	var email = $("#email").val();
    var mobile = $("#mobile").val();
    var alt_mobile = $("#alt_mobile").val();
 
  if (neme=="") 
    {
      $("#error_name").html("Please enter name.");
      $("#name").focus();
      return false;
    }

    if (neme.length > 50) 
    {
      $("#error_name").html("Maximum 50 characters allowed.");
      $("#name").focus();
      return false;
    }

    if (email=="") 
    {
      $("#error_email").html("Please enter email.");
      $("#email").focus();
      return false;
    }

    if (email.length > 50) 
    {
      $("#error_email").html("Maximum 50 characters allowed.");
      $("#email").focus();
      return false;
    }

    if (IsEmail(email) == false) 
    {
      $("#error_email").html("Please enter valid email address.");
      $("#email").focus();
      return false;
    }      

    if (mobile=="") 
    {
      $("#error_mobile").html("Please enter mobile number.");
      $("#mobile").focus();
      return false;
    }

    if (mobile.length > 10) 
    {
      $("#error_mobile").html("Please enter 10 digit mobile number");
      $("#mobile").focus();
      return false;
    }
    if (mobile.length < 10) 
    {
      $("#error_mobile").html("Please enter 10 digit mobile number");
      $("#mobile").focus();
      return false;
    }

    if (alt_mobile) {
    if (alt_mobile.length > 10) 
    {
      $("#error_alt_mobile").html("Please enter 10 digit mobile number");
      $("#alt_mobile").focus();
      return false;
    }
    if (alt_mobile.length < 10) 
    {
      $("#error_alt_mobile").html("Please enter 10 digit mobile number");
      $("#alt_mobile").focus();
      return false;
    }    
  }
    
}