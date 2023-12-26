
function formCApprovalValidate()
{
	var status = $("#status").val();
	if(status == '')
	{
		 $("#error_status").html("Please select status.");
	      $("#status").css('border',brdr);
	      $("status").focus();
	      return false;
	}
	return true;
}						



var getTotalAmt = (baseprice, appr_price, left_amt)=>
{
	//console.log(baseprice, appr_price, left_amt);
	var lprice = '';
	var bprice = document.getElementById(baseprice).value;
	var aprice = document.getElementById(appr_price).value;


	if (bprice && !aprice) 
	{
		lprice = parseInt(bprice);
	}
	else if(aprice && bprice) 
	{
		lprice = parseInt(bprice) + parseInt(aprice);
	}
	else if(aprice && !bprice)
	{
		lprice = parseInt(aprice);	
	}
		

//	console.log(bprice, aprice, lprice);		
	 document.getElementById(left_amt).value=lprice;	
}

