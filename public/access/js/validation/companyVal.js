
function getClosingDate(start)
{

  var startDt = $('#'+start).val(); 
     var mmDt = moment(startDt).add('days', 180);
     var clDt = mmDt.format('YYYY-MM-DD');
     $("#end_date").val(clDt);
}

jQuery(document).ready(function($) {
 $('#insolvency_commencement_date').bind('keypress', function(e) {
    e.preventDefault(); 
});
});


function openmodal(input) 
  {
    console.log("df")
    var commencement_date = $("#insolvency_commencement_date").val();
    jQuery.noConflict();
    $('#myModal').modal('show');
  }

function getDate()
{
  //var order_receving_date = $("#order_receving_date").val();
  //var claim_last_date = $("#claim_last_date").val();
  $('#CoverStartDateOtherPickerDiv').hide();
  var value = $( 'input[name=orderOption]:checked' ).val();
  console.log(value);
  if (value=='commencement') 
  {
      $('#CoverStartDateOtherPickerDiv').hide();
      var startDt = $("#insolvency_commencement_date").val();

      var mm2Dt = moment(startDt).add('days', 14);
     var cl2Dt = mm2Dt.format('YYYY-MM-DD');    
     $("#claim_filing_date").val(cl2Dt);
      $("#order_receving_date").val(startDt);
      //console.log(commencement_date);
  }
  else
  {
      $('#CoverStartDateOtherPickerDiv').show();
  }
}  

  

function companyVal()
{
	 var name = $("#name").val();
  	var status = $("#status").val();
    var address = $("#address").val();

  if (name=="") 
    {
      $("#error_name").html("Please enter name");
      $("#name").css('border',brdr);
      $("#name").focus();
      return false;
    }

    if (name.length > 150) 
    {
      $("#error_name").html("Maximum 150 characters allowed.");
      $("#name").css('border',brdr);
      $("#name").focus();
      return false;
    }

    if (address=="") 
    {
      $("#error_address").html("Please enter address");
      $("#address").css('border',brdr);
      $("#address").focus();
      return false;
    }

    // if (address.length > 50) 
    // {
    //   $("#error_address").html("Maximum 150 characters allowed.");
    //   $("#address").css('border',brdr);
    //   $("#address").focus();
    //   return false;
    // }

      if (status=="") 
    {
      $("#error_status").html("Please select status");
      $("#status").css('border',brdr);
      $("#status").focus();
      return false;
    }  
      
}