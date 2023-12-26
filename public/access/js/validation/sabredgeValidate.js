
function sabredgeValidate()
{
  var ip_name = $("#ip_name").val();
  var company_name = $("#company_name").val();
  var name = $("#user_name").val();
  var design = $("#design").val();

  var logo = $("#file")[0].files.length;
  var mobile = $("#mobile").val();
  var status = $("#status").val();

  
  if (ip_name=="") 
    {
      $("#error_ip_name").html("Please select.");
      $("#ip_name").css('border',brdr);
      $("#ip_name").focus();
      return false;
    }
  if (company_name=="") 
    {
      $("#error_company_name").html("Please select.");
      $("#company_name").css('border',brdr);
      $("#company_name").focus();
      return false;
    }  
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

    if (status=="") 
    {
      $("#error_status").html("Please select status.");
      $("#status").css('border',brdr);
      $("#status").focus();
      return false;
    }

}

function getCompany(val)
{
  console.log(val);

  var epath = admin_pth+'/get-company/'+val;   
  
  console.log(epath); 
 $.ajax({
                type:'GET',
                url:epath,
                dataType:"JSON",
                success:function(data){
                    console.log(data);
                   if (data==1) 
                   {
                    $('select[name="company_name"]').empty();  
                    $('select[name="company_name"]').append('<option value="">No Company Assign</option>');  
                   }
                   else
                   {
                 
                    $('select[name="company_name"]').empty(); 
                     $('select[name="company_name"]').append('<option value="">Select Company</option>');    
                    $.each(data, function(key, value){
                        $('select[name="company_name"]').append('<option value="'+ key +'">' + value + '</option>');
                      });
                  }
              },
              error:function(err)
              {
                console.log(err)
              }
            }); 



}




