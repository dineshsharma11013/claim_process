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
              
              <h3 class="box-title"><u>Auth Details</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Admin Name</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Created</th>
                  
                </tr>
                </thead>
                <tbody>
                @forelse($cat as $us)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    
                    <td>
                    {{ isset($us->first_name) ? ucwords($us->first_name) : ''}} {{ isset($us->last_name) ? ucwords($us->last_name) : ''}}
                    </td>
                    <td>
                    {{ isset($us->email) ? ucwords($us->email) : ''}}
                    </td>
                      <td>
                        {{$us->type}}
                      </td>
                      <td>
                        {{$us->created_at}}
                      </td>
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td><td></td><td></td><td></td></tr>
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


@endsection