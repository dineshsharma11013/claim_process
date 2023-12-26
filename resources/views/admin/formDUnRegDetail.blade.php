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
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
             <!--  <a href="{{url(admin().'/add-user-type')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD user type</a> -->
              <h3 class="box-title"><u>Form D Unregistered Details</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Company</th>
                  <th>IP</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Created</th>
                 
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @forelse($users as $us)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{ucwords($us->company)}}</td>
                    <td>{{ucwords($us->ip)}}</td>
                    <td>
                    {{ucwords($us->name)}}
                    </td>
                    <td>
                    {{$us->email}}
                    </td>
                    <td>{{$us->mobile}}
                    </td>
                    <td>{{$us->created_at}}</td>
                    
                      <td>
                        @php $uuid = base64_encode($us->unique_id);
                              $fid = base64_encode($us->id);
                          @endphp
                       
                        <a href="{{url(admin().'/get-form-d-pdf-report/'.$us->form_d_selected_id.'/'.$us->id)}}" target="_blank" id="export" class="btn bg-orange btn-sm"><i class="fa fa-file-pdf-o"></i> View</a>    

                       <!-- <a class="{{Config::get('site.viewDataBtn')}}" href="{{url('/').'/form?name='.$us->name.'&email='.$us->email.'&mobile='.$us->mobile.'&type='.$us->form_type.'&ar='.$us->ar.'&view=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=unreg'}}" target="_blank"><i class="fa fa-eye"></i> View</a>   -->

                      <!-- <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-form-d/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a> -->

                      </td>
                      
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                 @endforelse
          
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
    <!-- /.content -->
  </div>

@section('script')

<x-js :file="$jsl" />
@endsection
@endsection