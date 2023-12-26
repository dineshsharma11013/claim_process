@extends("admin_layout.main")

@section("container") 

<style>
.border_col{
    border: 2px solid black !important;
    color:white !important;
    background-color: #316c8f !important;
}
.border_bot{
     border-bottom: 2px solid black !important;
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
          
          <!--<div class="box">-->
          <!--  <div class="box-header">-->
             
          <!--    <h3 class="box-title"><u>Form-2-Process Chart</u></h3>-->
          <!--  </div>-->
         
            
          <!--  <div class="box-body">-->
           
          <!--    <table id="" class="table table-bordered" style="font-family: math;">-->
          <!--      <thead class="thead-dark border_col">-->
              
          <!--      <tr class="">-->
          <!--        <th class="border_bot">S. No.</th>-->
          <!--        <th  class="border_bot">Section / Regulation</th>-->
          <!--        <th class="border_bot">Activity/Steps</th>-->
          <!--        <th class="border_bot">Forms</th>-->
          <!--        <th class="border_bot">To Whom </th>-->
          <!--        <th class="border_bot">Role</th>-->
          <!--        <th class="border_bot">Within ____ days</th>-->
          <!--        <th class="border_bot">Timelines </th>-->
          <!--        <th class="border_bot">Due Date</th>-->
          <!--        <th class="border_bot">Revised Dates as per form A </th>-->
          <!--        <th class="border_bot">Actual Date</th>-->
          <!--        <th class="border_bot">Reason for delay</th>-->
          <!--        <th class="border_bot">Site </th>-->
          <!--        <th class="border_bot">Format </th>-->
                  
          <!--      </tr>-->
               
          <!--      </thead>-->
          <!--      <tbody>-->
           
          <!--        <tr >-->
             
          <!--          <td>1</td>-->
          <!--          <td>{{$debitor_details->sction ? $debitor_details->sction : ''}}</td>-->
          <!--          <td>Consent for CIRP</td>-->
          <!--          <td>2/ AA/ Info</td>-->
          <!--          <td>FC/OC/CD</td>-->
          <!--          <td>IRP/ RP/ Liq.</td>-->
          <!--          <td></td>-->
          <!--          <td>A</td>-->
          <!--          <td>Saturday, 0 January, 1900</td>-->
          <!--          <td></td>-->
          <!--          <td></td>-->
          <!--          <td></td>-->
          <!--          <td>nclt.gov.in/nclat.gov.in</td>-->
          <!--          <td>Form-2</td>-->
           
          <!--        </tr>-->
                  
          <!--          <tr>-->
             
          <!--          <td>2</td>-->
          <!--          <td>IBBI circular 14th August, 2018</td>-->
          <!--          <td>Intimation to IBBI</td>-->
          <!--          <td>IP-1</td>-->
          <!--          <td>IBBI</td>-->
          <!--          <td>IRP/RP/Lqdr</td>-->
          <!--          <td>3 D of consent</td>-->
          <!--          <td>A+3</td>-->
          <!--          <td>Saturday, 3 January, 1900</td>-->
          <!--          <td></td>-->
          <!--          <td></td>-->
          <!--          <td></td>-->
          <!--          <td></td>-->
          <!--          <td></td>-->
           
          <!--        </tr>-->
         
                 
      
          <!--    </table>-->
          <!--  </div>-->
           
          <!--</div>-->
          
          
          
          
          
          
<div class="panel panel-default">
  <div class="panel-heading">
    <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
      <a class="btn btn-primary" style="float: right;" href="{{ url(admin().'/dawnload_pdf/fortimeline')}}/{{$debitor_details->id}}" target="_blank">Download PDF </a>
  </div>

  <!-- /.panel-heading -->
  
  <div class="panel-body">
      
      
        <ul class="timeline">
        
      
   
      <li class="timeline-inverted">
        <div class="timeline-badge  success"><i class="fa fa-check" aria-hidden="true"></i>
        </div>
        <div class="timeline-panel">
           <div class="timeline-body">
                <div class="table-responsive text-nowrap">

        <table class="table table-striped">

          <thead>
              <tr>
                 <tr class="bg-info">
                <th class="border_bot">S. No.</th>
                <th  class="border_bot">Section / Regulation</th>
                <th class="border_bot">Activity/Steps</th>
                <th class="border_bot">Forms</th>
                <th class="border_bot">To Whom </th>
                <th class="border_bot">Role</th>
                <th class="border_bot">Within ____ days</th>
                <th class="border_bot">Timelines </th>
                <th class="border_bot">Due Date</th>
                <th class="border_bot">Revised Dates as per form A </th>
                <th class="border_bot">Actual Date</th>
                <th class="border_bot">Reason for delay</th>
                <th class="border_bot">Site </th>
                <th class="border_bot">Format </th>
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
                  
          
         
          </tbody>
  

        </table>

      </div>
        </div>
      </li>
      
      
      
   
      <li class="timeline-inverted">
        <div class="timeline-badge" 
        
        @if(isset($time_table_field))
        
        @if(empty($time_table_field->intimation_to_ibbi))
        
        @php $lastDate =   date('Y-m-d',strtotime($time_table_field->insert_date.'+3 day'))  @endphp
        
        @if($lastDate == date('Y-m-d'))
         
            style="background-color:#f5f5cd"
            
              ><i class="fa fa-tasks" aria-hidden="true" style="
    color: #00576f;
"></i>
        
        @elseif($lastDate > date('Y-m-d'))
               
                style="background-color:#67a7a7"
                ><i class="fa fa-calendar" aria-hidden="true"></i>
           
        @elseif($lastDate < date('Y-m-d'))
        
           style="background-color:red"
           ><i class="fa fa-clock-o" aria-hidden="true"></i>
        
        
        @endif
        
        @else
        
            style="background-color:green"
          ><i class="fa fa-check" aria-hidden="true"></i>
        
        @endif
         @endif
        
      
        </div>
        <div class="timeline-panel">
           <div class="timeline-body">
                <div class="table-responsive text-nowrap">
     
        <table class="table table-striped">

       
          <thead>
              <tr>
                 <tr class="bg-info">
                <th class="border_bot">S. No.</th>
                <th  class="border_bot">Section / Regulation</th>
                <th class="border_bot">Activity/Steps</th>
                <th class="border_bot">Forms</th>
                <th class="border_bot">To Whom </th>
                <th class="border_bot">Role</th>
                <th class="border_bot">Within ____ days</th>
                <th class="border_bot">Timelines </th>
                <th class="border_bot">Due Date</th>
                <th class="border_bot">Revised Dates as per form A </th>
                <th class="border_bot">Actual Date</th>
                <th class="border_bot">Reason for delay</th>
                <th class="border_bot">Site </th>
                <th class="border_bot">Format </th>
            </tr>
          </thead>
  
          <tbody>
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
                  
          
         
          </tbody>



        </table>

      </div>
        </div>
      </li>
      
      
      
      <li class="timeline-inverted">
        <div class="timeline-badge "><i class="fa fa-credit-card"></i>
        </div>
        <div class="timeline-panel">
           <div class="timeline-body">
        
        <table class="table table-striped">

  
          <thead>
              <tr>
                 <tr class="bg-info">
                <th class="border_bot">S. No.</th>
                <th  class="border_bot">Section / Regulation</th>
                <th class="border_bot">Activity/Steps</th>
                <th class="border_bot">Forms</th>
                <th class="border_bot">To Whom </th>
                <th class="border_bot">Role</th>
                <th class="border_bot">Within ____ days</th>
                <th class="border_bot">Timelines </th>
                <th class="border_bot">Due Date</th>
                <th class="border_bot">Revised Dates as per form A </th>
                <th class="border_bot">Actual Date</th>
                <th class="border_bot">Reason for delay</th>
                <th class="border_bot">Site </th>
                <th class="border_bot">Format </th>
            </tr>
          </thead>

          <tbody>
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
          
         
          </tbody>
          


        </table>



      </div>
        </div>
      </li>
   
    </ul>
  <!--      @foreach($process_static_list as $list)-->
  <!--  <ul class="timeline">-->
        
      
   
  <!--    <li class="timeline-inverted">-->
  <!--      <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>-->
  <!--      </div>-->
  <!--      <div class="timeline-panel">-->
  <!--         <div class="timeline-body">-->
  <!--              <div class="table-responsive text-nowrap">-->
        <!--Table-->
  <!--      <table class="table table-striped">-->

          <!--Table head-->
  <!--        <thead>-->
  <!--            <tr>-->
                 <!--<tr class="bg-info">-->
  <!--              <th class="border_bot">S. No.</th>-->
  <!--              <th  class="border_bot">Section / Regulation</th>-->
  <!--              <th class="border_bot">Activity/Steps</th>-->
  <!--              <th class="border_bot">Forms</th>-->
  <!--              <th class="border_bot">To Whom </th>-->
  <!--              <th class="border_bot">Role</th>-->
  <!--              <th class="border_bot">Within ____ days</th>-->
  <!--              <th class="border_bot">Timelines </th>-->
  <!--              <th class="border_bot">Due Date</th>-->
  <!--              <th class="border_bot">Revised Dates as per form A </th>-->
  <!--              <th class="border_bot">Actual Date</th>-->
  <!--              <th class="border_bot">Reason for delay</th>-->
  <!--              <th class="border_bot">Site </th>-->
  <!--              <th class="border_bot">Format </th>-->
  <!--          </tr>-->
  <!--        </thead>-->
          <!--Table head-->

          <!--Table body-->
  <!--        <tbody>-->
  <!--          <tr>-->
  <!--            <th scope="row">{{$loop->index+1}}</th>-->
           
  <!--                  <td>{{$list->Section_Regulation ? $list->Section_Regulation : ''}}</td>-->
  <!--                  <td>{{$list->Activity_Steps ? $list->Activity_Steps : ''}}</td>-->
  <!--                  <td>{{$list->Forms ? $list->Forms : ''}}</td>-->
  <!--                  <td>{{$list->To_Whom ? $list->To_Whom : ''}}</td>-->
  <!--                  <td>{{$list->Role ? $list->Role : ''}}</td>-->
  <!--                  <td>{{$list->Within_days ? $list->Within_days : ''}}</td>-->
  <!--                  <td>{{$list->Timelines ? $list->Timelines : ''}}</td>-->
  <!--                  <td>{{$list->Due_Date ? $list->Due_Date : ''}}</td>-->
  <!--                  <td>{{$list->Revised_Dates_as_per_form_ ? $list->Revised_Dates_as_per_form_ : ''}}</td>-->
  <!--                  <td>{{$list->Actual_Date ? $list->Actual_Date : ''}}</td>-->
  <!--                  <td>{{$list->Reason_for_delay ? $list->Reason_for_delay : ''}}</td>-->
  <!--                  <td>{{$list->Site ? $list->Site : ''}}</td>-->
  <!--                  <td>Form-2</td>-->
  <!--          </tr>-->
          
         
  <!--        </tbody>-->
          <!--Table body-->


  <!--      </table>-->
        <!--Table-->
  <!--    </div>-->
  <!--      </div>-->
  <!--    </li>-->
   
  <!--  </ul>-->
    
  <!--    @endforeach-->
  </div>

  <!-- /.panel-body -->
</div>

<style>
    .timeline {
    position: relative;
    /*padding: 20px 0 20px;*/
    list-style: none;
}

.timeline:before {
    content: " ";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 2%;
    width: 3px;
    margin-left: -1.5px;
    background-color: #eeeeee;
}

.timeline > li {
    position: relative;
    margin-bottom: 20px;
}

.timeline > li:before,
.timeline > li:after {
    content: " ";
    display: table;
}

.timeline > li:after {
    clear: both;
}

.timeline > li:before,
.timeline > li:after {
    content: " ";
    display: table;
}

.timeline > li:after {
    clear: both;
}

.timeline > li > .timeline-panel {
    float: right;
    position: relative;
    width: 92%;
    padding: 20px;
    border: 1px solid #d4d4d4;
    border-radius: 2px;
    -webkit-box-shadow: 0 1px 6px rgba(0,0,0,0.175);
    box-shadow: 0 1px 6px rgba(0,0,0,0.175);
}

.timeline > li > .timeline-panel:before {
    content: " ";
    display: inline-block;
    position: absolute;
    top: 26px;
    right: -15px;
    border-top: 15px solid transparent;
    border-right: 0 solid #ccc;
    border-bottom: 15px solid transparent;
    border-left: 15px solid #ccc;
}

.timeline > li > .timeline-panel:after {
    content: " ";
    display: inline-block;
    position: absolute;
    top: 27px;
    right: -14px;
    border-top: 14px solid transparent;
    border-right: 0 solid #fff;
    border-bottom: 14px solid transparent;
    border-left: 14px solid #fff;
}

.timeline > li > .timeline-badge {
    z-index: 100;
    position: absolute;
    top: 16px;
    left: 2%;
    width: 50px;
    height: 50px;
    margin-left: -25px;
    border-radius: 50% 50% 50% 50%;
    text-align: center;
    font-size: 1.4em;
    line-height: 50px;
    color: #fff;
    background-color: #999999;
}

.timeline > li.timeline-inverted > .timeline-panel {
    float: right;
}

.timeline > li.timeline-inverted > .timeline-panel:before {
    right: auto;
    left: -15px;
    border-right-width: 15px;
    border-left-width: 0;
}

.timeline > li.timeline-inverted > .timeline-panel:after {
    right: auto;
    left: -14px;
    border-right-width: 14px;
    border-left-width: 0;
}

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

.timeline-body > p + p {
    margin-top: 5px;
}

@media(max-width:767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        top: 16px;
        left: 15px;
        margin-left: 0;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

    ul.timeline > li > .timeline-panel:before {
        right: auto;
        left: -15px;
        border-right-width: 15px;
        border-left-width: 0;
    }

    ul.timeline > li > .timeline-panel:after {
        right: auto;
        left: -14px;
        border-right-width: 14px;
        border-left-width: 0;
    }
}
</style>
          
          
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

  <script>
    function form_submit() {
    $.ajax({
        url: '{{ url(admin().'/dawnload_pdf/fortimeline')}}/{{$debitor_details->id}}',
        data: {
            '_token': '{{ csrf_token() }}'
        },
        type: 'GET', 
        success: function(data) {
            var tempElem = document.createElement('div');
      tempElem.innerHTML = data;

      // Convert the temporary element to PDF using html2pdf
      html2pdf()
        .from(tempElem)
        .save('response.pdf');
        }
    });
}
  </script>

@section('script')

<x-js :file="$jsl" />
@endsection

@endsection  