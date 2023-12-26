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
          
              
              <div style="text-align: center;">
                <h3 class="box-title">Update Form A</h3><br>
              <p>Public Announcement</p>
              <p>(Under Regulation 6 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corpotate Persons) Regulations, 2016)</p>
              <p>FOR THE ATTENTION OF THE CREDITORS OF <span id="company_name">{{$com_name->name}}</span></p>
            </div>
              
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/form-a-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="formA">
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
              @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $twelveDiv = Config::get('site.twelveDiv');
                $formMethod = 'adminGeneral';
                @endphp
              
              

                <!-- <x-input label="Name of corporate debtor " type="text" name="corporate_debtor" :value="$cat->corporate_debtor" placeholder="" :comp="$comp" :colMd="$sixDiv"/> -->
             
                  <input type="hidden" name="assign_company_mdls_id" id="assign_company_mdls_id" value="{{$assign_company->id ? $assign_company->id : ''}}" autocomplete="off">
                  <input type="hidden" name="ip_designation" id="ip_designation" value="{{$cat->designation}}" autocomplete="off">

                  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Name of corporate debtor </label>
                  <select class="form-control" name="corporate_debtor" id="corporate_debtor" onchange='Removef("corporate_debtor");getCompanyDetail("formA", this.value);' autocomplete="off">  
                   <option value="">Please Select</option>
                   @foreach($company as $ik=>$iv)
                    <option value="{{$ik}}" {{ ($ik==$cat->company_id) ? 'selected' : '' }} >{{$iv}}</option>
                  @endforeach
                  </select>
                
                  <div class="error_cls" id="error_corporate_debtor"></div>
                </div>


                 <div class="form-group col-md-6">
                  <label>Date of incorporation of corporate debtor</label>
                  <input type="text" name="incorporation_date" id="incorporation_date" value="{{$cat->incorporation_date}}" onclick="Removef('incorporation_date')" class="form-control" autocomplete="off">

                  <div class="error_cls" id="error_incorporation_date"></div>
                  </div>

   
              </div>


            <div class="col-md-12">
              <x-input label="Authority under which corporate debtor is incorporated / registered" type="text" name="corporate_debtor_authority" placeholder="" :value="$cat->corporate_debtor_authority" :comp="$comp" :colMd="$sixDiv"/>
              
              <x-input label="Corporate Identity No. / Limited Liability Identification No. of corporate debtor" type="text" name="corporate_debtor_identity_number" :value="$cat->corporate_debtor_identity_number" placeholder="" :comp="$comp" :colMd="$sixDiv"/>
            </div>

            <div class="col-md-12">
              
                <x-input label="Address of the registered office and principal office (if any) of corporate debtor" type="text" name="corporate_debtor_address"  placeholder="" :value="$cat->corporate_debtor_address" :comp="$comp" :colMd="$sixDiv"/>
              
              <div class="form-group col-md-6">
                  <label>Insolvency commencement date in respect of corporate debtor</label>
                  <input type="text" name="corporate_debtor_insolvency_date" id="corporate_debtor_insolvency_date" value="{{$cat->corporate_debtor_insolvency_date}}" onclick="Removef('corporate_debtor_insolvency_date')" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_corporate_debtor_insolvency_date"></div>
                  </div>

            </div>

            <div class="col-md-12">
              
               <div class="form-group col-md-6">
                  <label>Last date for submission of claims</label>
                  <input type="text" name="claim_last_date" id="claim_last_date" value="{{$cat->claim_last_date}}" onclick="Removef('claim_last_date')" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_claim_last_date"></div>
                  </div>

                  <div class="form-group col-md-6">
                  <label>Date of receipt order</label>
                  <input type="text" name="order_receving_date" id="order_receving_date" value="{{$cat->order_receving_date}}" class="form-control" autocomplete="off" >
                  <div class="error_cls" id="error_order_receving_date"></div>
                  </div>   

                

            </div>

            <div class="col-md-12">
              
              <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Name and registration number of the insolvency professional acting as interim resolution process </label>
                  
                </div>
                <div class="form-group col-md-6">
                  <input type="text" name="insolvency_professional_name" id="insolvency_professional_name" value="{{$cat->insolvency_professional_name}}" onKeyUp="Removef('insolvency_professional_name')" class="form-control" placeholder="Name" autocomplete="off">
                  <div class="error_cls" id="error_insolvency_professional_name"></div>
                  </div>

                  <div class="form-group col-md-6">
                  <input type="text" name="insolvency_professional_registration_number" id="insolvency_professional_registration_number" value="{{$cat->insolvency_professional_registration_number}}" onKeyUp="Removef('insolvency_professional_registration_number')" class="form-control" placeholder="Registration Number" autocomplete="off">
                  <div class="error_cls" id="error_insolvency_professional_registration_number"></div>
                  </div>

            </div>

            <div class="col-md-12">
              
              <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Address and e-mail of the interim resolution professional, as registered with the Board </label>
                  
                </div>
                <div class="form-group col-md-6">
                  <input type="text" name="resolution_professional_address" id="resolution_professional_address" value="{{$cat->resolution_professional_address}}" onKeyUp="Removef('resolution_professional_address')" class="form-control" placeholder="Address" autocomplete="off">
                  <div class="error_cls" id="error_resolution_professional_address"></div>
                  </div>
                  <div class="form-group col-md-6">
                  <input type="text" name="resolution_professional_email" id="resolution_professional_email" value="{{$cat->resolution_professional_email}}" onKeyUp="Removef('resolution_professional_email')" class="form-control" placeholder="Email" autocomplete="off"> 
                  <div class="error_cls" id="error_resolution_professional_email"></div>
                  </div>

            </div>

            <div class="col-md-12">
              
              <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Address and e-mail to be used for correspondence with the interim resolution professional </label>
                  
                </div>
                <div class="form-group col-md-6">
                  <input type="text" name="correspondence_resolution_professional_address" id="correspondence_resolution_professional_address" value="{{$cat->correspondence_resolution_professional_address}}" onKeyUp="Removef('correspondence_resolution_professional_address')" class="form-control" placeholder="Address" autocomplete="off">
                  <div class="error_cls" id="error_correspondence_resolution_professional_address"></div>
                  </div>
                  <div class="form-group col-md-6">
                  <input type="text" name="correspondence_resolution_professional_email" id="correspondence_resolution_professional_email" value="{{$cat->correspondence_resolution_professional_email}}" onKeyUp="Removef('correspondence_resolution_professional_email')" class="form-control" placeholder="Email" autocomplete="off">
                  <div class="error_cls" id="error_correspondence_resolution_professional_email"></div>
                  </div>

            </div>

         

            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label>Estimated date of closure of insolvency resolution process</label>
                  <input type="text" name="insolvency_closing_date" id="insolvency_closing_date" value="{{$cat->insolvency_closing_date}}" onclick="Removef('insolvency_closing_date')" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_insolvency_closing_date"></div>
                  </div>

              <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Relevant forms and Details of authorized representative are available at : </label>
                  
                  <div class="col-md-6" style="padding-left: 0px;">
                  <input type="text" name="authorized_forms" id="authorized_forms" value="{{$cat->authorized_forms}}" onKeyUp="Removef('authorized_forms')" class="form-control" placeholder="Forms" autocomplete="off">
                  <div class="error_cls" id="error_authorized_forms"></div>
                  </div>  

                  <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
                  <input type="text" name="authorized_details" id="authorized_details" value="{{$cat->authorized_details}}" onKeyUp="Removef('authorized_details')" class="form-control" placeholder="Details" autocomplete="off">
                  <div class="error_cls" id="error_authorized_details"></div>
                  </div>

                  </div>

<!--               <x-input label="Relevant forms and Details of authorized representative are available at :" type="text" name="password"  placeholder="" :comp="$comp" :colMd="$sixDiv"/> -->
              

            </div>

            <div class="col-md-12" id="debtorClassDiv">
                        
                
              
                  @if(count($clss)>0)

                  @foreach($clss as $cls)
                <div class="divClass" id="divClass_{{$loop->index+1}}">
              <div class="form-group col-md-5">
                  <label>Classes of creditors, if any, under clauses (b) of sub-section (6A) of section 21, ascertained by the interim resolution professional </label>
                  <input type="text" name="creditor_classess[]" value="{{$cls->creditor_classess}}" id="creditor_classess" value="" onchange="updateFormA('{{$cls->id}}', 'creditor_classess', this.value)" onclick="Removef('creditor_classess')" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_creditor_classess"></div>
                  </div>

                <div class="form-group col-md-2" style="padding-top: 20px">
                  <label for="exampleInputEmail1"> AR-1</label>
                 {!! Form::select('ar1[]', $ips_nms, $cls->ar1, ['onchange' =>"updateFormA('$cls->id', 'ar1', this.value)", 'id' => 'ar1','class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Please Select']) !!}
                  <div class="error_cls" id="error_ar1"></div>
                </div>

                <div class="form-group col-md-2" style="padding-top: 20px">
                  <label for="exampleInputEmail1"> AR-2</label>
                  {!! Form::select('ar2[]', $ips_nms, $cls->ar2, ['onchange' =>"updateFormA('$cls->id', 'ar2', this.value)" ,'id' => 'ar2','class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Please Select' ]) !!}
      
                  <div class="error_cls" id="error_ar2"></div>
                </div>

                <div class="form-group col-md-2" style="padding-top: 20px">
                  <label for="exampleInputEmail1"> AR-3</label>
                  {!! Form::select('ar3[]', $ips_nms, $cls->ar3, ['onchange' =>"updateFormA('$cls->id', 'ar3', this.value)" ,'id' => 'ar3','class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Please Select']) !!}
                  <div class="error_cls" id="error_ar3"></div>
                </div>

                <div class="col-md-1" style="padding-top: 50px">
                  <button type="button" onclick="addRow('debtorClassDiv','divClass')"><i class="fa fa-fw fa-plus-square"></i></button> 
                   <button type="button" id="deleteRowBtn{{$loop->index+1}}" onclick="delRow('divClass_{{$loop->index+1}}', '{{$cls->id}}', '/remove-class-data', 'deleteRowBtn{{$loop->index+1}}', 'formA', 'errMessage_4')"><i class="fa fa-fw fa-minus-circle"></i></button>
                   <!-- @if($loop->index+1 != 1) -->
                   <!-- <button type="button" id="deleteRowBtn{{$loop->index+1}}" onclick="delRow('divClass_{{$loop->index+1}}', '{{$cls->id}}', '/remove-class-data', 'deleteRowBtn{{$loop->index+1}}', 'formA', 'errMessage_4')"><i class="fa fa-fw fa-minus-circle"></i></button> -->
                    <!-- @endif -->
                  <!-- <button><i class="fa fa-fw fa-minus-circle"></i></button> -->
                </div>
              </div>

                @endforeach

                @else
                <div class="divClass" id="divClass_1">
                <div class="form-group col-md-5">
                  <label>Classes of creditors, if any, under clauses (b) of sub-section (6A) of section 21, ascertained by the interim resolution professional </label>
                  <input type="text" name="creditor_classess[]" id="creditor_classess" value="" onclick="Removef('creditor_classess')" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_creditor_classess"></div>
                  </div>

                <div class="form-group col-md-2" style="padding-top: 20px">
                  <label for="exampleInputEmail1"> AR-1</label>
                  <select class="form-control" name="ar1[]" id="ar1" onchange='Removef("ar1");' autofocus="off" autocomplete="off">  
                   <option value="">Please Select</option>
                   @foreach($ips_nms as $ik=>$iv)
                    <option value="{{$ik}}">{{$iv}}</option>
                  @endforeach
                  </select>
                
                  <div class="error_cls" id="error_ar1"></div>
                </div>

                <div class="form-group col-md-2" style="padding-top: 20px">
                  <label for="exampleInputEmail1"> AR-2</label>
                  <select class="form-control" name="ar2[]" id="ar2" onchange='Removef("ar2");' autofocus="off" autocomplete="off">  
                   <option value="">Please Select</option>
                   @foreach($ips_nms as $ik=>$iv)
                    <option value="{{$ik}}">{{$iv}}</option>
                  @endforeach
                  </select>
                
                  <div class="error_cls" id="error_ar2"></div>
                </div>

                <div class="form-group col-md-2" style="padding-top: 20px">
                  <label for="exampleInputEmail1"> AR-3</label>
                  <select class="form-control" name="ar3[]" id="ar3" onchange='Removef("ar3");' autofocus="off" autocomplete="off">  
                   <option value="">Please Select</option>
                   @foreach($ips_nms as $ik=>$iv)
                    <option value="{{$ik}}">{{$iv}}</option>
                  @endforeach
                  </select>
                
                  <div class="error_cls" id="error_ar3"></div>
                </div>

                <div class="col-md-1" style="padding-top: 50px">
                  <button type="button" onclick="addRow('debtorClassDiv','divClass')"><i class="fa fa-fw fa-plus-square"></i></button> 
                  <!-- <button><i class="fa fa-fw fa-minus-circle"></i></button> -->
                </div>
                </div>   
                @endif



                
                        
                 



            </div>
            

            <div class="col-md-12">
              <div style="padding:20px;">
                <textarea name="conclusion" id="conclusion" autocomplete="off">

               <p> Notice is hereby given that the National Company Law Tribunal has ordered the commencement of a corporate insolvency resolution process of the <span id="company_name">{{$com_name->name}}</span> on <span id="commencement_date">{{$cat->corporate_debtor_insolvency_date}}</span> .</p>

 <p> The creditors of <span id="company_name">{{$com_name->name}}</span> are hereby called upon to submit their claims with proof on or before <span id="last_date">{{$cat->claim_last_date}}</span> to the Interim Resolution Professional at the address mentioned against entry No. 10.</p>

<p> The Financial creditors shall submit their claims with proof by electronic means along with the hard copies. All other creditors may submit the claimss with proof in person, by post or any electronic means. </p>

<p> Submission of false or misleading proofs of claim shall attract penalties as per the provisions of IBC, 20216</p>
</textarea>
<br><br><br><br>
<div class="row">
  <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Name and Signature of Interim Resolution Professional :<span class="required_cls">*</span></label>
                  
                  <div class="col-md-6" style="padding-left: 0px;">
                  <input type="text" name="interim_resolution_name" id="interim_resolution_name" onKeyUp="Removef('interim_resolution_name')" value="{{$ips->first_name}}" class="form-control" placeholder="Name" autocomplete="off" readonly>
                  <div class="error_cls" id="error_interim_resolution_name"></div>
                  </div>  

                  <input type="hidden" name="ip_id" id="ip_id" value="{{$ips->id}}">
                  <input type="hidden" name="ip_name" id="ip_name" value="{{$ips->first_name}}" autocomplete="off">

                  <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
                  <input type="hidden" name="file_value" id="file_value" value="">  
                  <input type="file" name="file" id="file" accept="image/png, image/gif, image/jpeg" onchange="loadFile('file','error_file')" class="form-control">
                      <small id="emailHelp" class="form-text text-muted">Only jpg, png files allowed.</small>
                     
                    @if(!empty($cat->interim_resolution_signature)) 
                    <img src="{{ asset('public/access/media/forms/formA/'.$cat->unique_id.'/'.$cat->interim_resolution_signature) }}" alt="profile image" id="ip_image" width="50" height="50"> 
                    @endif
                       
                        <div class="error_cls" id="error_file"></div>
                  </div>

                  </div>

                   <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Date and Place <span class="required_cls">*</span></label><br>
                  
                  <div class="col-md-6" style="padding-left: 0px;">
                  <input type="text" name="date" id="date" value="{{$cat->date}}" onclick="Removef('date')" class="form-control" placeholder="Date">
                  <div class="error_cls" id="error_date"></div>
                  </div>  

                  <div class="col-md-6" style="padding-left: 0px;">
                  <input type="text" name="place" id="place" value="{{$cat->place}}" onKeyUp="Removef('place')" class="form-control" placeholder="Place">
                  <div class="error_cls" id="error_place"></div>
                  </div> 

                  

                  </div>


</div>
              </div>
            </div>
            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <x-ckbutton value="Update" redirect="self" form="formA" btnId="formABtn" path="/update-form-a/{{$cat->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              

                    <div class="col-md-12" id="errMessage_formA">
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

<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
<script src="{{asset('public/access/ckeditor/ckeditor.js')}}"></script>
     <script type="text/javascript">
    CKEDITOR.replace('conclusion');
   
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

</script>

<!-- Instead of -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
 <script src="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.js') }}"></script>  

 <script type="text/javascript">


 // $('#CoverStartDateOtherPicker').datetimepicker({
 //          format : "YYYY-MM-DD"
 //        }); 


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



$('#order_receving_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });


   $('#incorporation_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  // $('#corporate_debtor_insolvency_date').datetimepicker({
  //   format: 'YYYY-MM-DD'
  // });

  $('#corporate_debtor_insolvency_date').datetimepicker({
    format: 'YYYY-MM-DD'
  }).on("dp.change", function (e) {
     //console.log(e.date._d);
    
     var startDt = $('#corporate_debtor_insolvency_date').val(); 
      
     var mm2Dt = moment(startDt).add('days', 14);
     var cl2Dt = mm2Dt.format('YYYY-MM-DD');  

     var mmDt = moment(startDt).add('days', 180);
     var clDt = mmDt.format('YYYY-MM-DD');
     $("#insolvency_closing_date").val(clDt);
     $("#claim_last_date").val(cl2Dt);

     $("#order_receving_date").val(cl2Dt);
    
});

$('#insolvency_closing_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });

$('#claim_last_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });
$('#date').datetimepicker({
    format: 'YYYY-MM-DD'
  });
</script>


@endsection  
@endsection  
