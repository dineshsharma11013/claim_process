
function authenticate()
{
	var type = $("#type").val();
 

  if (type=="") 
    {
      $("#error_type").html("Please select type");
      $("#type").css('border',brdr);
      $("#type").focus();
      return false;
    }
  return true;
   
}