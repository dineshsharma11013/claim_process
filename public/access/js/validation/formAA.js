function formAA()
{
	var from_name = $("#from_name").val();
	if (from_name=="") 
    {
      $("#error_from_name").html("Please enter name");
      $("#from_name").css('border',brdr);
      $("#from_name").focus();
      return false;
    }
	return true;
}


const add_prces=(tbl, input1)=>{
	
var table = $('#'+tbl);

  var rowcount = $('#'+tbl+' tr').length + 1;

  var newRow =`<tr id="row_`+tbl+`_`+rowcount +`">
	<th scope="row"></th>
  <td></td>
  
  <td><input type="text" name="`+input1+`[]" /></td>
  
  <td>
  <button type="button" class="btn btn-sm btn-danger" onClick="del_prces(`+rowcount+`, '`+tbl +`')">Delete</button>
  </td></tr>`;
    
 
 $(table).append(newRow);   

}


function del_prces(row, tbl, rowId=null, pth=null, btn=null, frm=null, errMsg=null, mdl=null)
{
 // console.log("clicked");
  var rowcount = $('#'+tbl+' tr').length;
  //console.log(rowcount);return false;


    if (rowId!=null && pth!=null) 
    {
      var epath = admin_pth+pth+'/'+rowId;
      var submit_btn_text=$("#"+btn+row).html();
      console.log(row, rowId, epath);
      
     $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
              data:{table:mdl},
              cache: false,
              beforeSend: function () {
             $("#"+btn+row).prop("disabled", true);; 
              $("#"+btn+row).html('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
             var obj = JSON.parse(data);
              if (obj.error) 
              {
                var msg = "<div class='col-md-6 offset-md-3 alert alert-dismissible alert-danger text-center text-capitalize'>"+obj.message+"</div>";
                $('#'+frm+' [id="'+errMsg+'"]').html(msg);         
                    setTimeout(function() {
                      $('#'+frm+' [id="'+errMsg+'"]').fadeOut('slow');
                    }, time_period);
              }
              else
              {
                //$("#row"+row).remove();
                $("#row_"+tbl+"_"+row).remove();
              }
             
                },
        error : function(err)
        {
          console.log(err);
          var msg = "<div class='col-md-6 offset-md-3 alert alert-dismissible alert-danger text-center text-capitalize'>Server Error.</div>";
                $('#'+frm+' [id="'+errMsg+'"]').html(msg);         
                    setTimeout(function() {
                      $('#'+frm+' [id="'+errMsg+'"]').fadeOut('slow');
                    }, time_period);
        },
        complete: function () {
              $("#"+btn+row).removeAttr("disabled"),jQuery("#"+btn+row).html(submit_btn_text); 
            }

      
      }) 
    }
    else
    {
      //console.log($('#'+tbl+' tr'+row));
      //$("#row"+row).remove();
      $("#row_"+tbl+"_"+row).remove();

    }

  
}



// const del_prces = (txt)=>{
//       if (confirm("Do you want to Delete this row ?") == true) {
// $('#aasd'+txt).remove();
// }
// }

function autoIncrease(input) {
      input.style.width = (input.value.length + 1) * 8 + 'px';
      }

 // function autoIncrease(input) {s
 //      input.style.width = (input.value.length + 1) * 8 + 'px';
 //      }      

