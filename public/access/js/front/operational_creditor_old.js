console.log("hello world1s");
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
  
  var x = document.getElementsByClassName("tab");
  
  x[currentTab].style.display = "none";
  
  currentTab = currentTab + n;
  
  // if (currentTab >= x.length) {
  
  //   document.getElementById("operationalCreditorForm").submit();
  //   return false;
  // }
  console.log(x.length, currentTab);
  if (currentTab == 1) {
    checkFirst();
  }
  
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

function saveData(fm, btn, pth, mtd)
{
  console.log("clicked");
  var method = "";

  if (mtd() != false) 
  {  

   var formData = new FormData($('#'+fm)[0]);
   var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  console.log(epath);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'post',  
              url:epath,
              data:formData,
              cache: false,
              contentType: false,  
                processData:false,
              beforeSend: function () {
             $("#"+btn).prop("disabled", true);; 
              $("#"+btn).html('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
            var obj = JSON.parse(data);
            Msg(obj.error,obj.cls, obj.message, fm, 'errMessage_'+fm);
                },
        error : function(err)
        {
          console.log(err);
          serverErrorMsg('errMessage_'+fm);
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}



