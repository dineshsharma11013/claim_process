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
              
              <a href="{{url(admin().'/assign-data')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> Assign </a>
              
              <h3 class="box-title"><u>Assign Company <!-- {{Session::get('admin_id')}} --> </u></h3>
              <!-- <h3 class="box-title"><u>IRP/RP/AR Assign Details  </u></h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Company</th>
                  <th>IP</th>
                  <th>Designation</th>
                  <th>Date of Appointment</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Updated</th>
                 @if(userType()->user_type==1)
                  <th>Action</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @forelse($users as $us)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    
                    <td>
                    @foreach($comps as $comp)
                    @if($comp->id == $us->company_id)
                      {{$comp->name}}
                    @endif
                    @endforeach    
                    </td>
                    <td>
                     @foreach($ips as $ip)
                    @if($ip->id == $us->ip_id)
                      {{$ip->first_name}}
                    @endif
                    @endforeach
                    </td>
                    <td>{{$us->designation}}</td>
                    <td>{{$us->appointment_date}}</td>
                   <td>
                    @foreach(Config::get('site.status') as $sk=>$sv)
                      @if($us->status==$sk)
                        {{$sv}}
                      @endif
                    @endforeach
                    
                  </td>
                  <td>{{dateFm2($us->created_time)}}</td>
                    <td>
                      
                      {{($us->update_time != '') ? dateFm2($us->update_time) : ''}}
                      
                    </td>
                    <!-- <td>{{dateFm2($us->updated_at)}}</td>   -->
                      @if(userType()->user_type==1)
                      <td>
                        <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-assign-data/'.$us->id)}}"><i class="fa fa-edit"></i> Edit</a>
                          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-assign-data/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                      @endif
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                @if(userType()->user_type==1)
                  <td></td>
                  @endif
                </tr>
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