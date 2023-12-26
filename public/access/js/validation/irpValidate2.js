function getIpType(type)
{
  console.log(type);
  if (type && type==2) 
  {
    $("#auth_div").hide();
  }
  else if(type && type==3) 
  {
    $("#auth_div").show();
  }
  else
  {
    $("#auth_div").hide(); 
  }
}



function irpValidate2()
{

  var ip = $("#ip").val();
  var name = $("#name").val();
  var address = $("#address").val();
  var email = $("#email").val();
  var username = $("#username").val();
  var password = $("#password").val();
  var logo = $("#file")[0].files.length;
  var mobile = $("#mobile").val();
  var status = $("#status").val();
 

  if (ip=="") 
    {
      $("#error_ip").html("Please select ip");
      $("#ip").css('border',brdr);
      $("#ip").focus();
      return false;
    }

  if (name=="") 
    {
      $("#error_name").html("Please enter name");
      $("#name").css('border',brdr);
      $("#name").focus();
      return false;
    }

    if (name.length > 150) 
    {
      $("#error_name").html("Maximum 150 characters allowed.");
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

  //   if (email=="") 
  //   {
  //     $("#error_email").html("Please enter email");
  //     $("#email").css('border',brdr);
  //     $("#email").focus();
  //     return false;
  //   }

  //    if (IsEmail(email)==false) 
  //   {
  //     $("#error_email").html("Please enter valid email address.");
  //     $("#email").css('border',brdr);  
  //     $("#email").focus();
  //     return false;
  //   }

  //    if (mobile=="") 
  //   {
  //     $("#error_mobile").html("Please enter contact number.");
  //     $("#mobile").css('border',brdr);
  //     $("#mobile").focus();
  //     return false;
  //   }
  //   if (IsMobile(mobile)==false) 
  //   {
  //     $("#error_mobile").html("Please enter valid phone number.");
  //     $("#mobile").css('border',brdr);  
  //     $("#mobile").focus();
  //     return false;
  //   }


  // if (username=="") 
  //   {
  //     $("#error_username").html("Please enter username");
  //     $("#username").css('border',brdr);
  //     $("#username").focus();
  //     return false;
  //   }

  //   if (username.length > 50) 
  //   {
  //     $("#error_username").html("Maximum 50 characters allowed.");
  //     $("#username").css('border',brdr);
  //     $("#username").focus();
  //     return false;
  //   }

  //   if (password=="") 
  //   {
  //     $("#error_password").html("Please enter password");
  //     $("#password").css('border',brdr);
  //     $("#password").focus();
  //     return false;
  //   }
  //   if (password.length > 20) 
  //   {
  //     $("#error_password").html("Password must be under 20 characters.");
  //     $("#password").css('border',brdr);
  //     $("#password").focus();
  //     return false;
  //   }

    if (status=="") 
    {
      $("#error_status").html("Please select status");
      $("#status").css('border',brdr);
      $("#status").focus();
      return false;
    }
   
}