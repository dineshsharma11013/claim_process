$(document).ready(function(){
  
 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  //console.log(page);
  fetch_data(page);
 });

 function fetch_data(page)
 {
  
  var path = admin_pth+'/'+'user-info-pagination/fetch_data';
  var total_records = $("#total_records").val();
  var status_type = $("#status_type").val();

  $.ajax({
   url:path,
   data:{page:page, total_records:total_records, status_type:status_type},
   success:function(data)
   {
   // console.log(data);
    $('#table_data').html(data);
   },
   error:function(err)
   {
    console.log(err);
   }
  });
}
})

function getUserInfo(total_record,status_type)
{  
  $("#search").val('');
  var total = $("#"+total_record).val();
  var status = $("#"+status_type).val();

  var path = admin_pth+'/'+'user-details/fetch-data?total_record='+total+'&status_type='+status;
  console.log(path);

  $.ajax({
   url:path,
   success:function(data)
   {
    //console.log(data);
    $('#table_data').html(data);
   },
   error:function(err)
   {
    console.log(err);
   }
  });
}   


function getStatusInfo(total_record,status_type)
{  
  $("#search").val('');
  var total = $("#"+total_record).val();
  var status = $("#"+status_type).val();

  var path = admin_pth+'/'+'user-details/fetch-status?total_record='+total+'&status_type='+status;
  console.log(path);

  $.ajax({
   url:path,
   success:function(data)
   {
    //console.log(data);
    $('#table_data').html(data);
   },
   error:function(err)
   {
    console.log(err);
   }
  });
} 


function searchUserData(total_record, nm)
{
  var total = $("#"+total_record).val();
  var status_type = $("#status_type").val();
  var search = $("#"+nm).val();
  //console.log(search);return false;
  var path = admin_pth+'/search-user-data';
 // console.log(path);

  $.ajax({
   url:path,
   data:{total_record:total, status_type:status_type, nm:search},
   success:function(data)
   {
    console.log(data);
    $('#table_data').html(data);
   },
   error:function(err)
   {
    console.log(err);
   }
  });

}

function updateUser(id,mdl,pth,fbdy,fm)
{
  var path = admin_pth+'/'+pth+'/'+id;
  $("#"+fbdy).hide();
  $('#'+mdl).modal('show');
 
  //console.log(path);
  $.ajax({
   url:path,
   success:function(data)
   {
    //console.log(data);
    $("#"+fbdy).show();
    $("#"+fm).trigger('reset');
    $("#"+fbdy).html(data);
    
   },
   error:function(err)
   {
    console.log(err);
   }
  })
}


function updateUserData(fm, btn, pth, mtd, goto)
{
  console.log("clicked");
  
console.log(goto);
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
