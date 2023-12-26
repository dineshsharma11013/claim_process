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

     @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $fileToUpload = 'Only jpg, png files allowed.';
                $accept = 'image/png, image/gif, image/jpeg';
                @endphp

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">Add Sabredge Representative</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/sabredge-representative')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="sabredgeForm">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">IP Name <span class="required_cls">*</span></label>
                  {!! Form::select('ip_name', $ips, null, ['onchange' =>'Removef("ip_name");getCompany(this.value)', 'placeholder'=>'Please Select' , 'id' => 'ip_name','class'=>'form-control']) !!}
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>

              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Comapny Name <span class="required_cls">*</span></label>
                  {!! Form::select('company_name', $company, null, ['onchange' =>'Removef("company_name")', 'placeholder'=>'Please Select' , 'id' => 'company_name','class'=>'form-control']) !!}
                  
                  <div class="error_cls" id="error_company_name"></div>
                </div>

                
            
            </div>
            <!-- /.col -->
            <div class="col-md-12">
               <x-input label="Designation" type="text" name="design"  placeholder="Designation" :comp="$comp" :colMd="$sixDiv"/> 

              <x-input label="Contact" type="text" name="mobile"  placeholder="Contact" :comp="$comp" :colMd="$sixDiv"/>
    
              <!-- /.form-group -->
            </div>

            <div class="col-md-12">
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Employee Name <span class="required_cls">*</span></label>
                  {!! Form::select('user_name', $employees, null, ['onchange' =>'Removef("user_name")', 'placeholder'=>'Please Select' , 'id' => 'user_name','class'=>'form-control']) !!}
                  
                  <div class="error_cls" id="error_user_name"></div>
                </div>

              <x-file label="Signature" type="file" name="file" :accept="$accept"  :colMd="$sixDiv" :fileToUpload="$fileToUpload"/>

               
            </div>
            <div class="col-md-12">

             

               <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  {!! Form::select('status', Config::get('site.status'), null, ['onchange' =>'Removef("status")' ,'id' => 'status','class'=>'form-control']) !!}
                  <div class="error_cls" id="error_status"></div>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
               <x-abutton value="Save" redirect="none" form="sabredgeForm" btnId="formBBtn" path="/save-sabredge-representative" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />

                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              </div>
        </form>
        <!-- /.box-body -->
        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@section('script')
<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection  
@endsection  
