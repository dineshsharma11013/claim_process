@extends("home_layout/main")
@section('content')

@php 
$authF = url('/').'/'.Config::get('site.formD');
$bgImage = url('/').'/public/access/82c80ce2dd.jfif';
@endphp
 <div class="container-fluid back">
  <div class="row p-3">
    <div class="col m-3 p-3">



      <form class="mt-0 border border-info rounded form-body" id="financialCreditorFormD">

              
             <input type="hidden" name="form_type" value="{{$user_type}}">
             <input type="hidden" name="ar" value="{{$ar}}">
             <input type="hidden" name="notify" id="notify" value="{{isset($notify->id) ? $notify->id : ''}}">
            
            <input type="hidden" name="fid" id="fid" value="{{isset($user->id) ? $user->id : ''}}">
            <input type="hidden" name="form_d_selected_id" id="form_d_selected_id" value="{{isset($user->form_d_selected_id) ? $user->form_d_selected_id : ''}}">
            <input type="hidden" name="fA" id="fA" value="{{isset($formA->id) ? $formA->id : ''}}">
              <input type="hidden" name="updated_data" id="updated_data" value="{{isset($edit) ? 'edit' : ''}}">

             <div class="tab" id="tab1">

               <h2 class="text-center">FORM D </h2>
              <center><h5 class="text-center" style="color: #e0363c;" >PROOF OF CLAIM BY A WORKMAN OR AN EMPLOYEE </h5></center><br>
              <h6 class="text-center">(Under Regulation 9 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations, 2016)</h6>
              <h4 style="float: right;">@if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h4>

              

              <h4>From</h4>

              <p><span id="name"> {{isset($user->name) ? $user->name : ''}} </span>
                <br> <span id="userAddress">
               {{(isset($user->address) ? $user->address : '')}} </p>

                <h4>To</h4>
              <p>The Interim Resolution Professional / Resolution Professional <br>{{$irp->username}} <br>{{$irp->address}}</p>

              <h4><b>Subject:</b>Submission of proof of claim.</h4><br>


              <h4>Madam/Sir</h4>

              <p class="text-dark">I <span id="name">{{isset($user->name) ? $user->name : ''}}</span>, hereby submits this claim in respect of the corporate insolvency resolution process of {{isset($comp->name) ? ucwords($comp->name) : ''}}. The details for the same are set out below:</p>


                <div class="form-group">
                <label>1. Name of WORKMAN / EMPLOYEE </label> <span style="color:red">*</span>
                <br><span id="alert_name" style="color:red"></span>
                <p><input class="form-control" id="name" name="name" type="text" value="{{isset($user->name) ? $user->name : ''}}" placeholder="Workman / Employee Name..." autocomplete="off" onKeyUp="Removefd('financialCreditorFormD','name');getName('financialCreditorFormD','name', this.value)"></p>
                <div class="error_cls" id="error_name"></div>
                </div>

                <input type="hidden" id="user_id" value="{{$cat->id}}">

                <div class="form-group">
                <label>2.<br> Pan card number, passport, the identity card issued by the election comission of the india or aadhar card of workman / employee </label> 
                
                <br><span id="alert_pancard" style="color:red"></span>

                <input class="form-control" id="pancard"  value="{{(isset($user->pancard_no) ? $user->pancard_no : '')}}" type="text" name="pancard" placeholder="Pan Card number ..." >
                <span id="alert_passport" style="color:red"></span>
                <input class="form-control" id="passport"  value="{{(isset($user->passport_no) ? $user->passport_no : '')}}" name="passport" type="text" placeholder="Passport number ..." >
                <span id="alert_voter_id" style="color:red"></span>
                <input class="form-control" id="voter_id"  value="{{(isset($user->voter_id_no) ? $user->voter_id_no : '')}}" name="voter_id" type="numbers" placeholder="Voter Id card number ..." >
                <span id="alert_aadhar" style="color:red"></span>
                <input class="form-control" name="aadhar" id="aadhar"  value="{{(isset($user->aadhar_no) ? $user->aadhar_no : '')}}" type="numbers" placeholder="Aadhar card number ..." >
              </div>

                
                <div class="form-group">
                <label>3.</label><br>
                <label class="mr-1"> &nbsp; &nbsp; &nbsp;a. Address of Workman / Employee creditor for correspondence </label> 
                <br><span id="alert_address" style="color:red"></span>
                <p><input class="form-control"  id="address" value="{{(isset($user->address) ? $user->address : $cat->address)}}" name="address" type="text" placeholder="Address..." onKeyUp="Removefd('financialCreditorFormD','address');getAddress('financialCreditorFormD','address', this.value)" autocomplete="off"></p>
                <div class="error_cls" id="error_address"></div>
              </div>
               

                <div class="form-group">
                <label>&nbsp; &nbsp; &nbsp; b. Email Address</label> <span style="color:red">*</span>
                <br><span id="alert_email" style="color:red"></span>
                <p><input name="email" id="email" value="{{(isset($user->email) ? $user->email : $cat->email)}}" class="form-control" type="email" placeholder="Email ..." ></p></div>
                <div class="error_cls" id="error_email"></div>

                <div class="form-group">
                <label>4.TOTAL AMOUNT OF CLAIM <br> <span class="text-secondary"> ( INCLUDING ANY INTEREST AS AT THE INSOLVENCY COMMENTMENT DATE ) </span> </label> 
                
                <br><span id="alert_principle" style="color:red"></span>
               <input class="form-control" id="principle" value="{{(isset($user->principle) ? $user->principle : '')}}" name="principle" type="numbers" placeholder="Principle ..." onkeypress="return isNumberKey(event);" onKeyUp="Removefd('financialCreditorFormD','principle');getTotal('principle','interest','total_amount');" autocomplete="off">
               <div class="error_cls" id="error_principle"></div>
               
               <br>
                <input class="form-control" id="interest"  value="{{(isset($user->intrest) ? $user->intrest : '')}}" name="interest" type="numbers" placeholder="Interest ..." onkeypress="return isNumberKey(event);" onKeyUp="Removefd('financialCreditorFormD','interest');getTotal('principle','interest','total_amount');" autocomplete="off">
              </div>
                <div class="error_cls" id="error_interest"></div>

                <input class="form-control" id="total_amount" value="{{(isset($user->total_amount) ? $user->total_amount : '')}}" name="total_amount" type="numbers" placeholder="Total Amount ..." autocomplete="off">
                <div class="error_cls" id="error_total_amount"></div>

                <br>
                <div class="form-group">
                <label>5. Details of documents by reference to which the claim can be substained. </label> 
                <br><span id="alert_details_of_documents" style="color:red"></span>
                <p><input class="form-control" id="details_of_documents" value="{{(isset($user->details_of_documents) ? $user->details_of_documents : '')}}"  name="details_of_documents" type="text" placeholder="Details of documents..." ></p>
                </div>

                <div class="form-group">
                <label>6. Details of any dispute as well as the record of pendency or order of suit or arbitration proceedings </label> 
                <br><span id="alert_dispute" style="color:red"></span>
                <p><input class="form-control"  id="dispute" name="dispute" value="{{(isset($user->dispute_details) ? $user->dispute_details : '')}}" type="text" placeholder="Enter Details..." ></p>
                </div>

                <div class="form-group">
                <label>7. Details of how and when claim arose </label> 
                <br><span id="alert_claim" style="color:red"></span>
                <p><input class="form-control"  id="claim_arose"  name="claim"  value="{{(isset($user->claim_arose_details) ? $user->claim_arose_details : '')}}"  type="text" placeholder="Enter Details..." ></p>
                </div>

                <div class="form-group">
                <label>8. Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim </label> 
                <br><span id="alert_mutual_credit" style="color:red"></span>
                <p><textarea name="mutual_credit" id="mutual_credit" style="width:100%;" placeholder="Enter Details..." >{{(isset($user->mutual_credit_details) ? $user->mutual_credit_details : '')}}</textarea></p>
                </div>


                <div class="form-group">
                <label>9. Details of the bank account to which the amount of the claim or any part thereof can be transferred pursuant to a resolution plan </label> 
                <br><span id="alert_account_number" style="color:red"></span>
                <input class="form-control" value="{{(isset($user->account_no) ? $user->account_no : '')}}" name="account_number" id="account_number" placeholder="Account number ..." >

                <br><span id="alert_bank_name" style="color:red"></span>
                <input class="form-control" id="bank_name" name="bank_name"  value="{{(isset($user->bank_name) ? $user->bank_name : '')}}" placeholder="Bank Name..." >

                <br><span id="alert_ifsc" style="color:red"></span>
                <input class="form-control" id="ifsc"  name="ifsc"  value="{{(isset($user->ifsc_code) ? $user->ifsc_code : '')}}" placeholder="IFSC Code ..." ></div>



                
                <div class="mt-5">
                <p>(Signature of workman / employee or person authorised to act on its behalf) <span class="required_cls">*</span><br> 
                [Please enclose the authority if this is being submitted on behalf of the operational creditor]</p>

                <input class="form-control" type="file" name="operational_creditor_signature" id="operational_creditor_signature" placeholder="ENTER DETAILS ..." accept="image/*" onchange="loadFile2(event,'cl_signature', 'cl_signtre', 'operational_creditor_signature','error_operational_creditor_signature')">

                @if(isset($user->operational_creditor_signature) && $user->operational_creditor_signature != '')
                  <img class="profile-pic-user" id="cl_signtre" src="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
                @endif

                <img class="profile-pic-user" src="" id="cl_signature" width="75" height="75" style="display: none;" >

                <input type="hidden" name="operational_creditor_signature_val" id="operational_creditor_signature_val" value="{{isset($user->operational_creditor_signature) ? $user->operational_creditor_signature : ''}}">
                <div class="error_cls" id="error_operational_creditor_signature"></div>
              </div>
                <br>

                <div>
                Name in BLOCK LETTERS <span class="required_cls">*</span>
                <input name="name_block_letter" id="name_block_letter" value="{{isset($user->name_in_block_letter) ? strtoupper($user->name_in_block_letter) : strtoupper($cat->name)}}" class="form-control" type="text" onKeyUp="Removefd('financialCreditorFormD','name_block_letter');" placeholder="Enter name in BLOCK LETTERS..." autocomplete="off">
                <div class="error_cls" id="error_name_block_letter"></div>
                </div>
                <br>

                <div>Position with or in relation to creditor <span class="required_cls">*</span>
                <input value="{{(isset($user->relation_to_creditor) ? $user->relation_to_creditor : '')}}" id="relation_to_creditor" name="relation_to_creditor" class="form-control" type="text" placeholder="Enter Details..." autocomplete="off" onKeyUp="Removefd('financialCreditorFormD','relation_to_creditor');" >
                <div class="error_cls" id="error_relation_to_creditor"></div>
                </div>
                <br>
                <div>Address of person signing <span class="required_cls">*</span>
                <input value="{{(isset($user->address_person_signing) ? $user->address_person_signing : $cat->address)}}" id="address_person_signing" name="address_person_signing" id="address_person_signing" class="form-control" onKeyUp="Removefd('financialCreditorFormD','address_person_signing');" type="text" placeholder="Enter Details..." autocomplete="off" >
                <div class="error_cls" id="error_address_person_signing"></div>
                </div>

                
                <br><br>
                <button class="btn btn-primary" type="button" id="firstStep" onclick="validateData('financialCreditorFormD','firstStep','tab1', 'tab2', check0, 'step1', 'step2', '/form/financial-creditor-form-d','errMessage_1',updateFileData,'/form/get-formd-updated-fileData', '/form/get-formD-updated-table', '/get-formD-signature', 'step2Sign')" >Next</button>

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


              <p id="otherDocP">Add Other Important Documents</p>

              <table id="myTable1">
              

              </table>
              <br>   
                  <div id="step2Sign" style="text-align: center;margin-top: 40px;"></div>

              <br><br><br>
              <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab2','tab1','step2','step1');">Previous</button>
             <button class="btn btn-primary" type="button" id="thirdStep" onclick="validateData2('financialCreditorFormD','thirdStep','tab2', 'tab3', check2, 'step2', 'step3', '/form/financial-creditor-form-d-save', 'errMessage_3','/form/get-formD-updated-table');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '{{isset($edit) ? 'edit' : ''}}', '/get-formD-signature', 'step3Sign');" >Next</button>

             <div id="errMessage_3">
              </div>

            </div>

                      <div class="tab" id="tab3">
              <h2 class="text-center">DECLARATION</h2>
              <div id="declarationDiv"></div>
               <div id="step3Sign" style="text-align: center;margin-top: 40px;"></div>

              <br><br>
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab3','tab2','step3','step2');updateTableData('financialCreditorFormD','myTable1','/form/get-formD-updated-table');">Previous</button>
              <!-- <button class="btn btn-primary" type="button" id="secondStep" onclick="validateData('financialCreditorFormD','secondStep','tab2', 'tab3', check1, 'step2', 'step3', '/form/financial-creditor-form-d', 'errMessage_2')" >Next</button> -->
              <button class="btn btn-primary" type="button" id="secondStep" onclick="validateData('financialCreditorFormD','firstStep','tab3', 'tab4', check0, 'step3', 'step4', '/form/financial-creditor-form-d','errMessage_2', getPreview);" >Next</button>

              <div id="errMessage_2">
              </div>
              
            </div>

             <!-- TAB FIFTH STARTED -->
           <div class="tab" id="tab4">
               <h2 class="text-center">FORM D PREVIEW </h2>

              <div id="formBPreview"></div>



             <br><br>
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab4','tab3','step4','step3');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '{{isset($edit) ? 'edit' : ''}}', '/get-formD-signature', 'step3Sign');">Previous</button>
             <button class="btn btn-success" type="button" onclick="formSubmit('financialCreditorFormD','financialCreditorFormDBtn','/form/financial-creditor-form-d-submit')" id="financialCreditorFormDBtn">Submit</button>
             <br><br>
             <div id="errMessage_financialCreditorFormD">
              
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


<style>
  
/* Style the form */
#financialCreditorFormD {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
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
.step.finish {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.active {
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
  </style>
</style>

@section('nwJS')
<x-js :file="$authF" />
<x-js :file="$jsl" />
@endsection
@endsection