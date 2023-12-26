<style>
    .border_col {
        border: 2px solid black !important;
        color: white !important;
        background-color: #316c8f !important;
    }

    .border_bot {
        border-bottom: 2px solid black !important;
    }

 
    table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

</style>
<title>Time Schedule For Form</title>
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
                        <!--<a href="{{url(admin().'/add-ar')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD AR</a>-->
                        <h3 class="box-title"><u>Form-2-Process Chart</u></h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <!--example1-->
                        <table id="" class="table table-bordered" style="font-family: math; width:100%;">
                            <thead class="thead-dark border_col">

                            <tr class="">
                                <th class="border_bot">S. No.</th>
                                <th class="border_bot">Section / Regulation</th>
                                <th class="border_bot">Activity/Steps</th>
                                <th class="border_bot">Forms</th>
                                <th class="border_bot">To Whom</th>
                                <th class="border_bot">Role</th>
                                <th class="border_bot">Within ____ days</th>
                                <th class="border_bot">Timelines</th>
                                <th class="border_bot">Due Date</th>
                                <th class="border_bot">Revised Dates as per form A</th>
                                <th class="border_bot">Actual Date</th>
                                <th class="border_bot">Reason for delay</th>
                                <th class="border_bot">Site</th>
                                <th class="border_bot">Format</th>
                            </tr>

                            </thead>
                            <tbody>
                           <tr >
             
                    <td>1</td>
                    <td>{{$debitor_details->sction ? $debitor_details->sction : ''}}</td>
                    <td>Consent for CIRP</td>
                    <td>2/ AA/ Info</td>
                    <td>FC/OC/CD</td>
                    <td>{{$debitor_details->ip_ipe ? $debitor_details->ip_ipe : ''}}</td>
                    <td></td>
                    @if(isset($time_table_field)) <td>{{$time_table_field->insert_date ? date('d-M-y',strtotime($time_table_field->insert_date)) : ''}}</td>@endif
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>nclt.gov.in/nclat.gov.in</td>
                    <td>Form-2</td>
           
                  </tr>
                  
                  <tr>
               @if(isset($time_table_field))   @php  $ibbi_date =   date('d-M-y',strtotime($time_table_field->insert_date.'+3 days')); @endphp  @endif
                    <td>2</td>
                    <td>IBBI circular 14th August, 2018</td>
                    <td>Intimation to IBBI</td>
                    <td>IP-1</td>
                    <td>IBBI</td>
                    <td>{{$debitor_details->ip_ipe ? $debitor_details->ip_ipe : ''}}</td>
                    <td>3 D of consent</td>
                    <td>A+3</td>
                    <td>{{$ibbi_date}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
           
                  </tr>
                    <tr>
             
                    <td>3</td>
                    <td>Sec. 16(1)</td>
                    <td>DOC & Apt. of IRP</td>
                    <td>X</td>
                    <td>X</td>
                    <td>{{$debitor_details->ip_ipe ? $debitor_details->ip_ipe : ''}}</td>
                    <td>DOC (date of RO) & {{$debitor_details->ip_ipe ? $debitor_details->ip_ipe : ''}} app.</td>
                    <td>T</td>
                    <td>Saturday, 0 January, 1900</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
           
                  </tr>




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
