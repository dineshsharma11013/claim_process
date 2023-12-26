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
              <a href="{{url(admin().'/form-g')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD Form G</a>
              <h3 class="box-title"><u>Form G Details</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Name of corporate debtor</th>
                  <th>Address</th>
                  
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
                     {{$us->corporate_debtor_name}}
                    </td>
                    <td>
                     {{isset($us->reg_address)?$us->reg_address:''}} 
                    </td>
                  
                    <td>{{$us->created_at}}</td>
                    <td>{{$us->updated_at}}</td>
                      <td>
                          <a class="btn btn-info btn-sm" href="../form-g/{{$us->id}}" target="_blank" role="button"> <i class="fa fa-eye"></i> View</a>
                        <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-form-g/'.$us->id)}}"><i class="fa fa-edit"></i> Edit</a>
                          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-form-g/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                      
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td><td></td><td></td><td></td><td></td><td></td></tr>
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