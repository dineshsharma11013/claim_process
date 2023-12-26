@extends("home_layout/main")
@section('content')
<style type="text/css">
  /*.form-control{
    height: 35px;
  }*/
   a{
    text-decoration: none;
  }
  #error_sign{
    color: red;
  }
</style>

@php 
$authF = url('/').'/'.Config::get('site.formB');
$bgImage = url('/').'/public/access/82c80ce2dd.jfif';
@endphp

 <div class="container-fluid back">
  <div class="row p-3">
    <div class="col m-3 p-3">



      <form class="mt-0 border border-info rounded form-body" id="operationalCreditorForm">
          <input type="hidden" name="fA" id="fA" value="{{isset($formA->id) ? $formA->id : ''}}">
            <input type="hidden" name="fid" id="fid" value="{{isset($user->id) ? $user->id : ''}}">
           <input type="hidden" name="updated_data" id="updated_data" value="{{isset($view) ? 'view' : ''}}">
            <!-- One "tab" for each step in the form: -->
            <div class="tab" id="tab1">
        

               <h2 class="text-center">FORM B</h2>
              <center><h5 class="text-center text-uppercase" style="color: #e0363c;" >PROOF OF CLAIM BY OPERATIONAL EXCEPT WORKMEN AND EMPLOYEES</h5></center><br>
              <h6 class="text-center">(Under Regulation 7 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corpotate Persons) Regulations, 2016)</h6>

              <h4>From</h4>
              <!-- <p>[Name and address of the operational creditor]</p> -->
              <p>{{!empty($user->operational_creditor_name) ? $user->operational_creditor_name : $cat->name}} <br> 
                {{isset($user->operational_creditor_address) ? $user->operational_creditor_address : $cat->address}}
               </p>

              <h4>To</h4>

              <p>The Interim Resolution / Resolution Professional <br> 
                {{$irp->username}}<br> 
              {{$irp->address}}
            </p>


              
           
              <h4><b>Subject:</b> Submission of the claim.</h4><br>


              <h4>Madam/Sir</h4>

              <p class="text-dark">I <span id="operational_creditor_name_2">{{!empty($user->operational_creditor_name) ? $user->operational_creditor_name : ''}}</span>, hereby submits this proof of claim in respect of the corporate insolvency resolution process in the case of {{isset($comp->name) ? ucwords($comp->name) : ''}}. The details for the same are set our below.</p>


                <div class="form-group">
                <label>1. NAME OF OPERATIONAL CREDITOR <span id="error_sign">*</span> </label>
                
                  <input class="form-control" type="text" placeholder="First name..." id="operational_creditor_name_2" name="operational_creditor_name_2" value="{{!empty($user->operational_creditor_name) ? $user->operational_creditor_name : $cat->name}}" readonly="true">
                  <div class="error_cls" id="error_operational_creditor_name_2"></div>
                
                </div>

                
                <div class="form-group">
                <label>2. IDENTIFICATION NUMBER OF OPERATIONAL CREDITOR <br> <span class="text-secondary"> (IF AN INCORPORATE BODY PROVIDE OF INCORPORATION. IF A PARTNERSHIP OR INDIVIDUAL PROVIDE IDENTIFICATION RECORDS* OF ALL THE PARTNERS OR THE INDIVIDUAL) </span> <!--<span id="error_sign">*</span>--></label>
                <input class="form-control" type="text" value="{{isset($user->identification_number) ? $user->identification_number : ''}}" name="identification_number" id="identification_number" placeholder="Identification number..." onKeyUp="Removefd('operationalCreditorForm','identification_number');getData('operationalCreditorForm', 'identification_number', this.value)">
                  <div class="error_cls" id="error_identification_number"></div>
                </div>
               
                
                <div class="form-group">
                <label>3.</label><br>
                <label class="mr-1"> &nbsp; &nbsp; &nbsp;a. ADDRESS OF OPERATIONAL CREDITOR FOR CORRESPONDENCE </label>
                <input class="form-control" type="text" value="{{isset($user->operational_creditor_address) ? $user->operational_creditor_address : ''}}" placeholder="Address..." id="operational_creditor_correspondence_address" name="operational_creditor_correspondence_address" onKeyUp="getData('operationalCreditorForm', 'operational_creditor_correspondence_address', this.value)" readonly="true">
                 
                  <div class="error_cls" id="error_operational_creditor_correspondence_address"></div>
              </div>
               

                <div class="form-group">
                <label>&nbsp; &nbsp; &nbsp; b. Email Address <span id="error_sign">*</span></label>
                <input class="form-control" type="text" value="{{isset($user->operational_creditor_email) ? $user->operational_creditor_email : $cat->email}}" placeholder="Email ..." id="operational_creditor_email" name="operational_creditor_email" onKeyUp="Removefd('operationalCreditorForm','operational_creditor_email');">
                  <div class="error_cls" id="error_operational_creditor_email"></div>
              </div>


                <div class="form-group">
                <label>4.TOTAL AMOUNT OF CLAIM <span id="error_sign">*</span><br> <span class="text-secondary"> ( INCLUDING ANY INTEREST AS AT THE INSOLVENCY COMMENTMENT DATE ) </span> </label>
                
                 <div class="row mb-3">

            <div class="col-sm-4">
                <input type="text" class="form-control" value="{{isset($user->principle_amount) ? $user->principle_amount : ''}}" id="principle_amount" name="principle_amount" autocomplete="off" placeholder="Principle ..." onkeypress="return isNumberKey(event);" onKeyUp="Removefd('operationalCreditorForm','principle_amount');">
                <div class="error_cls" id="error_principle_amount"></div>
            </div>

            <div class="col-sm-4">
                <input type="text" class="form-control" value="{{isset($user->interest) ? $user->interest : ''}}" id="interest" name="interest" id="interest" autocomplete="off" placeholder="Interest ..." onkeypress="return isNumberKey(event);" onKeyUp="Removefd('operationalCreditorForm','interest');">
                <div class="error_cls" id="error_interest"></div>
            </div>

            <div class="col-sm-4">
                <input type="text" class="form-control" value="{{isset($user->total_amount) ? $user->total_amount : ''}}" autocomplete="off" name="total_amount" id="total_amount" placeholder="Total Amount ..." onkeypress="return isNumberKey(event);" onKeyUp="Removefd('operationalCreditorForm','total_amount');">
                <div class="error_cls" id="error_total_amount"></div>
            </div>
        </div>

             

            </div>

                
                <div class="form-group">
                <label>5. DETAILS OF DOCUMENTS BY REFERENCES TO WHICH CAN BE SUBSTANIATED. </label>
                <textarea class="form-control" name="document_details" id="document_details" placeholder="Details Of Documents ..." onKeyUp="getData('operationalCreditorForm', 'document_details', this.value)">{{isset($user->document_details) ? $user->document_details : ''}}</textarea>
                
                  <div class="error_cls" id="error_document_details"></div>
              </div>
              
              <div style="text-align: center;">
                @if(isset($user->operational_creditor_signature) && $user->operational_creditor_signature != '')
                  <img class="profile-pic-user" id="cl_signtre" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
                @endif
              </div>

              
              <button class="btn btn-primary" type="button" id="firstStep" onclick="validateData('operationalCreditorForm','firstStep','tab1', 'tab2', check0, 'step1', 'step2', '/form/operational-creditor-form-b','errMessage_1')" >Next</button>

              <div id="errMessage_1">
              </div>

            </div>

             <!-- TAB ONE CLOSED -->



              <!-- TAB TWO START -->
            <div class="tab" id="tab2">


                <div class="form-group">
                <label>6. DETAILS OF ANY DISPUTE AS WELL AS THE RECORD OF PENDENCY OR ORDER OF SUIT OR ARBITRATION PROCEEDINGS</label>
                <textarea class="form-control" name="any_dispute_deatails" id="any_dispute_deatails" onKeyUp="Removefd('operationalCreditorForm','any_dispute_deatails');getData('operationalCreditorForm', 'any_dispute_deatails', this.value);" placeholder="ENTER DETAILS ...">{{isset($user->any_dispute_deatails) ? $user->any_dispute_deatails : ''}}</textarea>

                <!-- <input class="form-control" value="{{isset($user->any_dispute_deatails) ? $user->any_dispute_deatails : ''}}" name="any_dispute_deatails" id="any_dispute_deatails" onKeyUp="Removefd('operationalCreditorForm','any_dispute_deatails');getData('operationalCreditorForm', 'any_dispute_deatails', this.value);" placeholder="ENTER DETAILS ..."> -->
                  <div class="error_cls" id="error_any_dispute_deatails"></div>
              </div>

                <div class="form-group">
                <label>7. DETAILS OF HOW AND WHEN DEBT INCURRED</label>
                <textarea class="form-control" name="debt_incurred_details" id="debt_incurred_details" placeholder="ENTER DETAILS ..." onKeyUp="getData('operationalCreditorForm', 'debt_incurred_details', this.value)">{{isset($user->debt_incurred_details) ? $user->debt_incurred_details : ''}}</textarea>

                  <div class="error_cls" id="error_debt_incurred_details"></div>
              </div>

                
                <div class="form-group">
                <label>8. DETAILS OF ANY MUTUAL CREDIT, MUTUAL DEBTS, OR OTHER MUTUAL DEALINGS BETWEEN THE CORPORATE DEBTOR AND THE CREDITOR WHICH MAY BE SET-OFF AGAINST THE CLAIM </label>
                <textarea class="form-control" name="any_mutual_details" id="any_mutual_details" placeholder="ENTER DETAILS ..." onKeyUp="getData('operationalCreditorForm', 'any_mutual_details', this.value)">{{isset($user->any_mutual_details) ? $user->any_mutual_details : ''}}</textarea>

                  <div class="error_cls" id="error_any_mutual_details"></div>
              </div>

                
                <div class="form-group">
                <label>9. DETAILS OF: <br> a. any security held, the value of security and its date, or <br> b. any relation of the title arrangement in respect of goods or properties to which the claim refers </label>
                
                <textarea class="form-control" name="any_security_details" id="any_security_details" placeholder="ENTER DETAILS ..." onKeyUp="getData('operationalCreditorForm', 'any_security_details', this.value)">{{isset($user->any_security_details) ? $user->any_security_details : ''}}</textarea>

                  <div class="error_cls" id="error_any_security_details"></div>
              </div>

                
                <div class="form-group">
                <label>10. DETAILS OF THE BANK ACCOUNT TO WHICH THE AMOUNT OF THE CLAIM OR ANY PART THEREOF CAN BE TRANSFERRED PURSUANT TO A RESOLUTION PLAN </label>
                
                    <div class="row mb-3">
          <div class="col-sm-4">
               <input type="text" class="form-control" value="{{isset($user->account_number) ? $user->account_number : ''}}" name="account_number" id="account_number" autocomplete="off" placeholder="Account number ..." value="" onkeypress="return isNumberKey(event);" onKeyUp="Removefd('operationalCreditorForm','account_number');">
                <div class="error_cls" id="error_account_number"></div>
            </div>

            <div class="col-sm-4">
                <input type="text" class="form-control" value="{{isset($user->bank_name) ? $user->bank_name : ''}}" name="bank_name" id="bank_name" autocomplete="off" placeholder="Bank Name ..." onKeyUp="Removefd('operationalCreditorForm','bank_name');">
                <div class="error_cls" id="error_bank_name"></div>
            </div>

            <div class="col-sm-4">
                <input type="text" class="form-control" value="{{isset($user->ifsc_code) ? $user->ifsc_code : ''}}" id="ifsc_code" name="ifsc_code" autocomplete="off" placeholder="IFSC Code ..." onKeyUp="Removefd('operationalCreditorForm','ifsc_code');">
                <div class="error_cls" id="error_ifsc_code"></div>
            </div>
        </div>

      </div>
           
                
                  <br>


                <div class="form-group">
                <label>Signature of operational creditor or person authorised to act on his behalf [ Please enclose the authority if this is being submitted on behalf of an operational creditor ] <span id="error_sign">*</span></label> 
                <input class="form-control" type="file" name="operational_creditor_signature" id="operational_creditor_signature" placeholder="ENTER DETAILS ..." accept="image/*" onchange="loadFile('operational_creditor_signature','error_operational_creditor_signature')">

                @if(isset($user->operational_creditor_signature) && $user->operational_creditor_signature != '')
                  <img class="profile-pic-user" id="cl_signtre" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
                @endif

                <input type="hidden" name="operational_creditor_signature_val" id="operational_creditor_signature_val" value="{{isset($user->operational_creditor_signature) ? $user->operational_creditor_signature : ''}}">
                <div class="error_cls" id="error_operational_creditor_signature"></div>
              </div>  


                <div class="form-group">
                <label>Name is BLOCK LETTERS </label>
                <input class="form-control" type="text" name="signing_person_name" value="{{isset($user->claimant_name) ? strtoupper($user->claimant_name) : strtoupper($cat->name)}}" id="signing_person_name" readonly="true" placeholder="ENTER DETAILS ...">
                <div class="error_cls" id="error_signing_person_name"></div>
              </div> 

                <div class="form-group">
                <label>Position with or in relation to creditor </label>
                <input class="form-control" type="text" value="{{isset($user->creditor_relation) ? $user->creditor_relation : ''}}" name="creditor_relation" id="creditor_relation" placeholder="ENTER DETAILS ..." onKeyUp="Removefd('operationalCreditorForm', 'creditor_relation')">
                <div class="error_cls" id="error_creditor_relation"></div>
              </div>
                
                <div class="form-group">
                <label>Address of person signing</label>
                <input class="form-control" type="text" value="{{isset($user->signing_person_address) ? $user->signing_person_address : $cat->address}}" name="signing_person_address" id="signing_person_address" readonly="true" placeholder="ENTER DETAILS ...">
                <div class="error_cls" id="error_signing_person_address"></div>
              </div>

              <div style="text-align: center;">
                @if(isset($user->operational_creditor_signature) && $user->operational_creditor_signature != '')
                  <img class="profile-pic-user" id="cl_signtre" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
                @endif
              </div>


              <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab2','tab1','step2','step1')">Previous</button>
              <button class="btn btn-primary" type="button" id="secondStep" onclick="validateData('operationalCreditorForm','secondStep','tab2', 'tab3', check1, 'step2', 'step3', '/form/operational-creditor-form-b', 'errMessage_2', updateFileData,'/form/get-formb-updated-fileData', '/form/get-formb-updated-table', '/get-formB-signature', 'step3Sign');" >Next</button>

              <div id="errMessage_2">
              </div>

           </div>
              <!-- TAB TWO CLOSED  -->

             <!-- TAB THREE STARTED -->
           

             <!-- TAB FOUR STARTED -->
            <div class="tab" id="tab3">

             <div class=" row border  mb-3 p-2">
             
                <div class="form-group">
                <label> LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</label><br><br>
                      <div id="fileField">
                  
                  </div>
                  </div>

                <div class="form-group">
                <label>PAN Card</label>
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

              <div id="step3Sign" style="text-align: center;margin-top: 40px;"></div>
                      
             </div>  

             
              <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab3','tab2','step3','step2')">Previous</button>
              <button class="btn btn-primary btnclr" type="button" id="forthStep" onclick="validateData2('operationalCreditorForm','forthStep','tab3', 'tab4', check2, 'step3', 'step4', '/form/operational-creditor-form-b-submit', 'errMessage_4','/form/get-formb-updated-table');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '{{isset($view) ? 'view' : ''}}', '/get-formB-signature', 'step4Sign');" >Next</button>
              <!-- <button class="btn btn-primary" type="button" id="secondStep" onclick="validateData('operationalCreditorForm','secondStep','tab3', 'tab4', check2, 'step3', 'step4', '/form/operational-creditor-form-b-submit', 'errMessage_2',declaration,'declarationDiv')" >Next</button> -->
              
             <br><br>
             <div id="errMessage_4">
              
              </div>
            
            </div>

             <div class="tab" id="tab4">
              <h2 class="text-center">DECLARATION</h2><br><br>

              <div id="declarationDiv"></div>
             <div id="step4Sign" style="text-align: center;margin-top: 40px;"></div>
             
              <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab4','tab3','step4','step3');">Previous</button>
             <button class="btn btn-primary" type="button" id="thirdStep" onclick="validateData2('operationalCreditorForm','forthStep','tab4', 'tab5', check2, 'step4', 'step5', '/form/operational-creditor-form-b-submit', 'errMessage_4', getPreview);" >Next</button>

             <div id="errMessage_3">
              </div>

            </div>

            <div class="tab" id="tab5">
              


            
              <div id="formBPreview"></div>

            
            

               <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab5','tab4','step5','step4');">Previous</button>
             
            

              <div id="errMessage_operationalCreditorForm">
              </div>
            </div>
             <!-- END FOUR TAB -->

     
              <br>
              <!-- <div id="errMessage_operationalCreditorForm">
              </div> -->
              
              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px;">
                <span class="step" id="step1"></span>
                <span class="step" id="step2"></span>
                <span class="step" id="step3"></span>
                <span class="step" id="step4"></span>
                <span class="step" id="step5"></span>
               <!--  <span class="step"></span> -->
              </div>


        

        </form>
    </div>
  </div>
</div>



  <style>
    

/* Style the form */
#operationalCreditorForm {
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
/*input.invalid {
  background-color: #ffdddd;
}
*/
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
  </style>

<script type="text/javascript">
  function handleChange(check, id)
{
  //alert(id);
  //$("#"+id).toggle();
  let isChecked = $('#'+check)[0].checked;
  if (isChecked) 
  {
    $('#operationalCreditorForm input[id="'+id+'"]').show(); 
    //$("#"+id).show();
  }
  else
  {
    $('#operationalCreditorForm input[id="'+id+'"]').hide(); 
   //$("#"+id).hide(); 
  }
  //console.log(isChecked);
}
</script>


@section('nwJS')
<x-js :file="$authF" />
<x-js :file="$jsl" />
@endsection
@endsection