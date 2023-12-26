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
              <!--<a href="{{url(admin().'/add-ar')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD AR</a>-->
              <h3 class="box-title"><u>Form-2-Timeline</u></h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="font-family: math">
                <thead>
                 <tr>
                    <th colspan="2">Name of the Corporate Debtor</th>
                    <td colspan="3">{{$debitor_details->vs_name_of_corporate_debtor ? $debitor_details->vs_name_of_corporate_debtor : ''}} </td>
                 </tr>
                  <tr>
                    <th  colspan="2">Name of the IP/IPE</th>
                    <td  colspan="3">{{$debitor_details->name_of_creditor ? $debitor_details->name_of_creditor : ''}} </td>
                 </tr>
                                   <tr>
                    <th  colspan="2">IP/IPE</th>
                    <td  colspan="3"> {{$debitor_details->ip_ipe ? $debitor_details->ip_ipe : ''}}</td>
                 </tr>
                 @if(isset($debitor_details->name_authorised_signature))
                 <tr>
                    <th  colspan="2">Name of Authorized Signatory</th>
                    <td  colspan="3"> {{$debitor_details->name_authorised_signature ? $debitor_details->name_authorised_signature : ''}}</td>
                 </tr>
                 @endif
                 
                 
                 <br>
                <tr style="background-color:#316c8f; color:white; ">
                  <th>S. No.</th>
                  <th>Section / Regulation</th>
                  <th>Activity / Steps</th>
                  <th>Enter the Date</th>
                  <th>Due Date</th>
                  
                </tr>
               
                </thead>
                <tbody>
            
                  <tr>
             
                    <td>1</td>
                    <td>{{$debitor_details->sction ? $debitor_details->sction : ''}}</td>
                    <td>Date of giving consent</td>
                    <td>{{date('d-m-y',strtotime($debitor_details->first_date ? $debitor_details->first_date : ''))}}</td>
                    @php  $date = date('d-m-y', strtotime($debitor_details->first_date . ' +3 days')  ) @endphp
                    <td>{{ $date }}</td>
           
                  </tr>
                  
                   <tr>
             
                    <td>2</td>
                    <td>Sec. 16(1)</td>
                    <td>CIRP Commencement date</td>
                    <td> @if(!empty($commencement_date)) {{$commencement_date->commencement_date ? $commencement_date->commencement_dat :''}} @endif </td>
                    <td> @if(!empty($commencement_date)) {{date('d-m-y',strtotime($commencement_date->commencement_date ? $commencement_date->commencement_dat :''. ' +3 days'))}} @endif</td>
           
                  </tr>
                  
                    <tr>
             
                    <td>3</td>
                    <td></td>
                    <td>Event</td>
                    <td></td>
                    <td></td>
           
                  </tr>
                  
                     <tr>
             
                    <td>4</td>
                    <td>Sec. 12(A)/ Reg. 30A</td>
                    <td>Submission of App. for withdrawal of App. admitted</td>
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

@section('script')

<x-js :file="$jsl" />
@endsection

@endsection  