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
                $formMethod = 'adminGeneral';
                @endphp
    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">Assign IRP/RP/AR</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/assigning-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="ipForm">
        <div class="box-body">
          <div class="row">   
           
            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Company <span class="required_cls">*</span></label>
                  {!! Form::select('company', $comps, null, ['onchange' =>'Removef("company");getComDtl(this.value,"appointment_date", "ipForm");', 'placeholder' => 'Please Select', 'id' => 'company', 'class'=>'form-control', 'autocomplete'=>'off']) !!}
                  <div class="error_cls" id="error_company"></div>
                </div>  

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">IP <span class="required_cls">*</span></label>
                  {!! Form::select('ip', $ips, (userType()->user_type==2) ? userType()->id : null, ['onchange' =>'Removef("ip")', 'placeholder' => 'Please Select', 'id' => 'ip', 'class'=>'form-control', 'autocomplete'=>'off']) !!}
                  <div class="error_cls" id="error_ip"></div>
                </div>
              </div>

              <div class="col-md-12">
              
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Designation <span class="required_cls">*</span></label>
                  {!! Form::select('designation', Config::get('site.designation'), null, ['onchange' =>'Removef("designation")', 'id' => 'designation', 'class'=>'form-control', 'autocomplete'=>'off']) !!}
                  <div class="error_cls" id="error_designation"></div>
                </div>  

                <div class="form-group col-md-6">
                  <label>Date of Appointment</label>
                  <input type="text" name="appointment_date" id="appointment_date" value="" autocomplete="off" onclick="Removef('appointment_date')" class="form-control">
                  <div class="error_cls" id="error_appointment_date"></div>
                  </div>
                </div>

              <div class="col-md-12">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  {!! Form::select('status', Config::get('site.status'), null, ['onchange' =>'Removef("status")' ,'id' => 'status','class'=>'form-control', 'autocomplete'=>'off']) !!}
                  <div class="error_cls" id="error_status"></div>
                </div>
            </div>
            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-abutton value="Assign" redirect="none" form="ipForm" btnId="ipBtn" path="/assign-ip" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_ipForm">
      <!-- <div class='col-md-6 col-md-offset-3 alert alert-dismissible alert-danger text-center text-capitalize'>its ok</div> -->
                        
  </div>

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

<script src="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.js') }}"></script>  

<script type="text/javascript">
   $('#appointment_date').datetimepicker({
    format: 'DD-MM-YYYY'
  });
</script>

@endsection  
@endsection  
