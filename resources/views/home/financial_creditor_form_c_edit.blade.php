@extends("home_layout/main")
@section('content')

<style type="text/css">
  .required_cls{
    color: red;
  }
  .error_cls{
    color: red;
  }
  #error_sign{
    color: red;
  }
</style>

@php 
$authF = url('/').'/'.Config::get('site.formC');
$bgImage = url('/').'/public/access/82c80ce2dd.jfif';
@endphp
 <div class="container-fluid back">
  <div class="row p-3">
    <div class="col m-3 p-3">



      <form class="mt-0 border border-info rounded form-body" id="financialCreditorForm">

       
        <input type="hidden" name="form_type" value="{{$user_type}}">
       <input type="hidden" name="ar" value="{{$ar}}">
       
       <input type="hidden" name="notify" id="notify" value="{{isset($notify->id) ? $notify->id : ''}}">
       <input type="hidden" name="form_c_selected_id" id="form_c_selected_id" value="{{isset($user->form_c_selected_id) ? $user->form_c_selected_id : ''}}">
       <input type="hidden" name="fid" id="fid" value="{{isset($user->id) ? $user->id : ''}}">
       <input type="hidden" name="fA" id="fA" value="{{isset($formA->id) ? $formA->id : ''}}">
       <input type="hidden" name="updated_data" id="updated_data" value="{{isset($edit) ? 'edit' : ''}}">
            <!-- One "tab" for each step in the form: -->
            <div class="tab" id="tab1">
        

               <h2 class="text-center">FORM C</h2>
              <center><h5 class="text-center text-uppercase" style="color: #e0363c;" >Submission Of Claim By Financial Creditors</h5></center>
              <h6 class="text-center">(Under Regulation 8 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations, 2016)</h6>
              <h4 style="float: right;"> @if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h4>

              <h4>From</h4>
               <p><span id="fc_name"> {{!empty($user->fc_name) ? $user->fc_name : $cat->name}} </span>
                <br>
                <span id="userAddress">
                 @if(isset($user->fc_address))
                  @if(!empty($user->fc_address))
                  {{ $user->fc_address }}
                  @endif
                @else
                  @if(!empty($cat->address))
                    {{$cat->address}}
                  @endif
                @endif   

                
              </span></p>

              
              <h4>To</h4>
              <p>The Interim Resolution Professional / Resolution Professional <br>{{$irp->username}} <br>{{$irp->address}}</p>


              
              <h4><b>Subject:</b>Submission of claim and proof of claim.</h4><br>


              <h4>Madam/Sir</h4>

              <p class="text-dark"> I <span id="signing_person_name">{{!empty($user->signing_person_name) ? $user->signing_person_name : $cat->name}}</span>, hereby submits this claim in respect of the corporate insolvency resolution process of [name of corporate debtor]. The details for the same are set out below:</p>






                <div class="form-group">
                <label>1. Name of financial creditor <span class="required_cls">*</span></label>
                <p><input class="form-control" name="fc_name" id="fc_name" type="text" value="{{!empty($user->fc_name) ? $user->fc_name : $cat->name}}" placeholder="Financial  Creditor Name..." autocomplete="off" onKeyUp="Removefd('financialCreditorForm','fc_name');getName('financialCreditorForm','fc_name', this.value)" ></p>
                <div class="error_cls" id="error_fc_name"></div>
                </div>

                
                <div class="form-group">
                <label>2. Identification number of financial creditor <br> <span class="text-secondary"> (If an incorporate body provide of incorporation. If a partnership or individual provide identification records* of all the partners or the individual) </span> </label>
                <input class="form-control" name="fc_identification_number" id="fc_identification_number" value="{{isset($user->fc_identification_number) ? $user->fc_identification_number : ''}}" type="text" placeholder="Identification  number..." >
                </div>
               
                
                <div class="form-group">
                <label>3.</label><br>
                <label class="mr-1"> &nbsp; &nbsp; &nbsp;a. Address of financial creditor for correspondence </label>
                <p><input class="form-control" name="fc_address" id="fc_address" onKeyUp="Removefd('financialCreditorForm','fc_address');getAddress('financialCreditorForm','fc_address', this.value)" value="{{isset($user->fc_address) ? $user->fc_address : ''}}" type="text" placeholder="Address..." autocomplete="off"></p>
                <div class="error_cls" id="error_fc_address"></div>
              </div>
               

                <div class="form-group">
                <label>&nbsp; &nbsp; &nbsp; b. Email Address <span class="required_cls">*</span></label>
                <p><input class="form-control" type="text" name="fc_email" id="fc_email" onKeyUp="Removefd('financialCreditorForm','fc_email');" value="{{isset($user->fc_email) ? $user->fc_email : ''}}" placeholder="Email ..."></p>
                <div class="error_cls" id="error_fc_email"></div>
              </div>


                <div class="form-group">
                <label>
                  4. Details of claim, if it is made against corporate debtor as principal borrower: </label>
                 <ol>
                 <li style="list-style-type:none">(i) Amount of claim <input class="form-control"  name="borrower_claim_amount" id="borrower_claim_amount" type="text" value="{{isset($user->borrower_claim_amount) ? $user->borrower_claim_amount : ''}}" onKeyUp="Removefd('financialCreditorForm','borrower_claim_amount');" onchange="checkAmount('financialCreditorForm','borrower_claim_amount');" placeholder="Claim Amount ..." >
                  <div class="error_cls" id="error_borrower_claim_amount"></div>
                 </li>

                 <li style="list-style-type:none">(ii) Amount of claim covered by security interest, if any<br> (Please provide details of security interest, the value of the security, and the date it was given) <input class="form-control" name="borrower_security_interest_amount" id="borrower_security_interest_amount" type="text" placeholder="Enter Details ..." value="{{isset($user->borrower_security_interest_amount) ? $user->borrower_security_interest_amount : ''}}"></li>

                 <li style="list-style-type:none">(iii) Amount of claim covered by guarantee, if any <br> (Please provide details of guarantee held, the value of the guarantee, and the date it was given)
                 <input class="form-control" type="text" name="borrower_guarantee_amt" id="borrower_guarantee_amt" value="{{isset($user->borrower_guarantee_amt) ? $user->borrower_guarantee_amt : ''}}" placeholder="Enter Details ..." ></li>

                 <li style="list-style-type:none">(iv) Name of the guarantor(s) <input class="form-control" type="text" name="borrower_guarantor_name" id="borrower_guarantor_name" value="{{isset($user->borrower_guarantor_name) ? $user->borrower_guarantor_name : ''}}" placeholder="Enter Name ..." ></li>

                 <li style="list-style-type:none">(v)  Address of the guarantor(s) <textarea   style="width:100%;" placeholder="Enter Address ..." name="borrower_guarantor_address" id="borrower_guarantor_address">{{isset($user->borrower_guarantor_address) ? $user->borrower_guarantor_address : ''}}</textarea></li>
                 </ol>
                
               
                </div>

                
                <div class="form-group">
                <label>5. Details of claim, if it is made against corporate debtor as guarantor: </label>
                <ol>
                <li style="list-style-type:none">(i) Amount of claim <input class="form-control" value="{{isset($user->guarantor_claim_amount) ? $user->guarantor_claim_amount : ''}}" name="guarantor_claim_amount" id="guarantor_claim_amount" type="text" placeholder="Enter Claim Amount ..." onKeyUp="Removefd('financialCreditorForm','guarantor_claim_amount');" onchange="checkAmount('financialCreditorForm','guarantor_claim_amount');" >
                  <div class="error_cls" id="error_guarantor_claim_amount"></div>
                 </li>

                <li style="list-style-type:none">(ii) Amount of claim covered by security interest, if any <br> (Please provide details of security interest, the value of the security, and the date it was given) <input class="form-control" value="{{isset($user->guarantor_security_interest_amount) ? $user->guarantor_security_interest_amount : ''}}" type="text" name="guarantor_security_interest_amount" id="guarantor_security_interest_amount" placeholder="Enter Details ..." ></li>

                <li style="list-style-type:none">(iii) Amount of claim covered by guarantee, if any <br> (Please provide details of guarantee held, the value of the guarantee, and the date it was given)<input class="form-control" type="text" value="{{isset($user->guarantor_gaurantee_amt) ? $user->guarantor_gaurantee_amt : ''}}" name="guarantor_gaurantee_amt" id="guarantor_gaurantee_amt" placeholder="Enter Details ..." ></li>

                <li style="list-style-type:none">(iv) Name of the principal borrower <input class="form-control" value="{{isset($user->guarantor_principal_borrower) ? $user->guarantor_principal_borrower : ''}}" name="guarantor_principal_borrower" id="guarantor_principal_borrower" type="text" placeholder="Enter Name ..." ></li>

                <li style="list-style-type:none">(v) Address of the principal borrower <textarea  name="guarantor_address_borrower" id="guarantor_address_borrower" style="width:100%;" placeholder="Enter Details ..." >{{isset($user->guarantor_address_borrower) ? $user->guarantor_address_borrower : ''}}</textarea></li>

                </ol>
                 
                </div>


                <div class="form-group">
                <label>6. Details of claim, if it is made in respect of financial debt covered under clauses (h) and (i) of sub-section (8) of section 5 of the Code, extended by the creditor:  </label>

                <ol>
                <li style="list-style-type:none">(i) Amount of claim <input class="form-control" value="{{isset($user->financial_claim_amt) ? $user->financial_claim_amt : ''}}" name="financial_claim_amt" id="financial_claim_amt" type="text" placeholder="Enter Amount ..." 
                onKeyUp="Removefd('financialCreditorForm','financial_claim_amt');" onchange="checkAmount('financialCreditorForm','financial_claim_amt');"> 
                <div class="error_cls" id="error_financial_claim_amt"></div> </li>

                <li style="list-style-type:none">(ii) Name of the beneficiary <input class="form-control" type="text" value="{{isset($user->financial_beneficiary_name) ? $user->financial_beneficiary_name : ''}}" name="financial_beneficiary_name" id="financial_beneficiary_name" placeholder="Enter Beneficiary Name ..." > </li>

                <li style="list-style-type:none">(ii) Address of the beneficiary <textarea   style="width:100%;" name="financial_beneficiary_address" id="financial_beneficiary_address" placeholder="Enter Beneficiary Address ..." >{{isset($user->financial_beneficiary_address) ? $user->financial_beneficiary_address : ''}}</textarea> </li>

              
                </ol>
                
                </div>


                <div class="form-group">
                <label>7. Details of how and when debt incurred</label>
                <p>
                  <textarea style="width:100%;" name="debt_incurred_details" id="debt_incurred_details">{{isset($user->debt_incurred_details) ? $user->debt_incurred_details : ''}}</textarea>
                  </p>
                </div>

                <div class="form-group">
                <label>8. Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim</label>
                <p>
                  <textarea style="width:100%;" name="other_mutual_details" id="other_mutual_details" >{{isset($user->other_mutual_details) ? $user->other_mutual_details : ''}}</textarea>
                  </p>
                </div>

                <div class="form-group">
                <label>9. Details of the bank account to which the amount of the claim or any part thereof can be transferred pursuant to a resolution plan</label>
                <p><textarea   style="width:100%;" name="bank_account_details" id="bank_account_details" placeholder="Enter Details..." >{{isset($user->bank_account_details) ? $user->bank_account_details : ''}}</textarea></p>
                </div>

                
                <div class="mt-5">
                <!-- <img src=""> -->
                <p>(Signature of financial creditor or person authorised to act on its behalf) <span class="required_cls">*</span><br>[Please enclose the authority if this is being submitted on behalf of the financial creditor]</p>
                <input class="form-control" type="file" name="operational_creditor_signature" id="operational_creditor_signature" placeholder="ENTER DETAILS ..." accept="image/*" onchange="loadFile2(event, 'cl_signature', 'cl_signtre', 'operational_creditor_signature', 'error_operational_creditor_signature')">

                @if(isset($user->operational_creditor_signature) && $user->operational_creditor_signature != '')
                  <img class="profile-pic-user" id="cl_signtre" src="{{ asset('public/access/media/forms/formC/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
                @endif

                <img class="profile-pic-user" src="" id="cl_signature" width="75" height="75" style="display: none;" >
                
                <input type="hidden" name="operational_creditor_signature_val" id="operational_creditor_signature_val" value="{{isset($user->operational_creditor_signature) ? $user->operational_creditor_signature : ''}}" autocomplete="off">
                <div class="error_cls" id="error_operational_creditor_signature"></div>

                <br>

                <p>Name in BLOCK LETTERS <span class="required_cls">*</span> <input class="form-control" value="{{!empty($user->signing_person_name) ? strtoupper($user->signing_person_name) : strtoupper($cat->name)}}" id="signing_person_name" name="signing_person_name" type="text" placeholder="Enter name in BLOCK LETTERS..." onKeyUp="Removefd('financialCreditorForm','signing_person_name');getName('financialCreditorForm','signing_person_name', this.value);" autocomplete="off" >
                  <div class="error_cls" id="error_signing_person_name"></div>
                </p>

                <p>Position with or in relation to creditor <input class="form-control" value="{{isset($user->creditor_position) ? $user->creditor_position : ''}}" name="creditor_position" id="creditor_position" type="text" placeholder="Enter Details..." autocomplete="off" >
                  <div class="error_cls" id="error_creditor_position"></div>
                </p>

                <p>Address of person signing  <input class="form-control" value="{{isset($user->signing_address) ? $user->signing_address : ''}}" name="signing_address" id="signing_address" type="text" placeholder="Enter Address..." autocomplete="off" >
                  <div class="error_cls" id="error_signing_address"></div>
                </p>

                <h6>*PAN, passport, AADHAAR Card or the identity card issued by the Election Commission of India.</h6>
                </div>

                <br><br>
                <button class="btn btn-primary" type="button" id="firstStep" onclick="validateData('financialCreditorForm','firstStep','tab1', 'tab2', check0, 'step1', 'step2', '/form/financial-creditor-form-c','errMessage_1', updateFileData, '/form/get-formc-updated-fileData', '/form/get-formc-updated-table', '/get-formC-signature', 'step2Sign')" >Next</button>

              <div id="errMessage_1">
              </div>

            </div>

             <!-- TAB ONE CLOSED -->

             <!-- TAB FOURTH STARTED -->
            <div class="tab" id="tab2">

                <div class="form-group">
                <label> LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE financial creditor</label><br><br>
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

              <br><br><br>
              <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab2','tab1','step2','step1');">Previous</button>

             <button class="btn btn-primary" type="button" id="thirdStep" onclick="validateData2('financialCreditorForm','thirdStep', 'tab2', 'tab3', check2, 'step2', 'step3', '/form/financial-creditor-form-c-save', 'errMessage_3','/form/get-formc-updated-table');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '{{isset($edit) ? 'edit' : ''}}', '/get-formC-signature', 'step3Sign');" >Next</button>

             <div id="errMessage_3">
              </div>

            </div>

             <div class="tab" id="tab3">
              <h2 class="text-center">DECLARATION</h2>
              <div id="declarationDiv"></div>
              <div id="step3Sign" style="text-align: center;margin-top: 40px;"></div>

              <br><br>
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab3','tab2','step3','step2');">Previous</button>
              
              <button class="btn btn-primary" type="button" id="secondStep" onclick="validateData('financialCreditorForm','firstStep','tab3', 'tab4', decl, 'step3', 'step4', '/form/financial-creditor-form-c','errMessage_2', getPreview);updateTableData('financialCreditorForm','myTable1','/form/get-formc-updated-table');" >Next</button>

              <div id="errMessage_2">
              </div>
              
            </div>


             <!-- TAB FIFTH STARTED -->
            <div class="tab" id="tab4">
              <h2 class="text-center">FORM C <br> PREVIEW </h2>

              <div id="formBPreview"></div>



            
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab4','tab3','step4','step3');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '{{isset($edit) ? 'edit' : ''}}', '/get-formC-signature', 'step3Sign');">Previous</button>
             <button class="btn btn-success" type="button" onclick="formSubmit('financialCreditorForm','financialCreditorFormBtn','/form/financial-creditor-form-c-submit')" id="financialCreditorFormBtn">Submit</button>
             <br><br>
             <div id="errMessage_financialCreditorForm">
              
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

</body>
</html>


<script>


 function handleChange(check, id)
{
  //alert(id);
  //$("#"+id).toggle();
  let isChecked = $('#'+check)[0].checked;
  if (isChecked) 
  {
    $('#financialCreditorForm input[id="'+id+'"]').show(); 
    //$("#"+id).show();
  }
  else
  {
    $('#financialCreditorForm input[id="'+id+'"]').hide(); 
   //$("#"+id).hide(); 
  }
  //console.log(isChecked);
}
</script>




  <style>
    

/* Style the form */
#financialCreditorForm {
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