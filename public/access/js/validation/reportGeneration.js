function reportGeneration()
{
	var company = $("#company").val();
  	var form = $("#form").val();
    var report_type = $("#report_type").val();

  if (company=="") 
    {
      $("#error_company").html("This field is required");
      $("#company").css('border',brdr);
      $("#company").focus();
      return false;
    }

    if (form=="") 
    {
      $("#error_form").html("This field is required");
      $("#form").css('border',brdr);
      $("#form").focus();
      return false;
    }

      if (report_type=="") 
    {
      $("#error_report_type").html("This field is required");
      $("#report_type").css('border',brdr);
      $("#report_type").focus();
      return false;
    }  
}