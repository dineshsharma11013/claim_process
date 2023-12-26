
function arValidation()
{
  var username = $("#username").val();
  var status = $("#status").val();
 

  if (username=="") 
    {
      $("#error_username").html("Please enter name");
      $("#username").css('border',brdr);
      $("#username").focus();
      return false;
    }

    if (username.length > 50) 
    {
      $("#error_username").html("Maximum 50 characters allowed.");
      $("#username").css('border',brdr);
      $("#username").focus();
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