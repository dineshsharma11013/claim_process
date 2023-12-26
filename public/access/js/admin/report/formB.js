//console.log("hi")
NProgress.configure({ parent: '#showPdf' });

function getReport(main_id,other_id,pth,div)
{
	//console.log(main_id, other_id);
  var path = admin_pth+'/'+pth+'/'+main_id+'/'+other_id;
 
  //console.log(path);
  $("#"+div).prop('src','');
  $.ajax({
   url:path,
   beforeSend : function()
      {
        NProgress.start();
      },
   success:function(data)
   {
    //console.log(data);
     $("#"+div).show();
     $('#'+div).prop('src', path);
   },
   error:function(err)
   {
    console.log(err);
   },
   complete : function()
      {
        NProgress.done();
      }
  })
}