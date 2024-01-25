function todoValidationSub()
{
	 // var task = $("#task").val();
  //  var assigned_to = $("#assigned_to").val();
  //  var start_date = $("#start_date").val();
  //  var end_date = $("#end_date").val();
  // 	var status = $("#status").val();
  //   var cirp_name = $("#cirp_name").val();
  //   var comapny = $("#comapny").val();

  //   if (cirp_name=="") 
  //   {
  //     $("#error_cirp_name").html("Please select");
  //     $("#cirp_name").css('border',brdr);
  //     $("#cirp_name").focus();
  //     return false;
  //   }

  //  if (cirp_name == 'other') 
  //   {
  //     $('#company_id').show();
      
  //       if (comapny=='') 
  //       { 
  //       $("#error_comapny").html("Please enter company name");
  //       $("#comapny").css('border',brdr);
  //       $("#comapny").focus();
  //       return false;
  //       }
  //       else
  //       {
  //         Removef("comapny");
  //       }
  //      }
  //   else
  //   {
  //     $('#company_id').hide();
  //     return true;
  //   }

  //   if (status=="") 
  //   {
  //     $("#error_status").html("Please select status");
  //     $("#status").css('border',brdr);
  //     $("#status").focus();
  //     return false;
  //   }  
      
}


function getDetails(id, url, mdl)
{
  var epath = admin_pth+url+id;
  $("#"+mdl).html('');
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
              success:function(data){
                console.log(data);
              $("#"+mdl).html(data);
            
              },
              error:function(err)
              {
                console.log(err);
               // errorMsg(obj.message); 
              }
      })

}


$(document).ready(function(){
  
 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  //console.log(page);
  fetch_data(page);
 });

function fetch_data(page)
 {
  
  var path = admin_pth+'/'+'todo-pagination/dashboard/fetch_data';
  var total_records = $("#total_records").val();
  var ctgyy = $("#ctgyy").val();
  var duration = $("#duration").val();
  var from = $("#from").val();
  var to = $("#to").val();
  

  $.ajax({
   url:path,
   data:{page:page, total_records:total_records, ctgyy:ctgyy, duration:duration, from:from, to:to},
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
})


function getUsrInfo(total_records,ctgyy, duration, from, to)
{  
 
  var total = $("#"+total_records).val();
  var ctgyy = $("#"+ctgyy).val();
  var duration = $("#"+duration).val();
  var from = $("#"+from).val();
  var to = $("#"+to).val();
  

  var path = admin_pth+'/'+'todo-details/dashboard/fetch-data?total_record='+total+'&ctgyy='+ctgyy+'&duration='+duration+'&from='+from+'&to='+to;
  console.log(path);

  $.ajax({
   url:path,
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


function sortBy(nm)
{  
 
  var path = admin_pth+'/'+'todo-details/sort-data?sort='+nm;
  console.log(path);

  $.ajax({
   url:path,
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








