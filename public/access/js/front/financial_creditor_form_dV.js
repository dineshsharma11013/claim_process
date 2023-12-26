console.log("hello world1s");
 var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
viewData();

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

function viewData()
{
  var view_data = $("#view_data").val();
   
  if (view_data != '') 
  {
    $("#financialCreditorFormD :input").prop("disabled", true);
    $("#financialCreditorFormD :button").prop("disabled", false);
    $("#financialCreditorFormD input[id='operationalCreditorFormBtn']").prop("disabled", true);
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

function updateFileData(fm, div, pth)
{
  var epath = b_pth+pth;
  var fid = $("#fid").val();
  var updated_data = $("#updated_data").val();

  $("#"+div).empty();
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
              //  console.log(data);             
             
                $("#"+div).html(data);
                },
        error : function(err)
        {
          console.log(err);
          
        }
})
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
var fid = $("#fid").val();
var updated_data = $("#updated_data").val();
console.log(fid, updated_data);

$("#"+step1).css("background-color", "#bbbbbb");
              $("#"+step2).css("background-color", "blue");
                $("#"+hd).hide();
                $("#"+shw).show();
                if (getData!=false) 
                {
                 // getData(getDataPosition, fid,updated_data);
                  getData(fm, 'fileField', fileUrl);
                  updateTableData(fm, 'myTable1', tableUrl);
                  getSignature(signPth, signDiv);
                }
}


function validateData2(fm, btn, hd, shw, mtd, step1, step2, pth, errMsg)
{
  var fid = $("#fid").val();
  var updated_data = $("#updated_data").val(); 
   $("#"+step1).css("background-color", "#bbbbbb");
                      $("#"+step2).css("background-color", "blue");
                        $("#"+hd).hide();
                        $("#"+shw).show();
                        getPreview(fid, updated_data);
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

function updateFile(fm, pth, id, index, tbl)
{
	
}

function formSubmit(fm, btn, pth)
{
  
}

