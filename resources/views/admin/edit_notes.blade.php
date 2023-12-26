@extends("admin_layout.main")

@section("container")


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">Add Notes</h3>
          <div class="box-tools pull-right">
           
          </div>
        </div>
        <!-- /.box-header -->
        <div id="successMessage">
        @if(session('success'))
    <div class="alert alert-success" style="max-width: 300px; margin: 0 auto; padding: 10px; background-color: #d4edda; border-color: #c3e6cb; color: #155724; border: 1px solid; border-radius: 5px; text-align: center;">
        {{ session('success') }}
    </div>
@endif

 @if(session('error'))
    <div class="alert alert-danger"  style="max-width: 300px; margin: 0 auto; padding: 10px; background-color: #d4edda; border-color: #c3e6cb; color: #155724; border: 1px solid; border-radius: 5px; text-align: center;">
        {{ session('error') }}
    </div>
@endif
</div>
        <form action="{{ route('submit_edit_notes') }}" method="POST" enctype="multipart/form-data">
              @csrf
        <div class="box-body">
         <div class="row">
          <!--  -->
            
            <div class="col-md-12">
              
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Title <span class="required_cls">*</span></label>
                  <input type="hidden" value="{{$id}}" name="nots_id">
                  <input type="text" name="title" value="{{$data->title}}" class="form-control" placeholder="Enter title" autocomplete="off" required>
                  
                  <div class="error_cls" id="error_name"></div>
                </div>     
                  <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Description <span class="required_cls">*</span></label>
                  <textarea name="dscptn" placeholder="Enter Description" class="form-control" required cols='10' row='5'>{{$data->description}}</textarea>
                  
                  <div class="error_cls" id="error_name"></div>
                </div> 
              </div>


            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
               <button type="submit" class='btn btn-primary'>Submit</button>
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_companyForm">
      <!-- <div class='col-md-6 col-md-offset-3 alert alert-dismissible alert-danger text-center text-capitalize'>its ok</div> -->
                        
  </div>

              </div>
        </form>
 
       
<!----------my code start------------------>

<!-- Modal -->
  
      

<!----------my code end------------------------>        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> 
<script src="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.js') }}"></script> 
<script>
    // Add JavaScript to hide the success message after 5 seconds
    window.onload = function() {
        setTimeout(function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    };
    
    
</script>







<script type="text/javascript">
//  $('#irp').select2();



  $('#insolvency_commencement_date').datetimepicker({
    format: 'YYYY-MM-DD'
  }).on("dp.change", function (e) {
     //console.log(e.date._d);
    
     var startDt = $('#insolvency_commencement_date').val(); 
      
     var mm2Dt = moment(startDt).add('days', 14);
     var cl2Dt = mm2Dt.format('YYYY-MM-DD');  

     var mmDt = moment(startDt).add('days', 180);
     var clDt = mmDt.format('YYYY-MM-DD');
     $("#end_date").val(clDt);
     $("#claim_filing_date").val(cl2Dt);


    
});
  $('#claim_filing_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });

  $('#start_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#end_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });



function get_data(pdf_name , file_path ,iid)
{
    $('#pdf_nesme').val(pdf_name);
     $('#dcmt_id').val(iid);
     
      var encodedFilePath = encodeURIComponent(file_path);
    $('#file_vw').html('<a href="' + encodedFilePath + '">View File</a>');
     //$('#file_vw').html('<a href='+file_path+'>View File</a>');
     // $('#ctgy_id').val(file_path);
}



</script>

@endsection  
@endsection  
