
function ipGeneral()
{
  var name = $("#first_name").val();
  var address = $("#address").val();
  var email = $("#email").val();

  
  // var mobile = $("#mobile").val();
 
  if (name=="") 
    {
      $("#error_ip_name").html("Please enter name.");
      $("#name").css('border',brdr);
      $("#name").focus();
      return false;
    }

    if (name.length > 70) 
    {
      $("#error_ip_name").html("Maximum 70 characters allowed.");
      $("#name").css('border',brdr);
      $("#name").focus();
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

    if (address=="") 
    {
      $("#error_address").html("Please enter address");
      $("#address").css('border',brdr);
      $("#address").focus();
      return false;
    }

    

   

    // if (mobile=="") 
    // {
    //   $("#error_mobile").html("Please enter contact number.");
    //   $("#mobile").css('border',brdr);
    //   $("#mobile").focus();
    //   return false;
    // }
    // if (IsMobile(mobile)==false) 
    // {
    //   $("#error_mobile").html("Please enter valid phone number.");
    //   $("#mobile").css('border',brdr);  
    //   $("#mobile").focus();
    //   return false;
    // }
}