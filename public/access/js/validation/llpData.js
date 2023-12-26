
function llpData()
{
  var cin = $("#cin").val();
  var company_name = $("#company_name").val();

 
  if (cin=="") 
    {
      $("#error_cin").html("Please enter cin.");
      $("#cin").css('border',brdr);
      $("#cin").focus();
      return false;
    }

    if (company_name=="") 
    {
      $("#error_company_name").html("Please enter company name");
      $("#company_name").css('border',brdr);
      $("#company_name").focus();
      return false;
    }


}