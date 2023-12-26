
function employeeValidate()
{
  var emp_type = $("#emp_type").val();
  var name = $("#user_name").val();
  var design = $("#design").val();
  var email = $("#email").val();

  var logo = $("#file")[0].files.length;
  var mobile = $("#mobile").val();
  var status = $("#status").val();

  
  
  if (name=="") 
    {
      $("#error_user_name").html("Please enter name.");
      $("#user_name").css('border',brdr);
      $("#user_name").focus();
      return false;
    }

    if (name.length > 30) 
    {
      $("#error_user_name").html("Maximum 30 characters allowed.");
      $("#user_name").css('border',brdr);
      $("#user_name").focus();
      return false;
    }

    if (emp_type=="") 
    {
      $("#error_emp_type").html("Please select.");
      $("#emp_type").css('border',brdr);
      $("#emp_type").focus();
      return false;
    }

    if (design=="") 
    {
      $("#error_design").html("Please enter designation");
      $("#design").css('border',brdr);
      $("#design").focus();
      return false;
    }

    if (mobile=="") 
    {
      $("#error_mobile").html("Please enter contact number.");
      $("#mobile").css('border',brdr);
      $("#mobile").focus();
      return false;
    }
    if (IsMobile(mobile)==false) 
    {
      $("#error_mobile").html("Please enter valid phone number.");
      $("#mobile").css('border',brdr);  
      $("#mobile").focus();
      return false;
    }

    if (email=="") 
    {
      $("#error_email").html("Please enter email.");
      $("#email").css('border',brdr);
      $("#email").focus();
      return false;
    }

    if (status=="") 
    {
      $("#error_status").html("Please select status.");
      $("#status").css('border',brdr);
      $("#status").focus();
      return false;
    }

}



function getInvoice(emp, emp_id=null)
{
  //console.log(emp, emp_id);

  var epath = admin_pth+"/get-invoice-no";

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
          type:'get',  
              url:epath,
              data:{emp:emp, emp_id:emp_id},
              cache: false,
              success:function(data){
                console.log(data);
                $("#emp_id").val(data);
              },
              error:function(err)
              {
                console.log(err);
                errorMsg(obj.message); 
              }
      })


}






