console.log("hello world");


function saveData(fm, btn, pth)
{
  console.log("clicked");
  var description = $("#description").val();
  var profile = $("#file")[0].files.length;
  
  if (description=="") 
    {
      $("#error_description").html("Please enter description.");
      $("#user_name").css('border',brdr);
      $("#user_name").focus();
      return false;
    }

    // if (profile===0) 
    //       {
    //         $("#error_logo").html("Please select file.");
    //         $("#file").css('border',brdr); 
    //         $("#file").focus();
    //         return false;       
    //       }

  var formData = new FormData($('#'+fm)[0]);
  var submit_btn_text=$("#"+btn).html();   
  var epath = admin_pth+pth;
 // console.log(epath, formData);
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
          if (obj.error) 
          {
            errorMsg(obj.message);                 
          }
          else
          {
            //$("#"+fm)[0].reset();
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



