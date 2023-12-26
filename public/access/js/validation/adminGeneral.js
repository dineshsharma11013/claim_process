
function adminGeneral()
{
  var name = $("#comp_name").val();
  var address = $("#address").val();
  var email = $("#email").val();
  var username = $("#username").val();
  var password = $("#password").val();
  
  var mobile = $("#mobile").val();
 
  if (name=="") 
    {
      $("#error_comp_name").html("Please enter company name.");
      $("#comp_name").css('border',brdr);
      $("#comp_name").focus();
      return false;
    }

    if (name.length > 30) 
    {
      $("#error_comp_name").html("Maximum 30 characters allowed.");
      $("#comp_name").css('border',brdr);
      $("#comp_name").focus();
      return false;
    }

    if (address=="") 
    {
      $("#error_address").html("Please enter address");
      $("#address").css('border',brdr);
      $("#address").focus();
      return false;
    }

    if (email=="") 
    {
      $("#error_email").html("Please enter email");
      $("#email").css('border',brdr);
      $("#email").focus();
      return false;
    }

     if (IsEmail(email)==false) 
    {
      $("#error_email").html("Please enter valid email address.");
      $("#email").css('border',brdr);  
      $("#email").focus();
      return false;
    }

    if (username=="") 
    {
      $("#error_username").html("Please enter username");
      $("#username").css('border',brdr);
      $("#username").focus();
      return false;
    }

    if (password=="") 
    {
      $("#error_password").html("Please enter password");
      $("#password").css('border',brdr);
      $("#password").focus();
      return false;
    }

    if (mobile=="") 
    {
      $("#error_mobile").html("Please enter contact number.");
      $("#mobile").css('border',brdr);
      $("#mobile").focus();
      return false;
    }
    if (IsMobile(mobile)==false) 
    {
      $("#error_mobile").html("Please enter valid phone number.");
      $("#mobile").css('border',brdr);  
      $("#mobile").focus();
      return false;
    }
}