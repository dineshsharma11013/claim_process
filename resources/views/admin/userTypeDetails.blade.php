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
              <a href="{{url(admin().'/add-user-type')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD user type</a>
              <h3 class="box-title"><u>User Type List</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  @if(userType()->user_type==1)
                  <th>Created By</th>
                  @endif
                  <th>Name</th>
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
                  
                    @if(userType()->user_type==1)
                  <td>{{$us->ip}}</td>
                  @endif
                    <td>
                    {{ucwords($us->name)}}
                    </td>
                    <td>
                  @foreach(Config::get('site.status') as $sk=>$sv)
                     @if($sk==$us->status)
                     {{$sv}}
                     @endif
                     @endforeach
                    </td>
                    <td>{{$us->created_at}}</td>
                    <td>{{$us->updated_at}}</td>
                      <td>
                        <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-user-type/'.$us->id)}}"><i class="fa fa-edit"></i> Edit</a>
                          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-user-type/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                      
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td>
                  @if(userType()->user_type==1)
                  <td></td>
                  @endif
                  <td></td><td></td><td></td><td></td><td></td></tr>
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