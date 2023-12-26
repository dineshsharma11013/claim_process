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
          
              <h3 class="box-title">Team</h3>
          <div class="box-tools pull-right">
            <button type="button" onclick="window.history.back();" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</button>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="generalForm">
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
              
                 
               <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">IP <span class="required_cls">*</span></label>
                  {!! Form::select('ip', $ips, Session::get('admin_id'), ['onchange' =>'Removef("ip")', 'placeholder'=>'Please Select', 'autocomplete'=>'off' , 'id' => 'ip','class'=>'form-control']) !!}
                  <div class="error_cls" id="error_ip"></div>
                </div>

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Case Type</label>
                  {!! Form::select('case_type', ['irp'=>'CIRP', 'liquidation'=>'Liquidation'], null, ['onchange' =>'Removef("case_type")', 'placeholder'=>'Please Select', 'autocomplete'=>'off' , 'id' => 'case_type','class'=>'form-control']) !!}
                  <div class="error_cls" id="error_case_type"></div>
                </div>
                 
              </div>


            <div class="col-md-12">
              <x-input label="Name" type="text" name="name" placeholder="Name" :comp="$comp" :colMd="$sixDiv"/>
             <x-input label="Address" type="text" name="address" placeholder="Address" :comp="$comp" :colMd="$sixDiv"/>
              
            
            </div>

            <div class="col-md-12">
              <x-input label="Email" type="text" name="email" placeholder="Email" :comp="$comp" :colMd="$sixDiv"/>
              <x-input label="Contact" type="text" name="mobile"  placeholder="Contact" :comp="$comp" :colMd="$sixDiv"/>
              
            </div>
            <div class="col-md-12">

              <x-input label="Username" type="text" name="username"  placeholder="Username" :comp="$comp" :colMd="$sixDiv"/>
              <x-input label="Password" type="password" name="password"  placeholder="Password" :comp="$comp" :colMd="$sixDiv"/>
              

             
             </div>   

             <div class="col-md-12">
               <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Profile Image <!--<span class="required_cls">*</span>--></label>
                  <input type="file" name="file" id="file" accept="image/png, image/gif, image/jpeg" onchange="loadFile('error_logo')" class="form-control">
                      <small id="emailHelp" class="form-text text-muted">Only jpg, png files allowed.</small>
                          
                        <div class="error_cls" id="error_logo"></div>
                </div>
              <x-input label="IBBI Reg. No." type="text" name="ibbi_reg_no"  placeholder="IBBI Reg. No." :colMd="$sixDiv"/>
               
            </div>

            <div class="col-md-12">
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  {!! Form::select('status', Config::get('site.rp_status'), null, ['onchange' =>'Removef("status")' ,'id' => 'status','class'=>'form-control']) !!}
                  <div class="error_cls" id="error_status"></div>
                </div>
            </div>

            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
          @if($id)
                <x-abutton value="Save" redirect="none" form="generalForm" btnId="formBBtn" path="/add-ip/{{$id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
          @else
          <x-abutton value="Save" redirect="none" form="generalForm" btnId="formBBtn" path="/add-ip" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
          @endif      
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_generalForm">
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
@endsection  
@endsection  
