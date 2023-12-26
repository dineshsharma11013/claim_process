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
              @if((userType()->user_type==2) || userType()->user_type==1)
              <a href="{{url(admin().'/assign-task')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> Assign Task</a>
             @endif
              <h3 class="box-title"><u>My Task List  </u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                 
                  <th>Task</th>
                  <th>Priority</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @forelse($users as $us)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                   
                    <td>
                      {{$us->task}}
                    </td>
                    <td>{{$us->priority}}</td>
                    <td>

                      @if($us->status == 'in_process')
                      New
                      @else
                     @foreach(Config::get('site.task_status') as $ik=>$iv)
                     @if($us->status == $ik)
                      {{$iv}}
                     @endif
                     @endforeach
                      @endif
                    </td>
                    <td>{{dateFm2($us->created_at)}}</td>
                      <td>{{dateFm2($us->updated_at)}}</td>
                      <td>
                        <!-- <a href="javascript:void(0)" data-toggle="modal" onclick="getDetails('{{$us->id}}', '/get-todo-info/', 'getDetails')" data-target="#myModal" id="export" class="btn bg-orange btn-sm" ><i class="fa fa-file-pdf-o"></i> View</a> -->
                        <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-assign-task/'.$us->id)}}"><i class="fa fa-edit"></i> Edit</a>
                          @if(userType()->sub_user=='')
                          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-assign-task/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                          @endif
                          <!-- <a class="{{Config::get('site.viewDataBtn')}}" href="{{url(admin().'/detail-assign-task/'.$us->id)}}"><i class="fa fa-eye"></i> Details</a> -->
                          
                      </td>
                      
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td>
                
                  <td></td><td></td><td></td><td></td><td></td><td></td></tr>
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
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" id="getDetails">



    </div>
  </div>
</div>


@section('script')
<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection
@endsection