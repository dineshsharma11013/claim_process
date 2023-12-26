
function selectForm(cm, pth, fm)
{
  var epath = admin_pth+pth+cm;

  console.log(epath);
$("#selectFormDt").html('');
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
          type:'get',  
              url:epath,
              cache: false,
              success:function(dt){
                //console.log(dt);
                 $("#selectFormDt").html(dt);
              },
              error:function(err)
              {
                console.log(err);
              }
      })


}


function UserFormSubmission()
{
	var type = $("#u_type").val();
  	var company = $("#company").val();
 

    if (company=="") 
    {
      $("#error_company").html("Please select company");
      $("#company").css('border',brdr);
      $("#company").focus();
      return false;
    }

  if (type=="") 
    {
      $("#error_u_type").html("Please select type");
      $("#u_type").css('border',brdr);
      $("#u_type").focus();
      return false;
    }
}