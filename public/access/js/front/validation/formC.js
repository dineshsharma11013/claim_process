
function declaration(place, fid, updated_data, signPth=false, signDiv=false)
{


	var epath = b_pth+'/get-formc-declaration';
	  console.log(epath, fid, updated_data, "asdfsdf");

	  $.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      }
	  });
	  $.ajax({
	          type:'get',  
	              url:epath,
                data:{fid:fid, updated_data:updated_data},
	              cache: false, 
	              success:function(data){
	                //console.log(data);             
	                 $("#"+place).html(data); 
	                 getSignature(signPth, signDiv);
	                 $(window).scrollTop(0);
	                },
	        error : function(err)
	        {
	          console.log(err);
	          
	        }
	})
}

// function declaration2(place, fid)
// {


//   var epath = b_pth+'/get-formc-declaration-reg';
//     console.log(epath);

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//             type:'get',  
//                 url:epath,
//                 data:{fid:fid},
//                 cache: false, 
//                 success:function(data){
//                   //console.log(data);             
//                    $("#"+place).html(data); 
//                   },
//           error : function(err)
//           {
//             console.log(err);
            
//           }
//   })
// }


function getPreview(fid, updated_data)
{
  var epath = b_pth+'/get-formc-preview';
  console.log(epath, fid, updated_data);

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
              data:{fid:fid, updated_data:updated_data},
              cache: false, 
              success:function(data){
                console.log(data);             
                 $("#formBPreview").html(data); 
                 
                },
        error : function(err)
        {
          console.log(err);
          
        }
}) 
}



function getName(fm, nm, val)
{
	console.log(fm, nm, val);
	var val = val;
	$('#'+fm+' input[name="'+nm+'_2"]').val(val);
	// $('#'+fm+' input[name="signing_person_name"]').val(val.toUpperCase());	
	// $('#'+fm+' span[id="signing_person_name_2"]').html(val.toUpperCase());	
	$('#'+fm+' span[id="'+nm+'_2"]').html(val);	
	$('#'+fm+' span[id="'+nm+'"]').html(val);
}

function getAddress(fm, nm, val)
{
	$('#'+fm+' textarea[name="signing_address"]').val(val);	
	$('#'+fm+' span[id="userAddress"]').html(val);
}


function decl()
{
	var place = $('#financialCreditorForm [name="place"]').val();

	// if (place == "") 
	//     {
	//       $('#financialCreditorForm [id="error_signing_person_address"]').html("This field is required.");
	//       $('#financialCreditorForm [name="signing_person_address"]').css('border',brdr);
	//       $('#financialCreditorForm [name="signing_person_address"]').focus();
	//       return false;
	//     }

	if (place.length > 100) 
	    {
	      $('#financialCreditorForm [id="error_place"]').html("Maximum 100 characters allowed.");
	      $('#financialCreditorForm [name="place"]').css('border',brdr);
	      $('#financialCreditorForm [name="place"]').focus();
	      return false;
	    }  

}


function check0()
{
	var fc_name = $('#financialCreditorForm [name="fc_name"]').val();
 	var fc_address = $('#financialCreditorForm [name="fc_address"]').val();
 	var fc_email = $('#financialCreditorForm [name="fc_email"]').val();

 	var borrower_claim_amount = $('#financialCreditorForm [name="borrower_claim_amount"]').val();
 	var guarantor_claim_amount = $('#financialCreditorForm [name="guarantor_claim_amount"]').val();
 	var financial_claim_amt = $('#financialCreditorForm [name="financial_claim_amt"]').val();

 	var operational_creditor_signature = $("#operational_creditor_signature")[0].files.length;
 	var operational_creditor_signature_val = $('#financialCreditorForm [name="operational_creditor_signature_val"]').val();

 	var signing_person_name = $('#financialCreditorForm [name="signing_person_name"]').val();
 	var signing_address = $('#financialCreditorForm [name="signing_address"]').val();
 	var creditor_position = $('#financialCreditorForm [name="creditor_position"]').val();

	  if (fc_name=="") 
	    {
	      $('#financialCreditorForm [id="error_fc_name"]').html("This field is required.");
	      $('#financialCreditorForm [name="fc_name"]').css('border',brdr);
	      $('#financialCreditorForm [name="fc_name"]').focus();
	      return false;
	    }

	if (fc_name.length > 60) 
	    {
	      $('#financialCreditorForm [id="error_fc_name"]').html("Please enter correct name.");
	      $('#financialCreditorForm [name="fc_name"]').css('border',brdr);
	      $('#financialCreditorForm [name="fc_name"]').focus();
	      return false;
	    }	    

	// if (fc_address=="") 
	//     {
	//       $('#financialCreditorForm [id="error_fc_address"]').html("This field is required.");
	//       $('#financialCreditorForm [name="fc_address"]').css('border',brdr);
	//       $('#financialCreditorForm [name="fc_address"]').focus();
	//       return false;
	//     }

	//  if (fc_address.length > 150) 
	//     {
	//       $('#financialCreditorForm [id="error_fc_address"]').html("Please enter correct address.");
	//       $('#financialCreditorForm [name="fc_address"]').css('border',brdr);
	//       $('#financialCreditorForm [name="fc_address"]').focus();
	//       return false;
	//     }   

	 if (fc_email=="") 
	    {
	      $('#financialCreditorForm [id="error_fc_email"]').html("This field is required.");
	      $('#financialCreditorForm [name="fc_email"]').css('border',brdr);
	      $('#financialCreditorForm [name="fc_email"]').focus();
	      return false;
	    }
	if (fc_email.length > 60) 
	    {
	      $('#financialCreditorForm [id="error_fc_email"]').html("Please enter valid email address.");
	      $('#financialCreditorForm [name="fc_email"]').css('border',brdr);
	      $('#financialCreditorForm [name="fc_email"]').focus();
	      return false;
	    }    

	if (IsEmail(fc_email) == false) 
	    {
	      $('#financialCreditorForm [id="error_fc_email"]').html("Please enter valid email address.");
	      $('#financialCreditorForm [name="fc_email"]').css('border',brdr);
	      $('#financialCreditorForm [name="fc_email"]').focus();
	      return false;
	    }   

	 if (borrower_claim_amount!="") 
	    {
	    	var output = $.isNumeric(borrower_claim_amount);
			   if (output==false) 
			   {		

	      $('#financialCreditorForm [id="error_borrower_claim_amount"]').html("Please enter only numeric value.");
	      $('#financialCreditorForm [name="borrower_claim_amount"]').css('border',brdr);
	      $('#financialCreditorForm [name="borrower_claim_amount"]').focus();
	      return false;
	    }   
	}

	if (guarantor_claim_amount!="") 
	    {
	    	var output = $.isNumeric(guarantor_claim_amount);
			   if (output==false) 
			   {		

	      $('#financialCreditorForm [id="error_guarantor_claim_amount"]').html("Please enter only numeric value.");
	      $('#financialCreditorForm [name="guarantor_claim_amount"]').css('border',brdr);
	      $('#financialCreditorForm [name="guarantor_claim_amount"]').focus();
	      return false;
	    }   
	}

	if (financial_claim_amt!="") 
	    {
	    	var output = $.isNumeric(financial_claim_amt);
			   if (output==false) 
			   {		

	      $('#financialCreditorForm [id="error_financial_claim_amt"]').html("Please enter only numeric value.");
	      $('#financialCreditorForm [name="financial_claim_amt"]').css('border',brdr);
	      $('#financialCreditorForm [name="financial_claim_amt"]').focus();
	      return false;
	    }   
	}


	 if (operational_creditor_signature_val == "") 
	 {
	 if (operational_creditor_signature===0) 
	    {
	      $('#financialCreditorForm [id="error_operational_creditor_signature"]').html("This field is required.");
	      $('#financialCreditorForm [name="operational_creditor_signature"]').css('border',brdr);
	      $('#financialCreditorForm [name="operational_creditor_signature"]').focus();
	      return false;
	    }
	    if (checkSize('operational_creditor_signature') > 1024) 
	    {
	     $("#error_operational_creditor_signature").show();	
	      $('#financialCreditorForm [id="error_operational_creditor_signature"]').html("File size should be under 1 mb.");
	      $('#financialCreditorForm [name="operational_creditor_signature"]').css('border',brdr);
	      $('#financialCreditorForm [name="operational_creditor_signature"]').focus();
	      return false;
	    }
	}
	else
	{
		if (operational_creditor_signature != 0) 
		{
			if (checkSize('operational_creditor_signature') > 1024) 
		    {
		     $("#error_operational_creditor_signature").show();	
		      $('#financialCreditorForm [id="error_operational_creditor_signature"]').html("File size should be under 1 mb.");
		      $('#financialCreditorForm [name="operational_creditor_signature"]').css('border',brdr);
		      $('#financialCreditorForm [name="operational_creditor_signature"]').focus();
		      return false;
		    }		
		}
	}

	 if (signing_person_name == "") 
	    {
	      $('#financialCreditorForm [id="error_signing_person_name"]').html("This field is required.");
	      $('#financialCreditorForm [name="signing_person_name"]').css('border',brdr);
	      $('#financialCreditorForm [name="signing_person_name"]').focus();
	      return false;
	    }

	if (signing_person_name.length > 70) 
	    {
	      $('#financialCreditorForm [id="error_signing_person_name"]').html("Maximum 70 characters allowed.");
	      $('#financialCreditorForm [name="signing_person_name"]').css('border',brdr);
	      $('#financialCreditorForm [name="signing_person_name"]').focus();
	      return false;
	    }


	if (creditor_position.length > 255) 
	    {
	      $('#financialCreditorForm [id="error_creditor_position"]').html("Maximum 255 characters allowed.");
	      $('#financialCreditorForm [name="creditor_position"]').css('border',brdr);
	      $('#financialCreditorForm [name="creditor_position"]').focus();
	      return false;
	    } 

	// if (signing_address == "") 
	//     {
	//       $('#financialCreditorForm [id="error_signing_address"]').html("This field is required.");
	//       $('#financialCreditorForm [name="signing_address"]').css('border',brdr);
	//       $('#financialCreditorForm [name="signing_address"]').focus();
	//       return false;
	//     }

	// if (signing_address.length > 70) 
	//     {
	//       $('#financialCreditorForm [id="error_signing_person_address"]').html("Maximum 70 characters allowed.");
	//       $('#financialCreditorForm [name="signing_address"]').css('border',brdr);
	//       $('#financialCreditorForm [name="signing_address"]').focus();
	//       return false;
	//     }    

	return true;
}

function check1()
{
	var any_dispute_deatails = $('#financialCreditorForm [name="any_dispute_deatails"]').val();
 	var debt_incurred_details = $('#financialCreditorForm [name="debt_incurred_details"]').val();

	 //  if (any_dispute_deatails=="") 
	 //    {
	 //      $('#financialCreditorForm [id="error_any_dispute_deatails"]').html("This field is required.");
	 //      $('#financialCreditorForm [name="any_dispute_deatails"]').css('border',brdr);
	 //      $('#financialCreditorForm [name="any_dispute_deatails"]').focus();
	 //      return false;
	 //    }

	 // if (debt_incurred_details=="") 
	 //    {
	 //      $('#financialCreditorForm [id="error_debt_incurred_details"]').html("This field is required.");
	 //      $('#financialCreditorForm [name="debt_incurred_details"]').css('border',brdr);
	 //      $('#financialCreditorForm [name="debt_incurred_details"]').focus();
	 //      return false;
	 //    }   
	 return true;
}

function check2()
{
	return true;
}
