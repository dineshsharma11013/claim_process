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
          
              <h3 class="box-title">Create publication category</h3>
          <div class="box-tools pull-right">
           <button type="button" class="btn btn-danger" onclick="window.history.back();">Back</button>
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
        <form action="{{ route('submit_publication') }}" method="POST" >
              @csrf
        <div class="box-body">
         <div class="row">
          <!--  -->
            
            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Publication category <span class="required_cls">*</span></label>
                  <input type="text" name="pblctn_ctgry" value="" class="form-control" placeholder="Enter publication category" autocomplete="off" required>
                  
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

  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Category name</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                    
                    
                <?php 
                $sno=1;
                ?>
              @foreach ($data as $item)
    <!-- Display data here -->
    <tr>
        <td>{{$sno++}}</td>
        <td>{{$item->category_name }}</td>
        <td><a href="#" onClick="get_catg_dtl('{{$item->category_name}}','{{$item->id}}');" class='btn btn-primary' data-toggle="modal" data-target="#myModal">Edit</a> <a href="{{ route('delete_category', ['id' => $item->id]) }}" class='btn btn-danger'>Delete</a></td>
        </tr>
@endforeach
            </tbody>
              </table>
            </div>



        <!-- /.box-body -->
        
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Category</h4>
        </div>
        <div class="modal-body">
         <form action="{{ route('update_publication_category') }}" method="POST">
              @csrf
                     <div class="box-body">
         <div class="row">
       
            
            <div class="col-md-12">
              
<div class="form-group col-md-6">
<label for="exampleInputEmail1">Publication category <span class="required_cls">*</span></label>
<input type="hidden" name="cty_idd" id="ctgy_id">
<input type="text" name="pblctn_ctgry" id="pblc_ctgy" class="form-control" placeholder="Enter publication category" autocomplete="off" required="">

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



function get_catg_dtl(ctgy_neme , ctgy_id)
{
    $('#pblc_ctgy').val(ctgy_neme);
     $('#ctgy_id').val(ctgy_id);
}



</script>

@endsection  
@endsection  
