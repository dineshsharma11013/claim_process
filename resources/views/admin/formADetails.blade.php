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
              <a href="{{url(admin().'/form-a')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD Form A</a>
              <h3 class="box-title"><u>Form A Details</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Name of corporate debtor</th>
                  <th>IP</th>
                  <th>Designation</th>
                  <th>Insolvency commencement date</th>
                  <th>Date of closure</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @forelse($results as $us)
              

                  <tr>
                    <td>{{$loop->index+1}}</td>
                    
                    <td>
                     {{$us->cName}}
                    </td>
                    <td>
                     {{isset($us->name)?$us->name:''}} 
                    </td>
                    <td>
                    {{$us->designation ?? ''}}
                    </td>
                    <td>{{$us->corporate_debtor_insolvency_date}}</td>
                    <td>{{$us->insolvency_closing_date}}</td>
                    <td>{{$us->created_time ? dateFm2($us->created_time) : ''}}</td>
                    <td>{{$us->update_time ? dateFm2($us->update_time) : ''}}</td>
                      <td>
                          <a class="btn btn-info btn-sm" href="../form-a/{{$us->unique_id}}" target="_blank" role="button"> <i class="fa fa-eye"></i> View</a>
                        <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-form-a/'.$us->id)}}"><i class="fa fa-edit"></i> Edit</a>
                          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-form-a/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
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