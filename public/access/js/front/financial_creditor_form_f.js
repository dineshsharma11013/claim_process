console.log("hello world1s");
 var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
 
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";

}

$("#step1").css("background-color", "blue");

function next(hd, shw)
{
  $("#"+hd).hide();
  $("#"+shw).show();
}

function prev(hd, shw, first, second)
{
  $("#"+first).css("background-color", "#bbbbbb");
  $("#"+second).css("background-color", "blue");
  $("#"+hd).hide();
  $("#"+shw).show(); 
}

function nextStepWithValidation(hd, shw, first, second)
{

  $("#"+first).css("background-color", "#bbbbbb");
  $("#"+second).css("background-color", "blue");
  $("#"+hd).hide();
  $("#"+shw).show();   

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
    $("#otherDocP").hide();
    //alert("can not remove this row.")
  }
  // else 
  // {
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
 // }
  
}


function validateData(fm, btn, hd, shw, mtd, step1, step2, pth, errMsg, getData=false, getDataPosition=false)
{
//	console.log(getData);
  if(mtd() != false) 
  {
    var formData = new FormData($('#'+fm)[0]);
    var submit_btn_text=$("#"+btn).html();   
    var epath = b_pth+pth;
    var fid = $("#fid").val();
  console.log(epath);
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
                if (getData!=false) 
                {
                	getData(getDataPosition, fid);
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


function validateData2(fm, btn, hd, shw, mtd, step1, step2, pth, errMsg)
{
  if(mtd() != false) 
  {
    var formData = new FormData($('#'+fm)[0]);
   var submit_btn_text=$("#"+btn).html();   
  var epath = b_pth+pth;
  var epath2 = b_pth+'/form/get-formf-updated-table';
  var fid = $("#fid").val();
  console.log(epath);

  
  //$("#myTable1").load(location.href + " #myTable1");

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

$.ajax({
                        type:'get',  
                            url:epath2,
                            data:{fid:fid},
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
                        getPreview(fid);
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
              data:{fid:fid},
              cache: false, 
              success:function(data){
                console.log(data);             
              $("#otherDocP").show();
                $("#"+table).append(data);
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


function declaration(place, fid)
{


	var epath = b_pth+'/get-formf-declaration';
	  console.log(epath);

	  $.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      }
	  });
	  $.ajax({
	          type:'get',  
	              url:epath,
                data:{fid:fid},
	              cache: false, 
	              success:function(data){
	                //console.log(data);             
	                 $("#"+place).html(data); 
	                },
	        error : function(err)
	        {
	          console.log(err);
	          
	        }
	})
}

function getPreview(fid)
{
  var epath = b_pth+'/get-formf-preview';
  console.log(epath);

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
          type:'get',  
              url:epath,
              data:{fid:fid},
              cache: false, 
              success:function(data){
                //console.log(data);             
                 $("#formFPreview").html(data); 
                },
        error : function(err)
        {
          console.log(err);
          
        }
}) 
}
