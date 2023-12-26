console.log("hello world jsl");

function loadFile(errId)
{
  $("#"+errId).hide();
}

function login(fm, btn, pth)
{
  console.log("clicked");
  var username = $("#username").val();
  var password = $("#password").val();
 
  if (username=="") 
    {
      $("#error_username").html("Please enter username.");
      $("#username").css('border',brdr);
      $("#username").focus();
      return false;
    }

    if (password=="") 
    {
      $("#error_password").html("Please enter password");
      $("#password").css('border',brdr);
      $("#password").focus();
      return false;
    }
    
  var formData = $("#"+fm).serialize();
  var submit_btn_text=$("#"+btn).html();   
  var epath = admin_pth+pth;
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
          if (obj.error) 
            {
              $("#errorLogin").show();
              var content = "<div class='alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
                    $('#errorLogin').html(content);         
                    setTimeout(function() {
                      $('#errorLogin').fadeOut('slow');
                    }, 3000);
            }
            else
            {
              //console.log(admin_pth);
            	window.location.href=admin_pth;
            }
                },
        error : function(err)
        {
          console.log(err);
          $("#errorLogin").show();
                      var content = "<div class='alert alert-dismissible alert-danger text-center'>Please refresh and try again.</div>";
              $("#errorLogin").html(content);
                      setTimeout(function(){
                        $("#errorLogin").fadeOut("slow");
                      },3000); 
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}


function signup(fm, btn, pth)
{
  console.log("clicked");
  
  var name = $("#name").val();
  var email = $("#email").val();
  var address = $("#address").val();
  var contact = $("#contact").val();

  var username = $("#username").val();
  var password = $("#password").val();
 

  if (name=="") 
    {
      $("#error_name").html("Please enter name.");
      $("#name").css('border',brdr);
      $("#name").focus();
      return false;
    }
    if (email=="") 
    {
      $("#error_email").html("Please enter email.");
      $("#email").css('border',brdr);
      $("#email").focus();
      return false;
    }
    if (address=="") 
    {
      $("#error_address").html("Please enter address.");
      $("#address").css('border',brdr);
      $("#address").focus();
      return false;
    }
    if (contact=="") 
    {
      $("#error_contact").html("Please enter contact.");
      $("#contact").css('border',brdr);
      $("#contact").focus();
      return false;
    }


  if (username=="") 
    {
      $("#error_username").html("Please enter username.");
      $("#username").css('border',brdr);
      $("#username").focus();
      return false;
    }

    if (password=="") 
    {
      $("#error_password").html("Please enter password");
      $("#password").css('border',brdr);
      $("#password").focus();
      return false;
    }
    
  var formData = $("#"+fm).serialize();
  var submit_btn_text=$("#"+btn).html();   
  var epath = admin_pth+pth;
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

          if (obj.error) 
            {
              $("#errorSignup").show();
              var content = "<div class='alert alert-dismissible alert-danger text-center'>"+obj.message+"</div>";
                    $('#errorSignup').html(content);         
                    setTimeout(function() {
                      $('#errorSignup').fadeOut('slow');
                    }, 3000);
            }
            else
            {
              //console.log(admin_pth);
             $("#errorSignup").show();
              var content = "<div class='alert alert-dismissible alert-success text-center'>"+obj.message+"</div>";
                    $('#errorSignup').html(content);         
                    setTimeout(function() {
                      $('#errorSignup').fadeOut('slow');
                      window.location.href=admin_pth;
                    }, 3000);
              
            }
                },
        error : function(err)
        {
          console.log(err);
          $("#errorSignup").show();
                      var content = "<div class='alert alert-dismissible alert-danger text-center'>Please refresh and try again.</div>";
              $("#errorSignup").html(content);
                      setTimeout(function(){
                        $("#errorSignup").fadeOut("slow");
                      },3000); 
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
}
