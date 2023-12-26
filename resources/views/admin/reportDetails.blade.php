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
          
              <h3 class="box-title">Generate Report</h3>
              
              <div class="box-tools pull-right">
            <a href="javascript:void(0);" onclick="window.history.go(-1); return false;" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
         <!--  <div class="box-tools pull-right">
            <a href="{{url(admin().'/ar-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div> -->
        </div>
        <!-- /.box-header -->
        <form role="form" id="reportForm" action="{{url(admin().'/generate-report')}}" method="post" onsubmit="return generateReport()">
          @csrf
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
              @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
                
                 <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Select Company <span class="required_cls">*</span></label>
                  {!! Form::select('company', $company, $company, ['onchange' =>'Removef("company")' ,'id' => 'company','class'=>'form-control']) !!}
                  <div class="error_cls" id="error_company"></div>
                </div>

                <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Select Form <span class="required_cls">*</span></label>
                  {!! Form::select('form', Config::get('site.formNames'), null, ['onchange' =>'Removef("form")' ,'id' => 'form','class'=>'form-control', 'placeholder'=>'Select Form']) !!}
                  <div class="error_cls" id="error_form"></div>
                </div>
   
                <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Select Report Type <span class="required_cls">*</span></label>
                  {!! Form::select('report_type', Config::get('site.formTypes'), null, ['onchange' =>'Removef("report_type")' ,'id' => 'report_type','class'=>'form-control', 'placeholder'=>'Select Form Type']) !!}
                  <div class="error_cls" id="error_report_type"></div>
                </div>

              </div>

          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">

               <!-- <button onclick="generateReport('reportForm', 'reportFormBtn', '/generate-report')" id="reportFormBtn" type="button" class="btn btn-primary btn-sm">Generate</button>  -->

               <button type="submit" id="reportFormBtn"  class="btn btn-primary btn-sm">Generate</button> 

                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_reportForm">
      <!-- <div class='col-md-6 col-md-offset-3 alert alert-dismissible alert-danger text-center text-capitalize'>its ok</div> -->
       @if(Session::has("success"))
       <div class="alert alert-success text-center col-md-offset-4 col-md-4" id="msg">{{ Session::get("success")}}</div> 
       @endif
@if(Session::has("danger"))
<div class="alert alert-danger text-center col-md-offset-4 col-md-4" id="msg">{{ Session::get("danger")}}</div> 
@endif          
  </div>

              </div>

        </form>

        


        <!-- /.box-body -->
        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@section('script')

<x-js :file="$jsl" />
@endsection  
@endsection  
