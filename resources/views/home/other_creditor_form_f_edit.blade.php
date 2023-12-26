@extends("home_layout/main")
@section('content')
<style type="text/css">
  .form-control{
    height: 35px;
  }
  .required_cls{
    color: red;
  }
  .error_cls{
    color: red;
  }
</style>
@php 
$authF = url('/').'/'.Config::get('site.formF');
$bgImage = url('/').'/public/access/82c80ce2dd.jfif';
@endphp
 <div class="container-fluid back">
  <div class="row p-3">
    <div class="col m-3 p-3">



      <form class="mt-0 border border-info rounded form-body" id="financialCreditorFormF">

       
        <input type="hidden" name="form_type" value="{{$user_type}}">
       <input type="hidden" name="ar" value="{{$ar}}">
       
       <input type="hidden" name="notify" id="notify" value="{{isset($notify->id) ? $notify->id : ''}}">
       <input type="hidden" name="form_f_selected_id" id="form_f_selected_id" value="{{isset($user->form_f_selected_id) ? $user->form_f_selected_id : ''}}">
       <input type="hidden" name="fid" id="fid" value="{{isset($user->id) ? $user->id : ''}}">   
       <input type="hidden" name="fA" id="fA" value="{{isset($formA->id) ? $formA->id : ''}}">
       <input type="hidden" name="updated_data" id="updated_data" value="{{isset($edit) ? 'edit' : ''}}">
            <!-- One "tab" for each step in the form: -->
            <div class="tab" id="tab1">
        

               <h2 class="text-center">FORM F</h2>
              <center><h5 class="text-center  mb-3" style="color: #e0363c;" >PROOF OF CLAIM BY CREDITORS (OTHER THAN FINANCIAL CREDITORS AND OPERATIONAL CREDITORS)</h5></center><br>
              <h5 class="mb-3">[Under Regulation 9A of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations, 2016]</h5>
              <h4 style="float: right;">@if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h4>

               <h4>From</h4>

              <p><span id="creditor_name">{{isset($user->fc_name) ? $user->fc_name : ''}}</span>
                <br><span id="userAddress">
                {{isset($user->fc_address) ? $user->fc_address : ''}}</span> </p>


              <h4>To</h4>
              <p>The Interim Resolution Professional / Resolution Professional <br>{{$irp->username}} <br>{{$irp->address}}</p>


             

              <h4><b>Subject:</b>Submission of proof of claim.</h4><br>


              <h4>Madam/Sir</h4>

              <p class="text-dark">I <span id="creditor_name">{{!empty($user->fc_name) ? $user->fc_name : ''}}</span>, hereby submits this claim in respect of the corporate insolvency resolution process of {{isset($comp->name) ? ucwords($comp->name) : ''}}. The details for the same are set out below:</p>






                <div class="form-group">
                <label>1. Name of the creditor <span class="required_cls">*</span></label>
                <input class="form-control" type="text" id="fc_name" name="fc_name" value="{{!empty($user->fc_name) ? $user->fc_name : ''}}" placeholder="Financial  Creditor Name..." autocomplete="off" onKeyUp="Removefd('financialCreditorFormF','fc_name');getName('financialCreditorFormF','fc_name', this.value)">
                <div class="error_cls" id="error_fc_name"></div>
                </div>

                
                <div class="form-group">
                <label>2. Identification number of the creditor <br> (If an incorporate body, provide of incorporation. If a partnership or individual provide identification records* of all the partners or the individual) </label>
                <input class="form-control" type="text" id="fc_identification_number" name="fc_identification_number" value="{{isset($user->fc_identification_number) ? $user->fc_identification_number : ''}}" placeholder="Identification  number...">
                <div class="error_cls" id="error_fc_identification_number"></div>
                </div>
               
                
                <div class="form-group">
                <label>3.</label><br>
                <label class="mr-1"> &nbsp; &nbsp; &nbsp;a. Address of  Creditor for correspondence. </label>
                <input class="form-control" type="text" name="fc_address" id="fc_address" value="{{isset($user->fc_address) ? $user->fc_address : ''}}" placeholder="Address..." onKeyUp="Removefd('financialCreditorFormF','fc_address');getAddress('financialCreditorFormF', this.value);">
                <div class="error_cls" id="error_fc_address"></div>
                </div>

                <div class="form-group">
                <label>&nbsp; &nbsp; &nbsp; b. Email Address <span class="required_cls">*</span></label>
                <input class="form-control" type="email" name="fc_email" id="fc_email" value="{{isset($user->fc_email) ? $user->fc_email : ''}}" placeholder="Email ..." onKeyUp="Removefd('financialCreditorFormF','fc_email');" autocomplete="off" >
                <div class="error_cls" id="error_fc_email"></div>
               
                </div>

                <div class="form-group">
                <label>4. Description of the claim (Including the amount of the claim as at the insolvency commencement date) </label><br>
               
               <input style="width:20%;float: left;" type="text" name="claim_amt" id="claim_amt" value="{{isset($user->claim_amt) ? $user->claim_amt : ''}}" placeholder="Enter Amount" onKeyUp="Removefd('financialCreditorFormF','claim_amt');" onchange="checkAmount('financialCreditorFormF','claim_amt');" >
                
                <textarea style="width:80%;" name="claim_amt_desc" id="claim_amt_desc" placeholder="Enter Details..." >{{isset($user->claim_amt_desc) ? $user->claim_amt_desc : ''}}</textarea>
                
                <div class="error_cls" id="error_claim_amt"></div>
                </div>

                
                <div class="form-group">
                <label>5. Details of documents by reference to which claim can be substantiated </label>
                <textarea style="width:100%;" name="document_details" id="document_details">{{isset($user->document_details) ? $user->document_details : ''}}</textarea>
                <div class="error_cls" id="error_document_details"></div>
                </div>


                <div class="form-group">
                <label>6. Details of how and when the claim arose</label>
                <textarea style="width:100%;" name="claim_details" id="claim_details">{{isset($user->claim_details) ? $user->claim_details : ''}}</textarea>
                <div class="error_cls" id="error_claim_details"></div>
                </div>

                <div class="form-group">
                <label>7. Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim</label>
                <textarea style="width:100%;" name="other_mutual_details" id="other_mutual_details">{{isset($user->other_mutual_details) ? $user->other_mutual_details : ''}}</textarea>
                <div class="error_cls" id="error_other_mutual_details"></div>
                </div>


                <div class="form-group">
                <label>8. DETAILS OF: <br> a. any security held, the value of security and its date, or <br> b. any relation of the title arrangement in respect of goods or properties to which the claim refers </label>
                <input class="form-control" type="text" name="security_held" id="security_held" value="{{isset($user->security_held) ? $user->security_held : ''}}" placeholder="Details example...">
                <div class="error_cls" id="error_security_held"></div>
              </div>


                <div class="form-group">
                <label>9. Details of the bank account to which the amount of the claim or any part thereof can be transferred pursuant to a resolution plan </label>
                <input class="form-control" placeholder="Account number ..." type="text" value="{{isset($user->bank_account_number) ? $user->bank_account_number : ''}}" name="bank_account_number" id="bank_account_number" onkeypress="return isNumberKey(event);">
                <input class="form-control" placeholder="Bank Name..." type="text" value="{{isset($user->bank_name) ? $user->bank_name : ''}}" name="bank_name" id="bank_name">
                <input class="form-control" placeholder="IFSC Code ..." type="text" value="{{isset($user->bank_ifsc_code) ? $user->bank_ifsc_code : ''}}" name="bank_ifsc_code" id="bank_ifsc_code">
                </div>


                <div class="mt-5">
                <p>(Signature of financial creditor or person authorised to act on its behalf) <span class="required_cls">*</span><br>[Please enclose the authority if this is being submitted on behalf of the financial creditor]</p>  
                <input class="form-control" type="file" name="fc_signature" id="fc_signature" accept="image/*" onchange="loadFile2(event,'cl_signature', 'cl_signtre', 'fc_signature','error_fc_signature')" autocomplete="off">
               
                @if(isset($user->fc_signature) && $user->fc_signature != '')
                  <img class="profile-pic-user" id="cl_signtre" src="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->fc_signature) }}" width="75" height="75" >
                @endif

                <img class="profile-pic-user" src="" id="cl_signature" width="75" height="75" style="display: none;" >
                

                <input type="hidden" name="fc_signature_val" id="fc_signature_val" value="{{isset($user->fc_signature) ? $user->fc_signature : ''}}" autocomplete="off">
                <div class="error_cls" id="error_fc_signature"></div>
                </div>
                
                <br>
                <div>Name in BLOCK LETTERS <span class="required_cls">*</span> <input class="form-control" name="creditor_name" id="creditor_name" type="text" placeholder="Enter name in BLOCK LETTERS..." value="{{!empty($user->signing_person_name) ? strtoupper($user->signing_person_name) : ''}}" onKeyUp="Removefd('financialCreditorFormF','creditor_name');" autocomplete="off">
                  <div class="error_cls" id="error_creditor_name"></div>
                </div>
                <br>

                <div>Position with or in relation to creditor  <input class="form-control" value="{{isset($user->creditor_position) ? $user->creditor_position : ''}}" type="text" name="creditor_position" id="creditor_position" placeholder="Enter Details..." autocomplete="off" onKeyUp="Removefd('financialCreditorFormF','creditor_position');" >
                  <div class="error_cls" id="error_creditor_position"></div>
                </div>
                <br>
                <div>Address of person signing  <input class="form-control" type="text" name="creditor_address" id="creditor_address" value="{{isset($user->signing_address) ? $user->signing_address : ''}}" placeholder="Address..." autocomplete="off" onKeyUp="Removefd('financialCreditorFormF','creditor_address');" >
                  <div class="error_cls" id="error_creditor_address"></div>
                </div>
                <br>


                <h6>*PAN, passport, AADHAAR Card or the identity card issued by the Election Commission of India.</h6>
                

                <br><br>
                <button class="btn btn-primary" type="button" id="firstStep" onclick="validateData('financialCreditorFormF','firstStep','tab1', 'tab2', check0, 'step1', 'step2', '/form/financial-creditor-form-f','errMessage_1', updateFileData,'/form/get-formf-updated-fileData', '/form/get-formf-updated-table', '/get-formF-signature', 'step2Sign');" >Next</button>

              <div id="errMessage_1">
              </div>

        </div>
             <!-- TAB ONE CLOSED -->

             <!-- TAB FOURTH STARTED -->
            <div class="tab" id="tab2">

                <div class="form-group">
                <label>10. LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</label><br><br>
                      
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


              <p id="otherDocP">Add Other Important Documents</p>

              <table id="myTable1">
               
              </table>
              <br>   
              <div id="step2Sign" style="text-align: center;margin-top: 40px;"></div>
              <br><br><br>
              <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab2','tab1','step2','step1');">Previous</button>
             <button class="btn btn-primary" type="button" id="thirdStep" onclick="validateData2('financialCreditorFormF','thirdStep','tab2', 'tab3', check2, 'step2', 'step3', '/form/financial-creditor-form-f-save', 'errMessage_3','/form/get-formf-updated-table');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '{{isset($edit) ? 'edit' : ''}}', '/get-formF-signature', 'step3Sign');" >Next</button>

             <div id="errMessage_3">
              </div>
            </div>

               <div class="tab" id="tab3">
              <h1 class="text-center">DECLARATION</h1><br><br>
              <div id="declarationDiv"></div>
             <div id="step3Sign" style="text-align: center;margin-top: 40px;"></div>

             <br><br>
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab3','tab2','step3','step2');">Previous</button>
              <button class="btn btn-primary" type="button" id="secondStep" onclick="validateData('financialCreditorFormF','firstStep','tab3', 'tab4', check0, 'step3', 'step4', '/form/financial-creditor-form-f','errMessage_1',getPreview);updateTableData('financialCreditorFormF','myTable1','/form/get-formf-updated-table');" >Next</button>

              <div id="errMessage_2">
              </div>
              
            </div>


             <!-- TAB FIFTH STARTED -->
            <div class="tab" id="tab4">
              <h3 class="text-center">FORM F PREVIEW </h3>

              <div id="formFPreview"></div>

             <br><br>
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab4','tab3','step4','step3');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '{{isset($edit) ? 'edit' : ''}}', '/get-formF-signature', 'step3Sign');">Previous</button>
             <button class="btn btn-success" type="button" onclick="formSubmit('financialCreditorFormF','financialCreditorFormFBtn','/form/financial-creditor-form-f-submit')" id="financialCreditorFormFBtn">Submit</button>
             <br><br>
             <div id="errMessage_financialCreditorFormF">
              
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


  <style>
    

/* Style the form */
#financialCreditorFormF {
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