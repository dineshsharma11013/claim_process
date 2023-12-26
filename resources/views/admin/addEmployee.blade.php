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
          
              <h3 class="box-title">Add Employee</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/employee-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="employeeForm">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              
                <x-input label="Name" type="text" name="user_name"  placeholder="Name" :comp="$comp" :colMd="$sixDiv"/>
               
               <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Employee Type <span class="required_cls">*</span></label>
                  {!! Form::select('emp_type', Config::get('site.emp_type'), null, ['onchange' =>'Removef("emp_type");getInvoice(this.value);', 'placeholder'=>'Please Select' , 'id' => 'emp_type','class'=>'form-control']) !!}
                  
                  <div class="error_cls" id="error_emp_type"></div>
                </div> 
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            
            <div class="col-md-12">
               <x-input label="Designation" type="text" name="design"  placeholder="Designation" :comp="$comp" :colMd="$sixDiv"/> 

              <x-input label="Contact" type="text" name="mobile"  placeholder="Contact" :comp="$comp" :colMd="$sixDiv"/>
    
              <!-- /.form-group -->
            </div>

            <div class="col-md-12">
               <x-input label="Email" type="text" name="email"  placeholder="Email" :comp="$comp" :colMd="$sixDiv"/> 

              <x-file label="Profile Image" type="file" name="file" :accept="$accept"  :colMd="$sixDiv" :fileToUpload="$fileToUpload"/>

    
              <!-- /.form-group -->
            </div>

            <div class="col-md-12">

              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Employee Id <span class="required_cls">*</span></label>
                  <input type="text" name="emp_id" id="emp_id" value="" onkeyup="Removef('emp_id')" class="form-control" placeholder="Employee Id" autocomplete="off" style="border: 1px solid rgb(206, 212, 218);" readonly>
                  
                  <div class="error_cls" id="error_emp_id"></div>
                </div>

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
               <x-abutton value="Save" redirect="none" form="employeeForm" btnId="formBBtn" path="/save-employee" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />

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
