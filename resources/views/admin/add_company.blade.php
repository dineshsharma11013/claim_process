@extends("admin_layout.main")

@section("container")


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>
    @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">Company Details</h3>
          <!-- <div class="box-tools pull-right">
            <a href="{{url(admin().'/company-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div> -->
        </div>
        <!-- /.box-header -->
        <form role="form" id="companyForm">
          <input type="hidden" name="cirp_id" value="{{$id ?? ''}}">
        <div class="box-body">
          <div class="row">
            
            
            <div class="col-md-12">
              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Select Type : <!--<span class="required_cls">*</span>--></label>
                  {!! Form::select('ip_type', ['cirp'=>'CIRP', 'liquidator'=>'Liquidator'], null, ['onchange' =>'Removef("ip_type");getIpType(this.value);', 'placeholder' => 'Please Select', 'id' => 'ip_type','class'=>'form-control', 'autocomplete'=>'off']) !!}
                  <div class="error_cls" id="error_ip_type"></div>
                </div>

                <x-input label="Name of Corporate Debtor" type="text" name="name"  placeholder="" :comp="$comp" :colMd="$sixDiv"/>
                
              </div>

              <div class="col-md-12">

                <x-input label="Address of the registered office and principal office (if any) of corporate debtor" type="text" name="address"  placeholder="" :comp="$comp" :colMd="$sixDiv"/>

                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">PAN Number </label>
                  <input type="text" name="pan_number" id="pan_number" onclick ="RemoveER('pan_number')" value="" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_pan_number"></div>
                </div>
                
              </div>

              <div class="col-md-12">
                <x-input label="Authority under which corporate debtor is incorporated / registered" type="text" name="nclt"  placeholder="" :colMd="$sixDiv"/>
                  
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Date of incorporation of corporate debtor <!--<span class="required_cls">*</span>--></label>
                  <input type="text" name="start_date" id="start_date" onclick ="RemoveER('start_date')" value="" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_start_date"></div>
                </div>
                
                
                

              </div>

              <div class="col-md-12">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">NCLT Bench <!--<span class="required_cls">*</span>--></label>
                  <input type="text" name="nclt_bench" id="nclt_bench" onclick ="RemoveER('nclt_bench')" value="" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_nclt_bench"></div>
                </div>

               
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Insolvency Commencement Date <!--<span class="required_cls">*</span>--></label>
                  <input type="text" name="insolvency_commencement_date" id="insolvency_commencement_date" onchange="RemoveER('insolvency_commencement_date');"  value="" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_insolvency_commencement_date"></div>
                </div>
               
              
                 

              </div>

              <div class="col-md-12">

                

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Date of receipt order <!--<span class="required_cls">*</span>--></label>
                  <input type="text" name="order_receving_date" id="order_receving_date" onclick ="RemoveER('order_receving_date')" value="" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_order_receving_date"></div>
                </div>

                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Last date for submission of claims <!--<span class="required_cls">*</span>--></label>
                  <input type="text" name="claim_filing_date" id="claim_filing_date" onclick ="RemoveER('claim_filing_date')" value="" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_claim_filing_date"></div>
                </div>
              </div>
              
              <div class="col-md-12">
                
               
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Estimated date of closure of insolvency resolution process <!--<span class="required_cls">*</span>--></label>
                  <input type="text" name="end_date" id="end_date" onclick ="RemoveER('end_date')" value="" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_end_date"></div>
                </div>

                <x-input label="Email" type="text" name="email"  placeholder="" :colMd="$sixDiv"/>
              </div>
              
              <div class="col-md-12">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  <select class="form-control" name="status" id="status" onchange='Removef("status")' autocomplete="off">  
                 <!--   <option value="">Please Select</option> -->
                   @foreach(Config::get('site.status') as $ik=>$iv)
                    <option value="{{$ik}}">{{$iv}}</option>
                  @endforeach
                  </select>
                
                  <div class="error_cls" id="error_status"></div>
                </div>
              </div>

            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-asbutton value="Save" redirect="none" form="companyForm" btnId="formBBtn" path="/add-company" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_companyForm">
      <!-- <div class='col-md-6 col-md-offset-3 alert alert-dismissible alert-danger text-center text-capitalize'>its ok</div> -->
                        
  </div>

              </div>
        </form>

        <!-- /.box-body -->
        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Order Receiving Date</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
        <form class="form-group">
        <p style="font-weight: bold;">Last date of claim submission has to be counted 14 days from</p>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" onchange="getDate()" autocomplete="off" value="commencement" id="orderOption" name="orderOption"> Insolvency Commencement Date
          </label>
        </div>
        <p>or</p>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" onchange="getDate()" autocomplete="off" value="receiving" id="orderOption" name="orderOption"> Order Receiving Date
          </label>
        </div>
         
       <!--   <div class="form-group col-md-6" id="CoverStartDateOtherPickerDiv">
        <p>Select Date</p>
       <input class="form-check-label" type="text"  id="CoverStartDateOtherPicker" autocomplete="off" />
      </div> -->
      </form>
      <br>

      </div>

     

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>




@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> 
<script src="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.js') }}"></script> 
<script type="text/javascript">

$('#order_receving_date').datetimepicker({
    format: 'YYYY-MM-DD'
  }).on("dp.change", function (e) {
     console.log(e.date._d, e);
    var commencement_date = $("#insolvency_commencement_date").val();

     var startDt = $('#order_receving_date').val(); 
      
     var mm2Dt = moment(startDt).add('days', 14);
     var cl2Dt = mm2Dt.format('YYYY-MM-DD');  

     var mmDt = moment(startDt).add('days', 180);
     var clDt = mmDt.format('YYYY-MM-DD');
  
     $("#claim_filing_date").val(cl2Dt);

     $("#order_receving_date").val(startDt);

     if (commencement_date != startDt) {
      jQuery.noConflict();
      $('#myModal').modal('show'); 
     }
     console.log(commencement_date, startDt);

    
});



  $('#insolvency_commencement_date').datetimepicker({
    format: 'YYYY-MM-DD'
  }).on("dp.change", function (e) {
     //console.log(e.date._d);
    
     var startDt = $('#insolvency_commencement_date').val(); 
      
     var mm2Dt = moment(startDt).add('days', 14);
     var cl2Dt = mm2Dt.format('YYYY-MM-DD');  

     var mmDt = moment(startDt).add('days', 180);
     var clDt = mmDt.format('YYYY-MM-DD');
     $("#end_date").val(clDt);
     $("#claim_filing_date").val(cl2Dt);


    
});
  $('#claim_filing_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });

  $('#start_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#end_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });

</script>

<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection  
@endsection  
