console.log("hello world1s");


function signUp(fm, btn, pth, mtd)
{
  console.log("clicked");
  var method = "";
  var formData = $("#"+fm).serialize();
   var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  console.log(epath);

  if (mtd() != false) 
  {  

   
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
            
            if (obj.error) {
            $('#errMessage_'+fm).show(); 
              var msg = "<div class='col-md-12 alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                              }, time_period);
            }
            else if (obj.type=='direct') 
            {
                 $('#errMessage_'+fm).show();
              var msg = "<div class='col-md-12 alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#'+fm)[0].reset();
                                $('#errMessage_'+fm).fadeOut('slow');
                                location.reload(true);
                              }, time_period);  
            }
            else            
            {
              $('#errMessage_'+fm).show();
              var msg = "<div class='col-md-12 alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#'+fm)[0].reset();
                                $('#errMessage_'+fm).fadeOut('slow');
                                $("#signup").hide();
                                $("#signOtp").show();
                              }, time_period);  
            }

                },
        error : function(err)
        {
          console.log(err);
          $('#errMessage_'+fm).show();
          var msg = "<div class='col-md-12 alert alert-dismissible alert-danger text-center'>Something went wrong. Please reload page and try again.</div>";
          $('#errMessage_'+fm).html(msg);         
                            setTimeout(function() {
                              $('#errMessage_'+fm).fadeOut('slow');
                            }, time_period); 
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}


function signUpOtp(fm, btn, pth, mtd)
{
  console.log("clicked");
  var method = "";
  var formData = $("#"+fm).serialize();
  var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  console.log(epath);
  
  if (mtd() != false) 
  {  
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
            
            if (obj.error) {
            $('#errMessage_'+fm).show(); 
              var msg = "<div class='col-md-12 alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                              }, time_period);
            }
            else
            {
              $('#errMessage_'+fm).show();
              var msg = "<div class='col-md-12 alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#'+fm)[0].reset();
                                $('#errMessage_'+fm).fadeOut('slow');
                                location.reload(true);
                              }, time_period);  
            }

                },
        error : function(err)
        {
          console.log(err);
          $('#errMessage_'+fm).show();
          var msg = "<div class='col-md-12 alert alert-dismissible alert-danger text-center'>Something went wrong. Try again.</div>";
          $('#errMessage_'+fm).html(msg);         
                            setTimeout(function() {
                              $('#errMessage_'+fm).fadeOut('slow');
                            }, time_period); 
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}



function signIn(fm, btn, pth, mtd)
{
  console.log("clicked");
  var method = "";
  var formData = $("#"+fm).serialize();
  var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  console.log(epath, b_pth);
  
  if (mtd() != false) 
  {  
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
            
            if (obj.error) {
            $('#errMessage_'+fm).show(); 
              var msg = "<div class='col-md-12 alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                              }, time_period);
            }
            else
            {
              $('#errMessage_'+fm).show();
              var msg = "<div class='col-md-12 alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                                $('#'+fm)[0].reset();
                              if (obj.login_success==false) {  
                                $("#login").hide();
                                $("#signInOtp").show();
                              }
                              else
                              {
                                window.location.href = b_pth+"/dashboard";
                               // location.reload(true);
                              }
                              }, time_period);  
            }

                },
        error : function(err)
        {
          console.log(err);
          $('#errMessage_'+fm).show();
          var msg = "<div class='col-md-12 alert alert-dismissible alert-danger text-center'>Something went wrong. Please refresh and try again.</div>";
          $('#errMessage_'+fm).html(msg);         
                            setTimeout(function() {
                              $('#errMessage_'+fm).fadeOut('slow');
                            }, time_period); 
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}


function forgotPassword(fm, btn, pth, mtd)
{
  console.log("clicked");
  var method = "";
  var formData = $("#"+fm).serialize();
  var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  console.log(epath);
  
  if (mtd() != false) 
  {  
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
            
            if (obj.error) {
            $('#errMessage_'+fm).show(); 
              var msg = "<div class='col-md-12 alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                              }, time_period);
            }
            else
            {
              $('#errMessage_'+fm).show();
              var msg = "<div class='col-md-12 alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                                $('#'+fm)[0].reset();
                                 location.reload(true);
                              }, time_period);  
            }

                },
        error : function(err)
        {
          console.log(err);
          $('#errMessage_'+fm).show();
          var msg = "<div class='col-md-12 alert alert-dismissible alert-danger text-center'>Something went wrong. Try again.</div>";
          $('#errMessage_'+fm).html(msg);         
                            setTimeout(function() {
                              $('#errMessage_'+fm).fadeOut('slow');
                            }, time_period); 
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}


function changePassword(fm, btn, pth, mtd)
{
  console.log("clicked");
  var method = "";
  var formData = $("#"+fm).serialize();
  var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  console.log(epath);
  
  if (mtd() != false) 
  {  
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
            
            if (obj.error) {
            $('#errMessage_'+fm).show(); 
              var msg = "<div class='col-md-6 offset-sm-3 mt-2 alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                              }, time_period);
            }
            else
            {
              $('#errMessage_'+fm).show();
              var msg = "<div class='col-md-6 offset-sm-3 mt-2 alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                                if (obj.refresh) {
                                location.reload(true);
                              }
                              }, time_period);  
            }

                },
        error : function(err)
        {
          console.log(err);
          $('#errMessage_'+fm).show();
          var msg = "<div class='col-md-6 offset-sm-3 mt-2 alert alert-dismissible alert-danger text-center'>Something went wrong. Please refresh and try again.</div>";
          $('#errMessage_'+fm).html(msg);         
                            setTimeout(function() {
                              $('#errMessage_'+fm).fadeOut('slow');
                            }, time_period); 
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
}

function signUpResendOtp(fm, pth, btn)
{
  console.log("clicked");
  
  var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  console.log(epath);
  

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
              $("#"+btn).html('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
            var obj = JSON.parse(data);
            
            if (obj.error) {
            $('#errMessage_'+fm).show(); 
              var msg = "<div class='col-md-12 alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                              }, time_period);
            }
            else
            {
              $('#errMessage_'+fm).show();
              var msg = "<div class='col-md-12 alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                              setTimeout(function() {
                                $('#errMessage_'+fm).fadeOut('slow');
                              }, time_period);  
            }

                },
        error : function(err)
        {
          console.log(err);
          $('#errMessage_'+fm).show();
          var msg = "<div class='col-md-6 offset-sm-3 mt-2 alert alert-dismissible alert-danger text-center'>Something went wrong. Please refresh and try again.</div>";
          $('#errMessage_'+fm).html(msg);         
                            setTimeout(function() {
                              $('#errMessage_'+fm).fadeOut('slow');
                            }, time_period); 
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}


function selectCreditor(fm, nm, ardiv, ar)
{
  
  var name = $('#'+fm+' [name="'+nm+'"]').val();
  console.log(name, ar);
  if (name=="") 
    {
      $('#'+fm+' [id="error_'+nm+'"]').html("Please select.");
      $('#'+fm+' [name="'+nm+'"]').css('border',brdr);
      $('#'+fm+' [name="'+nm+'"]').focus();
      return false;
    }
    else
    {
      if (name == 'financial-creditor-in-a-class') 
      {
        
        $('#'+fm+' [id="'+ardiv+'"]').show();
      }
      else
      {
        $('#'+fm+' [name="'+ar+'"]').val('');
        $('#'+fm).find('select[id="'+ar+'"]').css('border','1px solid #ced4da');
        $('#'+fm).find('div[id="error_'+ar+'"]').html('');
        $('#'+fm+' [id="'+ardiv+'"]').hide();
      }
      $('#'+fm).find('select[id="'+nm+'"]').css('border','1px solid #ced4da');
      $('#'+fm).find('div[id="error_'+nm+'"]').html('');
      return true;
    }
}



function selectionFormSubmit(fm, type, ar)
{

  var name = $('#'+fm+' [name="'+type+'"]').val();
  var art = $('#'+fm+' [name="'+ar+'"]').val();
  console.log(name, ar);

  if (name=="") 
    {
      $('#'+fm+' [id="error_'+type+'"]').html("Please select.");
      $('#'+fm+' [name="'+type+'"]').css('border',brdr);
      $('#'+fm+' [name="'+type+'"]').focus();
      return false;
    }  
  else if(name == 'financial-creditor-in-a-class') 
      {
        if (art == '') 
        {
          $('#'+fm+' [id="error_'+ar+'"]').html("Please select.");
          $('#'+fm+' [name="'+ar+'"]').css('border',brdr);
          $('#'+fm+' [name="'+ar+'"]').focus();
          return false; 
        }
        else
        {
          $('#'+fm).find('select[id="'+ar+'"]').css('border','1px solid #ced4da');
          $('#'+fm).find('div[id="error_'+ar+'"]').html('');
        return true;
        }  

        
      }


    return true;
}

function selectFormSubmit(fm, company, ip)
{
  var name = $('#'+fm+' [name="'+company+'"]').val();
  var art = $('#'+fm+' [name="'+ip+'"]').val();
  var unId = $("#unId").val();
  console.log(name, ip);


  if (!unId) 
  {
    $("#company_name").val('');
    $("#exampleModal").modal('show');
    return false;
  }

  if (name=="") 
    {
      $('#'+fm+' [id="error_'+company+'"]').html("Please select.");
      $('#'+fm+' [name="'+company+'"]').css('border',brdr);
      $('#'+fm+' [name="'+company+'"]').focus();
      return false;
    }  
        if (art == '') 
        {
          $('#'+fm+' [id="error_'+ip+'"]').html("Please select.");
          $('#'+fm+' [name="'+ip+'"]').css('border',brdr);
          $('#'+fm+' [name="'+ip+'"]').focus();
          return false; 
        }
       

  

    return true;
  
}



function selectAr(fm, nm)
{
  var name = $('#'+fm+' [name="'+nm+'"]').val();
  //console.log(name);
  if (name=="") 
    {
      $('#'+fm+' [id="error_'+nm+'"]').html("Please select.");
      $('#'+fm+' [name="'+nm+'"]').css('border',brdr);
      $('#'+fm+' [name="'+nm+'"]').focus();
      return false;
    }
    else
    {
      $('#'+fm).find('select[id="'+nm+'"]').css('border','1px solid #ced4da');
      $('#'+fm).find('div[id="error_'+nm+'"]').html('');
      return true;
    }
}

function selectCompany(fm, comp, ip, div, dtls)
{
    console.log(fm, comp, ip)
   var epath = b_pth+"/get-ip-details/"+comp;
   var unId = $("#unId").val();
   Removef("ip_name");
 //  console.log(fm, comp, ip)
   //console.log(epath);return false;
  
  if (!unId) 
  {
    $("#company_name").val('');
    $("#exampleModal").modal('show');
    return false;
  }

  if (!comp) 
  {
          $("#"+div).hide();
          $('#'+fm+' [id="'+ip+'"]').val('');
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
              var obj = JSON.parse(data);        
             // console.log(obj.dtls.length);
          if (obj.error) 
          {
           $("#"+div).hide();
            //errorMsg(obj);    
            if (obj.user == false) 
            {
              $("#company_name").val('');
              $("#exampleModal").modal('show');
            }
            else
            {

            $(".errMsg").show();
            var msg = "<div class='col-md-6 offset-sm-3 mt-2 alert-danger'>"+obj.message+"</div>";
            $('#errMessage_'+fm).html(msg);         
                            setTimeout(function() {
                              $('#errMessage_'+fm).fadeOut('slow');
                            }, 3000);   

            $('#'+fm+' [id="'+ip+'"]').val('');
            }
          }
          else
          {
            // $('#'+fm+' [id="user_id"]').val(obj.user);
           $("#"+div).show();
            $('#'+fm+' [id="'+ip+'"]').val(obj.message);
            var tbody = obj.dtls;
            //$("#"+dtls)
            $("#"+dtls).html('');
             $.each(tbody, function(index, item){
             // console.log(index, item);
            $("#"+dtls).append( `<tr>
              <td>`+(index+1)+`</td>
              <td>`+item.company+`</td>
              <td>`+item.ip+`</td>
              <td>`+item.desg+`</td>
              <td>`+item.corporate_debtor_insolvency_date+`</td>
              <td>`+item.insolvency_closing_date+`</td>
              
              <td><a class="btn btn-sm btn-green" href="form-a/`+item.unique_id+`" target="_blank" role="button" style="padding:4px 15px;">View</a>
                
              </td>  
              </tr>`)
            });

         }
         // <a class="btn btn-sm btn-green" href="form-aa/`+item.unique_id+`" target="_blank" role="button" style="padding:4px 15px;">View</a>
         //        <a class="btn btn-sm btn-green" href="form-2/`+item.unique_id+`" target="_blank" role="button" style="padding:4px 15px;">View</a>
                 },
        error : function(err)
        {
          console.log(err);
         $(".errMsg").show();
            var msg = "<div class='col-md-6 offset-sm-3 mt-2 alert-danger'>Something went wrong. Refresh and try again.</div>";
            $('#errMessage_'+fm).html(msg);         
                            setTimeout(function() {
                              $('#errMessage_'+fm).fadeOut('slow');
                            }, 3000);
        }
      
  }); 


}




