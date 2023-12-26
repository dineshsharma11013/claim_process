@extends("home_layout/main")
@section('content')
<style type="text/css">
  .required_cls{
    color: red;
  }
  .error_cls{
    color: red;
  }
</style>
@php 
$authF = url('/').'/'.Config::get('site.formCa');
$bgImage = url('/').'/public/access/82c80ce2dd.jfif';
@endphp
 <div class="container-fluid back">
  <div class="row p-3">
    <div class="col m-3 p-3">



      <form class="mt-0 border border-info rounded form-body" id="financialCreditorFormCA">

       <input type="hidden" name="form_type" value="{{$user_type}}">
       <input type="hidden" name="ar" id="ar" value="{{isset($ar) ? $ar : ''}}">
       
       <input type="hidden" name="notify" id="notify" value="{{isset($notify->id) ? $notify->id : ''}}">
       <input type="hidden" name="fid" id="fid" value="{{isset($user->id) ? $user->id : ''}}">
       <input type="hidden" name="fA" id="fA" value="{{isset($formA->id) ? $formA->id : ''}}">
       <input type="hidden" name="form_ca_selected_id" id="form_ca_selected_id" value="{{isset($user->form_ca_selected_id) ? $user->form_ca_selected_id : ''}}">
       <input type="hidden" name="updated_data" id="updated_data" value="{{isset($edit) ? 'edit' : ''}}">
            <!-- One "tab" for each step in the form: -->
            <div class="tab" id="tab1">
        

               <h2 class="text-center">FORM CA</h2>
              <center><h5 class="text-center text-uppercase" style="color: #e0363c;" >SUBMISSION OF CLAIM BY FINANCIAL CREDITORS IN A CLASS</h5></center>
              <h6 class="text-center">(Under Regulation 8A of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations, 2016)</h6>
              <h4 style="float: right;">@if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h4>

              <h4>From</h4>

              <p>
                <span id="fc_name_2">{{!empty($user->fc_name) ? $user->fc_name : ''}}</span>
              <br>  <span id="userAddress">
                {{isset($user->fc_address) ? $user->fc_address : ''}} 
                
              </span></p>


              <h4>To</h4>
              <p>The Interim Resolution Professional / Resolution Professional <br>{{$irp->username}} <br>{{$irp->address}}</p>
              

              <h4><b>Subject:</b>Submission of claim and proof of claim.</h4><br>


              <h4>Madam/Sir</h4>

              <p class="text-dark">I <span id="fc_name_2">{{!empty($user->fc_name) ? $user->fc_name : $cat->name}}</span>, hereby submits this claim in respect of the corporate insolvency resolution process of {{isset($comp->name) ? ucwords($comp->name) : ''}}. The details for the same are set out below:</p>



                <div class="form-group">
                <label>1. Name of the financial creditor <span class="required_cls">*</span></label>
                <input class="form-control" type="text" id="fc_name" name="fc_name" value="{{!empty($user->fc_name) ? $user->fc_name : ''}}" placeholder="Financial  Creditor Name..." autocomplete="off" onKeyUp="Removefd('financialCreditorFormCA','fc_name');getName('financialCreditorFormCA','fc_name', this.value)">
                <div class="error_cls" id="error_fc_name"></div>
                </div>

                
                <div class="form-group">
                <label>2. Identification number of financial creditor <br> <span class="text-secondary"> (If an incorporate body, provide of incorporation. If a partnership or individual provide identification records* of all the partners or the individual) </span> </label>
                <input class="form-control" type="text" id="fc_identification_number" name="fc_identification_number" value="{{isset($user->fc_identification_number) ? $user->fc_identification_number : ''}}" placeholder="Identification  number..." autocomplete="off"> 
                <div class="error_cls" id="error_fc_identification_number"></div>
                </div>
               
                
                <div class="form-group">
                <label>3.</label><br>
                <label class="mr-1"> &nbsp; &nbsp; &nbsp;a. Address of financial Creditor for correspondence. <span class="required_cls">*</span></label>
                <input class="form-control" type="text" name="fc_address" id="fc_address" value="{{isset($user->fc_address) ? $user->fc_address : ''}}" placeholder="Address..." onKeyUp="Removefd('financialCreditorFormCA','fc_address');getAddress('financialCreditorFormCA','fc_address', this.value)" autocomplete="off">
                <div class="error_cls" id="error_fc_address"></div>
              </div>


                <div class="form-group">
                <label>&nbsp; &nbsp; &nbsp; b. Email Address <span class="required_cls">*</span></label>
                <input class="form-control" type="email" name="fc_email" id="fc_email" value="{{isset($user->fc_email) ? $user->fc_email : $cat->email}}" placeholder="Email ..." onKeyUp="Removefd('financialCreditorFormCA','fc_email');">
                <div class="error_cls" id="error_fc_email"></div>
              </div>
               


                <div class="form-group">
                <label>4.Total amount of claim <br> ( in Rs ) </label>
                
                <input class="form-control" type="text" name="claim_principle" id="claim_principle" value="{{isset($user->claim_principle) ? $user->claim_principle : ''}}" onKeyUp="getTotal('claim_principle','claim_interest','claim_amt');" onkeypress="return isNumberKey(event);" placeholder="Principle ..." autocomplete="off">
                
                <input class="form-control" type="text" name="claim_interest" id="claim_interest" value="{{isset($user->claim_interest) ? $user->claim_interest : ''}}" onKeyUp="getTotal('claim_principle','claim_interest','claim_amt');" onkeypress="return isNumberKey(event);" placeholder="Interest ..." autocomplete="off">

                <input class="form-control" type="text" name="claim_amt" id="claim_amt" value="{{isset($user->claim_amt) ? $user->claim_amt : ''}}" onkeypress="return isNumberKey(event);" placeholder="Total Amount ..." readonly autocomplete="off">
                  </div>
                  
                <div class="form-group">
                <label>5. Details of documents by references to which can be substantiated. </label>
                <input class="form-control" type="text" name="document_details" id="document_details" value="{{isset($user->document_details) ? $user->document_details : ''}}" placeholder="Details Of Documents ..." autocomplete="off">
                <div class="error_cls" id="error_document_details"></div>
                </div>


                <div class="form-group">
                <label>6. Details of how and when debt incurred</label>
                <input class="form-control" type="text" name="debt_incurred_details" id="debt_incurred_details" value="{{isset($user->debt_incurred_details) ? $user->debt_incurred_details : ''}}" placeholder="Details example..." autocomplete="off">
                  <div class="error_cls" id="error_debt_incurred_details"></div>

                </div>

                <div class="form-group">
                <label>7. Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim</label>
                <input class="form-control" type="text" name="other_mutual_details" id="other_mutual_details" value="{{isset($user->other_mutual_details) ? $user->other_mutual_details : ''}}" placeholder="Details example..." autocomplete="off" >
                <div class="error_cls" id="error_other_mutual_details"></div>
                </div>


                <div class="form-group">
                <label>8. Details of any security held, the value of the security, and the date it was given</label>
                <input class="form-control" type="text" name="security_held" id="security_held" value="{{isset($user->security_held) ? $user->security_held : ''}}" placeholder="Details example..." autocomplete="off">
                <div class="error_cls" id="error_security_held"></div>
                </div>


                <div class="form-group">
                <label>9. Details of the bank account to which the amount of the claim or any part thereof can be transferred pursuant to a resolution plan </label>
                <input class="form-control" placeholder="Account number ..." onkeypress="return isNumberKey(event);" type="text" value="{{isset($user->bank_account_number) ? $user->bank_account_number : ''}}" name="bank_account_number" id="bank_account_number">
                <input class="form-control" placeholder="Bank Name..." type="text" value="{{isset($user->bank_name) ? $user->bank_name : ''}}" name="bank_name" id="bank_name">
                <input class="form-control" placeholder="IFSC Code ..." type="text" value="{{isset($user->bank_ifsc_code) ? $user->bank_ifsc_code : ''}}" name="bank_ifsc_code" id="bank_ifsc_code" autocomplete="off">
                </div>


                <div class="form-group">
                <label>10. Name of the insolvency professional who will act as the Authorised representative of creditors of the class</label>
                <input class="form-control" type="text" name="insolvency_professional_name" id="insolvency_professional_name" value="{{isset($user->insolvency_professional_name) ? $user->insolvency_professional_name : ''}}" placeholder="Name Details..." autocomplete="off"> 
                <div class="error_cls" id="error_insolvency_professional_name"></div>
                </div>

                <div class="mt-5">
                <p>(Signature of financial creditor or person authorised to act on its behalf) <span class="required_cls">*</span><br>[Please enclose the authority if this is being submitted on behalf of the financial creditor]</p>  
                <input class="form-control" type="file" name="fc_signature" id="fc_signature" accept="image/*" onchange="loadFile2(event,'cl_signature', 'cl_signtre', 'fc_signature','error_fc_signature')" autocomplete="off">

                @if(isset($user->fc_signature) && $user->fc_signature != '')
                  <img class="profile-pic-user" id="cl_signtre" src="{{ asset('public/access/media/forms/formCa/documents/'.$user->unique_id.'/'.$user->fc_signature) }}" width="75" height="75" >
                @endif

                <img class="profile-pic-user" src="" id="cl_signature" width="75" height="75" style="display: none;" >

                <input type="hidden" name="fc_signature_val" id="fc_signature_val" value="{{isset($user->fc_signature) ? $user->fc_signature : ''}}" autocomplete="off">
                <div class="error_cls" id="error_fc_signature"></div>
                </div>

                <br>

               <div>Name in BLOCK LETTERS <span class="required_cls">*</span> <input class="form-control" name="creditor_name" id="creditor_name" type="text" placeholder="Enter name in BLOCK LETTERS..." value="{{!empty($user->signing_person_name) ? strtoupper($user->signing_person_name) : strtoupper($cat->name)}}" onKeyUp="Removefd('financialCreditorFormF','creditor_name');" autocomplete="off">
                  <div class="error_cls" id="error_creditor_name"></div>
                </div>
                <br>

                <div>Position with or in relation to creditor <span class="required_cls">*</span> <input class="form-control" value="{{isset($user->creditor_position) ? $user->creditor_position : ''}}" type="text" name="creditor_position" id="creditor_position" placeholder="Enter Details..." autocomplete="off" onKeyUp="Removefd('financialCreditorFormF','creditor_position');" >
                  <div class="error_cls" id="error_creditor_position"></div>
                </div>
                <br>
                <div>Address of person signing <span class="required_cls">*</span> <input class="form-control" type="text" name="creditor_address" id="creditor_address" value="{{isset($user->signing_address) ? $user->signing_address : ''}}" placeholder="Address..." autocomplete="off" onKeyUp="Removefd('financialCreditorFormF','creditor_address');" >
                  <div class="error_cls" id="error_creditor_address"></div>
                </div>
                <br>

                <h6>*PAN, passport, AADHAAR Card or the identity card issued by the Election Commission of India.</h6>
                
                <br><br>
                <button class="btn btn-primary" type="button" id="firstStep" onclick="validateData('financialCreditorFormCA','firstStep','tab1', 'tab2', check0, 'step1', 'step2', '/form/financial-creditor-form-ca','errMessage_1',updateFileData,'/form/get-formca-updated-fileData', '/form/get-formca-updated-table', '/get-formCA-signature', 'step2Sign')" >Next</button>

              <div id="errMessage_1">
              </div>

            </div>

             <!-- TAB ONE CLOSED -->

             <!-- TAB FOURTH STARTED -->
            <div class="tab" id="tab2">

                <div class="form-group">
                <label> LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</label><br><br>
                    
                <div id="fileField">
                  </div>
                  </div>

                <div class="form-group">
                <label>PAN number</label>
                <p><input class="form-control" type="file"  name="pan_number_file" autocomplete="off"></p></div> 

                <div class="form-group">
                <label>Passport</label>
                <p><input class="form-control" type="file"  name="passport_file" autocomplete="off"></p></div> 

                <div class="form-group">
                <label>AADHAR Card</label>
                <p><input class="form-control" type="file"  name="aadhar_card" autocomplete="off"></p></div> 

              <p>Add Other Important Documents</p>

              <table id="myTable1">
               
              </table>
              <br>   
              <div id="step2Sign" style="text-align: center;margin-top: 40px;"></div>
             <br> 
              <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab2','tab1','step2','step1');">Previous</button>
             <button class="btn btn-primary" type="button" id="thirdStep" onclick="validateData2('financialCreditorFormCA','thirdStep','tab2', 'tab3', check2, 'step2', 'step3', '/form/financial-creditor-form-ca-save', 'errMessage_3','/form/get-formca-updated-table');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '{{isset($edit) ? 'edit' : ''}}', '/get-formCA-signature', 'step3Sign');" >Next</button>

             <div id="errMessage_3">
              </div>

            </div>

            <div class="tab" id="tab3">
              <h2 class="text-center">DECLARATION</h2>

              <div id="declarationDiv"></div>
             <div id="step3Sign" style="text-align: center;margin-top: 40px;"></div>
             <br><br>
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab3','tab2','step3','step2');">Previous</button>
              
              <button class="btn btn-primary" type="button" id="secondStep" onclick="validateData('financialCreditorFormCA','firstStep','tab3', 'tab4', check0, 'step3', 'step4', '/form/financial-creditor-form-ca','errMessage_1',getPreview);updateTableData('financialCreditorFormCA','myTable1','/form/get-formca-updated-table');" >Next</button>
              
              <div id="errMessage_2">
              </div>
              
            </div>


             <!-- TAB FIFTH STARTED -->
            <div class="tab" id="tab4">
              <h2 class="text-center">FORM CA PREVIEW </h2>

              <div id="formCaPreview"></div>
              
              <br>

              <br><br>
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab4','tab3','step4','step3');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '{{isset($edit) ? 'edit' : ''}}');">Previous</button>
             <button class="btn btn-success" type="button" onclick="formSubmit('financialCreditorFormCA','financialCreditorFormCABtn','/form/financial-creditor-form-ca-submit')" id="financialCreditorFormCABtn">Submit</button>
             <br><br>
             <div id="errMessage_financialCreditorFormCA">
              
              </div>


           
             </div>  
              
           
             <!-- END FOUR TAB -->

       

            

              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px;">
                <span class="step" id="step1"></span>
                <span class="step" id="step2"></span>
                <span class="step" id="step3"></span>
                <span class="step" id="step4"></span>
             <!--    <span class="step" id="step5"></span> -->
               <!--  <span class="step"></span> -->
              </div>


          

        </form>
    </div>
  </div>
</div>



<script>


 function handleChange(check, id)
{
  //alert(id);
  //$("#"+id).toggle();
  let isChecked = $('#'+check)[0].checked;
  if (isChecked) 
  {
    $('#financialCreditorFormCA input[id="'+id+'"]').show(); 
    //$("#"+id).show();
  }
  else
  {
    $('#financialCreditorFormCA input[id="'+id+'"]').hide(); 
   //$("#"+id).hide(); 
  }
  //console.log(isChecked);
}
</script>



  <style>
    

/* Style the form */
#financialCreditorFormCA {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
  outline: 4px solid #ffffff;
  outline-offset: 11px;
}

/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #1861d6;
}


.back{
    width: 100%;
    height:auto;
  min-height:100vh;
    background-image:url({{$bgImage}});
    background-size: 100% 100%;
    background-position: top center;
  }


  .myDIV {
    min-width: 400px;
  }
  </style>


@section('nwJS')
<x-js :file="$authF" />
<x-js :file="$jsl" />
@endsection
@endsection