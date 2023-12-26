function reportPdf()
{
	console.log("sdfsdf");
	var description = $("#name").val();
  	var profile = $("#dcmt")[0].files.length;
  
  if (description=="") 
    {
      $("#error_name").html("Please enter name.");
      $("#name").css('border',brdr);
      $("#name").focus();
      return false;
    }

    // if (profile===0) 
    //       {
    //         $("#error_dcmt").html("Please select file.");
    //         $("#dcmt").css('border',brdr); 
    //         $("#dcmt").focus();
    //         return false;       
    //       }
          
}