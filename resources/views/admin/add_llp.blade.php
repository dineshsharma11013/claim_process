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

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">LLP Master Data</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/company-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form id="llpForm">
            
            
      
        <div class="box-body">
          <div class="row">
                        
            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">CIN <span class="required_cls">*</span></label>
                  <input type="text" name="cin" id="cin" class="form-control" placeholder="" autocomplete="off">
                  
                  <div class="error_cls" id="error_cin"></div>
                </div>                
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Company name <span class="required_cls">*</span></label>
                  <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company name" autocomplete="off">
                  
                  <div class="error_cls" id="error_company_name"></div>
                </div>
              </div>

              <div class="col-md-12">

                

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">ROC code </label>
                  <input type="text" name="roc_code"  value="" class="form-control" placeholder="ROC code">
                  <div class="error_cls" id="error_insolvency_commencement_date"></div>
                </div>
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Registration number<span class="required_cls"></span></label>
                  <input type="text" name="registeration_number" class="form-control" placeholder="Registration number" autocomplete="off">
                  
                  <div class="error_cls" id="error_nclt"></div>
                </div>
              </div>

              <div class="col-md-12">

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Company category <!--<span class="required_cls">*</span>--></label>
                  <input type="text" name="company_category"  class="form-control" placeholder="Company category">
                  <div class="error_cls" id="error_start_date"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Company Sub-Category <!--<span class="required_cls">*</span>--></label>
                  <input type="text" name="company_subcategory" class="form-control" placeholder="">
                  <div class="error_cls" id="error_end_date"></div>
                </div>

              </div>

              <div class="col-md-12">

                

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Class of company<!--<span class="required_cls">*</span>--></label>
                  <input type="text" name="class_of_company" class="form-control" placeholder="Class of company">
                  <div class="error_cls" id="error_claim_filing_date"></div>
                </div>
              
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Authorised Capital(Rs)</label> <input type="text" name="authorised_capital" class="form-control" placeholder="authorised_capital">
                
                  <div class="error_cls" id="error_status"></div>
                </div>
                
                
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Paid up Capital </label> <input type="text" name="paid_up_capital" class="form-control" placeholder="Paid up capital">
                
                  <div class="error_cls" id="error_status"></div>
                </div>
                
                       <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Number of members </label> <input type="text" name="number_of_member" class="form-control" placeholder="Paid up capital">
                
                  <div class="error_cls" id="error_status"></div>
                </div>
                
                
                
                        <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Date of Incorporation</label> <input type="date" name="date_of_incorporation" class="form-control" placeholder="Paid up capital">
                
                  <div class="error_cls" id="error_status"></div>
                </div>
                
                
                
                
                        <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Registered address</label> <input type="text" name="registeration_address" class="form-control" placeholder="Paid up capital">
                
                  <div class="error_cls" id="error_status"></div>
                </div>
                
                
                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Address other than R/O</label> <input type="text" name="address_other_than_ro" class="form-control" placeholder="Paid up capital">
                
                  <div class="error_cls" id="error_status"></div>
                </div>
                
                
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Email id</label> <input type="email" name="email_id" class="form-control" placeholder="Email id ">
                
                  <div class="error_cls" id="error_status"></div>
                </div>
                
                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Whether listed or not</label> <input type="text" name="whether_listed_or_not" class="form-control" placeholder="Email id ">
                
                  <div class="error_cls" id="error_status"></div>
                </div>


 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">ACTIVE compliance</label> <input type="text" name="active_compilance" class="form-control" placeholder="Active compilance ">
                
                  <div class="error_cls" id="error_status"></div>
                </div>



 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Suspended at stock exchange</label> <input type="text" name="suspended_at_stock_exchange" class="form-control" placeholder="suspended stock ">
                
                  <div class="error_cls" id="error_status"></div>
                </div>


 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Date of last AGM</label> <input type="date" name="date_of_last_agm" class="form-control" placeholder="Date of last AGM">
                
                  <div class="error_cls" id="error_status"></div>
                </div>

 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Date of balance sheet</label> <input type="date" name="date_of_balancesheet" class="form-control" >
                
                  <div class="error_cls" id="error_status"></div>
                </div>



 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Company status</label> <input type="text" name="company_status_for_efilling" class="form-control" >
                
                  <div class="error_cls" id="error_status"></div>
                </div>

              </div>


            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
              
                        <x-asbutton value="Save" redirect="self" form="llpForm" btnId="llpFormBtn" path="/submit_llp_form" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                      
                       
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


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> 
<script src="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.js') }}"></script> 
<script type="text/javascript">
//  $('#irp').select2();



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
