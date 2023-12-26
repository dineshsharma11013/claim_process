function formG()
{
	var corporate_debtor = $("#corporate_debtor_name").val();
	var status = $("#status").val();

	if (corporate_debtor=="") 
    {
      $("#error_corporate_debtor_name").html("This field is required.");
      $("#corporate_debtor_name").css('border',brdr);
      $("#corporate_debtor_name").focus();
      return false;
    }

    if (status=="") 
    {
      $("#error_status").html("This field is required.");
      $("#status").css('border',brdr);
      $("#status").focus();
      return false;
    }

}