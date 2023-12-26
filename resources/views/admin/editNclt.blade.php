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
          
              <h3 class="box-title">Update Court</h3>
          <div class="box-tools pull-right">
           
          </div>
        </div>
        <!-- /.box-header -->
    
        <form id="reportPdfForm" enctype="multipart/form-data">
        
        <div class="box-body">
         <div class="row">
          <!--  -->
            
            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Court name <span class="required_cls">*</span></label>
                  <input type="hidden" value="{{$id}}" name="comp_id">
                  <select  name="name" id="name" class="form-control" autocomplete="off">
                      <option value="">Choose Court name</option>
                   <option value="NCLT" @if($cat->pdf_name=="NCLT") selected @endif>NCLT</option>
                   <option value="NCLAT" @if($cat->pdf_name=="NCLAT") selected @endif>NCLAT</option>
                   <option value="HIGH COURT" @if($cat->pdf_name=="HIGH COURT") selected @endif>HIGH COURT</option>
                   <option value="SUPREME COURT" @if($cat->pdf_name=="SUPREME COURT") selected @endif>SUPREME COURT</option>
                     
                      </select>
                  
                  <div class="error_cls" id="error_name"></div>
                </div>     
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">File </label>
                  <input type="file" name="dcmt" id="dcmt" onchange="Removef('dcmt')" class="form-control">
                  @if(!empty($cat->pdf))
                    @if(file_exists(publicP() . '/nclt_pdf/'.$cat->pdf))
                     <a href="{{ asset('public/nclt_pdf/'.$cat->pdf) }}" target="_blank"> View document</a>
                    @endif @endif 
                  <div class="error_cls" id="error_dcmt"></div>
                </div> 
              </div>
              
              
              <div class="col-md-12">
                  
                  <div class="form-group col-md-6">
                   <label for="exampleInputEmail1">For / Against <span class="required_cls">*</span></label>
                      <select name="for_against" class="form-control" autocomplete="off" required="">
            <option vlaue="">Choose For/Against</option>   
            <option value="For" @if($cat->for_against=="For") selected @endif>For</option>
            <option value="Against" @if($cat->for_against=="Against") selected @endif>Against</option>
                </select>
                      
                  </div>
                  
                  
                  
                  
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Type <span class="required_cls">*</span></label>
            <select name="type" class="form-control" autocomplete="off" required="">
            <option vlaue="">Choose Type</option>   
            <option value="Order"  @if($cat->type=="Order") selected @endif>Order</option>
            <option value="Reply" @if($cat->type=="Reply") selected @endif>Reply</option>
            <option value="Others" @if($cat->type=="Others") selected @endif>Others</option>
            </select>
            
            </div>
                  
                  
                  
              </div>
              
              


            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-abutton value="Update" redirect="none" form="reportPdfForm" btnId="formBBtn" path="/update-nclt/{{$cat->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
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
