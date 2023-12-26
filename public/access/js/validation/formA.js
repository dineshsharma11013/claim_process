
function addRow(primary_div, secondary_div)
{
  //alert('df')
  var epath = admin_pth+"/get-formA-row/";
  var length = $("div."+secondary_div).length;
  console.log($("div."+secondary_div).length)
  
  //console.log(secondary_div);


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
          type:'get',  
              url:epath,
              data:{length:length},
              cache: false,
              success:function(data){
               // console.log(data);

                $("#"+primary_div).append(data);
              },
              error:function(err)
              {
                console.log(err);
              }
      })
}

function updateFormA(cid, nm, vl)
{
  console.log(cid, nm, vl);

  var epath = admin_pth+"/update-creditor-class";

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
          type:'get',  
              url:epath,
              data:{cid:cid, nm:nm, vl:vl},
              cache: false,
              success:function(data){
                console.log(data);
                var obj = JSON.parse(data);
           
              },
              error:function(err)
              {
               // console.log(err);
                errorMsg(obj.message); 
              }
      })

}


function delRow(div, rowId=null, pth=null, btn=null, frm, errMsg)
{
  console.log(div)
 if (rowId!=null && pth!=null) 
    {
      var epath = admin_pth+pth+'/'+rowId;
     // var submit_btn_text=$("#"+btn).html();
      //console.log(btn, rowId, epath);
    swal({
    //title: "Are you sure?",
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) {  
     $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
              cache: false,
              beforeSend: function () {
             $("#"+btn).prop("disabled", true);;
              // $("#"+btn+row).html('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
                var obj = JSON.parse(data);
              if (obj.error) 
              {
                errorMsg(obj.message);  
              }
              else
              {
                successMsg(obj.message); 
                $("#"+div).remove();
              }
             
                },
        error : function(err)
        {
          console.log(err);
          errorMsg(obj.message);
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled");
              // $("#"+btn+row).removeAttr("disabled"),jQuery("#"+btn+row).html(submit_btn_text); 
            }

      
      }) 
  }})
    }
    else
    {
    $("#"+div).remove();
    }
}


function getCompanyDetail(fm, company_id)
{
  

  var epath = admin_pth+"/get-company-details/"+company_id;
  console.log(epath);
//  console.log(company_id);
  if (!company_id) 
  {
          $('#'+fm+' [id="assign_company_mdls_id"]').val('');
          $('#'+fm+' [id="corporate_debtor_address"]').val('');
            $('#'+fm+' [id="corporate_debtor_insolvency_date"]').val('');
            $('#'+fm+' [id="corporate_debtor_authority"]').val('');
            $('#'+fm+' [id="incorporation_date"]').val('');
            $('#'+fm+' [id="insolvency_closing_date"]').val('');
            $('#'+fm+' [id="claim_last_date"]').val('');

             $('#'+fm+' [id="insolvency_professional_name"]').val('');
            $('#'+fm+' [id="insolvency_professional_registration_number"]').val('');
            $('#'+fm+' [id="resolution_professional_email"]').val('');
            $('#'+fm+' [id="resolution_professional_address"]').val('');
            $('#'+fm+' [id="company_name"]').html('');
            $('#'+fm+' [id="commencement_date"]').html('');
            $('#'+fm+' [id="last_date"]').html('');
            $('#'+fm+' [id="interim_resolution_name"]').val('');
            $('#'+fm+' [id="ip_image"]').attr("src", '');
            $('#'+fm+' [id="ip_id"]').val('');
            $('#'+fm+' [id="ip_designation"]').val('');
            $('#'+fm+' [id="order_receving_date"]').val('');

    return false;
  }

  $.ajaxSetup({ 
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
          type:'get',  
              url:epath,
              cache: false,
              success:function(data){
                 console.log(data);   

                var obj1 = JSON.parse(data);
                console.log(obj1);
                             
               var obj = obj1.message;         
          if (obj.error) 
          {
            $('#'+fm+' [id="corporate_debtor_address"]').val('');
          }
          else
          {
            $('#'+fm+' [id="assign_company_mdls_id"]').val(obj.asnId);
            $('#'+fm+' [id="corporate_debtor_address"]').val(obj.address);
            $('#'+fm+' [id="corporate_debtor_insolvency_date"]').val(obj.insolvency_commencement_date);
            $('#'+fm+' [id="corporate_debtor_authority"]').val(obj.nclt);
            $('#'+fm+' [id="incorporation_date"]').val(obj.start_date);
            $('#'+fm+' [id="insolvency_closing_date"]').val(obj.end_date);
            $('#'+fm+' [id="claim_last_date"]').val(obj.claim_filing_date);
            $('#'+fm+' [id="order_receving_date"]').val(obj.order_receving_date);
       
            $('#'+fm+' [id="company_name"]').html(obj.name);
            $('[id="company_name"]').html(obj.name);
            $('#'+fm+' [id="commencement_date"]').html(obj.insolvency_commencement_date);
            $('#'+fm+' [id="last_date"]').html(obj.claim_filing_date);
            
            $('#'+fm+' [id="insolvency_professional_name"]').val(obj.first_name);
            $('#'+fm+' [id="insolvency_professional_registration_number"]').val(obj.ibbi_reg_no);
            $('#'+fm+' [id="resolution_professional_email"]').val(obj.email);
            $('#'+fm+' [id="resolution_professional_address"]').val(obj.ipAddress);
            $('#'+fm+' [id="interim_resolution_name"]').val(obj.first_name);
            $('#'+fm+' [id="ip_name"]').val(obj.first_name);
            if (obj.profile_pic!='') {
            $('#'+fm+' [id="ip_image"]').attr("src", base_path+'/public/access/media/general/'+obj.profile_pic);
             }
             else
             {
                $('#'+fm+' [id="ip_image"]').hide();
             }
            $('#'+fm+' [id="ip_id"]').val(obj.ip_id); 
            $('#'+fm+' [id="ip_designation"]').val(obj.designation);

          //   $("#"+fm)[0].reset();
          // successMsg(obj.message);    
          //   timeOut();
        }
                },
        error : function(err)
        {
          console.log(err);
          serverError();
        }
      
  }); 

}

function openmodal(input) 
  {
    console.log("df")
    var commencement_date = $("#corporate_debtor_insolvency_date").val();
    jQuery.noConflict();
    $('#myModal').modal('show');
  }




// $('#CoverStartDateOtherPickerDiv').hide();
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
      var startDt = $("#corporate_debtor_insolvency_date").val();

      var mm2Dt = moment(startDt).add('days', 14);
     var cl2Dt = mm2Dt.format('YYYY-MM-DD');    
     $("#claim_last_date").val(cl2Dt);
      $("#order_receving_date").val(startDt);
      //console.log(commencement_date);
  }
  else
  {
      $('#CoverStartDateOtherPickerDiv').show();
  }
}  


function formA()
{
	var corporate_debtor = $("#corporate_debtor").val();
	var incorporation_date = $("#incorporation_date").val();
	var corporate_debtor_authority = $("#corporate_debtor_authority").val();
	var corporate_debtor_identity_number = $("#corporate_debtor_identity_number").val();
	var corporate_debtor_address = $("#corporate_debtor_address").val();
	var corporate_debtor_insolvency_date = $("#corporate_debtor_insolvency_date").val();
	var insolvency_closing_date = $("#insolvency_closing_date").val();
	var insolvency_professional_name = $("#insolvency_professional_name").val();
	var insolvency_professional_registration_number = $("#insolvency_professional_registration_number").val();
	var resolution_professional_address = $("#resolution_professional_address").val();

	var resolution_professional_email = $("#resolution_professional_email").val();
	var correspondence_resolution_professional_address = $("#correspondence_resolution_professional_address").val();
	var correspondence_resolution_professional_email = $("#correspondence_resolution_professional_email").val();
	var claim_last_date = $("#claim_last_date").val();
	var authorized_forms = $("#authorized_forms").val();
	var authorized_details = $("#authorized_details").val();

  var interim_resolution_name = $("#interim_resolution_name").val();
  var file_value = $("#file_value").val();
  // var file = $("#file")[0].files.length; 
  var date = $("#date").val();
  var place = $("#place").val();

	if (corporate_debtor=="") 
    {
      $("#error_corporate_debtor").html("This field is required.");
      $("#corporate_debtor").css('border',brdr);
      $("#corporate_debtor").focus();
      return false;
    }

    // if (incorporation_date=="") 
    // {
    //   $("#error_incorporation_date").html("This field is required.");
    //   $("#incorporation_date").css('border',brdr);
    //   return false;
    // }

    // if (corporate_debtor_authority=="") 
    // {
    //   $("#error_corporate_debtor_authority").html("This field is required.");
    //   $("#corporate_debtor_authority").css('border',brdr);
    //   $("#corporate_debtor_authority").focus();
    //   return false;
    // }

    // if (corporate_debtor_identity_number=="") 
    // {
    //   $("#error_corporate_debtor_identity_number").html("This field is required.");
    //   $("#corporate_debtor_identity_number").css('border',brdr);
    //   $("#corporate_debtor_identity_number").focus();
    //   return false;
    // }

    // if (corporate_debtor_address=="") 
    // {
    //   $("#error_corporate_debtor_address").html("This field is required.");
    //   $("#corporate_debtor_address").css('border',brdr);
    //   $("#corporate_debtor_address").focus();
    //   return false;
    // }

    // if (corporate_debtor_insolvency_date=="") 
    // {
    //   $("#error_corporate_debtor_insolvency_date").html("This field is required.");
    //   $("#corporate_debtor_insolvency_date").css('border',brdr);
    //   // $("#corporate_debtor_insolvency_date").focus();
    //   return false;
    // }

    // if (insolvency_closing_date=="") 
    // {
    //   $("#error_insolvency_closing_date").html("This field is required.");
    //   $("#insolvency_closing_date").css('border',brdr);
    //   // $("#insolvency_closing_date").focus();
    //   return false;
    // }

    // if (insolvency_professional_name=="") 
    // {
    //   $("#error_insolvency_professional_name").html("This field is required.");
    //   $("#insolvency_professional_name").css('border',brdr);
    //   $("#insolvency_professional_name").focus();
    //   return false;
    // }

    // if (insolvency_professional_registration_number=="") 
    // {
    //   $("#error_insolvency_professional_registration_number").html("This field is required.");
    //   $("#insolvency_professional_registration_number").css('border',brdr);
    //   $("#insolvency_professional_registration_number").focus();
    //   return false;
    // }

    // if (resolution_professional_address=="") 
    // {
    //   $("#error_resolution_professional_address").html("This field is required.");
    //   $("#resolution_professional_address").css('border',brdr);
    //   $("#resolution_professional_address").focus();
    //   return false;
    // }

    // if (resolution_professional_email=="") 
    // {
    //   $("#error_resolution_professional_email").html("This field is required.");
    //   $("#resolution_professional_email").css('border',brdr);
    //   $("#resolution_professional_email").focus();
    //   return false;
    // }

    // if (IsEmail(resolution_professional_email)==false) 
    // {
    //   $("#error_resolution_professional_email").html("Please enter valid email address.");
    //   $("#resolution_professional_email").css('border',brdr);
    //   $("#resolution_professional_email").focus();
    //   return false;
    // }

    // if (correspondence_resolution_professional_address=="") 
    // {
    //   $("#error_correspondence_resolution_professional_address").html("This field is required.");
    //   $("#correspondence_resolution_professional_address").css('border',brdr);
    //   $("#correspondence_resolution_professional_address").focus();
    //   return false;
    // }

    // if (correspondence_resolution_professional_email=="") 
    // {
    //   $("#error_correspondence_resolution_professional_email").html("This field is required.");
    //   $("#correspondence_resolution_professional_email").css('border',brdr);
    //   $("#correspondence_resolution_professional_email").focus();
    //   return false;
    // }

    // if (IsEmail(correspondence_resolution_professional_email)==false) 
    // {
    //   $("#error_correspondence_resolution_professional_email").html("Please enter valid email address.");
    //   $("#correspondence_resolution_professional_email").css('border',brdr);
    //   $("#correspondence_resolution_professional_email").focus();
    //   return false;
    // }
    
    // if (claim_last_date=="") 
    // {
    //   $("#error_claim_last_date").html("This field is required.");
    //   $("#claim_last_date").css('border',brdr);
    //   return false;
    // }

    // if (authorized_forms=="") 
    // {
    //   $("#error_authorized_forms").html("This field is required.");
    //   $("#authorized_forms").css('border',brdr);
    //   $("#authorized_forms").focus();
    //   return false;
    // }

    // if (authorized_details=="") 
    // {
    //   $("#error_authorized_details").html("This field is required.");
    //   $("#authorized_details").css('border',brdr);
    //   $("#authorized_details").focus();
    //   return false;
    // }

    // if (interim_resolution_name=="") 
    // {
    //   $("#error_interim_resolution_name").html("This field is required.");
    //   $("#interim_resolution_name").css('border',brdr);
    //   $("#interim_resolution_name").focus();
    //   return false;
    // }

  //   if (file_value=="") 
  //   {
  //   if (file=="") 
  //   {
  //     $("#error_file").html("Please upload signaure.");
  //     $("#file").css('border',brdr);
  //     $("#file").focus();
  //     return false;
  //   }
  // }

    if (date=="") 
    {
      $("#error_date").html("This field is required.");
      $("#date").css('border',brdr);
      return false;
    }

    if (place=="") 
    {
      $("#error_place").html("This field is required.");
      $("#place").css('border',brdr);
      $("#place").focus();
      return false;
    }



}