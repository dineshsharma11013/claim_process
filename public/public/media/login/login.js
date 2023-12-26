
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var f_c ="red";
var brdr = "1px solid red";

function forgotPasswordModal(fogotMdl, LoginMdl, frm)
{
	//$('#'+frm)[0].reset();
	
	$('#'+LoginMdl).modal('hide'); 
	$('#'+fogotMdl).modal('show'); 
}

function userLoginForm(LoginMdl,frm)
{
	$('#user_email').css('border','1px solid #DEE2E6');
  $("#error_user_email").html('');
  $('#user_password').css('border','1px solid #DEE2E6');
  $("#error_user_password").html('');
  $('#user_otp').css('border','1px solid #DEE2E6');
  $("#error_user_otp").html('');
	$("#msform").trigger("reset");
	$("#loginSec").show();
	$("#otpSec").hide();
	$('#'+LoginMdl).modal('show');
}


$(".next").click(function(){

	var email = $("#user_email").val();
  var password = $("#user_password").val();
 
  if (email=="") 
    {
      $("#error_user_email").html("Please enter user-id.");
      $("#user_email").css('border',brdr);
      $("#user_email").focus();
      return false;
    }
    // if (IsEmail(email)==false) 
    // {
    //   $("#error_user_email").html("Please enter valid email address.");
    //   $("#user_email").css('border',brdr);  
    //   $("#user_email").focus();
    //   return false;
    // }
    if (password=="") 
    {
      $("#error_user_password").html("Please enter password");
      $("#user_password").css('border',brdr);
      $("#user_password").focus();
      return false;
    }

  var submit_btn_text=$("#nextBtn").val();   
  var epath = b_pth+"/authenticate-user";
  console.log(epath,email,password);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'post',  
              url:epath,
              data:{email:email,password:password},
              cache: false,
              beforeSend: function () {
             $("#nextBtn").prop("disabled", true);; 
              $("#nextBtn").val('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
                 var obj = JSON.parse(data);
                 $("#userOTPMsg").show();
          if (obj.error) 
          {
            var content = "<div class='alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
										$('#userOTPMsg').html(content);					
										setTimeout(function() {
											$('#userOTPMsg').fadeOut('slow');
										}, 3000);
          }
          else
          {
            if (obj.login_success) 
            {
          	$("#user_email").val('');
          	$("#user_password").val('');	
            var content = "<div class='alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
										$('#userOTPMsg').html(content);					
										  // $('#userOTPMsg').fadeOut('slow');
            //           $("#loginSec").hide();
                window.location.href = 'dashboard';
								
            }
            else
            {
              $("#user_email").val('');
            $("#user_password").val('');  
            var content = "<div class='alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
                    $('#userOTPMsg').html(content);         
                    setTimeout(function() {
                      $('#userOTPMsg').fadeOut('slow');
                      $("#user_otp").val('');
                      $("#loginSec").hide();
                $("#otpSec").show();
                    }, 3000);
            }
         }
                },
        error : function(err)
        {
          console.log(err);
          $("div#userOTPMsg").show();
          						var content = "<div class='alert alert-dismissible alert-danger text-center'>Internal Server Error.</div>";
							$("#userOTPMsg").html(content);
          						setTimeout(function(){
          							$("#userOTPMsg").fadeOut("slow");
          						},3000); 
						
        },
        complete: function () {
              $("#nextBtn").removeAttr("disabled"),jQuery("#nextBtn").val(submit_btn_text); 
            }

      
  }); 





	
});


$(".submit").click(function(){
	  var user_otp = $("#user_otp").val();
 
  if (user_otp=="") 
    {
      $("#error_user_otp").html("Please enter otp.");
      $("#user_otp").css('border',brdr);
      $("#user_otp").focus();
      return false;
    }
    

  var submit_btn_text=$("#loginBtn").val();   
  var epath = b_pth+"/validate-otp";
  console.log(epath);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'post',  
              url:epath,
              data:{otp:user_otp},
              cache: false,
              beforeSend: function () {
             $("#loginBtn").prop("disabled", true);; 
              $("#loginBtn").val('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
                 var obj = JSON.parse(data);
                 $("#userLoginMsg").show();
          if (obj.error) 
          {
            var content = "<div class='alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
										$('#userLoginMsg').html(content);					
										setTimeout(function() {
											$('#userLoginMsg').fadeOut('slow');
										}, 3000);
          }
          else
          {
          	        $("#msform").trigger("reset");
            var content = "<div class='alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
										$('#userLoginMsg').html(content);					
										setTimeout(function() {
											$('#userLoginMsg').fadeOut('slow');
											window.location.href = 'dashboard';
                      //location.reload(true);
										}, 1000);
								
         }
                },
        error : function(err)
        {
          console.log(err);
          $("div#userLoginMsg").show();
          						var content = "<div class='alert alert-dismissible alert-danger text-center'>Internal Server Error.</div>";
							$("#userLoginMsg").html(content);
          						setTimeout(function(){
          							$("#userLoginMsg").fadeOut("slow");
          						},3000); 
						
        },
        complete: function () {
              $("#loginBtn").removeAttr("disabled"),jQuery("#loginBtn").val(submit_btn_text); 
            }

      
  }); 

})


function forgotPassword(fm, btn, pth, emsg)
{
	console.log("hello");
  var email = $("#userf_email").val();
  
    if (email=="") 
    {
      $("#error_userf_email").html("Please eneter email.");
      $("#userf_email").css('border',brdr);
      $("#userf_email").focus();
      return false;
    }
    if (IsEmail(email)==false) 
    {
      $("#error_email").html("Please enter valid email address.");
      $("#userf_email").css('border',brdr);  
      $("#userf_email").focus();
      return false;
    }


  var formData = $("#"+fm).serialize();;
  var submit_btn_text=$("#"+btn).val();   
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
             $("#"+btn).prop("disabled", true); 
              $("#"+btn).val('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
                 var obj = JSON.parse(data);
                 $("div#"+emsg).show();
          if (obj.error) 
          {
            var content = "<div class='alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
										$('#'+emsg).html(content);					
										setTimeout(function() {
											$('#'+emsg).fadeOut('slow');
										}, 3000);
          }
          else
          {
          	$('#myModalForgot').modal('hide');
          	$("#"+fm)[0].reset();
            var content = "<div class='alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
										$('#'+emsg).html(content);					
										setTimeout(function() {
											$('#'+emsg).fadeOut('slow');
										}, 3000);
         }
                },
        error : function(err)
        {
          console.log(err);
          $("div#"+emsg).show();
          						var content = "<div class='alert alert-dismissible alert-danger text-center'>Internal Server Error.</div>";
							$("#"+emsg).html(content);
          						setTimeout(function(){
          							$("#"+emsg).fadeOut("slow");
          						},3000); 
						
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).val(submit_btn_text); 
            }

      
  });
}