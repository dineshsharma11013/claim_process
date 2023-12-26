// console.log("mail")

const sendMail = (id,mdl,pth,fbdy,fm)=>{
	console.log(id);

	var path = admin_pth+'/'+pth+'/'+id;
  $("#"+fbdy).hide();
  $('#'+mdl).modal('show');
 
  console.log(path);
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

function closeModal(mdl)
{
  $("#"+mdl).modal('hide');
}
