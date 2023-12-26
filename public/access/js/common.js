var f_c ="red";
var brdr = "2px solid red";

console.log("common");

function IsEmail(email) {
  var newEmail = email.trim();
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(newEmail);
}//end IsEmail

function IsMobile(phone) {
  //var regex = /^([0-9]{10})+$/;
  var regex = /^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;
  return regex.test(phone);
}//endIsPhone

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


function Removefd(fm,nm)
{
  console.log(fm, nm);
  $('#'+fm).find('input[id="'+nm+'"]').css('border','1px solid #ced4da');
  $('#'+fm).find('div[id="error_'+nm+'"]').html('');
}


function Removef(nm)
{
  $('#'+nm).css('border','1px solid #ced4da');
  $("#error_"+nm).html('');
}

function RemoveER(nm)
{
  console.log(nm);
  $('#'+nm).css('border','1px solid #ced4da');
  $("#error_"+nm).html('');
}

function loadFile(nm,errId)
{
  // var iSize = ($("#operational_creditor_signature")[0].files[0].size / 1024);
  // iSize = (Math.round(iSize * 100) / 100)
  // console.log(iSize);
  $('#'+nm).css('border','1px solid #ced4da');
  $("#"+errId).hide();
}

function showPwd(nm)
{
  if('password' == $('#'+nm).attr('type')){
         $('#'+nm).prop('type', 'text');
    }else{
         $('#'+nm).prop('type', 'password');
    }
}

function checkSize(id)
{
  var iSize = ($("#"+id)[0].files[0].size / 1024);
      iSize = (Math.round(iSize * 100) / 100)
    return iSize;  // file size in kb
}


function adminMsg(error, msg, fm, goto)
{
  if (error) {
    errorMsg(msg);
  }
  else
  {
    successMsg(msg);
    if (goto == 'none') {
     $("#"+fm)[0].reset(); 
    }
    else if(goto=='self')
    {
      //$("#"+fm)[0].reset();
      setTimeout(function() {
                    if (goto=='self') 
                    {
                      window.location.reload();
                    }

                    }, time_period);
    }

  }
  
  //return msg;
}

function adminServerErrorMsg(errMsg)
{
  serverError();
}

function Msg(error, cls,msg, fm, errMsg)
{

  $('#'+errMsg).show();
  
  if (error) {
    var msg = "<div class='col-md-6 col-md-offset-3 alert alert-dismissible alert-"+cls+" text-center text-capitalize'>"+msg+"</div>";
  $('#'+errMsg).html(msg);         
                    setTimeout(function() {
                      $('#'+errMsg).fadeOut('slow');
                    }, time_period);
  }
  else
  {
    var msg = "<div class='col-md-6 offset-md-3 alert alert-dismissible alert-"+cls+" text-center text-capitalize'>"+msg+"</div>";
  $('#'+errMsg).html(msg);         
                    setTimeout(function() {
                      $('#'+errMsg).fadeOut('slow');
                      
                      window.location.href = home_url;
                    }, time_period);  
              
  }
  
  //return msg;
}

function Msg2(error, cls,msg, fm, errMsg)
{
  if (error) {
 $('#'+errMsg).show();
    var msg = "<div class='col-md-12 alert alert-dismissible alert-"+cls+" text-center text-capitalize'>"+msg+"</div>";
  $('#'+errMsg).html(msg);         
                    setTimeout(function() {
                      $('#'+errMsg).fadeOut('slow');
                    }, time_period);
  }
  else
  {
    $('#'+errMsg).show();
    var msg = "<div class='col-md-12 alert alert-dismissible alert-"+cls+" text-center text-capitalize'>"+msg+"</div>";
  $('#'+errMsg).html(msg);         
                    setTimeout(function() {
                      $('#'+errMsg).fadeOut('slow');
                    }, time_period);  
  }
  
  //return msg;
}



function serverErrorMsg(errMsg)
{
  var msg = "<div class='col-md-6 offset-md-3 alert alert-dismissible alert-danger text-center text-capitalize'>Server Error</div>";
  $('#'+errMsg).html(msg);         
                    setTimeout(function() {
                      $('#'+errMsg).fadeOut('slow');
                    }, time_period);  
}

function timeOutRedirect(pth)
{
  setTimeout(function() {
                location.reload(true);
             }, time_period);
}
function timeOut()
{
  setTimeout(function() {
                location.reload(true);
             });
}


function checkList()
{
 // console.log("check");

   if ($('#selectAll').is(':checked')) {
          $('#tbody input[type=checkbox]').attr('checked', 'checked');           
     }
     else {
          $('#tbody input[type=checkbox]:checked').removeAttr('checked');
     }
}

$("#selectAll").click(function(){
        $("input[name=master]").prop('checked', $(this).prop('checked'));

});

function deleteData(pth, aid)
{
  
  var epath = admin_pth+pth;
  console.log(epath);
  swal({
    //title: "Are you sure?",
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) {
$.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
  $.ajax({
      type: 'get',
      url:epath,
      cache: false,
      beforeSend: function () {
     $("#"+aid).prop("disabled", true); 
    },
      success: function(data) {
          console.log(data);
          var obj = JSON.parse(data);
          console.log(obj);
             
              if (obj.error) {
               errorMsg(obj.message);                  
          }
          else
          {
              successMsg(obj.message);    
            timeOut();
            
            }
      },
      error:function(err)
      {
          console.log(err);
          serverError();
      },
      complete: function () {
        $("#"+aid).prop("disabled", false);
    }
  })
}})
}

function deleteSelected(path)
 {
  
  var favorite = [];
            $.each($("input[name='master']:checked"), function(){
                favorite.push($(this).val());
            });
  var val = favorite.join(",");
  var epath = admin_pth+path+"/"+val;          
  
   if(favorite.length <=0)    
            {    
               // alert("Please select row(s).");    
            
               swal({
              title: "Please select row(s).",
            })
               return false; 
            }  else {  
    swal({
    //title: "Are you sure?",
    text: "Are you sure you want to delete this ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) {     

  $.ajax({
                type:'get',
                url:epath,
                dataType:"text",
                success:function(data){
                
                  var obj = JSON.parse(data);
                  if (obj.error) 
                    {
                      errorMsg(obj.message);
                  }
                  else
                  {
                   successMsg(obj.message); 
                   timeOut();
                  }
                  },
                  error:function(err)
                  {
                    
                    serverError();
                  }
           });
}
})
}
 }

 function checkList(userBody)
{
 

   if ($('#selectAll').is(':checked')) {
          $('#'+userBody+' input[type=checkbox]').attr('checked', 'checked');           
     }
     else {
          $('#'+userBody+' input[type=checkbox]:checked').removeAttr('checked');
     }
}


function updateSelected(path)
 {
  
  var favorite = [];
            $.each($("input[name='master']:checked"), function(){
                favorite.push($(this).val());
            });
  var val = favorite.join(",");
  var epath = admin_pth+path+"/"+val;          
  console.log(epath);
   if(favorite.length <=0)    
            {    
                 swal({
                title: "Please select row(s).",
                })
                return false;  
            }  else {  

  $.ajax({
                type:'get',
                url:epath,
                dataType:"text",
                success:function(data){
                
                  var obj = JSON.parse(data);
                  if (obj.error) 
                    {
                      errorMsg(obj.message);
                  }
                  else
                  {
                   successMsg(obj.message); 
                   timeOut();
                  }
                  },
                  error:function(err)
                  {
                    console.log(err);
                    serverError();
                  }
           });

}
 }








