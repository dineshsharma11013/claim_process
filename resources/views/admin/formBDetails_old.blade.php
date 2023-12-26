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
              <h3 class="box-title"><u>Form B Registered Details</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Submitted</th>
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
                    {{ucwords($us->operational_creditor_name)}}
                    </td>
                    <td>
                    {{$us->operational_creditor_email}}
                    </td>
                    <td>@if($us->submitted==1)
                        Yes
                        @else
                         No
                         @endif
                    </td>
                    <td>{{$us->date}}</td>
                    <td>{{$us->updated_date}}</td>
                      <td>
                        @php $uuid = base64_encode($us->unique_id);
                              $fid = base64_encode($us->id);
                          @endphp
                      <a class="{{Config::get('site.editDataBtn')}}" href="{{url('/').'/form?name='.$us->name.'&email='.$us->email.'&mobile='.$us->mobile.'&type='.$us->form_type.'&ar='.$us->ar.'&edit=true'.'&uuid='.$uuid.'&reg='.$fid}}" target="_blank"><i class="fa fa-edit"></i> Edit</a>
                      
                      <a class="{{Config::get('site.viewDataBtn')}}" href="{{url(admin().'/form-b-registered-view/'.$fid)}}" ><i class="fa fa-eye"></i> View</a>

                      <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-form-b/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                      
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
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