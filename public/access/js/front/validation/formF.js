function declaration(place, fid, updated_data, signPth=false, signDiv=false)
{


	var epath = b_pth+'/get-formf-declaration';
	  console.log(epath, fid, updated_data);
	  $("#"+place).html('');
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

function getPreview(fid, updated_data)
{
  var epath = b_pth+'/get-formf-preview';
  console.log(epath);
  $("#formFPreview").html(''); 

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
                 $("#formFPreview").html(data); 
                 $(window).scrollTop(0);
                },
        error : function(err)
        {
          console.log(err);
          
        }
}) 
}



function getName(fm, nm, val)
{
	//console.log(fm, nm, val);

	// $('#'+fm+' input[name="creditor_name"]').val(val.toUpperCase());	
	$('#'+fm+' span[id="creditor_name"]').html(val);		
}

function getAddress(fm, val)
{
	//console.log(fm, val);
	// $('#'+fm+' input[name="creditor_address"]').val(val);	
	$('#'+fm+' span[id="creditor_address"]').html(val);	
	$('#'+fm+' span[id="userAddress"]').html(val);
}

function check0()
{
	var fc_name = $('#financialCreditorFormF [name="fc_name"]').val();
 	var fc_address = $('#financialCreditorFormF [name="fc_address"]').val();
 	var fc_email = $('#financialCreditorFormF [name="fc_email"]').val();

 	var fc_signature = $("#fc_signature")[0].files.length;
 	var fc_signature_val = $('#financialCreditorFormF [name="fc_signature_val"]').val();

 	var creditor_name = $('#financialCreditorFormF [name="creditor_name"]').val();
 	var creditor_position = $('#financialCreditorFormF [name="creditor_position"]').val();
 	var creditor_address = $('#financialCreditorFormF [name="creditor_address"]').val();

	  if (fc_name=="") 
	    {
	      $('#financialCreditorFormF [id="error_fc_name"]').html("This field is required.");
	      $('#financialCreditorFormF [name="fc_name"]').css('border',brdr);
	      $('#financialCreditorFormF [name="fc_name"]').focus();
	      return false;
	    }

	  if (fc_name.length > 80) 
	    {
	      $('#financialCreditorFormF [id="error_fc_name"]').html("Maximum 80 characters allowed.");
	      $('#financialCreditorFormF [name="fc_name"]').css('border',brdr);
	      $('#financialCreditorFormF [name="fc_name"]').focus();
	      return false;
	    }  

	// if (fc_address=="") 
	//     {
	//       $('#financialCreditorFormF [id="error_fc_address"]').html("This field is required.");
	//       $('#financialCreditorFormF [name="fc_address"]').css('border',brdr);
	//       $('#financialCreditorFormF [name="fc_address"]').focus();
	//       return false;
	//     }

	//     if (fc_address.length > 150) 
	//     {
	//       $('#financialCreditorFormF [id="error_fc_address"]').html("Maximum 150 characters allowed.");
	//       $('#financialCreditorFormF [name="fc_address"]').css('border',brdr);
	//       $('#financialCreditorFormF [name="fc_address"]').focus();
	//       return false;
	//     }

	 if (fc_email=="") 
	    {
	      $('#financialCreditorFormF [id="error_fc_email"]').html("This field is required.");
	      $('#financialCreditorFormF [name="fc_email"]').css('border',brdr);
	      $('#financialCreditorFormF [name="fc_email"]').focus();
	      return false;
	    }       

	if (fc_email.length > 100) 
	    {
	      $('#financialCreditorFormF [id="error_fc_email"]').html("Maximum 100 characters allowed.");
	      $('#financialCreditorFormF [name="fc_email"]').css('border',brdr);
	      $('#financialCreditorFormF [name="fc_email"]').focus();
	      return false;
	    }
	    
	  if (IsEmail(fc_email) == false) 
	    {
	      $('#financialCreditorFormF [id="error_fc_email"]').html("Please enter valid email address.");
	      $('#financialCreditorFormF [name="fc_email"]').css('border',brdr);
	      $('#financialCreditorFormF [name="fc_email"]').focus();
	      return false;
	    }    


	 if (fc_signature_val == "") 
	 {
	 if (fc_signature===0) 
	    {
	      $('#financialCreditorFormF [id="error_fc_signature"]').html("This field is required.");
	      $('#financialCreditorFormF [name="fc_signature"]').css('border',brdr);
	      $('#financialCreditorFormF [name="fc_signature"]').focus();
	      return false;
	    }
	    if (checkSize('fc_signature') > 1024) 
	    {
	     $("#error_fc_signature").show();	
	      $('#financialCreditorFormF [id="error_fc_signature"]').html("File size should be under 1 mb.");
	      $('#financialCreditorFormF [name="fc_signature"]').css('border',brdr);
	      $('#financialCreditorFormF [name="fc_signature"]').focus();
	      return false;
	    }
	}
	else
	{
		if (fc_signature != 0) 
		{
			if (checkSize('fc_signature') > 1024) 
		    {
		     $("#error_fc_signature").show();	
		      $('#financialCreditorFormF [id="error_fc_signature"]').html("File size should be under 1 mb.");
		      $('#financialCreditorFormF [name="fc_signature"]').css('border',brdr);
		      $('#financialCreditorFormF [name="fc_signature"]').focus();
		      return false;
		    }		
		}
	}

	if (creditor_name=="") 
	    {
	      $('#financialCreditorFormF [id="error_creditor_name"]').html("This field is required.");
	      $('#financialCreditorFormF [name="creditor_name"]').css('border',brdr);
	      $('#financialCreditorFormF [name="creditor_name"]').focus();
	      return false;
	    }

	  if (creditor_name.length > 80) 
	    {
	      $('#financialCreditorFormF [id="error_creditor_name"]').html("Maximum 80 characters allowed.");
	      $('#financialCreditorFormF [name="creditor_name"]').css('border',brdr);
	      $('#financialCreditorFormF [name="creditor_name"]').focus();
	      return false;
	    }

	  //   if (creditor_position=="") 
	  //   {
	  //     $('#financialCreditorFormF [id="error_creditor_position"]').html("This field is required.");
	  //     $('#financialCreditorFormF [name="creditor_position"]').css('border',brdr);
	  //     $('#financialCreditorFormF [name="creditor_position"]').focus();
	  //     return false;
	  //   }

	  // if (creditor_position.length > 150) 
	  //   {
	  //     $('#financialCreditorFormF [id="error_creditor_position"]').html("Maximum 150 characters allowed.");
	  //     $('#financialCreditorFormF [name="creditor_position"]').css('border',brdr);
	  //     $('#financialCreditorFormF [name="creditor_position"]').focus();
	  //     return false;
	  //   }

	  //   if (creditor_address=="") 
	  //   {
	  //     $('#financialCreditorFormF [id="error_creditor_address"]').html("This field is required.");
	  //     $('#financialCreditorFormF [name="creditor_address"]').css('border',brdr);
	  //     $('#financialCreditorFormF [name="creditor_address"]').focus();
	  //     return false;
	  //   }

	  // if (creditor_address.length > 200) 
	  //   {
	  //     $('#financialCreditorFormF [id="error_creditor_address"]').html("Maximum 200 characters allowed.");
	  //     $('#financialCreditorFormF [name="creditor_address"]').css('border',brdr);
	  //     $('#financialCreditorFormF [name="creditor_address"]').focus();
	  //     return false;
	  //   }




	return true;
}

function check1()
{
	var any_dispute_deatails = $('#financialCreditorFormF [name="any_dispute_deatails"]').val();
 	var debt_incurred_details = $('#financialCreditorFormF [name="debt_incurred_details"]').val();

	 //  if (any_dispute_deatails=="") 
	 //    {
	 //      $('#financialCreditorFormF [id="error_any_dispute_deatails"]').html("This field is required.");
	 //      $('#financialCreditorFormF [name="any_dispute_deatails"]').css('border',brdr);
	 //      $('#financialCreditorFormF [name="any_dispute_deatails"]').focus();
	 //      return false;
	 //    }

	 // if (debt_incurred_details=="") 
	 //    {
	 //      $('#financialCreditorFormF [id="error_debt_incurred_details"]').html("This field is required.");
	 //      $('#financialCreditorFormF [name="debt_incurred_details"]').css('border',brdr);
	 //      $('#financialCreditorFormF [name="debt_incurred_details"]').focus();
	 //      return false;
	 //    }   
	 return true;
}

function check2()
{
	return true;
}
