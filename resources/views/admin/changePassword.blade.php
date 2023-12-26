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
          
              <h3 class="box-title">General Info sd</h3>
          <div class="box-tools pull-right">
            <!-- <a href="{{url(admin().'/sabredge-representative')}}" class="btn bg-maroon btn-flat margin text-uppercase" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a> -->
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="generalForm">
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
              @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
                <x-input label="Company Name" type="text" name="comp_name"  placeholder="Name" :value="$cat->company_name" :comp="$comp" :colMd="$sixDiv"/>
                 <x-input label="Address" type="text" name="address" placeholder="Address" :value="$cat->address" :comp="$comp" :colMd="$sixDiv"/>
   
              </div>


            <div class="col-md-12">
              <x-input label="Email" type="text" name="email" placeholder="Email" :value="$cat->email" :comp="$comp" :colMd="$sixDiv"/>
              <x-input label="Contact" type="text" name="mobile"  placeholder="Contact" :value="$cat->mobile" :comp="$comp" :colMd="$sixDiv"/>

            </div>

            <div class="col-md-12">
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Username <span class="required_cls">*</span></label>
                  <input type="text" name="username" id="username" value="admin" onkeyup="Removef('username')" class="form-control" placeholder="Username" autocomplete="off" readonly>
                  
                  <div class="error_cls" id="error_username"></div>
                </div>
               
                <x-input label="Password" type="password" name="password" :value="$cat->password" placeholder="Password" :comp="$comp" :colMd="$sixDiv"/>
            </div>
      
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-asbutton value="Update" redirect="self" form="generalForm" btnId="formBBtn" path="/update-general-info/{{$cat->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info">Reset</button>
              

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
