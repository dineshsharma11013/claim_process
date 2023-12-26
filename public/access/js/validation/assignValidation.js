
console.log("hi");

function getComDtl(val, dt, fm)
{
  //console.log(val, dt);
  var epath = admin_pth+"/assign-ip-dt";
  $('#'+fm+' [id="'+dt+'"]').val('');
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
          type:'get',  
              url:epath,
              data:{comp_id:val},
              cache: false,
              success:function(data){
               // console.log(data);

                $('#'+fm+' [id="'+dt+'"]').val(data);
                
              },
              error:function(err)
              {
                console.log(err);
              }
      })

}

function assignValidation()
{
  var company = $("#company").val();
  var ip = $("#ip").val();
  var status = $("#status").val();

  if (company=="") 
    {
      $("#error_company").html("Please select company");
      $("#company").css('border',brdr);
      $("#company").focus();
      return false;
    }


    if (ip=="") 
    {
      $("#error_ip").html("Please select ip");
      $("#ip").css('border',brdr);
      $("#ip").focus();
      return false;
    }

    if (status=="") 
    {
      $("#error_status").html("Please select status");
      $("#status").css('border',brdr);
      $("#status").focus();
      return false;
    }
   
}