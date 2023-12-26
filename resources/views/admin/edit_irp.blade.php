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
          
              <h3 class="box-title">Update IP Info</h3>
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
                  <label for="exampleInputEmail1">You are :  <span class="required_cls">*</span></label>
                  {!! Form::select('ip_type', ['2'=>'IP', '3'=>'IPE'], $cat->user_type, ['onchange' =>'Removef("ip_type");getIpType(this.value);', 'placeholder' => 'Please Select', 'id' => 'ip_type','class'=>'form-control', 'autocomplete'=>'off']) !!}
                  <div class="error_cls" id="error_ip_type"></div>
                </div>

                <div class="form-group col-md-6" id="auth_div" style="display: {{$cat->user_type==2 ? 'none;' : ''}}" >
                  <label for="exampleInputEmail1">Authourised Person <span class="required_cls">*</span></label>
                  <input type="text" name="authorised_person" id="authorised_person" value="{{$cat->authorised_person}}" onkeyup="Removef('authorised_person')" class="form-control" placeholder="Authourised Person" autocomplete="off">
                  
                  <div class="error_cls" id="error_authorised_person"></div>
                </div>


            </div>


            <div class="col-md-12">
             
                <x-input label="Name" type="text" name="name"  placeholder="Name" :value="$cat->first_name" :comp="$comp" :colMd="$sixDiv"/>
                 <x-input label="Address" type="text" name="address" placeholder="Address" :value="$cat->address"  :colMd="$sixDiv"/>
   
              </div>


            <div class="col-md-12">
              <x-input label="Email" type="text" name="email" placeholder="Email" :value="$cat->email"  :colMd="$sixDiv"/>
              <x-input label="Contact" type="text" name="mobile"  placeholder="Contact" :value="$cat->mobile"  :colMd="$sixDiv"/>
            </div>

            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Username </label>
                  <input type="text" name="username" id="username" value="{{$cat->username}}" onkeyup="Removef('username')" class="form-control" placeholder="Username" autocomplete="off">
                  
                  <div class="error_cls" id="error_username"></div>
                </div>

                <x-input label="Password" type="password" name="password"  placeholder="Password" :value="$cat->password"  :colMd="$sixDiv"/>

            </div>
            <div class="col-md-12">

              <x-input label="IBBI Reg. No." type="text" name="ibbi_reg_no" :value="$cat->ibbi_reg_no" placeholder="IBBI Reg. No." :colMd="$sixDiv"/>

              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Profile Image <!--<span class="required_cls">*</span>--></label>
                  <input type="file" name="file" id="file" accept="image/png, image/gif, image/jpeg" onchange="loadFile('error_logo')" class="form-control">
                      <small id="emailHelp" class="form-text text-muted">Only jpg, png files allowed.</small>
                          @if(!empty($cat->profile_pic))
                    @if(file_exists(publicP() . '/access/media/general/'.$cat->profile_pic))
                   <img src="{{ asset('public/access/media/general/'.$cat->profile_pic) }}" width="50" height="50">
                    @endif @endif  
                        <div class="error_cls" id="error_logo"></div>
                </div>  

              </div>


               <div class="col-md-12">
             <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Date of Registeration </label>
                  <input type="date" name="date" value="{{$cat->date}}" id="date" class="form-control date" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Member of IPA </label>
                  <input type="text" name="member_of_ipa" class="form-control" placeholder="Member of IPA" value="{{$cat->member_of_ipa}}" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
            </div>

            <div class="col-md-12">
            <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Member of IPE </label>
                  <input type="text" name="member_of_ipe" value="{{$cat->member_of_ipe}}" class="form-control" placeholder="Member of IPE" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
                
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Have Valid AFA </label>
                  <input type="text" name="have_valid_afa" value="{{$cat->have_valid_afa}}" class="form-control" placeholder="have valid AFA" autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
               
                
            </div>

            <div class="col-md-12">
            <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">AFA Certificate No. </label>
                  <input type="text" name="afa_certificate_no" value="{{$cat->afa_certificate_no}}" class="form-control" placeholder="AFA Certificate No. " autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">AFA Valid upto </label>
                  <input type="text" name="afa_valid_upto" id="ip_name" value="{{$cat->afa_valid_upto}}"  class="form-control" placeholder="Enter AFA valid upto " autocomplete="off">
                  
                  <div class="error_cls" id="error_ip_name"></div>
                </div>
               
                
            </div>
            
               <div class="col-md-12">
            <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Total CPE Earned </label>
                  <input type="text" name="total_cpe_earned" id="ip_name" class="form-control" placeholder="Enter total CPE Earned" value="{{$cat->total_cpe_earned}}" autocomplete="off">
                  
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
                  {!! Form::select('status', Config::get('site.rp_status'), $cat->status, ['onchange' =>'Removef("status")', 'autocomplete' => 'off'  ,'id' => 'status','class'=>'form-control']) !!}
                  <div class="error_cls" id="error_status"></div>
                </div>
            </div>
            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-abutton value="Update" redirect="self" form="generalForm" btnId="formBBtn" path="/edit-ip/{{$cat->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_generalForm">
    
                        
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
