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
          
              <h3 class="box-title">Court</h3>
          <div class="box-tools pull-right">
            <button type="button" onclick="window.history.back();" class="{{Config::get('site.addDataBtn')}}" style="float: right;margin: inherit;">Back</button>
           <a href="{{url(admin().'/dashboard-user/'.$id)}}" class="text text-info" style="font-weight: bold;font-size: 16px;text-transform: uppercase;float: right;margin-right: 10px;">{{compny($id)->name}}</a>
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
        <form action="{{ route('submit_nclt_pdf') }}" method="POST" enctype="multipart/form-data">
              @csrf
        <div class="box-body">
         <div class="row">
          <!--  -->
            
            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Court name <span class="required_cls">*</span></label>
                  <input type="hidden" value="{{$id}}" name="comp_id">
                  <select name="pdf_neme" class="form-control"autocomplete="off" required>
            <option vlaue="">Choose court</option>   
            <option value="NCLT">NCLT</option>
            <option value="NCLAT">NCLAT</option>
            <option value="HIGH COURT">HIGH COURT</option>
            <option value="SUPREME COURT">SUPREME COURT</option>
            
                </select>
                  
                  <div class="error_cls" id="error_name"></div>
                </div>     
                  <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">PDF Document <span class="required_cls">*</span></label>
                 
                  <input type="file" name="dcmt" class="form-control" required>
                  
                  <div class="error_cls" id="error_name"></div>
                </div> 
              </div>
              
              
              <div class="col-md-12">
                  
                  <div class="form-group col-md-6">
                   <label for="exampleInputEmail1">For / Against <span class="required_cls">*</span></label>
                      <select name="for_against" class="form-control"autocomplete="off" required>
            <option vlaue="">Choose For/Against</option>   
            <option value="For">For</option>
            <option value="Against">Against</option>
                </select>
                      
                  </div>
                  
                  
                  
                  
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Type <span class="required_cls">*</span></label>
            <select name="type" class="form-control"autocomplete="off" required>
            <option vlaue="">Choose Type</option>   
            <option value="Order">Order</option>
            <option value="Reply">Reply</option>
            <option value="Others">Others</option>
            </select>
            
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
  <div class="box-body">
              
            </div>
        
<!----------my code start------------------>

<!-- Modal -->
  
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit pdf report</h4>
        </div>
        <div class="modal-body">
         <form action="#" method="POST">
              @csrf
                     <div class="box-body">
         <div class="row">
       
            
            <div class="col-md-12">
              
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Pdf name <span class="required_cls">*</span></label>
<input type="hidden" name="dmt_id" id="dcmt_id">
<input type="text" name="pdf_neeem" id="pdf_nesme" class="form-control" placeholder="Enter publication category" autocomplete="off" required="">

</div>           
          
          <div class="form-group col-md-6">
<label for="exampleInputEmail1">File <span id="file_vw">View file</span></label>
<input type="file" name="pdfFile" class="form-control"  autocomplete="off" required="">

</div>      
                
                <div class="form-group col-md-6" style="
    margin-top: 25px;">
                     <label for="exampleInputEmail1"> <span style="color:white">*</span></label>
        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              
              


            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<!----------my code end------------------------>        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@section('script')

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
