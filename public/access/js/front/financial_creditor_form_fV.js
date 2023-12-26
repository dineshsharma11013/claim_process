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
    $("#financialCreditorFormF :input").prop("disabled", true);
    $("#financialCreditorFormF :button").prop("disabled", false);
    $("#financialCreditorFormF input[id='operationalCreditorFormBtn']").prop("disabled", true);
  }
}


function myFunction()
{
 
  
}

function del(row, rowId=null, pth=null, btn=null, frm, errMsg)
{
  
  
}
function nextStepWithValidation(hd, shw, first, second)
{

  $("#"+first).css("background-color", "#bbbbbb");
  $("#"+second).css("background-color", "blue");
  $("#"+hd).hide();
  $("#"+shw).show();   

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
//  console.log(getData);
 
    var fid = $("#fid").val();
    var updated_data = $("#updated_data").val();
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


function formSubmit(fm, btn, pth)
{
  
}

function updateFile(fm, pth, id, index, tbl)
{
  
}


