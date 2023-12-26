function todoValidation()
{
	 var task = $("#task").val();
   var assigned_to = $("#assigned_to").val();
   var start_date = $("#start_date").val();
   var end_date = $("#end_date").val();
  	var status = $("#status").val();
    var cirp_name = $("#cirp_name").val();
    var comapny = $("#comapny").val();

    if (cirp_name=="") 
    {
      $("#error_cirp_name").html("Please select");
      $("#cirp_name").css('border',brdr);
      $("#cirp_name").focus();
      return false;
    }

   if (cirp_name == 'other') 
    {
      $('#company_id').show();
      
        if (comapny=='') 
        { 
        $("#error_comapny").html("Please enter company name");
        $("#comapny").css('border',brdr);
        $("#comapny").focus();
        return false;
        }
        else
        {
          Removef("comapny");
        }
       }
    else
    {
      $('#company_id').hide();
      return true;
    }

  // if (task=="") 
  //   {
  //     $("#error_task").html("Please enter task");
  //     $("#task").css('border',brdr);
  //     $("#task").focus();
  //     return false;
  //   }

  //   if (task.length > 230) 
  //   {
  //     $("#error_task").html("Maximum 230 characters allowed.");
  //     $("#task").css('border',brdr);
  //     $("#task").focus();
  //     return false;
  //   }

  //   if (assigned_to=="") 
  //   {
  //     $("#error_assigned_to").html("Please select user");
  //     $("#assigned_to").css('border',brdr);
  //     $("#assigned_to").focus();
  //     return false;
  //   }

    // if (start_date=="") 
    // {
    //   $("#error_start_date").html("Please select start date");
    //   $("#start_date").css('border',brdr);
    //   $("#start_date").focus();
    //   return false;
    // }

    // if (end_date=="") 
    // {
    //   $("#error_end_date").html("Please select end date");
    //   $("#end_date").css('border',brdr);
    //   $("#end_date").focus();
    //   return false;
    // }
    

    if (status=="") 
    {
      $("#error_status").html("Please select status");
      $("#status").css('border',brdr);
      $("#status").focus();
      return false;
    }  
      
}


function getCompanyInfo()
{
  var cirp_name = $("#cirp_name").val();
  var comapny = $("#comapny").val();
  if (cirp_name == 'other') 
  {
    $('#company_id').show();
    
      if (comapny=='') 
      { 
      $("#error_comapny").html("Please enter company name");
      $("#comapny").css('border',brdr);
      $("#comapny").focus();
      return false;
      }
  }
  else
  {
    $('#company_id').hide();
    return true;
  }
  console.log(cirp_name);
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
  
  var path = admin_pth+'/'+'todo-pagination/fetch_data';
  var total_records = $("#total_records").val();
  var status_type = $("#status_type").val();
  var team = $("#team").val();
  var from = $("#from").val();
  var to = $("#to").val();
  var task = $("#task").val();
  var cid = $("#cid").val();

  $.ajax({
   url:path,
   data:{page:page, total_records:total_records, status_type:status_type, team:team, from:from, to:to, task:task, cid:cid},
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




function getUserInfo(total_record,status_type, team, from, to, task)
{  
 
  var total = $("#"+total_record).val();
  var status = $("#"+status_type).val();
  var team = $("#"+team).val();
  var from = $("#"+from).val();
  var to = $("#"+to).val();
  var task = $("#task").val();
  var cid = $("#cid").val();

  var path = admin_pth+'/'+'todo-details/fetch-data?total_record='+total+'&status_type='+status+'&team='+team+'&from='+from+'&to='+to+'&task='+task+'&cid='+cid;
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


function getDetailsDefault(total_record,status_type, team, from, to, task)
{
  $("#"+total_record).val('10');
  $("#"+status_type).val('');
  $("#"+team).val('');
   $("#"+from).val('');
  $("#"+to).val('');
  $("#"+task).val('');


  var total = $("#"+total_record).val();
  var status = $("#"+status_type).val();
  var team = $("#"+team).val();
  var from = $("#"+from).val();
  var to = $("#"+to).val();
  var task = $("#"+task).val();
  var cid = $("#cid").val();

//  console.log(total, status, team, from, to);

  var path = admin_pth+'/'+'todo-details/fetch-data?total_record='+total+'&status_type='+status+'&team='+team+'&from='+from+'&to='+to+'&task='+task+'&cid='+cid;
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


let isVisible = false;  

function sortBy(nm, company_id)
{
   isVisible = !isVisible;  
  console.log(nm, isVisible, company_id);
  var total = 10;

   var path = admin_pth+'/'+'company-todo-details/fetch-data?total_record='+total+'&sort_nm='+nm+'&sort_type='+isVisible+'&company_id='+company_id;
  console.log(path);
  $('#companyWiseTodo').html('');
  $.ajax({
   url:path,
   success:function(data)
   {
    //console.log(data);
    $('#companyWiseTodo').html(data);
   },
   error:function(err)
   {
    console.log(err);
   }
  });

}




