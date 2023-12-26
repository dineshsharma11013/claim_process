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
              <!-- <a href="{{url(admin().'/assign-task')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> Assign Task</a> -->
              <h3 class="box-title"><u>Working List </u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

               @if(userType()->user_type==2 && userType()->sub_user=='')
                <div class="col-md-12">
                  <div class="form-group col-md-6">
                <label>Name :- {{$cat->name}}</label><br>
                <label>Task :- {{$cat->task}}</label><br>
                
                
              </div>
              </div>
                @endif

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                 
                 
                  <th>Message</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Updated</th>
                 
                  
                </tr>
                </thead>
                <tbody>
                @forelse($users as $us)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                  
                    <td>{{$us->message}}</td>
                    <td>
                     @foreach(Config::get('site.task_status') as $ik=>$iv)
                     @if($us->status == $ik)
                      {{$iv}}
                     @endif
                     @endforeach
                      
                    </td>
                    <td>{{ $us->updated_at ? ' ' : dateFm2($us->created_at)}}</td>

                      <td> {{ $us->updated_at ? dateFm2($us->updated_at) : ''}}</td>
                      
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td>
                
                  <td></td><td></td><td></td><td></td></tr>
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