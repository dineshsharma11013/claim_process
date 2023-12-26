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
      <div class="row">
        <div class="col-md-4"> 

      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">Sms And Email Authentication For User Signup</h3>
         
        </div>
        
        <form role="form" id="generalForm">
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Type</label>
                  {!! Form::select('type', Config::get('site.auth_type'), $cat->type ?? "", ['class'=>'form-control', 'id'=>'type', 'autocomplete' => 'off', 'placeholder'=>'Please Select']) !!}
                  <div class="error_cls" id="error_type"></div>
                </div>

         
              </div>
          </div>
        </div>

        <div class="box-footer">
         
            <x-asbutton value="Save" redirect="self" form="generalForm" btnId="formBBtn" path="/save-authentication" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                     
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
                   @if(userType()->user_type==1)
                    <a class="{{Config::get('site.addDataBtn')}}" id="deleteUserData" href="{{url(admin().'/authentication-details')}}">Details</a>
                   @endif
                    <div class="col-md-12" id="errMessage_generalForm">
                        
  </div>

              </div>
        </form>
      </div>

    </div>



    <div class="col-md-8"> 

      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">Email Setting For User Regarding Forms </h3>
         
        </div>
        
        <form role="form" id="FormSubmission">
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Company</label>
                  {!! Form::select('company', $companies, "", ['class'=>'form-control', 'onchange' =>'Removef("company");selectForm(this.value, "/get-selected-form-name/", "form");', 'placeholder'=>'Please Select' , 'id'=>'company', 'autocomplete' => 'off']) !!}
                  <div class="error_cls" id="error_company"></div>
                </div>

                <div class="form-group col-md-4" id="selectFormDt">
                  <label for="exampleInputEmail1">Select Forms </label>
                   {!! Form::select('form[]', Config::get('site.formNames'),['form-b', 'form-c', 'form-d', 'form-e', 'form-f', 'form-ca'], ['id' => 'form', 'onchange' =>'Removef("form");', 'class'=>'form-control', 'autocomplete' => 'off', 'multiple'=>'multiple']) !!}
                          
                        <div class="error_cls" id="error_form"></div>
                </div>
               
             
                  <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Type </label>
                   {!! Form::select('u_type', Config::get('site.formEmailAuth'),"", ['id' => 'u_type', 'onchange' =>'Removef("u_type")', 'placeholder'=>'Please Select', 'class'=>'form-control', 'autocomplete' => 'off']) !!}
                          
                        <div class="error_cls" id="error_u_type"></div>
                </div>    
              </div>
          </div>
        </div>

        <div class="box-footer">
         
            <x-asbutton value="Save" redirect="self" form="FormSubmission" btnId="formBBtn2" path="/save-user-submission" btnClass="{{Config::get('site.btnPrimary')}}" :method="$u_vl" />
                     
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>


              
                    <div class="col-md-12" id="errMessage_FormSubmission">
                        
  </div>

              </div>
        </form>
      </div>

    </div>

    </div>


      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
             

              <h3 class="box-title"><u>Email Setting For User Regarding Forms </u></h3>
            <br>
            <div style="float: right;">
              
             
              <div class="btn-group">
                  <button type="button" class="btn bg-purple">Type</button>
                  <button type="button" class="btn bg-purple dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @forelse(Config::get('site.formEmailAuth') as $tk=>$tv)
                    @if($tk !="")
                    <li><a href="javascript:void(0);" onclick="updateSelected('/update-users-form-auth/{{$tk}}')">{{$tv}}</a></li>
                    @endif
                    @empty
                    @endforelse
                    
                  </ul>
                </div>

              <button type="button" class="btn btn-danger btn-sm" onclick="deleteSelected('/delete-selected-user-form-auth')"><i class="fa fa-trash" aria-hidden="true"></i> Delete Selected</button>

              
            </div>
            </div>
            <!-- /.box-header -->
           

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="selectAll" onclick="checkList('userBody')" autocomplete="off"></th>
                  <th>S. No.</th>
                  <th>Company</th>
                  <th>Forms</th>
                  <th>Type</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  @forelse($details as $us)
                  <tr>
                  <td><input type="checkbox" id="master" name="master" value="{{$us->id}}" autocomplete="off"></td>
                  <td>{{$loop->index+1}}</td>
                  <td>{{ucwords($us->name)}}</td>
                  <td>{{ucwords($us->forms)}}</td>
                  <td>
                    @foreach(Config::get('site.formEmailAuth') as $fk=>$fv)
                      @if($fk==$us->type)
                        {{$fv}}
                      @endif
                    @endforeach
                   
                  </td>
                  <td>{{$us->created_at}}</td>
                  <td>{{$us->updated_at}}</td>
                  <td>
                          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-user-form-auth/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

                  </td>
                  </tr>
                  @empty
                  <tr>
                  <td>No Record</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  </tr>
                  @endforelse
               </tbody>
          
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
      

  
  </div>


@section('script')
<script type="text/javascript">
  $('#form').select2();
  $('#form_2').select2();
</script>

<x-vjs :file="$a_vl" />
<x-vjs :file="$u_vl" />
<x-js :file="$jsl" />
@endsection  
@endsection  
