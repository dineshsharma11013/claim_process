
function changePassword(fm, btn, pth, mtd)
{
 // console.log("clicked");
  
  if(mtd() != false) 
  {
    
  var formData = $("#"+fm).serialize();
  var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  console.log(epath, formData);
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
              beforeSend: function () {
             $("#"+btn).prop("disabled", true);; 
              $("#"+btn).html('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
                 var obj = JSON.parse(data);
            $("#errMessage_"+fm).show();
          if (obj.error) 
            {
              
              var content = `
                          <div class="col-md-12 justify-content-center d-flex">
                          <div class='alert alert-dismissible alert-danger text-center'>`+obj.message+`</div></div>`;
                    $("#errMessage_"+fm).html(content);         
                    setTimeout(function() {
                      $("#errMessage_"+fm).fadeOut('slow');
                    }, 3000);
            }
            else
            {
              $("#"+fm)[0].reset(); 
              var content = `
              <div class="col-md-12 justify-content-center d-flex">
              <div class='alert alert-dismissible alert-success text-center'>`+obj.message+`</div></div>`;
                    $("#errMessage_"+fm).html(content);         
                    setTimeout(function() {
                      $("#errMessage_"+fm).fadeOut('slow');
                    }, 3000);
            }
                },
        error : function(err)
        {
        //  console.log(err);
          $("#errMessage_"+fm).show();
                      var content = `<div class='alert alert-dismissible alert-danger text-center'>Technical Error. Try Again Later...</div>`;
              $("#errMessage_"+fm).html(content);
                      setTimeout(function(){
                        $("#errMessage_"+fm).fadeOut("slow");
                      },3000); 
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}



