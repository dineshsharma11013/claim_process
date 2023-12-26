function form2(argument) {
	console.log("form2");

	var address = $("#address").val();
	var name = $("#name").val();
	var office_address = $("#office_address").val();
	var email = $("#email").val();
	var contact_number = $("#contact_number").val();

	if (address=="") 
    {
      $("#error_address").html("Please enter address");
      $("#address").css('border',brdr);
      $("#address").focus();
      return false;
    }

    if (address.length > 240) 
    {
      $("#error_address").html("Maximum 240 characters allowed.");
      $("#address").css('border',brdr);
      $("#address").focus();
      return false;
    }

    if (name=="") 
    {
      $("#error_name").html("Please enter name");
      $("#name").css('border',brdr);
      $("#name").focus();
      return false;
    }

    if (office_address=="") 
    {
      $("#error_office_address").html("Please enter address");
      $("#office_address").css('border',brdr);
      $("#office_address").focus();
      return false;
    }

    if (email=="") 
    {
      $("#error_email").html("Please enter email");
      $("#email").css('border',brdr);
      $("#email").focus();
      return false;
    }

    if (contact_number=="") 
    {
      $("#error_contact_number").html("Please enter contact number");
      $("#contact_number").css('border',brdr);
      $("#contact_number").focus();
      return false;
    }

    return true;
}




var count=1;
function add_inmatter()
{
    
count++;
console.log(count);
$('#ad_appnd_metter_dv').append(`<div id="devve`+count+`" class="input-group" style="display:flex;">
	<input type="text" name="in_matter_crprt_dbtr[]" value="" class="form-control my-2" placeholder="name of the corporate debtor"/>
  <input type="hidden" name="other_senc_id[]" value="">
	<span class="input-group-text bg-white  border-0 px-2 "style="display: flex;" >
	<!--<button type="button" onClick="add_inmatter()" class="btn btn-primary btn-sm " style="margin: 6px;">Add</button> -->
	<button type="button" onClick="delt_inmatter(`+count+`, 'devve')" class="btn btn-danger btn-sm " style="margin: 6px;">Delete</button></span></div>`);   
}


function delt_inmatter(row, div, rowId=null, pth=null, btn=null, frm=null, errMsg=null, mdl=null)
{
 // console.log('#'+div+row);
 // $('#'+div+row).remove();
//    swal({
//     text: "Do you want to remove ?",
//     icon: "warning",
//     buttons: ["No", "Yes"],
//     dangerMode: true,
//   })
// .then((willDelete) => {
//     if (willDelete) { 	
// 	$('#'+div+txt).remove();
// }})

if (rowId!=null && pth!=null) 
    {
      var epath = admin_pth+pth+'/'+rowId;
      var submit_btn_text=$("#"+btn+row).html();
      console.log(row, rowId, epath, mdl);
      
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
               // $("#row_"+tbl+"_"+row).remove();
                $('#'+div+row).remove();
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
      $('#'+div+row).remove();
      

    }  


}


const add_corporate=(tbl, input1, input2, input3, assn)=>{
var numbr_assgnmnt=$('#'+assn).val();
//console.log(numbr_assgnmnt); return false;
//console.log($('#'+tbl+' tr').length);return false;
var ad_rw_nbr=numbr_assgnmnt-1
var table = $('#'+tbl);
if (numbr_assgnmnt>10) {
  alert("Maximum 10 rows allowed.");return false;
}
else
{
for(let i = 0 ; i<ad_rw_nbr ; i++)
{
   //count_w++;
  var rowcount = $('#'+tbl+' tr').length + 1;
  var newRow =`<tr id="row_`+tbl+`_`+rowcount +`">
	<th scope="row"></th>
  <td></td>
  <td></td>
  <td><input type="text" name="`+input1+`[]" autocomplete="off" style="width:120px"/></td>
  <td><input type="date" name="`+input2+`[]" autocomplete="off" style="width:120px"/></td>
  <td><input type="date" name="`+input3+`[]" autocomplete="off" style="width:120px"/></td>
  <td>
  <button type="button" class="btn btn-sm btn-danger" onClick="delete_corporate(`+rowcount+`, '`+tbl +`')">Delete</button>
  </td></tr>`;
    

 $(table).append(newRow);   
}
}
}

function delete_corporate(row, tbl, rowId=null, pth=null, btn=null, frm=null, errMsg=null, mdl=null)
{
 // console.log("clicked");
  var rowcount = $('#'+tbl+' tr').length;
  //console.log(rowcount);return false;

  // if (rowcount == 1) 
  // {
  //   alert("can not remove this row.")
  // }
  // else 
  // {
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
  //}
  
}


// const delete_corporate = (txt)=>{
//    swal({
//     text: "Do you want to remove ?",
//     icon: "warning",
//     buttons: ["No", "Yes"],
//     dangerMode: true,
//   })
// .then((willDelete) => {
//     if (willDelete) { 	
// 	$('#crprt'+txt).remove();
// }})
// }



const add_rpcorporate=()=>{
count_sw=1;
var numbr_asssgnmnt=$('#nbr_of_rpassgnmtn').val();
var ad_rws_nbr=numbr_asssgnmnt-1
for(let i = 0 ; i<ad_rws_nbr ; i++)
{
   count_sw++;
$('#rp_row').append(`<tr id="rpcrprt`+count_sw+`">
	<th scope="row"></th><td></td><td></td><td>
	<input name="rp_neme_crprt_debtr[]" type="text" style="width:120px"/></td><td>
	<input type="date" name="rp_date_of_cmnsmnt_prcss[]" style="width:120px"/></td><td>
	<input name="rp_expected_date_clsr_prcss[]"  type="date" style="width:120px"/></td><td>
	<button type="button" class="btn btn-sm btn-danger" onClick="delete_rpcorporate(`+count_sw+`)">Delete</button></td></tr>`);
    
}
}

const delete_rpcorporate = (txt)=>{
	swal({
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) { 	
	$('#rpcrprt'+txt).remove();
}})

}

const add_lqdcorporate=()=>{
countlqdtr_sw=1; 
var numr_assssgnmnt=$('#nbr_of_lqdassgnmtn').val();
var ad_rws_nbr=numr_assssgnmnt-1
for(let i = 0 ; i<ad_rws_nbr ; i++)
{
   countlqdtr_sw++;
$('#lqdtr_rw').append(`<tr id="rpcrpdrt`+countlqdtr_sw+`">
	<th scope="row"></th><td></td><td></td><td>
	<input type="text"  name="lqdtr_coprorate_dbtr_neme[]" style="width:120px"/></td><td>
	<input name="lqdtr_date_of_cmncmnt[]" type="date" style="width:120px"/></td><td>
	<input type="date" name="lqdtr_expected_clsr_cmncmnt[]" style="width:120px"/></td><td>
	<button type="button" class="btn btn-sm btn-danger" onClick="delete_lqcorporate(`+countlqdtr_sw+`)">Delete</button></td></tr>`);
    
} 

}


const delete_lqcorporate = (txt)=>{
	swal({
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) { 	
	$('#rpcrpdrt'+txt).remove();
}})
}


const add_aut_rprsnt=()=>{
counardr_sw=1;
var numr_asssdfssgnmnt=$('#nbr_of_ar_assgnmtn').val();
var ad_rws_snbr=numr_asssdfssgnmnt-1
for(let i = 0 ; i<ad_rws_snbr ; i++)
{
   counardr_sw++;
$('#authrprsnt_rw').append(`<tr id="rpcrpdrt`+counardr_sw+`">
	<th scope="row"></th><td></td><td></td><td>
	<input type="text" name="ar_name_of_corporate_debtor[]" style="width:120px"/></td><td>
	<input type="date" style="width:120px" name="ar_commencement_date[]" /></td><td>
	<input type="date" style="width:120px" name="ar_expected_date[]" /></td><td>
	<button type="button" class="btn btn-sm btn-danger" onClick="delete_aeere(`+counardr_sw+`)">Delete</button></td></tr>`);
    
} 

}

const delete_aeere = (txt)=>{
	swal({
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) { 	
	$('#rpcrpdrt'+txt).remove();
}})

}

const add_rpins=()=>{
	count_assgnrt=1;
    var nub_asgnt=$('#nbr_of_sassgnmtn').val();
var add_rws_snbr=nub_asgnt-1;
for(let i = 0 ; i<add_rws_snbr ; i++)
{
   count_assgnrt++;
$('#indvdl_rw').append(`<tr id="rppdrt`+count_assgnrt+`">
	<th scope="row"></th><td></td><td></td><td>
	<input name="indvdl_rp_crprt_dbtr[]" type="text" style="width:120px"/></td><td>
	<input type="date"  name="indvdl_rp_cmncmt_dete[]" style="width:120px"/></td><td>
	<input name="indvdl_rp_clsr_dete[]" type="date" style="width:120px"/></td><td>
	<button type="button" class="btn btn-sm btn-danger" onClick="delete_rd_rw(`+count_assgnrt+`)">Delete</button></td></tr>`);
    
}  
}
const delete_rd_rw = (txt)=>{
	swal({
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) { 	
	$('#rppdrt'+txt).remove();
}})
}



const add_bnk_crptnty=()=>{
	count_bnk_crptncy=1;
 var nub_bnk_asgnt=$('#nbr_of_bnk_crptncy_assgnmtn').val();
    var add_bnk_rws_snbr=nub_bnk_asgnt-1;
    
    for(let i = 0 ; i<add_bnk_rws_snbr ; i++)
{
   count_bnk_crptncy++;
$('#bank_cruptancy_rw').append(`<tr id="rppdrt`+count_bnk_crptncy+`">
	<th scope="row"></th><td></td><td></td><td>
	<input type="text" name="bank_cruptcy_corporate_debtr_neme[]" style="width:120px"/></td><td>
	<input type="date"  name="bank_cruptcy_cmncmnt_dete[]" style="width:120px"/></td><td>
	<input type="date" name="bank_cruptcy_clsr_dete[]" style="width:120px"/></td><td>
	<button type="button" class="btn btn-sm btn-danger" onClick="delete_rd_rw(`+count_bnk_crptncy+`)">Delete</button></td></tr>`);
    
}      
}

const add_any_other =()=>{
count_bnkanyother=1;
var nub_any_asgnt=$('#nbr_of_other_assgnmtn').val();
   var add_any_rws_snbr=nub_any_asgnt-1;
       for(let i = 0 ; i<add_any_rws_snbr ; i++)
{
   count_bnkanyother++;
$('#any_other_rw').append(`<tr id="srppdrt`+count_bnkanyother+`">
	<th scope="row"></th><td></td><td></td><td>
	<input type="text" name="any_other_crprt_dbtr[]" style="width:120px"/></td><td>
	<input type="date" name="any_other_cmncment_dete[]" style="width:120px"/></td><td>
	<input type="date" name="any_other_clsre_dete[]" style="width:120px"/></td><td>
	<button type="button" class="btn btn-sm btn-danger" onClick="delete_srd_rw(`+count_bnkanyother+`)">Delete</button></td></tr>`);
    
}  
}


const delete_srd_rw =(txt)=>
{
	swal({
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) { 	
	$('#srppdrt'+txt).remove();
}})
}


count_rewwwe=1;
const add_li = ()=>{
	
   count_rewwwe++;
$('#rww_add').append(`<div id="dsd`+count_rewwwe+`" class="input-group my-2" style="display:flex !important">
	<textarea class="form-control" aria-label="With textarea" autocomplete="off" name="disclsure[]">
	</textarea>
  <span class="input-group-text delete_btn" style="display:flex; align-items:Center; border:1px solid gray; background:#e9e9e9;">

	<button type="button" class="btn btn-sm btn-danger "style="height:30px; margin:2px" onClick="delt_inmatter(`+count_rewwwe+`, 'dsd')">Delete</button></span></div>`);
}


const delete_li = (txt)=>{
 	swal({
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) { 	
	$('#dsd'+txt).remove();
}})    
}




const add_doc = ()=>{
 count_wwe=1;
 count_wwe++;
$('#ad_dc').append(`<div id="dododod`+count_wwe+`" class="input-group my-2" style="display:flex !important">
	<input type ="file" class="form-control" name="other_doc[]" />
	<span class="input-group-text delete_btn" style="display:flex; align-items:Center; ">
	<button type="button" class="btn btn-sm btn-danger" style="height:30px; margin:2px" onclick="delete_add_doc(`+count_wwe+`)">Delete</button></span></div>`);
}


const delete_add_doc = (txt)=>{
 	swal({
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) { 	
	$('#dododod'+txt).remove();
}}) 
}



const shw_iip = (txt)=>{   
   if(txt=='IPE')
   {
       $('#neme_of_athrzd_sgntre').show();
   }
   else
   {
         $('#neme_of_athrzd_sgntre').hide();
         // $('#athr_prdx').val('');
   }
}



function validate_cmp(txt=""){
    
// if (txt=='') 
// {
//   $('#skks').html('<b style="color:red">Please enter name.</b>'); 
//    $("#btnSubmit").attr("disabled", true);
//    return false;  
// }    
var ursrsl = admin_pth+"/validate";
console.log(ursrsl);                    
$.ajax({ 
url     : ursrsl,
data : {txt:txt},
type    : 'GET',
success : function(resp)
{
var obj=JSON.parse(resp);	
if(obj.status==0)
{
$('#skks').html('<b style="color:green">Available</b>');
$("#btnSubmit").attr("disabled", false);
}
else if(obj.status == 1)
{
$('#skks').html('<b style="color:red">This company is already exist !</b>'); 
   $("#btnSubmit").attr("disabled", true);
}
else if(obj.status == 2)
{
$('#skks').html('<b style="color:red">Please enter name</b>'); 
   $("#btnSubmit").attr("disabled", true);
}
},
error:function(err)
              {
                console.log(err);
              }
}); 
    
}

        // input size auto increase script

function autoIncrease(input) {
      input.style.width = (input.value.length + 1) * 8 + 'px';
      }




function removeFiles(pth)
{
  
  var epath = admin_pth+pth;
  console.log(epath);
  
swal({
    //title: "Are you sure?",
    text: "Do you want to remove ?",
    icon: "warning",
    buttons: ["No", "Yes"],
    dangerMode: true,
  })
.then((willDelete) => {
    if (willDelete) {
$.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
  $.ajax({
      type: 'get',
      url:epath,
      cache: false,
      success: function(data) {
          console.log(data);
          var obj = JSON.parse(data);
          console.log(obj);
             
              if (obj.error) {
               errorMsg(obj.message);

          }
          else
          {
             $("#bannerSection").load(location.href + " #bannerSection"); 
            }
      },
      error:function(err)
      {
          console.log(err);
          errorMsg(obj.message);
      }
  })
}})
}






