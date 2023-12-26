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
          
              <h3 class="box-title">Update Publication</h3>
          <div class="box-tools pull-right">
           
          </div>
        </div>
        <!-- /.box-header -->
    
        <form id="reportPdfForm">
        
        <div class="box-body">
         <div class="row">
          <!--  -->
            
            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Format name <span class="required_cls">*</span></label>
                  <input type="hidden" value="{{$id}}" name="comp_id">
                  <input type="text" name="name" id="name" class="form-control" value="{{$cat->pdf_name}}" onkeypress ="Removef('name')" placeholder="Enter name" autocomplete="off">
                  
                  <div class="error_cls" id="error_name"></div>
                </div>     
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Document </label>
                  <input type="file" name="dcmt" id="dcmt" onchange="Removef('dcmt')" class="form-control">
                  @if(!empty($cat->pdf))
                    @if(file_exists(publicP() . '/access/media/publication/pdf/'.$cat->pdf))
                     <a href="{{ asset('public/access/media/publication/pdf/'.$cat->pdf) }}" target="_blank"> View document</a>
                    @endif @endif 
                  <div class="error_cls" id="error_dcmt"></div>
                </div> 
              </div>


            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-abutton value="Update" redirect="none" form="reportPdfForm" btnId="formBBtn" path="/update-publication/{{$cat->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_reportPdfForm">
    
                        
  </div>

              </div>
        </form>





<!----------my code end------------------------>        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>




@section('script')
<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection  
@endsection  
