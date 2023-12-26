console.log('prihasjdfh dfsdf');

function formBApprovalValidate()
{
	var status = $("#status").val();
	if (status=="") 
    {
      $("#error_status").html("Please select status.");
      $("#status").css('border',brdr);
      $("#status").focus();
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



var getApprovedAmt = (baseprice, appr_price, left_amt)=>
{
	//console.log(baseprice, appr_price, left_amt);
	var lprice = '';
	var bprice = document.getElementById(baseprice).value;
	var aprice = document.getElementById(appr_price).value;
		lprice = parseInt(bprice) - parseInt(aprice);
			
	 document.getElementById(left_amt).value=lprice;	
}


var getInterestAmt = (baseprice, appr_price, left_amt, Output)=>
{
	//console.log(baseprice, appr_price, left_amt);
	var lprice = '';
	var bprice = document.getElementById(baseprice).value;
	var aprice = document.getElementById(appr_price).value;
		lprice = parseInt(bprice) - parseInt(aprice);
			
	 document.getElementById(left_amt).value=lprice;	
	//console.log(Output);
	Output();

}

var getOutput = ()=>{
	//console.log('its working');
	var total_approved = '';
	var aprice = document.getElementById('approved_amt_principl').value;
	var aInterestAmt = document.getElementById('approved_interest_amt').value;
	total_approved = parseInt(aprice) + parseInt(aInterestAmt);
//	console.log(typeof(parseInt(aprice)));
	document.getElementById('total_approved_amount').value=total_approved;

	var total_rejected = '';
	var arPrice = document.getElementById('principle_amt').value;
	total_rejected = parseInt(arPrice) - parseInt(total_approved);
	document.getElementById('total_rejected_amount').value = total_rejected;
}

