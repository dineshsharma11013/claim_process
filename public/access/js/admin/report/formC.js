console.log("hi")

function getReport(main_id,other_id,pth)
{
	//console.log(main_id, other_id);
  var path = admin_pth+'/'+pth+'/'+main_id+'/'+other_id;
 
  console.log(path);
  $("#pdfReport").prop('src','');
  $.ajax({
   url:path,
   success:function(data)
   {
  //  console.log(data);
    $("#pdfReport").show();
    $('#pdfReport').prop('src', path);
   },
   error:function(err)
   {
    console.log(err);
   }
  })
}