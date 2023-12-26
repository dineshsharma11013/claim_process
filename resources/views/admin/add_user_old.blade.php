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
          
              <h3 class="box-title">Add User</h3>
          <div class="box-tools pull-right">
            <!-- <a href="{{url(admin().'/user-types')}}" target="_blank" class="{{Config::get('site.addRvtDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> Add User Type</a> -->
            <a href="{{url(admin().'/user-details')}}"  class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>

          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="UserForm">
        <div class="box-body">
          <div class="row">
            @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Creditor Type <span class="required_cls">*</span></label>
                  <select onchange="Removef('user_type')" id="user_type" class="form-control" autocomplete="off" name="user_type">
                    <option selected="selected" value="">Please Select</option>
                    @foreach($userTypes as $type)
                    <option value="{{$type}}">{{$type}}</option>
                    @endforeach
                  </select>
                  <div class="error_cls" id="error_user_type"></div>
                </div>
              

                <x-input label="Name" type="text" name="name"  placeholder="Name" :comp="$comp" :colMd="$sixDiv"/>
                 
   
              </div>


            <div class="col-md-12">
              <x-input label="Address" type="text" name="address" placeholder="Address" :colMd="$sixDiv"/>
              <x-input label="Email" type="text" name="email" placeholder="Email" :comp="$comp" :colMd="$sixDiv"/>
             
            </div>

            <div class="col-md-12">
               <x-input label="Contact" type="text" name="mobile"  placeholder="Contact" :comp="$comp" :colMd="$sixDiv"/>
                <x-input label="Unique Id" type="text" name="unique_id" placeholder="Unique Id" :comp="$comp" :colMd="$sixDiv"/>

            </div>
            <div class="col-md-12">
            
              <x-input label="Password" type="password" name="password" placeholder="Password" :comp="$comp" :colMd="$sixDiv"/>
              
              <x-select label="Authentication Type" :value="Config::get('site.auth_type')" name="auth_type" placeholder="Please Select" :colMd="$sixDiv"/>

            </div>

            <div class="col-md-12">
              
              <x-select label="Status" :value="Config::get('site.status')" name="status" placeholder="Please Select" :comp="$comp" :colMd="$sixDiv"/>

            </div>
            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-asbutton value="Save" redirect="none" form="UserForm" btnId="formBBtn" path="/add-user" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_UserForm">
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
