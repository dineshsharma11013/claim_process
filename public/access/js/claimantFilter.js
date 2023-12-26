console.log("dsf");


  function get_data(txt){
  var epath = admin_pth+'/fliter_claimentents';   
  var company = $("#company").val(); 
  var data2 = "";
  //console.log(epath, txt, company);
  $('#appendFilterData').html('');
     // alert(txt);
  if(company)
  {
      data2 = {txt1:txt, company:company};      
  }
  else
  {
  	 data2 = {txt1:txt};   
	}
	//console.log(data2);	
$.ajax({
url: epath,
type: "GET",
data  : data2,
cache: false,
success: function(data)
{
console.log(data)
$('#appendFilterData').html(data);
},
error:function(err)
{
	console.log(err);
}
})
}

function get_cmp_data(val)
{
	var epath = admin_pth+'/fliter_company_dtl'; 
	var form_type = $("#form_type").val();
	$('#appendFilterData').html('');

	if(form_type)
	  {
	      data2 = {comp:val, form_type:form_type};      
	  }
	  else
	  {
	  	 data2 = {comp:val};   
		}


    console.log(epath, data2);
    $.ajax({
    url: epath,
    type: "GET",
    data:data2,
    cache: false,
    success: function(data)
    {
        console.log(data);
    $('#appendFilterData').html(data);
    },
    error:function(err)
    {
        console.log(err);
    }
    });
}


