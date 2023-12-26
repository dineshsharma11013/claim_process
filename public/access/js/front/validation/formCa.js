	
function declaration(place, fid, updated_data, signPth=false, signDiv=false)
{


	var epath = b_pth+'/get-formca-declaration';
	  console.log(epath);

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
  var epath = b_pth+'/get-formca-preview';
  console.log(epath);

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
                 $("#formCaPreview").html(data); 
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
	console.log(fm, nm, val);
	var val = val;
	$('#'+fm+' input[name="'+nm+'_2"]').val(val);
	$('#'+fm+' input[name="signing_person_name"]').val(val.toUpperCase());	
	$('#'+fm+' span[id="signing_person_name_2"]').html(val.toUpperCase());	
	$('#'+fm+' span[id="'+nm+'_2"]').html(val);	
	
}

function getAddress(fm, nm, val)
{
	$('#'+fm+' textarea[name="signing_address"]').val(val);	
	$('#'+fm+' span[id="userAddress"]').html(val);
}

function check0()
{
	var fc_name = $('#financialCreditorFormCA [name="fc_name"]').val();
 	var fc_address = $('#financialCreditorFormCA [name="fc_address"]').val();
 	var fc_email = $('#financialCreditorFormCA [name="fc_email"]').val();

 	var fc_signature = $("#fc_signature")[0].files.length;
 	var fc_signature_val = $('#financialCreditorFormCA [name="fc_signature_val"]').val();

 	var creditor_name = $('#financialCreditorFormCA [name="creditor_name"]').val();
 	var creditor_position = $('#financialCreditorFormCA [name="creditor_position"]').val();
 	var creditor_address = $('#financialCreditorFormCA [name="creditor_address"]').val();

	  if (fc_name=="") 
	    {
	      $('#financialCreditorFormCA [id="error_fc_name"]').html("This field is required.");
	      $('#financialCreditorFormCA [name="fc_name"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="fc_name"]').focus();
	      return false;
	    }

	if (fc_name.length > 60) 
	    {
	      $('#financialCreditorFormCA [id="error_fc_name"]').html("Please enter correct name.");
	      $('#financialCreditorFormCA [name="fc_name"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="fc_name"]').focus();
	      return false;
	    }    

	if (fc_address=="") 
	    {
	      $('#financialCreditorFormCA [id="error_fc_address"]').html("This field is required.");
	      $('#financialCreditorFormCA [name="fc_address"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="fc_address"]').focus();
	      return false;
	    }

	 if (fc_address.length > 150) 
	    {
	      $('#financialCreditorFormCA [id="error_fc_address"]').html("Please enter correct address.");
	      $('#financialCreditorFormCA [name="fc_address"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="fc_address"]').focus();
	      return false;
	    }   


	if (fc_email=="") 
	    {
	      $('#financialCreditorFormCA [id="error_fc_email"]').html("This field is required.");
	      $('#financialCreditorFormCA [name="fc_email"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="fc_email"]').focus();
	      return false;
	    }        

	 if (fc_email.length > 60) 
	    {
	      $('#financialCreditorFormCA [id="error_fc_email"]').html("Please enter valid email address.");
	      $('#financialCreditorFormCA [name="fc_email"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="fc_email"]').focus();
	      return false;
	    }
	    
	  if (IsEmail(fc_email) == false) 
	    {
	      $('#financialCreditorFormCA [id="error_fc_email"]').html("Please enter valid email address.");
	      $('#financialCreditorFormCA [name="fc_email"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="fc_email"]').focus();
	      return false;
	    }     


	if (fc_signature_val == "") 
	 {
	 if (fc_signature===0) 
	    {
	      $('#financialCreditorFormCA [id="error_fc_signature"]').html("This field is required.");
	      $('#financialCreditorFormCA [name="fc_signature"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="fc_signature"]').focus();
	      return false;
	    }
	    if (checkSize('fc_signature') > 1024) 
	    {
	     $("#error_fc_signature").show();	
	      $('#financialCreditorFormCA [id="error_fc_signature"]').html("File size should be under 1 mb.");
	      $('#financialCreditorFormCA [name="fc_signature"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="fc_signature"]').focus();
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
		      $('#financialCreditorFormCA [id="error_fc_signature"]').html("File size should be under 1 mb.");
		      $('#financialCreditorFormCA [name="fc_signature"]').css('border',brdr);
		      $('#financialCreditorFormCA [name="fc_signature"]').focus();
		      return false;
		    }		
		}
	}    


	if (creditor_name=="") 
	    {
	      $('#financialCreditorFormCA [id="error_creditor_name"]').html("This field is required.");
	      $('#financialCreditorFormCA [name="creditor_name"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="creditor_name"]').focus();
	      return false;
	    }

	  if (creditor_name.length > 80) 
	    {
	      $('#financialCreditorFormCA [id="error_creditor_name"]').html("Maximum 80 characters allowed.");
	      $('#financialCreditorFormCA [name="creditor_name"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="creditor_name"]').focus();
	      return false;
	    }

	    if (creditor_position=="") 
	    {
	      $('#financialCreditorFormCA [id="error_creditor_position"]').html("This field is required.");
	      $('#financialCreditorFormCA [name="creditor_position"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="creditor_position"]').focus();
	      return false;
	    }

	  if (creditor_position.length > 150) 
	    {
	      $('#financialCreditorFormCA [id="error_creditor_position"]').html("Maximum 150 characters allowed.");
	      $('#financialCreditorFormCA [name="creditor_position"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="creditor_position"]').focus();
	      return false;
	    }

	    if (creditor_address=="") 
	    {
	      $('#financialCreditorFormCA [id="error_creditor_address"]').html("This field is required.");
	      $('#financialCreditorFormCA [name="creditor_address"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="creditor_address"]').focus();
	      return false;
	    }

	  if (creditor_address.length > 200) 
	    {
	      $('#financialCreditorFormCA [id="error_creditor_address"]').html("Maximum 200 characters allowed.");
	      $('#financialCreditorFormCA [name="creditor_address"]').css('border',brdr);
	      $('#financialCreditorFormCA [name="creditor_address"]').focus();
	      return false;
	    }
	

	return true;
}

function check1()
{
	var any_dispute_deatails = $('#financialCreditorFormCA [name="any_dispute_deatails"]').val();
 	var debt_incurred_details = $('#financialCreditorFormCA [name="debt_incurred_details"]').val();

	 //  if (any_dispute_deatails=="") 
	 //    {
	 //      $('#financialCreditorFormCA [id="error_any_dispute_deatails"]').html("This field is required.");
	 //      $('#financialCreditorFormCA [name="any_dispute_deatails"]').css('border',brdr);
	 //      $('#financialCreditorFormCA [name="any_dispute_deatails"]').focus();
	 //      return false;
	 //    }

	 // if (debt_incurred_details=="") 
	 //    {
	 //      $('#financialCreditorFormCA [id="error_debt_incurred_details"]').html("This field is required.");
	 //      $('#financialCreditorFormCA [name="debt_incurred_details"]').css('border',brdr);
	 //      $('#financialCreditorFormCA [name="debt_incurred_details"]').focus();
	 //      return false;
	 //    }   
	 return true;
}

function check2()
{
	return true;
}






