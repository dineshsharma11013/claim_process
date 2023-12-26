
function UserValidate()
{

  var address = $("#address").val();
  var email = $("#email").val();
  var name = $("#name").val();
  var password = $("#password").val();
  // var logo = $("#file")[0].files.length;
  var unique_id = $("#unique_id").val();
  var mobile = $("#mobile").val();
  var status = $("#status").val();
 

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

    // if (address=="") 
    // {
    //   $("#error_address").html("Please enter address");
    //   $("#address").css('border',brdr);
    //   $("#address").focus();
    //   return false;
    // }

    if (email=="") 
    {
      $("#error_email").html("Please enter email");
      $("#email").css('border',brdr);
      $("#email").focus();
      return false;
    }

     if (IsEmail(email)==false) 
    {
      $("#error_email").html("Please enter valid email address.");
      $("#email").css('border',brdr);  
      $("#email").focus();
      return false;
    }

    //  if (mobile=="") 
    // {
    //   $("#error_mobile").html("Please enter contact number.");
    //   $("#mobile").css('border',brdr);
    //   $("#mobile").focus();
    //   return false;
    // }
    // if (IsMobile(mobile)==false) 
    // {
    //   $("#error_mobile").html("Please enter valid phone number.");
    //   $("#mobile").css('border',brdr);  
    //   $("#mobile").focus();
    //   return false;
    // }

     if (mobile.length >= 11) 
    {
      $("#error_mobile").html("Please enter 10 digit contact number.");
      $("#mobile").css('border',brdr);
      $("#mobile").focus();
      return false;
    }

    
    if (unique_id=="") 
    {
      $("#error_unique_id").html("Please enter username");
      $("#unique_id").css('border',brdr);
      $("#unique_id").focus();
      return false;
    }

    if (unique_id.length > 150) 
    {
      $("#error_unique_id").html("Maximum 150 characters allowed.");
      $("#unique_id").css('border',brdr);
      $("#unique_id").focus();
      return false;
    }

    
    if (password=="") 
    {
      $("#error_password").html("Please enter password");
      $("#password").css('border',brdr);
      $("#password").focus();
      return false;
    }

    if (status=="") 
    {
      $("#error_status").html("Please select status");
      $("#status").css('border',brdr);
      $("#status").focus();
      return false;
    }
   
}



// function loadFile(errId)
// {
//   $("#"+errId).hide();
// }

 

function uploadUser(fm,btn,pth)
{
    var profile = $("#file")[0].files.length;
    if (profile===0) 
          {
            $("#error_profile").html("Please select file.");
            $("#file").focus();
            return false;       
          }
    var formData = new FormData($('#'+fm)[0]);
    var submit_btn_text=$("#"+btn).html();   
    var epath = admin_pth+pth;
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
                // dataType:"text",
                cache: false,
                contentType: false,  
                processData:false,
                beforeSend: function () {
               $("#"+btn).prop("disabled", true);; 
                $("#"+btn).html('Please wait...'); 
              },
                success:function(data){
                  console.log(data)
                
                
                   var obj = JSON.parse(data);
            if (obj.error) 
            {

              errorMsg(obj.message);
            }
            else
            {
              $("#"+fm)[0].reset();
            //  location.reload(true);
              //$("#allChildInfo").load(location.href + " #allChildInfo");
             successMsg(obj.message);     
             timeOut();
             
           }
                  },
          error : function(err)
          {
            console.log(err);
            serverError();
          },
          complete: function () {
                $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
              }

        
    }); 
}
