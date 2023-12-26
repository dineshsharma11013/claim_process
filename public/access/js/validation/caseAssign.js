
function caseAssign()
{
  var name = $("#assigned_to").val();
  var rights = $("#rights").val();
  var status = $("#status").val();
  
 
  if (name=="") 
    {
      $("#error_assigned_to").html("Please select team member.");
      $("#assigned_to").css('border',brdr);
      $("#assigned_to").focus();
      return false;
    }

    if (rights=="") 
    {
      $("#error_rights").html("Please select rights");
      $("#rights").css('border',brdr);
      $("#rights").focus();
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