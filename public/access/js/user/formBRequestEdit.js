function sendRequestToEdit(form_id, fm_type, btn, pth)
{
	
  var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  //console.log(epath);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
              data:{form_id:form_id, fm_type:fm_type},
              cache: false,
              beforeSend: function () {
             $("#"+btn).prop("disabled", true);; 
             
            	$("#"+btn).html('<span class="spinner-border spinner-border-sm text-danger"></span> Please wait...');
            },
              success:function(data){
                console.log(data);             
                 var obj = JSON.parse(data);
            //$("#errMessage_"+fm).show();
          if (obj.error) 
            {
          		errorMsg(obj.message);
            }
            else
            {
              successMsg(obj.message);
              setTimeout(function() {
                    window.location.reload(true);
                    }, 2000);
              }
            
                },
        error : function(err)
        {
        //  console.log(err);
        errorMsg('Technical Error. Try Again Later...');
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}	


function sendRequestToEditInfo(form_id, fm_type, btn, pth, fm_nm)
{
  
  var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  //console.log(epath);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
              data:{form_id:form_id, fm_type:fm_type, fm_nm:fm_nm},
              cache: false,
              beforeSend: function () {
             $("#"+btn).prop("disabled", true);; 
             
              $("#"+btn).html('<span class="spinner-border spinner-border-sm text-danger"></span> Please wait...');
            },
              success:function(data){
                console.log(data);             
                 var obj = JSON.parse(data);
            //$("#errMessage_"+fm).show();
          if (obj.error) 
            {
              errorMsg(obj.message);
            }
            else
            {
              successMsg(obj.message);
              setTimeout(function() {
                    window.location.reload(true);
                    }, 2000);
              }
            
                },
        error : function(err)
        {
          console.log(err);
        errorMsg('Technical Error. Try Again Later...');
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
} 