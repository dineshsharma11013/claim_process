
  

  var umb = document.getElementById('value_number_skdk').value;

function myFunction() {
alert
 umb++;

var html = "<tr id='rem_"+umb+"'><td><input type='text' name='document_name[]' placeholder='enter document name'></td><br>";
html += "<td><input name='document_image[]' type='file' required></td>";
html  += "<td><button onclick='del("+umb+")' class='btn btn-danger '>delete</button></td></tr>";
 
  $('#mytable').append(html);

  

}

function del(d) { 
  
  document.getElementById("rem_"+d+"").remove();
}

function handleChange(id,hide_id)
{
  //alert(id);
  // if(!$("#"+id).prop('required')){ 
  // $("#"+id).prop('required',true);
 
  // }else{
  //   $("#"+id).prop('required',false);
  // }
  
  $("#"+id).toggle();

  $("#"+hide_id).remove();
}



  var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
     $('.formbutton').show();
$('.submitbutton').hide();
  } else {
    document.getElementById("prevBtn").style.display = "inline";
    $('.formbutton').show();
$('.submitbutton').hide();
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";

$('.formbutton').hide();
$('.submitbutton').show();

  //  $('#myModal').modal('show');
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
 
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";

  if(currentTab == 0){
   

  }
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  document.body.scrollTop=document.documentElement.scrollTop=0;


  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = true;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}





  $('#frmsubmit').on('submit',function(e){
			e.preventDefault();
   
      var name = $('#name').val();
      var pancard = $('#pancard').val();
      var passport = $('#passport').val();
      var voter_id = $('#voter_id').val();
      var address = $('#address').val();
      var email = $('#email').val();
      var total_amount = $('#total_amount').val();
      var principle = $('#principle').val();
      var interest = $('#interest').val();
      var claim_details = $('#details_of_documents').val();
      var dispute = $('#dispute').val();
      var claim_arose = $('#claim_arose').val();
      var mutual_credit = $('#mutual_credit').val();
      var account_number = $('#account_number').val();
      var bank_name = $('#bank_name').val();
      var ifsc = $('#ifsc').val();
      var block_letter = $('#block_letter').val();
      var relation_to_creditor = $('#relation_to_creditor').val();
      var address_person_signing = $('#address_person_signing').val();
    
    $.ajax({
      url:$(this).attr('action'), 
			type:"POST",
			data:new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			dataType: 'json',
      beforeSend : function(){
        // Show image container
        $( ".nextbtn_panding" ).html("pandding...");
        },
			success:function(data){
		    if(data.status=='success'){
          
          $('.name_append').html(name);
          $('.pancard_append').html(pancard);
          $('.passport_append').html(passport);
          $('.voter_id_append').html(voter_id);
          $('.address_append').html(address);
          $('.email_append').html(email);
          $('.total_amount_append').html(total_amount);
          $('.principle_append').html(principle);
          $('.interest_append').html(interest);
          $('.claim_details_append').html(claim_details);
          $('.dispute_append').html(dispute);
          $('.claim_arose_append').html(claim_arose);
          $('.mutial_credit_append').html(mutual_credit);
          $('.account_number_append').html(account_number);
          $('.bank_name_append').html(bank_name);
          $('.ifsc_append').html(ifsc);
          $('.block_letter_append').html(block_letter);
          $('.relation_creditor_append').html(relation_to_creditor);
          $('.person_signing_append').html(address_person_signing);


          $('.date_value').html(data.day+'-'+data.month+'-20'+data.year);
          $('.dateadd').html(data.day+'-'+data.month+'-20'+data.year);
          
       
          if(data.signature != ''){
          $(".image_append").attr('src', b_pth+'/'+data.signature);
          }
          // document.getElementById("nextbtn_").click();
          $('#nextbtn_').click();
          $( ".nextbtn_panding" ).html("next");
          // $('#some-id').trigger('click');
          // $(".nextbtn").off('click');   
     
          // $('.nextbtn_').removeAttr('nextbtn_');

        
        
        }else if(data.status == 'error'){
          $( ".nextbtn_panding" ).html("next");
          $.each(data.msg,function(key,val){
         
          $('#alert_'+key).html(val);
          // $('#'+key).attr("border","solid red 10px");
          $("#"+key).css("border","solid 1px red");
          $('html, body').animate({
          scrollTop: $("#alert_"+key).offset().top-300
          }, 10);

        });
      
        }
		  }

			});
 


    });
 
  $( document ).ready(function() {
  $('#submitdocshdjsdvc').on('submit',function(event){
    event.preventDefault();

    $.ajax({
      url:$(this).attr('action'),
			type:"POST",
			data:new FormData(this),
			contentType: false,
			cache: true,
			processData:false,
   
      beforeSend : function(){
        // Show image container
        $( ".next_padding_image" ).html("pandding...");
        },
  
			success:function(data){
		    console.log(data.html);
        $('#append_html_code').html(data.html);
        $( ".next_padding_image" ).html("next");
        $('#nextbtn_sec').click();
  
      }
		  });

			});
 


    });


  function name_v(name){
    $('#alert_name').html('');
    var cap_name = name.toUpperCase();
    $('#block_letter').val(cap_name);
    $("#name").css("border","solid 1px #ced4da");
    $('#name_user').html(name);
    

  }
  // function pancard_v(){
  //   $('#alert_pancard').html('');
  //   $("#pancard").css("border","solid 1px #ced4da");
  // }
  // function passport_v(){
  //   $('#alert_passport').html('');
  //   $("#passport").css("border","solid 1px #ced4da");
  // }
  // function voter_id_v(){
  //   $('#alert_voter_id').html('');
  //   $("#voter_id").css("border","solid 1px #ced4da");
  // }
  // function aadhar_v(){
  //   $('#alert_aadhar').html('');
  //   $("#aadhar").css("border","solid 1px #ced4da");
  // }
  // function address_v(){
  //   $('#alert_address').html('');
  //   $("#address").css("border","solid 1px #ced4da");
  // }
  // function email_v(){
  //   $('#alert_email').html('');
  //   $("#email").css("border","solid 1px #ced4da");
  // }
  // function total_amount_v(){
  //   $('#alert_total_amount').html('');
  //   $("#total_amount").css("border","solid 1px #ced4da");
  // }
  // function principle_v(){
  //   $('#alert_principle').html('');
  //   $("#principle").css("border","solid 1px #ced4da");
  // }
  // function interest_v(){
  //   $('#alert_interest').html('');
  //   $("#interest").css("border","solid 1px #ced4da");
  // }
  // function details_of_documents_v(){
  //   $('#alert_details_of_documents').html('');
  //   $("#details_of_documents").css("border","solid 1px #ced4da");
  // }
  // function dispute_v(){
  //   $('#alert_dispute').html('');
  //   $("#dispute").css("border","solid 1px #ced4da");
  // }
  // function claim_v(){
  //   $('#alert_claim').html('');
  //   $("#claim").css("border","solid 1px #ced4da");
  // }
  // function mutual_credit_v(){
  //   $('#alert_mutual_credit').html('');
  //   $("#mutual_credit").css("border","solid 1px #ced4da");
  // }

  // function account_number_v(){
  //   $('#alert_account_number').html('');
  //   $("#account_number").css("border","solid 1px #ced4da");
  // }
    
  // function bank_name_v(){
  //   $('#alert_bank_name').html('');
  //   $("#bank_name").css("border","solid 1px #ced4da");
  // }
    
  // function ifsc_v(){
  //   $('#alert_ifsc').html('');
  //   $("#ifsc").css("border","solid 1px #ced4da");
  // }
    
  // function name_block_letter_v(){
  //   $('#alert_name_block_letter').html('');
  //   $("#name_block_letter").css("border","solid 1px #ced4da");
  // }
  // function relation_to_creditor_v(){
  //   $('#alert_relation_to_creditor').html('');
  //   $("#relation_to_creditor").css("border","solid 1px #ced4da");
  // }
  // function address_person_signing_v(){
  //   $('#alert_address_person_signing').html('');
  //   $("#address_person_signing").css("border","solid 1px #ced4da");
  // }
//   function signature_v(){
//     $('#alert_signature').html('');
//     $("#signature").css("border","solid 1px #ced4da");
//   }
    
$('.fileUpload1').change(function (e) {
    $('#alert_signature').html('');
    $(".fileUpload1").css("border","solid 1px #ced4da");
});
    
function remove_image_del(id){
 
  $.ajax({
    url:'delete_multi_docs',
    type:"get",
  
    data:  {'id':id},
      success:function(data){
      if(data.status=='delete'){
         $('#delete_multi'+id).remove();
         
	  }
   
	
	}

});

}
 

function fianl_submit_form(){
 $.ajax({
  url:'form_final_submit_',
  type:'get',
  success:function(data){
    if(data.status=='success'){

      $('#successfull_message').html("<p style='color:green'>Form is successfully submit</p>");
      window.location.href='{{url("")}}';
    }
  }
 });
}


function append_delete_btn(){
  $.ajax({
    url:'get_multidocs_delete_append',
    type:'get',
    beforeSend : function(){
      // Show image container
      $( ".for_pandding_btn" ).html("pandding...");
      },
    success:function(data){
      if(data.status=='success'){
         $('.delete_row_nnn').remove();
         $('#mytable').html(data.data);
         $( ".for_pandding_btn" ).html("next");
         $('.prious_btn_c').click();
      }else{
        $( ".for_pandding_btn" ).html("next");
      }
    }
  });
}