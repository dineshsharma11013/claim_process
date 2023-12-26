
function adminChangePassword()
{
  
  var username = $("#username").val();
  var password = $("#password").val();
  
 
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

    
}