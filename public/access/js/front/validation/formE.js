

function myFunction3()
{
  //console.log("adsf");
  //console.log($('#myTable2 tr').length);
  var count = $('#myTable2 tr').length;
  //if (count <= 2) {
  var table2 = $("#myTable2");
  var rowcount2 = $('#myTable2 tr').length + 1;
  var newrow2 = `
    <tr>
      <th scope="row`+rowcount2 +`"></th>
      <td>
          <select class="form-select" name="emp_type[]" id="emp_type`+rowcount2 +`" autocomplete="off">
                          <option value="">--Select--</option>
                          <option value="employee">Employee</option>
                          <option value="workman">Workman</option> 
                       </select>
                   
      </td>
      <td><input type="text" placeholder="enter details" name="employee_name[]" id="employee_name`+rowcount2 +`"></td>
      <td> <select class="form-select" aria-label="Default select example" name="id_number[]" id="id_number`+rowcount2 +`">
                          <option selected>--Select--</option>
                          <option value="1">Pan card</option>
                          <option value="2">Passport</option>
                          <option value="3">Aadhar card</option>
                       </select>
                       <input type="text" placeholder="enter details" name="id_details[]" id="id_details`+rowcount2 +`">

</td>
      <td><input type="text" name="total_amt[]" id="total_amt`+rowcount2 +`" placeholder="enter details"></td>
      <td><input type="text" name="due_amt_period[]" id="due_amt_period`+rowcount2 +`" placeholder="enter details"></td>
    </tr>`;

    $(table2).append(newrow2);
//}
//console.log($('#myTable2 tr').length);
}


function del2()
{
 $('#myTable2 tr:last').remove();
}

function declaration(place, fid, updated_data, signPth=false, signDiv=false)
{

	var epath = b_pth+'/get-formE-declaration';
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
  var epath = b_pth+'/get-formE-preview';
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
                 $("#formEPreview").html(data); 
                 $(window).scrollTop(0);
                },
        error : function(err)
        {
          console.log(err);
        },

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

function check0()
{
	var operational_creditor_signature = $("#operational_creditor_signature")[0].files.length;
 	var operational_creditor_signature_val = $('#financialCreditorFormE [name="operational_creditor_signature_val"]').val();

	  if (operational_creditor_signature_val == "") 
	 {
	 if (operational_creditor_signature===0) 
	    {
	      $('#financialCreditorFormE [id="error_operational_creditor_signature"]').html("This field is required.");
	      $('#financialCreditorFormE [name="operational_creditor_signature"]').css('border',brdr);
	      $('#financialCreditorFormE [name="operational_creditor_signature"]').focus();
	      return false;
	    }
	    if (checkSize('operational_creditor_signature') > 1024) 
	    {
	     $("#error_operational_creditor_signature").show();	
	      $('#financialCreditorFormE [id="error_operational_creditor_signature"]').html("File size should be under 1 mb.");
	      $('#financialCreditorFormE [name="operational_creditor_signature"]').css('border',brdr);
	      $('#financialCreditorFormE [name="operational_creditor_signature"]').focus();
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
		      $('#financialCreditorFormE [id="error_operational_creditor_signature"]').html("File size should be under 1 mb.");
		      $('#financialCreditorFormE [name="operational_creditor_signature"]').css('border',brdr);
		      $('#financialCreditorFormE [name="operational_creditor_signature"]').focus();
		      return false;
		    }		
		}
	}


	 return true;
}

function check1()
{
	return true;
}

function check2()
{
	return true;
}
