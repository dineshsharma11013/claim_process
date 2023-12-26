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
              @if(isset($id))
              <a href="{{url(admin().'/assign-task/'.$id)}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> Assign Task</a>
              @else
              <a href="{{url(admin().'/assign-task')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> Assign Task</a>
              @endif
              <h3 class="box-title"> 
               @if(isset($id))
                @foreach(getCompanyDetails() as $iv)
          @if($iv->id == $id)
          <a href="{{url(admin().'/dashboard-user/'.$id)}}" style="font-weight: bold;font-size: 16px;text-transform: uppercase;">{{$iv->name}}</a>
          @endif  
          @endforeach
            - 
            @endif  
            Assign List

              </h3>
              <input type="hidden" name="cid" id="cid" value="{{isset($id) ? $id : ''}}">
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="row" style="margin-bottom: 20px;" id="userFilterRow">
                <select class="col-md-1" style="margin-left: 15px;" onchange="getUserInfo('total_records','status_type', 'team', 'from', 'to', 'task')" name="total_records" id="total_records" autocomplete="off">
                  @foreach(Config::get('site.total_records') as $fc=>$fv)
                  <option value="{{$fv}}" >{{$fv}}</option>
                  @endforeach
                </select>


                 <select class="col-md-1" style="margin-left: 5px;" onchange="getUserInfo('total_records','status_type', 'team', 'from', 'to', 'task')" autocomplete="off" name="status_type" id="status_type">
                   <option value="">Status</option>
                   @foreach($res['status_type'] as $fv)
                  <option value="{{$fv->status}}">
                    @if($fv->status=='pending')
                      Pending
                    @elseif($fv->status=='completed')
                    Completed
                    @elseif($fv->status=='in_process')
                      In Process
                    @elseif($fv->status=='not_done')  
                      Not Done
                    @else
                    {{$fv->status}}
                    @endif

                  </option>
                  @endforeach

                </select>

                <select class="col-md-2" style="margin-left: 5px;" onchange="getUserInfo('total_records','status_type', 'team', 'from', 'to', 'task')" autocomplete="off" name="team" id="team">
                  <option value="">Team</option>
                  @foreach($res['team'] as $sv)
                  <option value="{{$sv->id}}">{{$sv->first_name}}</option>
                  @endforeach
                </select>


                 <input type="text" name="from" id="from" value="" class="col-md-2" placeholder="From Date" style="border:1px solid black;margin-left: 5px;" autocomplete="off">
                    <input type="text" name="to" id="to" class="col-md-2" value="" placeholder="To Date" style="border:1px solid black;margin-left: 5px;" autocomplete="off">

                    


              </div>

              <div class="row" style="margin-bottom: 20px;" id="userFilterRow">
                <select class="col-md-6" style="margin-left: 15px;" onchange="getUserInfo('total_records','status_type', 'team', 'from', 'to', 'task')" autocomplete="off" name="task" id="task">
                  <option value="">Task</option>
                  @foreach($res['tasks'] as $sv)
                  <option value="{{$sv->task}}">{{$sv->task}}</option>
                  @endforeach
                </select>

                 <a href="javascript:void(0)" style="margin-left: 5px;" onclick="getDetailsDefault('total_records','status_type', 'team', 'from', 'to', 'task')" id="export" class="btn bg-purple btn-sm" > Reset</a>
              </div>



              <div id="table_data">
                @include('pagination.todoDetails')
              </div>


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

  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" id="getDetails">



    </div>
  </div>
</div>

@section('script')

<script src="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">

   $('#from').datetimepicker({
    format: 'YYYY-MM-DD',

  }).on("dp.change", function (e) {
    $('#table_data').html('');
      getUserInfo('total_records', 'status_type', 'team', 'from', 'to', 'task');
  })

   $('#to').datetimepicker({
    format: 'YYYY-MM-DD',

  }).on("dp.change", function (e) {

    $('#table_data').html('');

    getUserInfo('total_records', 'status_type', 'team', 'from', 'to', 'task');

  });





</script>


<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection
@endsection
