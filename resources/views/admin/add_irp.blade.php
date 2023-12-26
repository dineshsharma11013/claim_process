@extends("admin_layout.main")

@section("container")

 @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
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
          
              <h3 class="box-title">IP Info</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/ip-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="generalForm">
        <div class="box-body">
          <div class="row">


            <div class="col-md-12">
               <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">You are : <span class="required_cls">*</span></label>
                  {!! Form::select('ip_type', ['2'=>'IP', '3'=>'IPE'], null, ['onchange' =>'Removef("ip_type");getIpType(this.value);', 'placeholder' => 'Please Select', 'id' => 'ip_type','class'=>'form-control', 'autocomplete'=>'off']) !!}
                  <div class="error_cls" id="error_ip_type"></div>
                </div>

                <div class="form-group col-md-6" id="auth_div" style="display: none;">
                  <label for="exampleInputEmail1">Authourised Person <span class="required_cls">*</span></label>
                  <input type="text" name="authorised_person" id="authorised_person" value="" onkeyup="Removef('authorised_person')" class="form-control" placeholder="Authourised Person" autocomplete="off">
                  
                  <div class="error_cls" id="error_authorised_person"></div>
                </div>


            </div>
            
            <div class="col-md-12">
             
                <x-input label="Name" type="text" name="name" placeholder="Name" :comp="$comp" :colMd="$sixDiv"/>
                 <x-input label="Address" type="text" name="address" placeholder="Address" :colMd="$sixDiv"/>
   
              </div>


            <div class="col-md-12">
              <x-input label="Email" type="text" name="email" placeholder="Email" :colMd="$sixDiv"/>
              <x-input label="Contact" type="text" name="mobile"  placeholder="Contact" :colMd="$sixDiv"/>
            </div>

            <div class="col-md-12">
              <x-input label="Username" type="text" name="username"  placeholder="Username" :colMd="$sixDiv"/>
                <x-input label="Password" type="password" name="password"  placeholder="Password" :colMd="$sixDiv"/>

            </div>
            <div class="col-md-12">

              <x-input label="IBBI Reg. No." type="text" name="ibbi_reg_no"  placeholder="IBBI Reg. No." :colMd="$sixDiv"/>

              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Profile Image <!--<span class="required_cls">*</span>--></label>
                  <input type="file" name="file" id="file" accept="image/png, image/gif, image/jpeg" onchange="loadFile('error_logo')" class="form-control">
                      <small id="emailHelp" class="form-text text-muted">Only jpg, png files allowed.</small>
                          
                        <div class="error_cls" id="error_logo"></div>
                </div>
             </div>   

             <div class="col-md-12">
             <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Date of Registeration </label>
                  <input type="date" name="date" value="" id="date" class="form-control date" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Member of IPA </label>
                  <input type="text" name="member_of_ipa" class="form-control" placeholder="Member of IPA" value="" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
            </div>

            <div class="col-md-12">
            <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Member of IPE </label>
                  <input type="text" name="member_of_ipe" value="" class="form-control" placeholder="Member of IPE" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
                
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Have Valid AFA </label>
                  <input type="text" name="have_valid_afa" value="" class="form-control" placeholder="have valid AFA" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
               
                
            </div>

            <div class="col-md-12">
            <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">AFA Certificate No. </label>
                  <input type="text" name="afa_certificate_no" value="" class="form-control" placeholder="AFA Certificate No. " autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">AFA Valid upto </label>
                  <input type="text" name="afa_valid_upto" id="ip_name" value=""  class="form-control" placeholder="Enter AFA valid upto " autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
               
                
            </div>
            
               <div class="col-md-12">
            <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Total CPE Earned </label>
                  <input type="text" name="total_cpe_earned" id="ip_name" class="form-control" placeholder="Enter total CPE Earned" value="" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Total Assignment </label>
                  <input type="text" name="total_assignment" value="" class="form-control" placeholder="Total assignments" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
               
                
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
                <x-abutton value="Save" redirect="none" form="generalForm" btnId="formBBtn" path="/add-ip" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
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
