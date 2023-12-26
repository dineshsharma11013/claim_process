
function UserValidate()
{
  var user_type = $("#user_type").val();
  var address = $("#address").val();
  var email = $("#email").val();
  var name = $("#name").val();
  var password = $("#password").val();
  // var logo = $("#file")[0].files.length;
  var mobile = $("#mobile").val();
  var status = $("#status").val();
 

  if (user_type=="") 
    {
      $("#error_user_type").html("Please select type");
      $("#user_type").css('border',brdr);
      $("#user_type").focus();
      return false;
    }

  if (name=="") 
    {
      $("#error_name").html("Please enter name");
      $("#name").css('border',brdr);
      $("#name").focus();
      return false;
    }

    if (name.length > 50) 
    {
      $("#error_name").html("Maximum 50 characters allowed.");
      $("#name").css('border',brdr);
      $("#name").focus();
      return false;
    }

    // if (address=="") 
    // {
    //   $("#error_address").html("Please enter address");
    //   $("#address").css('border',brdr);
    //   $("#address").focus();
    //   return false;
    // }

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

     if (mobile=="") 
    {
      $("#error_mobile").html("Please enter contact number.");
      $("#mobile").css('border',brdr);
      $("#mobile").focus();
      return false;
    }
    // if (IsMobile(mobile)==false) 
    // {
    //   $("#error_mobile").html("Please enter valid phone number.");
    //   $("#mobile").css('border',brdr);  
    //   $("#mobile").focus();
    //   return false;
    // }

    if (password=="") 
    {
      $("#error_password").html("Please enter password");
      $("#password").css('border',brdr);
      $("#password").focus();
      return false;
    }

    if (status=="") 
    {
      $("#error_status").html("Please select status");
      $("#status").css('border',brdr);
      $("#status").focus();
      return false;
    }
   
}