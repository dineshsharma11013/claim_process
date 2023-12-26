//console.log("hello world1s");


function saveData(fm, btn, pth, mtd, goto)
{
  console.log("clicked");
  
console.log(goto);
  if (mtd() != false) 
  {  

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
            adminMsg(obj.error, obj.message, fm, goto);
                },
        error : function(err)
        {
          console.log(err);
          adminServerErrorMsg();
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}

function saveSynData(fm, btn, pth, mtd, goto)
{

  console.log("clicked");
  
  if (mtd() != false) 
  {  

   var formData = $("#"+fm).serialize();
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
              cache: false,
              beforeSend: function () {
             $("#"+btn).prop("disabled", true);; 
              $("#"+btn).html('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
             var obj = JSON.parse(data);
             adminMsg(obj.error, obj.message, fm, goto);
                },
        error : function(err)
        {
          console.log(err);
          adminServerErrorMsg();
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}

function saveSynDataCmp(fm, btn, pth, mtd, goto)
{

  console.log("clicked");
  
  if (mtd() != false) 
  {  

   var formData = $("#"+fm).serialize();
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
              cache: false,
              beforeSend: function () {
             $("#"+btn).prop("disabled", true);; 
              $("#"+btn).html('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
             var obj = JSON.parse(data);
             adminMsg(obj.error, obj.message, fm, goto);
                },
        error : function(err)
        {
          console.log(err);
          adminServerErrorMsg();
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}




function saveCKData(fm, btn, pth, mtd, goto)
{
  console.log("clicked");
  
console.log(goto);
  if (mtd() != false) 
  {  

   for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
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
            adminMsg(obj.error, obj.message, fm, goto);
                },
        error : function(err)
        {
          console.log(err);
          adminServerErrorMsg();
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}


function generateReport()
{

  console.log("clicked");
  
    var company = $("#company").val();
    var form = $("#form").val();
    var report_type = $("#report_type").val();

    if (company=="") 
    {
      $("#error_company").html("This field is required");
      $("#company").css('border',brdr);
      $("#company").focus();
      return false;
    }

    if (form=="") 
    {
      $("#error_form").html("This field is required");
      $("#form").css('border',brdr);
      $("#form").focus();
      return false;
    }

    if (report_type=="") 
    {
      $("#error_report_type").html("This field is required");
      $("#report_type").css('border',brdr);
      $("#report_type").focus();
      return false;
    }  
    return true;
  
  //  var formData = $("#"+fm).serialize();
  //  var submit_btn_text=$("#"+btn).html();   
  // var epath = admin_pth+pth;
  // console.log(epath);
  // $.ajaxSetup({
  //     headers: {
  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     }
  // });
  // $.ajax({
  //         type:'post',  
  //             url:epath,
  //             data:formData,
  //             cache: false,
  //             beforeSend: function () {
  //            $("#"+btn).prop("disabled", true);; 
  //             $("#"+btn).html('Please wait...'); 
  //           },
  //             success:function(data){
  //               console.log(data);             
  //            // var obj = JSON.parse(data);
  //            // adminMsg(obj.error, obj.message, fm, goto);
  //               },
  //       error : function(err)
  //       {
  //         console.log(err);
  //        // adminServerErrorMsg();
          
  //       },
  //       complete: function () {
  //             $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
  //           }

      
  // }); 

}


function closeMdl(mdl)
{
  $('#'+mdl).modal('hide');
}

function removeBanner(pth)
{
  
  var epath = admin_pth+pth;
  console.log(epath);
  
$.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
  $.ajax({
      type: 'post',
      url:epath,
      cache: false,
      success: function(data) {
          console.log(data);
          var obj = JSON.parse(data);
          console.log(obj);
             
              if (obj.error) {
               errorMsg(obj.message);
          }
          else
          {
               
             // Message.add(obj.message,{skin:'ico-medium',type:'success',vertical:'top',horizontal:'center',icon:true,close:false,life:'2000'});  
             $("#bannerSection").load(location.href + " #bannerSection");
             //  setTimeout(function() {
             //    location.reload(true);
             // }, 3000);
            
            }
      },
      error:function(err)
      {
          console.log(err);
          adminServerErrorMsg();
      }
  })

}

function sendData(fm, btn, pth, mdl)
{

//  var irp = $("#irp").val();
  for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

  var subject = $("#subject").val();
  var description = $("#description").val();

    // if (irp=="") 
    // {
    //   $("#error_irp").html("Please select irp.");
    //   $("#irp").css('border',brdr);
    //   $("#irp").focus();
    //   return false;
    // }

    if (subject=="") 
    {
      $("#error_subject").html("Please enter subject.");
      $("#subject").css('border',brdr);
      $("#subject").focus();
      return false;
    }


  var formData = new FormData($('#'+fm)[0]);
  var submit_btn_text=$("#"+btn).html();   
  var epath = admin_pth+pth;

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
            $("#mailError_"+fm).show();
          if (obj.error) 
            {
              
              var content = `               
                          <div class='alert alert-dismissible alert-danger text-center col-md-6'>`+obj.message+`</div></div>`;
                    $("#mailError_"+fm).html(content);         
                    setTimeout(function() {
                      $("#mailError_"+fm).fadeOut('slow');
                    }, 3000);
            }
            else
            {
              $("#"+fm)[0].reset(); 

              var content = `
              <div class='alert alert-dismissible alert-success text-center col-md-6'>`+obj.message+`</div></div>`;
                    $("#mailError_"+fm).html(content);         
                    setTimeout(function() {
                      $("#mailError_"+fm).fadeOut('slow');
                      $('#'+mdl).modal('hide');
                    }, 3000);
            }


                },
        error : function(err)
        {
          console.log(err);
        
           $("#mailError_"+fm).show();
                      var content = `<div class='alert alert-dismissible alert-danger text-center col-md-6'>Technical Error. Try Again Later...</div>`;
              $("#mailError_"+fm).html(content);
                      setTimeout(function(){
                        $("#mailError_"+fm).fadeOut("slow");
                      },3000); 
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}

function formEditApproval(fm_id, fm_type, user_id, pth, btn, fm_nm)
{
  var submit_btn_text=$("#"+btn).html();   
  var epath = admin_pth+pth;

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'post',  
              url:epath,
              data:{fm_id:fm_id, fm_type:fm_type, user_id:user_id, fm_nm:fm_nm},
              cache: false,
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
                  successMsg(obj.message);
                  submit_btn_text = 'Approved';  
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