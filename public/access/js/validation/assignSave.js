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
