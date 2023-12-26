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
            
              <h3 class="box-title"><u>Time line Chart</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Section_Regulation</th>
                  <th>Activity_Steps</th>
                  <th>Forms</th>
                  <th>To_Whom</th>
                  <th>Role  </th>
                  <th>Within_days</th>
                  <th>Timelines</th>
                  <th>Due_Date  </th>
                  <th>Revised_Dates_as_per_form_</th>
                  <th>Actual_Date</th>
                  <th>Reason_for_delay</th>
                  <th>Site</th>
                  <th>Format</th>
                </tr>
              
                </thead>
                <tbody>
          @foreach($timline_data as $list)
            <?php 
            // $due_date = $encorporation_date;
          $due_date=  date('Y-m-d', strtotime($encorporation_date. ' + '.$list->timeline_day.' days'));
            ?>    
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$list->Section_Regulation}}</td>
                    <td>{{$list->Activity_Steps}}</td>
                    <td>{{$list->Forms}}</td>
                    <td>{{$list->To_Whom}}</td>
                    <td>{{$list->Role}}</td>
                    <td>{{$list->Within_days}}</td>
                    <td>{{$list->Timelines}}</td>
                    <td>
                        @if($list->timeline_day!==null)
                        {{$due_date}}
                        @endif
                        
                        </td>
                    <td>{{$list->Revised_Dates_as_per_form_}}</td>
                    <td>{{$list->Actual_Date}}</td>
                    <td>{{$list->Reason_for_delay}}</td>
                    <td>{{$list->Site}}</td>
                    <td>{{$list->Format}}</td>
                    
                </tr>
                @endforeach
               </tbody>
          
              </table>
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

@section('script')

@endsection
@endsection