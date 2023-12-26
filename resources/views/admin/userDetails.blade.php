@extends("admin_layout.main")

@section("container")


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Import User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="uploadUserForm">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Import User <span class="required_cls">*</span></label>
                  <input type="file" name="file" id="file" onchange="loadFile('file','error_profile')" accept=".xlsx, .xls, .csv" class="form-control">
                  <div class="error_cls" id="error_profile"></div>
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" onclick="uploadUser('uploadUserForm','submitBtn','/user-upload-excel')" id="submitBtn" class="btn btn-success">Upload</button>             
                    <button type="reset" class="btn btn-info">Reset</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- /.box -->

          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        
        <!--/.col (right) -->
      </div>

      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <a href="{{url(admin().'/add-user')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD User</a>
              
              <a href="{{route('export_excel')}}" id="export" class="btn btn-primary btn-sm" style="margin-top:10px;float: right;"><i class="fa fa-file"> Export To Excel</i></a>

              <a style="color:#fff; float: right;margin-top: 10px;margin-right: 10px;" download href="{{asset('public/access/format.xlsx')}}" class="btn btn-sm btn-warning"><i class="fa fa-upload"> Download Format</i><span></a>

              <h3 class="box-title"><u>Users List</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row" style="margin-bottom: 20px;" id="userFilterRow">
                 
                 <select class="col-md-1" style="margin-left: 15px;" onchange="getUserInfo('total_records','status_type')" name="total_records" id="total_records" autocomplete="off">
                  @foreach(Config::get('site.total_records') as $fc=>$fv)
                  <option value="{{$fv}}" >{{$fv}}</option>
                  @endforeach
                </select>
                
                <select class="col-md-2" style="margin-left: 5px;" onchange="getStatusInfo('total_records','status_type')" autocomplete="off" name="status_type" id="status_type">
                  <!-- <option value="">Status Type</option> -->
                  @foreach(Config::get('site.status') as $sk=>$sv)
                  <option value="{{$sk}}">{{$sv}}</option>
                  @endforeach
                </select>


                <input type="text" name="search" id="search" placeholder="search" onKeyUp="searchUserData('total_records','search')" style="margin-left: 5px;">

                <div class="btn-group">
                  <button type="button" class="btn btn-warning">Status</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @forelse(Config::get('site.status') as $tk=>$tv)
                    @if($tk !="")
                    <li><a href="javascript:void(0);" onclick="updateSelected('/update-users-status/{{$tk}}')">{{$tv}}</a></li>
                    @endif
                    @empty
                    @endforelse
                    
                  </ul>
                </div>


                <div class="btn-group">
                  <button type="button" class="btn bg-purple">Auth Type</button>
                  <button type="button" class="btn bg-purple dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @forelse(Config::get('site.auth_type') as $tk=>$tv)
                    @if($tk !="")
                    <li><a href="javascript:void(0);" onclick="updateSelected('/update-users-authentication/{{$tk}}')">{{$tv}}</a></li>
                    @endif
                    @empty
                    @endforelse
                    
                  </ul>
                </div>





                 <button type="button" class="btn btn-danger btn-sm" onclick="deleteSelected('/delete-selected-users')"><i class="fa fa-trash" aria-hidden="true"></i> Delete Selected</button>
                <!-- <button type="button" onclick="getUserInfo('total_records','status_type')" id="searchBtn" class="btn btn-success" style="margin-right: 40px;margin-top: 20px; float: right;">Search</button> -->
                
              </div>
              <div id="table_data">
                @include('pagination.userDetails')
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


<div class="modal" id="userModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-body" id="formBody">

      </div>

    </div>
  </div>
</div>





@section('script')
<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
<x-js :file="$pgnt" />
@endsection



@endsection