
getNotification();
// setInterval(function() {
//                       getNotification();
//                     }, time_period);  


function getNotification()
 {
  
  var epath = admin_pth+"/get-notifications";          
  //console.log(epath);

  $.ajax({
                type:'get',
                url:epath,
                dataType:"text",
                success:function(data){
                	//console.log(data);	
                $("li[id='totalNotificationMsg']").html('');	
                $("li[id='totalNotificationMsg']").html(data);

                  },
                  error:function(err)
                  {
                  //  console.log(err);
                    serverError();
                  }
           });
}
