//console.log('prihasjdfh dfsdf');

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


var saveData = (fm,btn,pth) => {
	var epath = admin_pth+pth;
	console.log(epath);
	
	var request = new XMLHttpRequest();
	// console.log(csrf);
    
    if (!request) {
        alert("Giving up :( Cannot create an XMLHTTP instance");
        return false;
      }
    // Instantiating the request object
    request.open("POST", epath);
    
    // Defining event listener for readystatechange event
    request.onreadystatechange = function() {
        // Check if the request is compete and was successful
        //console.log(this);
        if(this.readyState === 4 && this.status === 200) {
            // Inserting the response from server into an HTML element
            //document.getElementById("result").innerHTML = this.responseText;
        	console.log(this.responseText);
        }
        
    };
    
    // Retrieving the form data
    var myForm = document.getElementById(fm);
    var formData = new FormData(myForm);

    // Sending the request to the server
    request.send(formData);
}


