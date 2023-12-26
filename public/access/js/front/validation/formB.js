
console.log('form b');





function getTotal(pr, int, ttl)
{
  //console.log(pr);
  var pr_amt = $("#"+pr).val();
  var int_amt = $("#"+int).val();
  var ttl_amt = $("#"+ttl).val();
   //console.log(pr_amt, int_amt); 
  
  if (pr_amt) 
  {
    if (int_amt) 
    {
     ttl_amt = parseFloat(pr_amt) + parseFloat(int_amt); 
    $("#"+ttl).val(ttl_amt);
    }
    else
    {
    $("#"+ttl).val(pr_amt);
    }
  }
}


function declaration(place, fid, updated_data, signPth=false, signDiv=false)
{


  var epath = b_pth+'/get-formB-declaration';
    console.log(epath, updated_data);

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


//   var epath = b_pth+'/get-formB-declaration-reg';
//     console.log(epath);

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//             type:'get',  
//                 url:epath,
//                 data:{fid:fid, form:'view'},
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
  var epath = b_pth+'/get-formb-preview';
  console.log(epath, fid);

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
	$('#operationalCreditorForm input[name="'+nm+'_2"]').val(val);
	$('#operationalCreditorForm input[name="signing_person_name"]').val(val.toUpperCase());	
	$('#operationalCreditorForm span[id="signing_person_name_2"]').html(val.toUpperCase());	
	$('#operationalCreditorForm span[id="'+nm+'"]').html(val);	
	
}

function getAddress(fm, nm, val)
{
	//$('#operationalCreditorForm input[name="'+nm+'_2"]').val(val);
	
	$('#operationalCreditorForm input[name="operational_creditor_correspondence_address"]').val(val);
	$('#operationalCreditorForm span[id="'+nm+'_2"]').html(val);
	$('#'+fm+' span[id="'+nm+'"]').html(val);

}

function getData(fm, nm, val)
{
	//console.log(fm, nm, val);
	$('#'+fm+' span[id="'+nm+'"]').html(val);
}

function check0()
{
	var operational_creditor_name = $('#operationalCreditorForm [name="operational_creditor_name"]').val();
 	var operational_creditor_address = $('#operationalCreditorForm [name="operational_creditor_address"]').val();
 	var identification_number = $('#operationalCreditorForm [name="identification_number"]').val();
 	var operational_creditor_email = $('#operationalCreditorForm [name="operational_creditor_email"]').val();
 	var total_amount = $('#operationalCreditorForm [name="total_amount"]').val();
 	var principle_amount = $('#operationalCreditorForm [name="principle_amount"]').val();
 	var interest = $('#operationalCreditorForm [name="interest"]').val();
 	

	  if (operational_creditor_name=="") 
	    {
	      $('#operationalCreditorForm [id="error_operational_creditor_name"]').html("This field is required.");
	      $('#operationalCreditorForm [name="operational_creditor_name"]').css('border',brdr);
	      $('#operationalCreditorForm [name="operational_creditor_name"]').focus();
	      return false;
	    }

	    if (operational_creditor_name.length > 60) 
	    {
	      $('#operationalCreditorForm [id="error_operational_creditor_name"]').html("Please entery correct name.");
	      $('#operationalCreditorForm [name="operational_creditor_name"]').css('border',brdr);
	      $('#operationalCreditorForm [name="operational_creditor_name"]').focus();
	      return false;
	    }

	// if (operational_creditor_address == "") 
	//     {
	//       $('#operationalCreditorForm [id="error_operational_creditor_address"]').html("This field is required.");
	//       $('#operationalCreditorForm [name="operational_creditor_address"]').css('border',brdr);
	//       $('#operationalCreditorForm [name="operational_creditor_address"]').focus();
	//       return false;
	//     }

	//     if (operational_creditor_address.length > 150) 
	//     {
	//       $('#operationalCreditorForm [id="error_operational_creditor_address"]').html("Please enter correct address.");
	//       $('#operationalCreditorForm [name="operational_creditor_address"]').css('border',brdr);
	//       $('#operationalCreditorForm [name="operational_creditor_address"]').focus();
	//       return false;
	//     }    

	    if (identification_number.length > 100) 
	    {
	      $('#operationalCreditorForm [id="error_identification_number"]').html("Maximum 100 characters allowed.");
	      $('#operationalCreditorForm [name="identification_number"]').css('border',brdr);
	      $('#operationalCreditorForm [name="identification_number"]').focus();
	      return false;
	    }

	    if (operational_creditor_email=="") 
	    {
	      $('#operationalCreditorForm [id="error_operational_creditor_email"]').html("This field is required.");
	      $('#operationalCreditorForm [name="operational_creditor_email"]').css('border',brdr);
	      $('#operationalCreditorForm [name="operational_creditor_email"]').focus();
	      return false;
	    }

	    if (operational_creditor_email.length > 60) 
	    {
	      $('#operationalCreditorForm [id="error_operational_creditor_email"]').html("Please enter valid email address.");
	      $('#operationalCreditorForm [name="operational_creditor_email"]').css('border',brdr);
	      $('#operationalCreditorForm [name="operational_creditor_email"]').focus();
	      return false;
	    }

	    if (IsEmail(operational_creditor_email) == false) 
	    {
	      $('#operationalCreditorForm [id="error_operational_creditor_email"]').html("Please enter valid email address.");
	      $('#operationalCreditorForm [name="operational_creditor_email"]').css('border',brdr);
	      $('#operationalCreditorForm [name="operational_creditor_email"]').focus();
	      return false;
	    }

	    // if (principle_amount=="") 
	    // {
	    //   $('#operationalCreditorForm [id="error_principle_amount"]').html("This field is required.");
	    //   $('#operationalCreditorForm [name="principle_amount"]').css('border',brdr);
	    //   $('#operationalCreditorForm [name="principle_amount"]').focus();
	    //   return false;
	    // }

	    // if (principle_amount.length > 30) 
	    // {
	    //   $('#operationalCreditorForm [id="error_principle_amount"]').html("Please enter correct amount.");
	    //   $('#operationalCreditorForm [name="principle_amount"]').css('border',brdr);
	    //   $('#operationalCreditorForm [name="principle_amount"]').focus();
	    //   return false;
	    // }

	    // if (interest=="") 
	    // {
	    //   $('#operationalCreditorForm [id="error_interest"]').html("This field is required.");
	    //   $('#operationalCreditorForm [name="interest"]').css('border',brdr);
	    //   $('#operationalCreditorForm [name="interest"]').focus();
	    //   return false;
	    // }

	    // if (interest.length > 30) 
	    // {
	    //   $('#operationalCreditorForm [id="error_interest"]').html("Please enter correct amount.");
	    //   $('#operationalCreditorForm [name="interest"]').css('border',brdr);
	    //   $('#operationalCreditorForm [name="interest"]').focus();
	    //   return false;
	    // }

	    // if (total_amount=="") 
	    // {
	    //   $('#operationalCreditorForm [id="error_total_amount"]').html("This field is required.");
	    //   $('#operationalCreditorForm [name="total_amount"]').css('border',brdr);
	    //   $('#operationalCreditorForm [name="total_amount"]').focus();
	    //   return false;
	    // }

	    // if (total_amount.length > 30) 
	    // {
	    //   $('#operationalCreditorForm [id="error_total_amount"]').html("Please enter correct amount.");
	    //   $('#operationalCreditorForm [name="total_amount"]').css('border',brdr);
	    //   $('#operationalCreditorForm [name="total_amount"]').focus();
	    //   return false;
	    // }

	return true;
}


function check1()
{

 	var account_number = $('#operationalCreditorForm [name="account_number"]').val();
 	var bank_name = $('#operationalCreditorForm [name="bank_name"]').val();
 	var ifsc_code = $('#operationalCreditorForm [name="ifsc_code"]').val();

 	var operational_creditor_signature = $("#operational_creditor_signature")[0].files.length;
 	var operational_creditor_signature_val = $('#operationalCreditorForm [name="operational_creditor_signature_val"]').val();

 	var claimant_name = $('#operationalCreditorForm [name="claimant_name"]').val();
 	var signing_person_address = $('#operationalCreditorForm [name="signing_person_address"]').val();

 	var creditor_relation = $('#operationalCreditorForm [name="creditor_relation"]').val();
	
 	if (account_number.length > 30) 
	    {
	      $('#operationalCreditorForm [id="error_account_number"]').html("Maximum 30 characters allowed.");
	      $('#operationalCreditorForm [name="account_number"]').css('border',brdr);
	      $('#operationalCreditorForm [name="account_number"]').focus();
	      return false;
	    }

	if (bank_name.length > 70) 
	    {
	      $('#operationalCreditorForm [id="error_bank_name"]').html("Maximum 70 characters allowed.");
	      $('#operationalCreditorForm [name="bank_name"]').css('border',brdr);
	      $('#operationalCreditorForm [name="bank_name"]').focus();
	      return false;
	    }
	
	if (ifsc_code.length > 50) 
	    {
	      $('#operationalCreditorForm [id="error_ifsc_code"]').html("Maximum 30 characters allowed.");
	      $('#operationalCreditorForm [name="ifsc_code"]').css('border',brdr);
	      $('#operationalCreditorForm [name="ifsc_code"]').focus();
	      return false;
	    }        

	 if (operational_creditor_signature_val == "") 
	 {
	 if (operational_creditor_signature===0) 
	    {
	      $('#operationalCreditorForm [id="error_operational_creditor_signature"]').html("This field is required.");
	      $('#operationalCreditorForm [name="operational_creditor_signature"]').css('border',brdr);
	      $('#operationalCreditorForm [name="operational_creditor_signature"]').focus();
	      return false;
	    }
	    if (checkSize('operational_creditor_signature') > 1024) 
	    {
	     $("#error_operational_creditor_signature").show();	
	      $('#operationalCreditorForm [id="error_operational_creditor_signature"]').html("File size should be under 1 mb.");
	      $('#operationalCreditorForm [name="operational_creditor_signature"]').css('border',brdr);
	      $('#operationalCreditorForm [name="operational_creditor_signature"]').focus();
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
		      $('#operationalCreditorForm [id="error_operational_creditor_signature"]').html("File size should be under 1 mb.");
		      $('#operationalCreditorForm [name="operational_creditor_signature"]').css('border',brdr);
		      $('#operationalCreditorForm [name="operational_creditor_signature"]').focus();
		      return false;
		    }		
		}
	}

	if (claimant_name == "") 
	    {
	      $('#operationalCreditorForm [id="error_claimant_name"]').html("This field is required.");
	      $('#operationalCreditorForm [name="claimant_name"]').css('border',brdr);
	      $('#operationalCreditorForm [name="claimant_name"]').focus();
	      return false;
	    }

	if (claimant_name.length > 70) 
	    {
	      $('#operationalCreditorForm [id="error_claimant_name"]').html("Maximum 70 characters allowed.");
	      $('#operationalCreditorForm [name="claimant_name"]').css('border',brdr);
	      $('#operationalCreditorForm [name="claimant_name"]').focus();
	      return false;
	    }


	if (creditor_relation.length > 255) 
	    {
	      $('#operationalCreditorForm [id="error_creditor_relation"]').html("Maximum 255 characters allowed.");
	      $('#operationalCreditorForm [name="creditor_relation"]').css('border',brdr);
	      $('#operationalCreditorForm [name="creditor_relation"]').focus();
	      return false;
	    } 

	// if (signing_person_address == "") 
	//     {
	//       $('#operationalCreditorForm [id="error_signing_person_address"]').html("This field is required.");
	//       $('#operationalCreditorForm [name="signing_person_address"]').css('border',brdr);
	//       $('#operationalCreditorForm [name="signing_person_address"]').focus();
	//       return false;
	//     }

	// if (signing_person_address.length > 70) 
	//     {
	//       $('#operationalCreditorForm [id="error_signing_person_address"]').html("Maximum 70 characters allowed.");
	//       $('#operationalCreditorForm [name="signing_person_address"]').css('border',brdr);
	//       $('#operationalCreditorForm [name="signing_person_address"]').focus();
	//       return false;
	//     }    


	 return true;
}

function decl()
{
	var place = $('#operationalCreditorForm [name="place"]').val();

	// if (place == "") 
	//     {
	//       $('#operationalCreditorForm [id="error_signing_person_address"]').html("This field is required.");
	//       $('#operationalCreditorForm [name="signing_person_address"]').css('border',brdr);
	//       $('#operationalCreditorForm [name="signing_person_address"]').focus();
	//       return false;
	//     }

	if (place.length > 100) 
	    {
	      $('#operationalCreditorForm [id="error_place"]').html("Maximum 100 characters allowed.");
	      $('#operationalCreditorForm [name="place"]').css('border',brdr);
	      $('#operationalCreditorForm [name="place"]').focus();
	      return false;
	    }  

}

function check2()
{
	// var work_purchase_order_file = $("#work_purchase_order_file")[0].files.length;
	// if (work_purchase_order_file != 0) 
	// {
	// if (checkSize('work_purchase_order_file') > 1024); 
	//     {
	//       $('#operationalCreditorForm [id="error_work_purchase_order_file"]').html("File size should be under 1 mb.");
	//       $('#operationalCreditorForm [name="work_purchase_order_file"]').css('border',brdr);
	//       $('#operationalCreditorForm [name="work_purchase_order_file"]').focus();
	//       return false;
	//     }
	// }    
	return true;
}


