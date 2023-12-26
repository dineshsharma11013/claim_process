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
              <a href="{{url(admin().'/add-company')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD Company</a>
              <h3 class="box-title"><u>Company Details List</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  @if($user->user_type==2)
                  <th>Assigned By</th>
                  @endif
                  <th>Name</th>
                  <th>Address</th>
                  <th>Company Details</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @forelse($users as $us)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    @if($user->user_type==2)
                    <td>{{$us->first_name}}</td>
                    @endif
                    <td>
                    {{$us->name}}
                    </td>
                    <td>
                      {{$us->address}}
                    </td>
                    <td><!--<a href="#" class='btn btn-warning'><i class="fa fa-eye"></i> View Timeline chart</a>--><a href="{{url(admin().'/view_company_timeline_cart/'.$us->id)}}" class='btn btn-warning'><i class="fa fa-eye"></i> View Timeline chart</a></td>
                      <td>
                        <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-company/'.$us->id)}}"><i class="fa fa-edit"></i> Edit</a>

                        @if(isset($us->company_id))
                          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-company/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                       @elseif(isset($us->asn_id))
                       <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-assign-data/{{$us->asn_id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                       @endif
                      </td>
                      
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td>
                  <!-- @if($user->user_type==1)
                    <td></td>
                  @endif -->
                  <td></td><td></td><td></td></tr>
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