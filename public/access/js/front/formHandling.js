console.log("hello world1s");
 var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
 
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";

}

$("#step1").css("background-color", "blue");


function checkAmount(fm, amt)
{
  
   var amtVal = $('#'+fm+' input[id="'+amt+'"]').val();  
   if (amtVal) {
   var output = $.isNumeric(amtVal);
   if (output==false) 
   {
   $('#'+fm+' [id="error_'+amt+'"]').html("Please enter only numeric value.");
        $('#'+fm+' [name="'+amt+'"]').css('border',brdr);
        $('#'+fm+' [name="'+amt+'"]').focus();
        return false;
  }
  }
  return true;
  
} 


function loadFile2(event,img_id, first, nm, errId)
{
  //console.log(event, img_id);
  
  $("#"+img_id).show();
  $("#"+first).hide();

  $('#'+nm).css('border','1px solid #ced4da');
  $("#"+errId).hide();

  var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById(img_id);
      output.src = reader.result;
      // var output = document.getElementById('profile-pic-user2');
      // output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
    $("#error_"+nm).hide();
}


function addSenction(tbl, input1, input2, input3)
{
  
   var table = $('#'+tbl);
   var rowcount = $('#'+tbl+' tr').length + 1;

  var newRow = `<tr id="row_`+tbl+`_`+rowcount +`">
                <td style="padding-right:30px;">
                    
                    <input type="date" class="`+input1+`" placeholder="enter date" name="`+input1+`[]" id="`+input1+rowcount+`" autocomplete="off" value=""></td>
               
                <td style="padding-right:30px;">
                    
                    <textarea placeholder="enter details" name="`+input2+`[]" id="`+input2+rowcount+`" style="width:425px;"></textarea>
                    
                    
                <input type="hidden" name="`+input3+`[]" value="">
                
                </td> 
                <td> <button class="btn btn-primary btn-sm" type="button" id="addMore" onclick="addSenction('`+tbl +`')">Add More</button>
                <button class="btn btn-primary btn-sm" type="button" onclick="delSenction('`+rowcount +`', '`+tbl +`')">Delete Row</button></td>
                </tr>`;
    $(table).append(newRow);              
}



 function handleChange(fm, check, id)
{
  
  let isChecked = $('#'+check)[0].checked;
  if (isChecked) 
  {
    $('#'+fm+' input[id="'+id+'"]').show(); 
  }
  else
  {
    $('#'+fm+' input[id="'+id+'"]').hide(); 
  }
}


function nextStepWithValidation2(hd, shw, first, second, mtd)
{
 if(mtd() != false) 
  { 
  $("#"+first).css("background-color", "#bbbbbb");
  $("#"+second).css("background-color", "blue");
  $("#"+hd).hide();
  $("#"+shw).show();   
}
  $(window).scrollTop(0);

}

function nextStepWithValidation(hd, shw, first, second)
{
  $("#"+first).css("background-color", "#bbbbbb");
  $("#"+second).css("background-color", "blue");
  $("#"+hd).hide();
  $("#"+shw).show();   

}

function next(hd, shw)
{
  $("#"+hd).hide();
  $("#"+shw).show();
  $(window).scrollTop(0);
}

function prev(hd, shw, first, second)
{
  $("#"+first).css("background-color", "#bbbbbb");
  $("#"+second).css("background-color", "blue");
  $("#"+hd).hide();
  $("#"+shw).show(); 
  $(window).scrollTop(0);
}

function getTotal(pr, int, ttl)
{
  //console.log(pr);
  var pr_amt = $("#"+pr).val();
  var int_amt = $("#"+int).val();
  var ttl_amt = $("#"+ttl).val();
   //console.log(pr_amt, int_amt); 
  
  if (pr_amt) 
  {
    if (int_amt) 
    {
     ttl_amt = parseFloat(pr_amt) + parseFloat(int_amt); 
    $("#"+ttl).val(ttl_amt);
    }
    else
    {
    $("#"+ttl).val(pr_amt);
    }
  }
}


function myFunction()
{
 
  var table = $('#myTable1');
  var rowcount = $('#myTable1 tr').length + 1;
  var newrow = `<tr id="row`+rowcount +`">
                       <td><input type='text' placeholder='enter document name' id="other_doc`+rowcount +`" name="other_doc[]" autocomplete="off"></td>
                    <td><input type='file' name="other_doc_file[]" id="other_doc_file`+rowcount +`"></td> 
                    <input type="hidden" name="other_doc_id[]" value="">
                    <input type="hidden" name="other_doc_file_old[]" id="other_doc_file_old" value="">
                    <td> <button class="btn btn-primary btn-sm" type="button" id="addMore" onclick="myFunction()">Add More</button>
                    <button class="btn btn-primary btn-sm" type="button" onclick="del('`+rowcount+`')">Delete Row</button></td> 
                  </tr>`;

    $(table).append(newrow);
    //console.log(rowcount);
}

function del(row, rowId=null, pth=null, btn=null, frm, errMsg)
{
  var rowcount = $('#myTable1 tr').length;
  
  if (rowcount == 1) 
  {
    alert("can not remove this row.")
  }
  else 
  {
    if (rowId!=null && pth!=null) 
    {
      var epath = b_pth+pth+'/'+rowId;
      var submit_btn_text=$("#"+btn+row).html();
     // console.log(row, rowId, epath);
      
     $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
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
                $("#row"+row).remove();
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
      $("#row"+row).remove();
    }
  }
  
}

function delSenction(row, tbl, rowId=null, pth=null, btn=null, frm=null, errMsg=null, mdl=null)
{
 // console.log("clicked");
  var rowcount = $('#'+tbl+' tr').length;
  //console.log(rowcount);return false;

  if (rowcount == 1) 
  {
    alert("can not remove this row.")
  }
  else 
  {
    if (rowId!=null && pth!=null) 
    {
      var epath = b_pth+pth+'/'+rowId;
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
  
}


function getSignature(pth, div)
{
    var epath = b_pth+pth;
    console.log(epath);
    var fid = $("#fid").val();
    var updated_data = $("#updated_data").val();
    $("#"+div).html('');
    
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
              data:{fid:fid, updated_data:updated_data},
              success:function(data){
                $("#"+div).html('');
                console.log(data);             
            //var obj = JSON.parse(data);
            $("#"+div).html(data);

                },
        error : function(err)
        {
          console.log(err);
        }
  }); 

}


function validateData(fm, btn, hd, shw, mtd, step1, step2, pth, errMsg, getData=false, fileUrl=false, tableUrl=false, signPth=false, signDiv=false)
{
//	console.log(getData);
  if(mtd() != false) 
  {
    var formData = new FormData($('#'+fm)[0]);
   var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  var fid = $("#fid").val();
  var updated_data = $("#updated_data").val(); 
  console.log(updated_data, epath);//return false;
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'post',  
              url:epath,
              data:formData,
              cache: false,
              contentType: false,  
                processData:false,
              beforeSend: function () {
             $("#"+btn).prop("disabled", true);; 
              $("#"+btn).html('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
            var obj = JSON.parse(data);
             if (obj.error) 
             {
              var msg = "<div class='col-md-6 col-md-offset-3 alert alert-dismissible alert-danger text-center'>"+obj.msg+"</div>";
              $('#'+errMsg).html(msg);         
                    setTimeout(function() {
                      $('#'+errMsg).fadeOut('slow');
                    }, time_period);
             }
             else
             {
              $("#"+step1).css("background-color", "#bbbbbb");
              $("#"+step2).css("background-color", "blue");
                $("#"+hd).hide();
                $("#"+shw).show();
                if (getData!=false && fileUrl !=false) 
                {
                  getData(fm, 'fileField', fileUrl);
                  updateTableData(fm, 'myTable1', tableUrl);
                  getSignature(signPth, signDiv);
                }
                else if (getData!=false && fileUrl ==false) 
                {
                  getData(fid, updated_data);
                  getSignature(signPth, signDiv);
                }
             }


                },
        error : function(err)
        {
          console.log(err);
          serverErrorMsg('errMessage_'+fm);
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }
      
  }); 
    
  }
}


function validateData2(fm, btn, hd, shw, mtd, step1, step2, pth, errMsg, pth2)
{
  if(mtd() != false) 
  {
    var formData = new FormData($('#'+fm)[0]);
   var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  var epath2 = b_pth+pth2; //'/form/get-formca-updated-table';
 var updated_data = $("#updated_data").val(); 
var fid = $("#fid").val();

     console.log(epath, fid);
  //$("#myTable1").load(location.href + " #myTable1");

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

$.ajax({
                        type:'get',  
                            url:epath2,
                            data:{fid:fid, updated_data:updated_data},
                            cache: false, 
                            success:function(data1){
                              $("#myTable1").empty();
                          $("#myTable1").append(data1);    

          $.ajax({
                  type:'post',  
                      url:epath,
                      data:formData,
                      cache: false,
                      contentType: false,  
                        processData:false,
                      beforeSend: function () {
                     $("#"+btn).prop("disabled", true);; 
                      $("#"+btn).html('Please wait...'); 
                    },
                      success:function(data){
                        console.log(data);             
                   // var obj = JSON.parse(data);
                     // if (obj.error) 
                     // {
                     //  var msg = "<div class='col-md-6 col-md-offset-3 alert alert-dismissible alert-danger text-center'>"+obj.msg+"</div>";
                     //  $('#'+errMsg).html(msg);         
                     //        setTimeout(function() {
                     //          $('#'+errMsg).fadeOut('slow');
                     //        }, time_period);
                     // }
                     // else
                     // {
                      $("#"+step1).css("background-color", "#bbbbbb");
                      $("#"+step2).css("background-color", "blue");
                        $("#"+hd).hide();
                        $("#"+shw).show();
                        
                     //   getPreview(fid, updated_data);
                    //  }
                     
                        },
                error : function(err)
                {
                  console.log(err);
                  serverErrorMsg('errMessage_'+fm);
                  
                },
                complete: function () {
                      $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
                    }
              
          }); 
    
  },
   error : function(err1)
                      {
                        console.log(err1);
                        
                      }
})

}
}


function updateTableData(fm, table, pth)
{
  var epath = b_pth+pth;
  var fid = $("#fid").val();
  var updated_data = $("#updated_data").val();
  $("#"+table).empty();
  console.log(epath);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
              data:{fid:fid, updated_data:updated_data},
              cache: false, 
              success:function(data){
               // console.log(data);             
             
                $("#"+table).append(data);
                $(window).scrollTop(0);
                },
        error : function(err)
        {
          console.log(err);
          
        }
})
}


function updateFileData(fm, div, pth)
{
  var epath = b_pth+pth;
  //console.log(epath);  
  var fid = $("#fid").val();
  var updated_data = $("#updated_data").val();
  $("#"+div).empty();
  //console.log(epath, fid, updated_data);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
              data:{fid:fid, updated_data:updated_data},
              cache: false, 
              success:function(data){
               // console.log(data);             
             
                $("#"+div).html(data);
                $(window).scrollTop(0);

                },
        error : function(err)
        {
          console.log(err);
          
        }
})
}


function formSubmit(fm, btn, pth)
{
  console.log("clicked");
  var method = "";

  // if (mtd() != false) 
  // {  

    
  var epath = b_pth+pth;
 // console.log(epath);
  var formData = new FormData($('#'+fm)[0]);
   var submit_btn_text=$("#"+btn).html();  
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'post',  
              url:epath,
              data:formData,
              cache: false,
              contentType: false,  
                processData:false,
              beforeSend: function () {
             $("#"+btn).prop("disabled", true);; 
              $("#"+btn).html('Please wait...'); 
            },
              success:function(data){
                console.log(data);             
             var obj = JSON.parse(data);
             Msg(obj.error,obj.cls, obj.message, fm, 'errMessage_'+fm);
              
                },
        error : function(err)
        {
          console.log(err);
          serverErrorMsg('errMessage_'+fm);
          
        },
        complete: function () {
              $("#"+btn).removeAttr("disabled"),jQuery("#"+btn).html(submit_btn_text); 
            }

      
  }); 
//}
}

function updateFile(fm, pth, id, index, tbl)
{
	var epath = b_pth+pth+'/'+id;
  
  //console.log(epath, index);

  var formData = new FormData($('#'+fm)[0]);
  formData.append('index', index);
  formData.append('table', tbl);

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'post',  
              url:epath,
              data:formData,
              cache: false,
              contentType: false,  
               processData:false,
              success:function(data){
                console.log(data);             
             
              //  $("#"+table).append(data);
                },
        error : function(err)
        {
          console.log(err);
          
        }
})
}




