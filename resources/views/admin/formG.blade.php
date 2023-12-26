@extends("admin_layout.main")

@section("container")


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $twelveDiv = Config::get('site.twelveDiv');
                $formMethod = 'adminGeneral';
                @endphp
    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              
              <div style="text-align: center;">
                <h3 class="box-title">Form G</h3><br>
              <p>ISSUANCE OF INVITATION FOR EXPRESSION OF INTEREST FOR</p>
              <p>(Name of corporate debtor) OPERATING IN (INDUSTRY TYPE) AT (LOCATION(S))</p>
              <p>Under sub-regulation (1) of regulation 36A of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) 
                  Regulations, 2016</p>
            </div>
              
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/form-g-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="formG">
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
              


                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Name of corporate debtor <span class="required_cls">*</span></label>
                  <input type="text" name="corporate_debtor_name" id="corporate_debtor_name" value="" onclick="Removef('corporate_debtor_name')" class="form-control" autocomplete="off" >
                
                  <div class="error_cls" id="error_corporate_debtor_name"></div>
                </div>

                 <div class="form-group col-md-3">
                  <label>Pan Number</label>
                  <input type="text" name="debtor_pan" id="debtor_pan" value="" onclick="Removef('debtor_pan')" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_debtor_pan"></div>
                  </div>
                  <div class="form-group col-md-3">
                  <label>CIN/LLP Number</label>
                  <input type="text" name="debtor_cin_llp" id="debtor_cin_llp" value="" onclick="Removef('debtor_cin_llp')" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_debtor_cin_llp"></div>
                  </div>

            </div>
            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                  <label>Address of the registered office</label>
                  <input type="text" name="reg_address" id="reg_address" value="" onclick="Removef('reg_address')" class="form-control"  autocomplete="off">
                  <div class="error_cls" id="error_reg_address"></div>
                  </div>


               <div class="form-group col-md-6">
                  <label>URL of website</label>
                  <input type="text" name="website" id="website" value="" onclick="Removef('website')" class="form-control" >
                  <div class="error_cls" id="error_corporate_debtor_identity_number"></div>
                  </div>    
              
          </div>
          <div class="col-md-12">
              
              <div class="form-group col-md-6">
                  <label>Details of place where majority of fixed assets are located</label>
                  <input type="text" name="place_details" id="place_details" value="" onclick="Removef('place_details')" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_place_details"></div>
                  </div>
              
              <div class="form-group col-md-6">
                  <label>Installed capacity of main products/services</label>
                  <input type="text" name="quantity" id="quantity" value="" onclick="Removef('quantity')" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_quantity"></div>
                  </div>
                </div>
            
              <div class="col-md-12">
               <div class="form-group col-md-6">
                  <label>Quantity and value of main products / services sold in last financial year</label>
                  <input type="text" name="value" id="value" value="" onclick="Removef('value')" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_value"></div>
                  </div>


               <div class="form-group col-md-6">
                  <label>Number of employees / workmen</label>
                  <input type="text" name="employee_workmen_number" id="employee_workmen_number" value="" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_employee_workmen_number"></div>

            </div>
          </div>

            <div class="col-md-12">
              
               <div class="form-group col-md-6">
                  <label>Further details including last available financial statements (with schedules) of two years, lists of creditors are available at URl:</label>
                  <input type="text" name="further_details" id="further_details" value="" onclick="Removef('further_details')" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_further_details"></div>
                  </div>

                <div class="form-group col-md-6"> 
                  <label>Date of issue of information memorandum, evaluation matrix and request for resolution plans to perspective resolution applicants</label>
                  <input type="text" name="information_issue_date" id="information_issue_date" value="" onclick="Removef('information_issue_date')" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_information_issue_date"></div>
                  </div>  

                </div>

                <div class="col-md-12">
               <div class="form-group col-md-6">
                  <label>Eligibility for resolution applicants under section 25(2)(h) of the Code is available at URL</label>
                  <input type="text" name="eligibility" id="eligibility" value="" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_eligibility"></div>

            </div>

             <div class="form-group col-md-6">
                  <label>Last date for receipt of expression of interest</label>
                  <input type="text" name="last_date_recript" id="last_date_recript" value="" onclick="Removef('last_date_recript')" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_last_date_recript"></div>
                  </div>

                </div>
                <div class="col-md-12">
               <div class="form-group col-md-6">
                  <label>Date of issue of provisional list of prospective resolution applicants</label>
                  <input type="text" name="prov_issue_date" id="prov_issue_date" value="" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_prov_issue_date"></div>

            </div>

            <div class="form-group col-md-6">
                  <label>Last date for submission of objections to provisional list</label>
                  <input type="text" name="last_date_submission" id="last_date_submission" value="" onclick="Removef('last_date_submission')" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_last_date_submission"></div>
                  </div>

                </div>
                <div class="col-md-12">
               <div class="form-group col-md-6">
                  <label>Date of issue of final list of prospective resolution applicants</label>
                  <input type="text" name="final_issue_date" id="final_issue_date" value="" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_final_issue_date"></div>

            </div>


               <div class="form-group col-md-6">
                  <label>Last date for submission of resolution plans</label>
                  <input type="text" name="resolution_last_date" id="resolution_last_date" value="" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_resolution_last_date"></div>

            </div>
          </div>
          <div class="col-md-12">

            <div class="form-group col-md-6">
                  <label>Process email id to submit Expression of Interest</label>
                  <input type="text" name="process_email" id="process_email" value="" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_process_email"></div>

            </div>

         
            <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  {!! Form::select('status', Config::get('site.status'), null, ['onchange' =>'Removef("status")' ,'id' => 'status','class'=>'form-control']) !!}
                  <div class="error_cls" id="error_status"></div>
                </div>
              </div>
            
            </div>
            </div>

         
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-asbutton value="Save" redirect="self" form="formG" btnId="formABtn" path="/form-g" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_formG">
      <!-- <div class='col-md-6 col-md-offset-3 alert alert-dismissible alert-danger text-center text-capitalize'>its ok</div> -->
                        
  </div>

              
          </div>
        </form>
</div>
        <!-- /.box-body -->
        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>







@section('script')



<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

</script>

<!-- Instead of -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
 <script src="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.js') }}"></script>  

 <script type="text/javascript">


  $('#information_issue_date').datetimepicker({
           format : "YYYY-MM-DD"
         }); 

$('#last_date_recript').datetimepicker({
           format : "YYYY-MM-DD"
         }); 

$('#prov_issue_date').datetimepicker({
           format : "YYYY-MM-DD"
         }); 

$('#last_date_submission').datetimepicker({
           format : "YYYY-MM-DD"
         }); 

$('#final_issue_date').datetimepicker({
           format : "YYYY-MM-DD"
         }); 

$('#resolution_last_date').datetimepicker({
           format : "YYYY-MM-DD"
         }); 




// $('#order_receving_date').datetimepicker({
//     format: 'YYYY-MM-DD'
//   }).on("dp.change", function (e) {
//      //console.log(e.date._d);
//     var commencement_date = $("#corporate_debtor_insolvency_date").val();

//      var startDt = $('#order_receving_date').val(); 
      
//      var mm2Dt = moment(startDt).add('days', 14);
//      var cl2Dt = mm2Dt.format('YYYY-MM-DD');  

//      var mmDt = moment(startDt).add('days', 180);
//      var clDt = mmDt.format('YYYY-MM-DD');
//     // $("#insolvency_closing_date").val(clDt);
//      $("#claim_last_date").val(cl2Dt);

//      $("#order_receving_date").val(startDt);

//      if (commencement_date != startDt) {
//       jQuery.noConflict();
//       $('#myModal').modal('show'); 
//      }
//      console.log(commencement_date, startDt);

    
// });


</script>


@endsection  
@endsection  
