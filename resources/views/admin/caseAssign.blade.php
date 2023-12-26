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
          
              <h3 class="box-title">Assign Case </h3>
          <div class="box-tools pull-right">
            <a href="javascript:void(0);" onclick="window.history.go(-1); return false;" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
        <!-- /.box-header -->
        <form role="form" id="caseAssignForm">
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">

              <input type="hidden" name="company_id" value="{{$id}}">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Team Member <span class="required_cls">*</span></label>
                  {!! Form::select('assigned_to', $users, null, ['onchange' =>'Removef("assigned_to")' ,'id' => 'assigned_to','class'=>'form-control', 'autocomplete' => 'off', 'placeholder'=>'Please Select']) !!}
                  <div class="error_cls" id="error_assigned_to"></div>
                </div>
                
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1" style="width: 100%">Rights <span class="required_cls">*</span></label>
                  <select onchange="Removef('rights')" id="rights" multiple="multiple" class="form-control" name="rights[]" autocomplete="off">
                    @forelse(Config::get('site.teamCase') as $ak=>$av)
                 <option value="{{$ak}}">{{$av}}</option>
                 @empty
                 <option value="">No Right Available</option>
                 @endforelse
                  </select>
                  <div class="error_cls" id="error_rights"></div>
                </div>
   
              </div>

              <div class="col-md-12">
              
               <!--  <x-input label="Name" type="text" name="username"  placeholder="Name" :comp="$comp" :colMd="$sixDiv"/> -->
                
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  {!! Form::select('status', Config::get('site.status'), null, ['onchange' =>'Removef("status")' ,'id' => 'status','class'=>'form-control', 'autocomplete' => 'off']) !!}
                  <div class="error_cls" id="error_status"></div>
                </div>
   
              </div>

            <!-- /.col -->
               
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-asbutton value="Save" redirect="self" form="caseAssignForm" btnId="formBBtn" path="/assign-case/{{$id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_caseAssignForm">
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


<link href="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/css/bootstrap-multiselect.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://unpkg.com/bootstrap-multiselect@0.9.13/dist/js/bootstrap-multiselect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  

<script type="text/javascript">
  $('#rights').multiselect({
    includeSelectAllOption: true
  });
</script> 

<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection  
@endsection  
