
function declaration(place, fid, updated_data, signPth=false, signDiv=false)
{

	
	var epath = b_pth+'/get-formD-declaration';
	 // console.log(epath, fid, updated_data);

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
  var epath = b_pth+'/get-formD-preview';
  //console.log(epath);

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
              //  console.log(data);             
                 $("#formBPreview").html(data); 
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
	$('#'+fm+' span[id="'+nm+'_2"]').html(val);	
	$('#'+fm+' span[id="'+nm+'"]').html(val);	
	
}

function getAddress(fm, nm, val)
{
	
	$('#'+fm+' span[id="userAddress"]').html(val);
}

function check0()
{
	var name = $('#financialCreditorFormD [name="name"]').val();
 	var address = $('#financialCreditorFormD [name="address"]').val();
 	var email = $('#financialCreditorFormD [name="email"]').val();
 	var operational_creditor_signature = $("#operational_creditor_signature")[0].files.length;
 	var operational_creditor_signature_val = $('#financialCreditorFormD [name="operational_creditor_signature_val"]').val();

 	var name_block_letter = $('#financialCreditorFormD [name="name_block_letter"]').val();
 	var relation_to_creditor = $('#financialCreditorFormD [name="relation_to_creditor"]').val();
 	var address_person_signing = $('#financialCreditorFormD [name="address_person_signing"]').val();

	  if (name=="") 
	    {
	      $('#financialCreditorFormD [id="error_name"]').html("This field is required.");
	      $('#financialCreditorFormD [name="name"]').css('border',brdr);
	      $('#financialCreditorFormD [name="name"]').focus();
	      return false;
	    }

	if (name.length > 60) 
	    {
	      $('#financialCreditorFormD [id="error_name"]').html("Please enter correct name.");
	      $('#financialCreditorFormD [name="name"]').css('border',brdr);
	      $('#financialCreditorFormD [name="name"]').focus();
	      return false;
	    }	    

	// if (address=="") 
	//     {
	//       $('#financialCreditorFormD [id="error_address"]').html("This field is required.");
	//       $('#financialCreditorFormD [name="address"]').css('border',brdr);
	//       $('#financialCreditorFormD [name="address"]').focus();
	//       return false;
	//     }

	 if (address.length > 150) 
	    {
	      $('#financialCreditorFormD [id="error_address"]').html("Please enter correct address.");
	      $('#financialCreditorFormD [name="address"]').css('border',brdr);
	      $('#financialCreditorFormD [name="address"]').focus();
	      return false;
	    }   

	 if (email=="") 
	    {
	      $('#financialCreditorFormD [id="error_email"]').html("This field is required.");
	      $('#financialCreditorFormD [name="email"]').css('border',brdr);
	      $('#financialCreditorFormD [name="email"]').focus();
	      return false;
	    }
	if (email.length > 60) 
	    {
	      $('#financialCreditorFormD [id="error_email"]').html("Please enter valid email address.");
	      $('#financialCreditorFormD [name="email"]').css('border',brdr);
	      $('#financialCreditorFormD [name="email"]').focus();
	      return false;
	    }    

	if (IsEmail(email) == false) 
	    {
	      $('#financialCreditorFormD [id="error_email"]').html("Please enter valid email address.");
	      $('#financialCreditorFormD [name="email"]').css('border',brdr);
	      $('#financialCreditorFormD [name="email"]').focus();
	      return false;
	    }   

	 if (operational_creditor_signature_val == "") 
	 {
	 if (operational_creditor_signature===0) 
	    {
	      $('#financialCreditorFormD [id="error_operational_creditor_signature"]').html("This field is required.");
	      $('#financialCreditorFormD [name="operational_creditor_signature"]').css('border',brdr);
	      $('#financialCreditorFormD [name="operational_creditor_signature"]').focus();
	      return false;
	    }
	    if (checkSize('operational_creditor_signature') > 1024) 
	    {
	     $("#error_operational_creditor_signature").show();	
	      $('#financialCreditorFormD [id="error_operational_creditor_signature"]').html("File size should be under 1 mb.");
	      $('#financialCreditorFormD [name="operational_creditor_signature"]').css('border',brdr);
	      $('#financialCreditorFormD [name="operational_creditor_signature"]').focus();
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
		      $('#financialCreditorFormD [id="error_operational_creditor_signature"]').html("File size should be under 1 mb.");
		      $('#financialCreditorFormD [name="operational_creditor_signature"]').css('border',brdr);
		      $('#financialCreditorFormD [name="operational_creditor_signature"]').focus();
		      return false;
		    }		
		}
	}


	if (name_block_letter=="") 
	    {
	      $('#financialCreditorFormD [id="error_name_block_letter"]').html("This field is required.");
	      $('#financialCreditorFormD [name="name_block_letter"]').css('border',brdr);
	      $('#financialCreditorFormD [name="name_block_letter"]').focus();
	      return false;
	    }

	  // if (name_block_letter.length > 80) 
	  //   {
	  //     $('#financialCreditorFormD [id="error_name_block_letter"]').html("Maximum 80 characters allowed.");
	  //     $('#financialCreditorFormD [name="name_block_letter"]').css('border',brdr);
	  //     $('#financialCreditorFormD [name="name_block_letter"]').focus();
	  //     return false;
	  //   }

	    if (relation_to_creditor=="") 
	    {
	      $('#financialCreditorFormD [id="error_relation_to_creditor"]').html("This field is required.");
	      $('#financialCreditorFormD [name="relation_to_creditor"]').css('border',brdr);
	      $('#financialCreditorFormD [name="relation_to_creditor"]').focus();
	      return false;
	    }

	  if (relation_to_creditor.length > 150) 
	    {
	      $('#financialCreditorFormD [id="error_relation_to_creditor"]').html("Maximum 150 characters allowed.");
	      $('#financialCreditorFormD [name="relation_to_creditor"]').css('border',brdr);
	      $('#financialCreditorFormD [name="relation_to_creditor"]').focus();
	      return false;
	    }

	    if (address_person_signing=="") 
	    {
	      $('#financialCreditorFormD [id="error_address_person_signing"]').html("This field is required.");
	      $('#financialCreditorFormD [name="address_person_signing"]').css('border',brdr);
	      $('#financialCreditorFormD [name="address_person_signing"]').focus();
	      return false;
	    }

	  if (address_person_signing.length > 200) 
	    {
	      $('#financialCreditorFormD [id="error_address_person_signing"]').html("Maximum 200 characters allowed.");
	      $('#financialCreditorFormD [name="address_person_signing"]').css('border',brdr);
	      $('#financialCreditorFormD [name="address_person_signing"]').focus();
	      return false;
	    }
	 

	return true;
}

function check1()
{
	//var any_dispute_deatails = $('#financialCreditorFormD [name="any_dispute_deatails"]').val();
 	//var debt_incurred_details = $('#financialCreditorFormD [name="debt_incurred_details"]').val();

	 //  if (any_dispute_deatails=="") 
	 //    {
	 //      $('#financialCreditorFormD [id="error_any_dispute_deatails"]').html("This field is required.");
	 //      $('#financialCreditorFormD [name="any_dispute_deatails"]').css('border',brdr);
	 //      $('#financialCreditorFormD [name="any_dispute_deatails"]').focus();
	 //      return false;
	 //    }

	 // if (debt_incurred_details=="") 
	 //    {
	 //      $('#financialCreditorFormD [id="error_debt_incurred_details"]').html("This field is required.");
	 //      $('#financialCreditorFormD [name="debt_incurred_details"]').css('border',brdr);
	 //      $('#financialCreditorFormD [name="debt_incurred_details"]').focus();
	 //      return false;
	 //    }   
	 return true;
}

function check2()
{
	return true;
}
