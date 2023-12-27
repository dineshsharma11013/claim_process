@extends("admin_layout.main")

@section("container")

<style>
    table.dataTable thead .sorting:after {
     opacity: 0.6; 
    content: "\e150";
}
tr.even{
    background-color:#ebf3f9;
}
 .table::-webkit-scrollbar {
    width: 12px;
  }

  .table::-webkit-scrollbar-track {
    background-color: #f1f1f1;
  }

  .table::-webkit-scrollbar-thumb {
    background-color:  #428bca6e;
  }

  .table::-webkit-scrollbar-thumb:hover {
    background:  #428bca;
  }
  th {
    font-size: 15px;
}


div.dataTables_wrapper div.dataTables_filter input {
    border: 2px solid #860b387a;
}
label{
    font-weight:bold!important;
}

</style>



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

              <h3 class="box-title"><u style="text-decoration: none;"> <b>Time line Chart </b></u></h3>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead style="background:#428bca;color:#fff;   box-shadow: 0px 10px 5px -12px lightblue;">
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