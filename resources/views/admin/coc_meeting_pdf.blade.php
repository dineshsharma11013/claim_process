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
          
              <h3 class="box-title">COC Meeting Details</h3>
              
          <div class="box-tools pull-right">
                  @foreach(getCompanyDetails() as $iv)
          @if($iv->id == $id)
          <a href="{{url(admin().'/dashboard-user/'.$id)}}" class="text text-info" style="font-weight: bold;font-size: 16px;text-transform: uppercase;float: right;">{{$iv->name}}</a>
           
          @endif
        @endforeach 
           <button type='button' class='btn btn-primary' id="on_cha" style="float:right;margin-right: 25px;" onClick="show_form(1)">Add COC Meeting</button>
          </div>
        </div>
        <!-- /.box-header -->
    
        <form id="reportPdfForm" style="display: none;">
        
        <div class="box-body">
         <div class="row">
          <!--  -->
            
            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Name <span class="required_cls">*</span></label>
                  <input type="hidden" name="comp_id" id="comp_id" class="form-control" value="{{$id}}" autocomplete="off">
                  <input type="text" name="name" id="name" class="form-control" value="" onkeypress ="Removef('name')" placeholder="Enter name" autocomplete="off">
                  
                  <div class="error_cls" id="error_name"></div>
                </div>     
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">File </label>
                  <input type="file" name="dcmt" id="dcmt" onchange="Removef('dcmt')" class="form-control">
                  
                  <div class="error_cls" id="error_dcmt"></div>
                </div> 
              </div>
               <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Type <span class="required_cls">*</span></label>
                 
                <select name="type" id="type" class="form-control" autocomplete="off">
                <option value="">Choose type</option>
                
                <option value="Notice & Agenda">Notice & Agenda</option>
                <option value="Minutes of meeting">Minutes of meeting</option>
                <option value="Voting Result">Notice & Agenda</option>
                
                </select>
  
                  <div class="error_cls" id="error_name"></div>
                </div>     
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">COC Meeting number </label>
                  <input type="text" name="coc_meeting_nmbr" id="mtng_nbr" class="form-control">
                  
                  <div class="error_cls" id="error_coc_meeting"></div>
                </div> 
              </div>
              <div class="col-md-12">
                  
                 <div class='form-group col-md-12'>
                     
                      <label for="exampleInputEmail1">Date of COC Meeting </label>
                  <input type="date" name="date_of_coc" id="mtng_date" class="form-control col-md-12">
                 </div> 
                  
              </div>
            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-abutton value="Save" redirect="none" form="reportPdfForm" btnId="formBBtn" path="/submit_coc" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_reportPdfForm">
    
                        
  </div>

              </div>
        </form>
  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>name</th>
                <th>Document</th>
                <th>Type</th>
                 <th>Meeting number</th>
                   <th>Coc meeting date</th>
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
        <td>{{$item->pdf_name }}</td>
         <td>
          @if(!empty($item->pdf))
                    @if(file_exists(publicP() . '/access/media/company/coc/'.$item->pdf))
                     <a href="{{ asset('public/access/media/company/coc/'.$item->pdf) }}" target="_blank"> View document</a>
                    @endif @endif 

         
        </td>
        
        <td>
            {{$item->type}}
            
        </td>
         <td>
            {{$item->coc_meeting_number}}
            
        </td>
         <td>
            {{$item->coc_meeting_date}}
            
        </td>
        
        
        
        <td> 
          <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-coc-meeting/'.$item->id)}}"><i class="fa fa-edit"></i> Edit</a>

          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-coc-meeting/{{$item->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

       <!--   <a href="{{ route('delete_report_pdf', ['id' => $item->id]) }}" class='btn btn-danger'>Delete</a> -->
       </td>
        </tr>
@endforeach
            </tbody>
              </table>
            </div>
        
<!----------my code start------------------>



<!----------my code end------------------------>        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>




@section('script')
<script>
function show_form(id)
{
   
   if(id == 1)
   {
    $('#reportPdfForm').slideDown('slow');
    $('#on_cha').attr('onClick','show_form(2)');
   }else{
      $('#reportPdfForm').slideUp('slow');  
        $('#on_cha').attr('onClick','show_form(1)');
   }
}
</script>
<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection  
@endsection  
