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
          
              <h3 class="box-title">Update Task  {{$cat->status=='in_process' ? '(New Task)' : ''}}  </h3>
          <div class="box-tools pull-right">
           <a href="javascript:void(0);" onclick="window.history.go(-1); return false;" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="assignForm">
        <div class="box-body">
          <div class="row">
            @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
        
                @if(userType()->user_type==2 && userType()->sub_user!='')
                <div class="col-md-12">
                  <div class="form-group col-md-6">
                <label>Task :- {{$cat->task}}</label><br>
                <label>Start Date :- {{$cat->start_date}}</label><br>
                <label>End Date :- {{$cat->end_date}}</label>
              </div>
              </div>
                @endif

            @if(userType()->user_type==2 && userType()->sub_user=='')

            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Corporate Debtor  <!--<span class="required_cls">*</span> --> </label>
                  @if(isset($cmp))

                  @foreach(getCompanyDetails() as $iv)
                    @if($iv->id==$cmp)
                   @php  $cdName =  $iv->name; 
                      
                   @endphp

                    @endif
                  @endforeach

                  <input type="hidden" name="cirp_id" id="cirp_id" value="{{$cmp ?? ''}}" class="form-control" autocomplete="off" disabled>
                    <input type="text" name="cirp_name" id="cirp_name" onkeyup='Removef("cirp_name")' value="{{$cdName}}" class="form-control" autocomplete="off" disabled>
                  @else  

                  <select class="form-control" name="cirp_name" id="cirp_name" onchange='Removef("cirp_name");getCompanyInfo()' autocomplete="off">  
                   <option value="">Please Select</option>
                   @foreach($updated_uniqueUsers as $iv)
                    <option value="{{$iv->id}}" {{($cat->cirp_name == $iv->id) ? 'selected':''}} >{{$iv->name}}</option>
                  @endforeach
                  <option value ="other" {{$cat->cirp_name=='other' ?'selected':''}} >Other</option>
                  </select>
                @endif
                  <div class="error_cls" id="error_cirp_name"></div>
                </div>

                @if(!isset($cmp))
                
                <div class="form-group col-md-6" id="company_id" {{$cat->cirp_name=='other' ? '': 'style="display: none;"'}} >
                  
                  <label for="exampleInputEmail1">Enter Company Name <span class="required_cls">*</span></label>
                  <input type="text" name="comapny" id="comapny" onkeyup='Removef("comapny")' value="{{$cat->comapny}}" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_comapny"></div>
                 
                </div>
                
                @endif

              </div>



            <div class="col-md-12">
              
                <x-input label="Task" type="text" name="task"  placeholder="" :comp="$comp" :value="$cat->task"  :colMd="$sixDiv"/>
               
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Assigned To <span class="required_cls">*</span></label>
                 {!! Form::select('assigned_to', $users, $cat->assigned_to, ['onchange' =>'Removef("assigned_to")', 'autocomplete' => 'off'  ,'id' => 'assigned_to','class'=>'form-control', 'placeholder' => 'Please Select']) !!}
                  <div class="error_cls" id="error_assigned_to"></div>
                </div>

              </div>

               <div class="col-md-12">

                

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Description <!--<span class="required_cls">*</span>--></label>
                  <textarea name="desc" id="desc" onclick ="RemoveER('desc')" class="form-control" autocomplete="off">{{$cat->message}}</textarea>
                  <div class="error_cls" id="error_desc"></div>
                </div>
              
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Priority <span class="required_cls">*</span></label>
                  {!! Form::select('priority', Config::get('site.priority'), $cat->priority, ['onchange' =>'Removef("priority")', 'autocomplete' => 'off'  ,'id' => 'priority','class'=>'form-control', 'placeholder' => 'Please Select']) !!}
                  
                
                  <div class="error_cls" id="error_priority"></div>
                </div>

              </div>

              <div class="col-md-12">

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Start Date <span class="required_cls">*</span></label>
                  <input type="text" name="start_date" id="start_date" onclick ="RemoveER('start_date')" value="{{$cat->start_date}}" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_start_date"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">End Date <span class="required_cls">*</span></label>
                  <input type="text" name="end_date" id="end_date" onclick ="RemoveER('end_date')" value="{{$cat->end_date}}" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_end_date"></div>
                </div>

              </div>

              <div class="col-md-12">
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  {!! Form::select('status', Config::get('site.task_status_ip'), $cat->status, ['onchange' =>'Removef("status")', 'autocomplete' => 'off'  ,'id' => 'status','class'=>'form-control', 'placeholder' => 'Please Select']) !!}
                  
                
                  <div class="error_cls" id="error_status"></div>
                </div>

              </div>
              @elseif(userType()->user_type==4)
              <div class="col-md-12">
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  {!! Form::select('status', Config::get('site.task_status_team'), $cat->status, ['onchange' =>'Removef("status")', 'autocomplete' => 'off'  ,'id' => 'status','class'=>'form-control', 'placeholder' => 'Please Select']) !!}
                  
                
                  <div class="error_cls" id="error_status"></div>
                </div>

              </div>
              @endif

              


            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
          @if(isset($cmp))
                <x-asbutton value="Save" redirect="self" form="assignForm" btnId="formBBtn" path="/edit-assign-task/{{$cat->id}}/{{$cmp}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
          @else
            <x-asbutton value="Save" redirect="self" form="assignForm" btnId="formBBtn" path="/edit-assign-task/{{$cat->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
          @endif             
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_assignForm">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> 
<script src="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.js') }}"></script> 
<script type="text/javascript">
//  $('#irp').select2();


  $('#start_date').datetimepicker({
    format: 'YYYY-MM-DD h:m'
  });
  $('#end_date').datetimepicker({
    format: 'YYYY-MM-DD h:m'
  });

</script>

<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection  
@endsection  
