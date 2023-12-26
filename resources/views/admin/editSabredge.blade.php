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
          
              <h3 class="box-title">Update Sabredge Representative</h3>
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
                  {!! Form::select('ip_name', $ips, $cat->ip_name, ['onchange' =>'Removef("ip_name");getCompany(this.value)', 'placeholder'=>'Please Select' , 'id' => 'ip_name','class'=>'form-control']) !!}
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>

              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Comapny Name <span class="required_cls">*</span></label>
                  {!! Form::select('company_name', $company, $cat->company_id, ['onchange' =>'Removef("company_name")', 'placeholder'=>'Please Select' , 'id' => 'company_name','class'=>'form-control']) !!}
                  
                  <div class="error_cls" id="error_company_name"></div>
                </div>

              
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Change Employee Name <span class="required_cls">*</span></label>
                  {!! Form::select('user_name', $employees, $cat->name, ['onchange' =>'Removef("user_name")', 'placeholder'=>'Please Select' , 'id' => 'user_name','class'=>'form-control']) !!}
                  
                  <div class="error_cls" id="error_user_name"></div>
                </div>

              <x-input label="Designation" type="text" name="design"  placeholder="Designation" :value="$cat->design" :comp="$comp" :colMd="$sixDiv"/>

              
              <!-- /.form-group -->
            </div>

            <div class="col-md-12">
              <x-input label="Contact" type="text" name="mobile"  placeholder="Contact" :comp="$comp" :value="$cat->contact" :colMd="$sixDiv"/>
          

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Signature <!--<span class="required_cls">*</span>--></label>
                  <input type="file" name="file" id="file" accept="image/png, image/gif, image/jpeg" onchange="loadFile('error_logo')" class="form-control">
                      <small id="emailHelp" class="form-text text-muted">Only jpg, png files allowed.</small>
                          @if(!empty($cat->signature))
                    @if(file_exists(publicP() . '/access/media/sabredge/'.$cat->signature))
                   <img src="{{ asset('public/access/media/sabredge/'.$cat->signature) }}" width="50" height="50">
                    @endif @endif  
                        <div class="error_cls" id="error_file"></div>
                </div>

               
            </div>

            <div class="col-md-12">
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  {!! Form::select('status', Config::get('site.status'), $cat->status, ['onchange' =>'Removef("status")' ,'id' => 'status','class'=>'form-control']) !!}
                  <div class="error_cls" id="error_status"></div>
                </div>
              </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
               <x-abutton value="Save" redirect="none" form="sabredgeForm" btnId="formBBtn" path="/update-sabredge-representative/{{$cat->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />

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
