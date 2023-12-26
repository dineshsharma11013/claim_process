@extends("home_layout/main")
@section('content')
<style>
  #dec_name{
    padding: 0px; 
    width: 50px;
    border: none;
    
    
  }
  #dec_address{
    padding: 0px; 
    width: auto;
    border: none;
  }
</style>
@php 
$bgImage = url('/').'/public/access/bg.png';
@endphp
 <div class="container-fluid back">
  <div class="row p-3">
    <div class="col m-3 p-3">



      <div class="mt-0 border border-info rounded form-body" id="regForm">

       

            <!-- One "tab" for each step in the form: -->
            <form class="tab" id="frmsubmit" method="post" action="{{url('submit_workmen_and_employee')}}" enctype="multipart/form-data">
        @csrf

               <h3 class="text-center">FORM D</h3>
              <center><span class="text-center  mb-3" style="color: #1f40e0;" >PROOF OF CLAIM BY A WORKMAN OR AN EMPLOYEE </span></center><br>
              <h5 class="mb-3">(Under Regulation 9 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations, 2016)</h5>
              <h4 style="float: right;">@if(isset($fromd)) {{ ($fromd->submitted == 1) ? dateFm($fromd->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h4>

              <h4>To</h4>
              <p>The Interim Resolution Professional / Resolution Professional <br>[Name of the Insolvency Resolution Professional / Resolution Professional] <br>[Address as set out in public announcement]</p>

              <h4>From</h4>

              <p>[{{isset($fromd->name) ? $fromd->name : $cat->name}} {{(isset($fromd->address) ? ', '.$fromd->address : '')}} of the financial creditor, including address of its registered office and principal office]</p>

              <h4><b>Subject:</b>Submission of proof of claim.</h4><br>


              <h4>Madam/Sir</h4>

              <p class="text-dark"> <span id="name_user">{{isset($cat->name) ? $cat->name : ''}}</span>, hereby submits this claim in respect of the corporate insolvency resolution process of [name of corporate debtor]. The details for the same are set out below:</p>


                <div class="form-group">
                <label>1. Name of WORKMAN / EMPLOYEE </label> <span style="color:red">*</span>
                <br><span id="alert_name" style="color:red"></span>
                <p><input class="form-control" id="name" name="name" maxlength="50" type="text" value="{{isset($fromd->name) ? $fromd->name : $cat->name}}" placeholder="Workman / Employee Name..." oninput="name_v(this.value)" readonly="true"></p>
                </div>

                <input type="hidden" id="user_id" value="{{$cat->id}}">

                <div class="form-group">
                <label>2.<br> Pan card number, passport, the identity card issued by the election comission of the india or aadhar card of workman / employee </label> 
                
                <br><span id="alert_pancard" style="color:red"></span>

                <input class="form-control" id="pancard"   maxlength="30" value="{{(isset($fromd->pancard_no) ? $fromd->pancard_no : '')}}" type="text" name="pancard" placeholder="Pan Card number ..." oninput="pancard_v()">
                <span id="alert_passport" style="color:red"></span>
                <input class="form-control" id="passport"  maxlength="30" value="{{(isset($fromd->passport_no) ? $fromd->passport_no : '')}}" name="passport" type="text" placeholder="Passport number ..." oninput="passport_v()">
                <span id="alert_voter_id" style="color:red"></span>
                <input class="form-control" id="voter_id"  maxlength="30" value="{{(isset($fromd->voter_id_no) ? $fromd->voter_id_no : '')}}" name="voter_id" type="numbers" placeholder="Voter Id card number ..." oninput="voter_id_v()">
                <span id="alert_aadhar" style="color:red"></span>
                <input class="form-control" name="aadhar" id="aadhar"  maxlength="30" value="{{(isset($fromd->aadhar_no) ? $fromd->aadhar_no : '')}}" type="numbers" placeholder="Aadhar card number ..." oninput="aadhar_v()">
              </div>

                
                <div class="form-group">
                <label>3.</label><br>
                <label class="mr-1"> &nbsp; &nbsp; &nbsp;a. Address of Workman / Employee creditor for correspondence </label> 
                <br><span id="alert_address" style="color:red"></span>
                <p><input class="form-control"  maxlength="100" id="address" value="{{(isset($fromd->address) ? $fromd->address : '')}}" name="address" type="text" placeholder="Address..." oninput="address_v()"></p></div>
               

                <div class="form-group">
                <label>&nbsp; &nbsp; &nbsp; b. Email Address</label> <span style="color:red">*</span>
                <br><span id="alert_email" style="color:red"></span>
                <p><input name="email" id="email" maxlength="50"  value="{{(isset($fromd->email) ? $fromd->email : $cat->email)}}" class="form-control" type="email" placeholder="Email ..." oninput="email_v()" readonly="true"></p></div>


                <div class="form-group">
                <label>4.TOTAL AMOUNT OF CLAIM <br> ( INCLUDING ANY INTEREST AS AT THE INSOLVENCY COMMENTMENT DATE ) </label> 
                <br><span id="alert_total_amount" style="color:red"></span>

                
                <br><span id="alert_principle" style="color:red"></span>
               <input class="form-control" maxlength="30" id="principle" value="{{(isset($fromd->principle) ? $fromd->principle : '')}}" name="principle" type="numbers" placeholder="Principle ..." oninput="principle_v()">

               <br><span id="alert_interest" style="color:red"></span>
                <input class="form-control" maxlength="30" id="interest"  value="{{(isset($fromd->intrest) ? $fromd->intrest : '')}}" name="interest" type="numbers" placeholder="Interest ..." oninput="interest_v()"></div>

                <input class="form-control" id="total_amount" maxlength="30" value="{{(isset($fromd->total_amount) ? $fromd->total_amount : '')}}" name="total_amount" type="numbers" placeholder="Total Amount ..." oninput="total_amount_v()">

                <div class="form-group">
                <label>5. Details of documents by reference to which the claim can be substained. </label> 
                <br><span id="alert_details_of_documents" style="color:red"></span>
                <p><input class="form-control" id="details_of_documents" maxlength="100" value="{{(isset($fromd->details_of_documents) ? $fromd->details_of_documents : '')}}"  name="details_of_documents" type="text" placeholder="Details of documents..." oninput="details_of_documents_v()"></p>
                </div>

                <div class="form-group">
                <label>6. Details of any dispute as well as the record of pendency or order of suit or arbitration proceedings </label> 
                <br><span id="alert_dispute" style="color:red"></span>
                <p><input class="form-control"  id="dispute" name="dispute" maxlength="100" value="{{(isset($fromd->dispute_details) ? $fromd->dispute_details : '')}}" type="text" placeholder="Enter Details..." oninput="dispute_v()"></p>
                </div>

                <div class="form-group">
                <label>7. Details of how and when claim arose </label> 
                <br><span id="alert_claim" style="color:red"></span>
                <p><input class="form-control"  id="claim_arose" maxlength="100" name="claim"  value="{{(isset($fromd->claim_arose_details) ? $fromd->claim_arose_details : '')}}"  type="text" placeholder="Enter Details..." oninput="claim_v()"></p>
                </div>




                





                <div class="form-group">
                <label>8. Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim </label> 
                <br><span id="alert_mutual_credit" style="color:red"></span>
                <p><textarea name="mutual_credit" maxlength="100" oninput="mutual_credit_v()"  id="mutual_credit" style="width:100%;" placeholder="Enter Details..." >{{(isset($fromd->mutual_credit_details) ? $fromd->mutual_credit_details : '')}}</textarea></p>
                </div>


                <div class="form-group">
                <label>9. Details of the bank account to which the amount of the claim or any part thereof can be transferred pursuant to a resolution plan </label> 
                <br><span id="alert_account_number" style="color:red"></span>
                <input class="form-control" maxlength="30" value="{{(isset($fromd->account_no) ? $fromd->account_no : '')}}" name="account_number" id="account_number" placeholder="Account number ..." oninput="account_number_v()">

                <br><span id="alert_bank_name" style="color:red"></span>
                <input class="form-control" maxlength="50" id="bank_name" name="bank_name"  value="{{(isset($fromd->bank_name) ? $fromd->bank_name : '')}}" placeholder="Bank Name..." oninput="bank_name_v()">

                <br><span id="alert_ifsc" style="color:red"></span>
                <input class="form-control" id="ifsc" maxlength="30" name="ifsc"  value="{{(isset($fromd->ifsc_code) ? $fromd->ifsc_code : '')}}" placeholder="IFSC Code ..." oninput="ifsc_v()"></div>



                
                <div class="mt-5">
                <br><span id="alert_signature" style="color:red"></span>
                <input type="file" class="form-control fileUpload1" name="signature"  id="signature">
                <img width="100px" class="image_append" src="{{(isset($fromd->signature) ? str_replace('\\', '/', $fromd->signature) : '')}}">
               <input type="hidden"  name="old_signature" value="{{(isset($fromd->signature) ? str_replace('\\', '/', $fromd->signature) : '')}}">
               
                <p>(Signature of workman / employee or person authorised to act on its behalf) <span style="color:red">*</span><br> 
                [Please enclose the authority if this is being submitted on behalf of the operational creditor]</p>

                <p>Name in BLOCK LETTERS 
                <br><span id="alert_name_block_letter" style="color:red"></span>
                <input id="block_letter" name="name_block_letter" value="{{isset($fromd->name_block_letter) ? strupper($fromd->name) : strtoupper($cat->name)}}" class="form-control" type="text"  placeholder="Enter name in BLOCK LETTERS..." oninput="name_block_letter_v()" readonly></p>

                <p>Position with or in relation to creditor 
                <br><span id="alert_relation_to_creditor" style="color:red"></span>  <input value="{{(isset($fromd->relation_to_creditor) ? $fromd->relation_to_creditor : '')}}" id="relation_to_creditor" name="relation_to_creditor" maxlength="50" class="form-control" type="text" placeholder="Enter Details..." oninput="relation_to_creditor_v()"></p>

                <p>Address of person signing 
                <br><span id="alert_address_person_signing" style="color:red"></span>
                <textarea maxlength="100" id="address_person_signing" oninput="address_person_signing_v()" name="address_person_signing"  style="width:100%;" placeholder="Enter Address..." > {{(isset($fromd->address_person_signing) ? $fromd->address_person_signing : '')}}</textarea></p>

                
                </div>
                <button class="btn btn-primary nextbtn_ nextbtn_panding" type="submit">Next</button>


</form>

       <button id="nextbtn_" type="hidden" style="visibility: hidden" onclick="nextPrev(1)"></button>

             <!-- TAB ONE CLOSED -->





             <!-- TAB THREE STARTED -->
            <div class="tab">
              <h1 class="text-center">DECLARATION</h1><br><br>
              <h6>I, <span  class="name_append">{{(isset($fromd->name) ? $fromd->name : '')}}</span> , currently residing at <span class="address_append">{{(isset($fromd->address) ? $fromd->address : '')}} </span>, do hereby declare and state as follows: - </h6><br>

              <span><span  class="name_append"></span>, the corporate debtor was, at the insolvency commencement date, being <span class="date_value">the……………..day of…………..20…….</span>, actually indebted to me for a sum of Rs. <span  class="total_amount_append"></span>.</span><br><br>

              <span>In respect of my claim of the said sum or any part thereof, I have relied on the documents specified below: [Please list the documents relied on as evidence of claim].</span><br><br>

              <span>The said documents are true, valid and genuine to the best of my knowledge, information and belief and no material facts have been concealed therefrom. </span><br><br>

              <span>In respect of the said sum or any part thereof, neither I, nor any person, by my order, to my knowledge or belief, for my use, had or received any manner of satisfaction or security whatsoever, save and except the following:</span><br>

              <span class="text-danger"><i>[Please state details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim]. – To be copied from S. No. 8</i></span><br><br>

              <h5>Date: <span class="dateadd">{{(isset($fromd->added_on) ? $fromd->added_on : '') }}</span></h5>
              <h5>Place:</h5><br><br>
              <img width="100px" class="image_append" style="float: right; margin-right:50px" src="{{(isset($fromd->signature) ? str_replace('\\', '/', $fromd->signature) : '')}}"><br><br><br><br>
              <span class="float-right" style="float: right;">( Signature of the claimant )</span><br><br>       


              <h2 class="text-center">VERIFICATION</h2><br>


              <p>I,<span  class="name_append">{{(isset($fromd->name) ? $fromd->name : '')}}</span> the claimant hereinabove, do hereby verify that the contents of his proof of claim are true and correct to my Knowledge and belief and no material fact has been concealed therefrom.</p><br>

              <h5>Verified at .. on this <span class="date_value">the……………..day of…………..20…….</span></h5><br><br>
              <img width="100px" class="image_append" style="float: right; margin-right:50px" src="{{(isset($fromd->signature) ? str_replace('\\', '/', $fromd->signature) : '')}}"><br><br><br><br>
              <span class="float-right" style="float: right;">( Signature of the claimant )</span><br><br><br>

              

              <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                  <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
 
             
              
            </div>




             <!-- TAB FOURTH STARTED -->
            <form class="tab" id="submitdocshdjsdvc" method="post" action="{{url('submit_workmen_and_employee_doc')}}" enctype="multipart/form-data">
              
                <div class="form-group">
                <label> LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</label><br><br>
                    
                    @csrf

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
              
                    <input class="form-check-input" type="checkbox" {{!empty($fromd_doc->work_order_purchase_order_image) ? 'checked' :  ''}}  name="work_order_purchase_order" id="flexCheckDefault" onchange="handleChange('formFile1','formFile_1');">
                    <label class="form-check-label" for="flexCheckDefault">Work order/ Purchase order</label></div>
                    </div>
                    <div class="col-md-6"><input name="work_order_purchase_order_image"   class="form-control mb-2"  {{!empty($fromd_doc->work_order_purchase_order_image) ? '' : "style=display:none !important" }} type="file" id="formFile1"></div>
                    <input type="hidden" name="work_order_purchase_order_image_up" value="{{!empty($fromd_doc->work_order_purchase_order_image) ? $fromd_doc->work_order_purchase_order_image : '' }}" id="formFile_1">
                    </div>
                    

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" {{!empty($fromd_doc->invoices_image) ? 'checked' :  ''}}  name="invoices" id="flexCheckDefault" onchange="handleChange('formFile2','formFile_2');">
                    <label class="form-check-label" for="flexCheckDefault">Invoices</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" name="invoices_image" {{!empty($fromd_doc->invoices_image) ? '' : "style=display:none !important" }} type="file" id="formFile2"></div>
                    <input type="hidden" name="invoices_image_up" value="{{!empty($fromd_doc->invoices_image) ? $fromd_doc->invoices_image : '' }}" id="formFile_2">
                    </div>


                    

                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" {{!empty($fromd_doc->balance_confirmation_image) ? 'checked' :  ''}} name="balance_confirmation"  id="flexCheckDefault" onchange="handleChange('formFile3','formFile_3');">
                    <label class="form-check-label" for="flexCheckDefault">Balance Confirmation</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" {{!empty($fromd_doc->balance_confirmation_image) ? '' : "style=display:none !important" }} name="balance_confirmation_image" type="file" id="formFile3" ></div>
                    <input type="hidden" name="balance_confirmation_image_up" value="{{!empty($fromd_doc->balance_confirmation_image) ? $fromd_doc->balance_confirmation_image : '' }}" id="formFile_3">
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" {{!empty($fromd_doc->any_correspondence_image) ? 'checked' :  ''}} name="any_correspondence" id="flexCheckDefault" onchange="handleChange('formFile4','formFile_4');">
                    <label class="form-check-label" for="flexCheckDefault">Any correspondence etc</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2"  {{!empty($fromd_doc->any_correspondence_image) ? '' : "style=display:none !important" }} name="any_correspondence_image" type="file" id="formFile4" ></div>
                    <input type="hidden" name="any_correspondence_image_up" value="{{!empty($fromd_doc->any_correspondence_image) ? $fromd_doc->any_correspondence_image : '' }}" id="formFile_4">
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" {{!empty($fromd_doc->authorisation_image) ? 'checked' :  ''}} name="authorisation"  id="flexCheckDefault" onchange="handleChange('formFile5','formFile_5');">
                    <label class="form-check-label" for="flexCheckDefault">Authorisation letter</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" name="authorisation_image" type="file" id="formFile5"  {{!empty($fromd_doc->authorisation_image) ? '' : "style=display:none !important" }}></div>
                    <input type="hidden" name="authorisation_image_up" value="{{!empty($fromd_doc->authorisation_image) ? $fromd_doc->authorisation_image : '' }}" id="formFile_5">
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" {{!empty($fromd_doc->bank_statement_image) ? 'checked' :  ''}} name="bank_statement" id="flexCheckDefault" onchange="handleChange('formFile6','formFile_6');">
                    <label class="form-check-label" for="flexCheckDefault">Bank Statement</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" name="bank_statement_image" type="file" id="formFile6" {{!empty($fromd_doc->bank_statement_image) ? '' : "style=display:none !important" }}></div>
                    <input type="hidden" name="bank_statement_image_up" value="{{!empty($fromd_doc->bank_statement_image) ? $fromd_doc->bank_statement_image : '' }}" id="formFile_6">
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" {{!empty($fromd_doc->copy_of_ledger_image) ? 'checked' :  ''}} name="copy_of_ledger" id="flexCheckDefault" onchange="handleChange('formFile7','formFile_7');">
                    <label class="form-check-label" for="flexCheckDefault">Copy of ledger</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" name="copy_of_ledger_image" type="file" id="formFile7" {{!empty($fromd_doc->copy_of_ledger_image) ? '' : "style=display:none !important" }}></div>
                    <input type="hidden" name="copy_of_ledger_image_up" value="{{!empty($fromd_doc->copy_of_ledger_image) ? $fromd_doc->copy_of_ledger_image : '' }}" id="formFile_7">
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" {{!empty($fromd_doc->computation_sheet_image) ? 'checked' :  ''}} type="checkbox" name="computation_sheet" id="flexCheckDefault" onchange="handleChange('formFile8','formFile_8');">
                    <label class="form-check-label" for="flexCheckDefault">Computation sheet</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" name="computation_sheet_image" type="file" id="formFile8" {{!empty($fromd_doc->computation_sheet_image) ? '' : "style=display:none !important" }}></div>
                    <input type="hidden" name="computation_sheet_image_up" value="{{!empty($fromd_doc->computation_sheet_image) ? $fromd_doc->computation_sheet_image : '' }}" id="formFile_8">
                    </div>
                 
                  </div>


                <div class="form-group">
                <label>PAN number</label>
                <p><input class="form-control" type="file" {{(isset($fromd_doc->pan_number_image) ? '' : '')}} name="pan_number_image"  oninput="this.className = ''"></p></div> 
                <input type="hidden" name="pan_number_image_up" value="{{!empty($fromd_doc->pan_number_image) ? $fromd_doc->pan_number_image : '' }}">

                <div class="form-group">
                <label>Passport</label>
                <p><input class="form-control" type="file" {{(isset($fromd_doc->passport_image) ? '' : '')}} name="passport_image"  oninput="this.className = ''"></p></div> 
                <input type="hidden" name="passport_image_up" value="{{!empty($fromd_doc->passport_image) ? $fromd_doc->passport_image : '' }}">

                <div class="form-group">
                <label>AADHAR Card</label>
                <p><input class="form-control" type="file" {{(isset($fromd_doc->aadhar_card) ?  '': '')}} name="aadhar_card"  oninput="this.className = ''"></p></div> 
                <input type="hidden" name="aadhar_card_up" value="{{!empty($fromd_doc->aadhar_card) ? $fromd_doc->aadhar_card : '' }}">
              

              <p>Add Other Important Documents</p>

              <table id="myTable">
                <div class="delete_row_">
                <tr>

                
                
                @php $in=0; @endphp
              @if(isset($form_milti[0]))  
              @php $j=0; @endphp 
               @foreach($form_milti as $list)
               @php  $in  = $j ;  @endphp
                  <tr id="delete_multi{{$list->id}}" class="delete_row_nnn"><td><input type='text' name="document_name[]" value="{{$list->document_name}}" placeholder='enter document name'></td>
                  <td><input name="document_image[]" type='file'></td>
                 <input type="hidden" name="id_miltiple[]" value="{{$list->id}}">
                  <input type="hidden" name="document_image_up_[]" value="{{$list->document_image}}"/>
                  <td><input class="btn btn-danger" type="button" onclick="remove_image_del('{{$list->id}}')" value="delete"></td></tr>
                
                  @php
                   $j++; 
                  @endphp
                  
                @endforeach 
               
                <tr id="mytable"></tr>
              @else
        
                  <td class="delete_row_nnn"><input type='text' name="document_name[]" placeholder='enter document name'></td>
                  <td class="delete_row_nnn"><input name="document_image[]" type='file'></td>

       
                  <tr id="mytable"> </tr>
                  

              @endif
              <input type="hidden" id="value_number_skdk" value="{{$in}}">
                 
                </tr>
</div>
              </table>
              <br>   
              <div class="btn-group mr-2 col-md-4" role="group" aria-label="First group">
                <button class="btn btn-primary btn-sm" type="button" onclick="myFunction()">Add More</button>
              </div>        
<br>
<br>

             
              <button class="btn btn-primary" type="button" onclick="nextPrev(-1)" id="prevBtn">Previous</button>
              <button class="btn btn-primary next_padding_image" type="submit">Next</button>


</form>

<button id="nextbtn_sec" type="hidden" style="visibility: hidden" onclick="nextPrev(1)"></button>


             <!-- TAB FIFTH STARTED -->
            <div class="tab">
              <h1 class="text-center">FORM D <br> PREVIEW </h1><br><br>


              <center><span class="text-center text-uppercase mb-3" style="color: #1f40e0;" >Proof of claim by a workman or an employee </span></center><br>
              
              <h5 class="mb-3">(Under Regulation 9 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corpotate Persons) Regulations, 2016)</h5>
              <h4 style="float: right;"><span class="dateadd">{{(isset($fromd->added_on) ? $fromd->added_on : '') }}</span></h4>

             <div class="row">


              <h4>To</h4>
              <p>The Interim Resolution Professional / Resolution Professional <br>[Name of the Insolvency Resolution Professional / Resolution Professional] <br>[Address as set out in public announcement]</p>

              <h4>From</h4>

              <p><span class="name_append"></span>, <span class="address_append"></span></p>


              <h4><b>Subject:</b> Submission of the claim.</h4><br>


              <h4>Madam/Sir</h4>

              <p class="text-dark"> <span class="name_append"></span>, hereby submits this proof of claim in respect of the corporate insolvency resolution process in the case of [ name of corporate debtor ]. The details for the same are set our below.</p>
                 </div>

    <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Particulars</th>


        
        
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td colspan="4"> Name of Workman / Employee</td>
          <td colspan="4"><span class="name_append"></span></td>
         
        </tr>


          <tr>
          <tr><th  rowspan='5'>2.</th><td  rowspan='5'> Pan card number, passport, the identity card issued by the election comission of the india or aadhar card of workman / employee</td></tr>
          <tr><td colspan="4"><span class="pancard_append"></span></td></tr>
          <tr><td colspan="4"><span class="passport_append"></span></td></tr>
          <tr><td colspan="4"><span class="voter_id_append"></span></td></tr>
          <tr><td colspan="4"><span class="ifsc_append"></span></td></tr>
          </tr>


        <tr>
          <th scope="row">3</th>
          <td colspan="4">a. Address of workman / employee for correspondence </td>
          <td colspan="4"><span class="address_append"></span></td>

          <tr><th scope="row"></th>
            <td colspan="4">b. Email Address</td>
            <td colspan="4"><span class="email_append"></span></td></tr> 
        </tr>



          <tr>
          <th  rowspan='4'>4.</th><td  rowspan='4'> Total amount of claim </td>
          <tr><td colspan="4"><span class="total_amount_append"></span></td></tr>
          <tr><td colspan="4"><span class="principle_append"></span></td></tr>
          <tr><td colspan="4"><span class="interest_append"></span></td></tr>
          </tr>



        <tr>
          <th scope="row">5.</th>
          <td colspan="4"> Details of documents by reference to which the claim can be substained.</td>
          <td colspan="4"><span class="claim_details_append"></span></td>  
        </tr>

        <tr>
          <th scope="row">6.</th>
          <td colspan="4"> Details of any dispute as well as the record of pendency or order of suit or arbitration proceedings</td>
          <td colspan="4"><span class="dispute_append"></span></td>         
        </tr>

        <tr>
          <th scope="row">7.</th>
          <td colspan="4"> Details of how and when claim arose</td>
          <td colspan="4"><span class="claim_arose_append"></span></td>        
        </tr>

        <tr>
          <th scope="row">8.</th>
          <td colspan="4">Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim</td>
          <td colspan="4"><span class="mutial_credit_append"></span></td>     
        </tr>

<!--         <tr>
          <th scope="row">9</th>
          <td colspan="4"> DETAILS OF: <br> a. any security held, the value of security and its date, or </td>
          <td colspan="4">[Details example]</td>
        
          <tr>
            <th scope="row"></th>
          <td colspan="4"> b. any relation of the title arrangement in respect of goods or properties to which the claim refers </td>
          <td colspan="4">[Details example]</td>
          </tr>
         
        </tr> -->





          <tr>
          <tr><th  rowspan='4'>9.</th><td  rowspan='4'> Details of the bank account to which the amount of the claim or any part thereof can be transferred pursuant to a resolution plan</td></tr>
          <tr><td colspan="4"><span class="account_number_append"></span></td></tr>
          <tr><td colspan="4"><span class="bank_name_append"></span></td></tr>
          <tr><td colspan="4"><span class="ifsc_append"></span></td></tr>
          </tr>



<!-- 
          <tr>
            <th scope="row">11</th>
            <td colspan="5"> LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</td>
          </tr>

          <tr>
            <th scope="row"></th>
          
          <td colspan="5">[Select Values  example]</td>

          </tr>
          <tr>
            <th scope="row"></th>
          
          <td colspan="5">[Select Values  example]</td>

          </tr>
          <tr>
            <th scope="row"></th>
          
          <td colspan="5">[Select Values  example]</td>

          </tr>
          <tr>
            <th scope="row"></th>
          
          <td colspan="5">[Select Values  example]</td>

          </tr> -->
         
       

      </tbody>
    </table>
    </div>


              <div class="row border mb-3 p-2">
                <h6>Signature of financial creditor or person authorised to act on his behalf [ Please enclose the authority if this is being submitted on behalf of an operational creditor ]</h6>
               
         <span><img class="image_append" src="{{(isset($fromd->signature) ? asset($fromd->signature) : '')}}" alt="singnature" width="50" height="50"></span> 

            
                
              </div>

              <div class="row border mb-3 p-2">
              <div class="col-md-4 my-2">
                <h6>Name is BLOCK LETTERS</h6>

               <span class="block_letter_append"></span>


                
              </div>

              <div class="col-md-4 my-2">
                <h6>Position with or in relation to creditor</h6>

                <span class="relation_creditor_append"></span>

          
                
              </div>

              <div class="col-md-4 my-2">
                <h6>Address of person signing</h6>

                <span class="person_signing_append"></span>

          
                
              </div>
              </div>


             <div class=" row border  mb-3 p-2">
              <h1 class="text-center">DECLARATION</h1><br><br>           
              <h6>I,<span class="name_append"></span>, currently residing at <span class="address_append"></span> , hereby declare and state as follows:- </h6><br>

              <span class="mb-3">1. [ Name of corporate debtor ], the corporate debtor was, at the insolvency commencement date, being the <span class="date_value">the……………..day of…………..20…….</span>, actually indebted to me in the sum of Rs. [ insert amount of claim ].</span><br><br>

              <span class="mb-3">2. In respect of my claim of the said sum or any proof thereof, I have relied on the documents specified below: [ Please list the documents relied on as evidence of claim ].</span><br><br>

              <span class="mb-3">3. The said documents are true, valid and genuine to the best of my knowledge, information and belief and no material facts have been concealed therefrom. </span><br><br>

              <span>4. In respect of the said sum or any part thereof,neither I nor any person, by my order, to my Knowledge or belief, for my use, had or received any manner of satisfication or security whatsoever, save and except the following:</span><br><br>

           

              <div class="row mb-3 p-2">
              <div class="col-md-6 my-2">
              <h5>Date: <span class="dateadd">{{(isset($fromd->added_on) ? $fromd->added_on : '') }}</span></h5>
              <h5>Place:</h5>
              </div><br><br>

              <div class="col-md-6 my-2">

              <span class="pull-right"><img class="image_append" src="{{(isset($fromd->signature) ? asset($fromd->signature) : '')}}" alt="Signature" width="150" height="150"><br>( Signature of the claimant )</span> </div>
              </div>

              <br><br>       


              <h2 class="text-center">VERIFICATION</h2><br>


              <p>I,<span class="name_append"></span>the claimant hereinabove, do hereby verify that the contents of his proof of claim are true and correct to my Knowledge and belief and no material fact has been concealed therefrom.</p><br>

              <div>

              <h5>Verified at .. on this <span class="date_value">the……………..day of…………..20…….</span></h5>

              <span class="pull-right"><img class="image_append" src="{{(isset($fromd->signature) ? asset($fromd->signature) : '')}}" alt="Signature" width="150" height="150"><br>( Signature of the claimant )</span>

              
             <span id="append_html_code"></span>

              </div>
            
               


                <!-- <div class="form-group">
                <label> LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</label><br><br>
                    

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="handleChange('formFile1');">
                    <label class="form-check-label" for="flexCheckDefault">Work order/ Purchase order</label></div>
                    </div>
                    <div class="col-md-6"><input class="form-control mb-2" style="display:none;" type="file" id="formFile1"></div>
                    </div>
                    

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault" onchange="handleChange('formFile2');">
                    <label class="form-check-label" for="flexCheckDefault">Invoices</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" style="display:none;" type="file" id="formFile2"></div>
                    </div>


                    

                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="handleChange('formFile3');">
                    <label class="form-check-label" for="flexCheckDefault">Balance Confirmation</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" id="formFile3" style="display:none;"></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="handleChange('formFile4');">
                    <label class="form-check-label" for="flexCheckDefault">Any correspondence etc</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" id="formFile4" style="display:none;"></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="handleChange('formFile5');">
                    <label class="form-check-label" for="flexCheckDefault">Authorisation letter</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" id="formFile5" style="display:none;"></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="handleChange('formFile6');">
                    <label class="form-check-label" for="flexCheckDefault">Bank Statement</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" id="formFile6" style="display:none;"></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="handleChange('formFile7');">
                    <label class="form-check-label" for="flexCheckDefault">Copy of ledger</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" id="formFile7" style="display:none;"></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onchange="handleChange('formFile8');">
                    <label class="form-check-label" for="flexCheckDefault">Computation sheet</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" id="formFile8" style="display:none;"></div>
                    </div>
                 
                  </div> -->


                <!-- <div class="form-group">
                <label>PAN number</label>
                <p><input class="form-control" type="file"  oninput="this.className = ''"></p></div> 

                <div class="form-group">
                <label>Passport</label>
                <p><input class="form-control" type="file"  oninput="this.className = ''"></p></div> 

                <div class="form-group">
                <label>AADHAR Card</label>
                <p><input class="form-control" type="file"  oninput="this.className = ''"></p></div>  -->


              <!-- <p>Add Other Important Documents</p>

              <table id="myTable">
                <tr>
                     <td><input type='text' placeholder='enter document name'></td>
                  <td><input type='file'></td>
                  
                </tr>

              </table>
              <br>

              <div class="btn-group mr-2 col-md-4" role="group" aria-label="First group">
                <button class="btn btn-primary btn-sm" type="button" onclick="myFunction()">Add More</button>
              <button class="btn btn-primary btn-sm" type="button" onclick="del()">Delete Row</button></div> --><br><br>
              <button class="btn btn-primary prious_btn_c" type="button" style="visibility:hidden" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
<div style="text-align:center"><span id="successfull_message"></span></div>

             </div>
           
              <button class="btn btn-primary for_pandding_btn" type="button" id="prevBtn" onclick="append_delete_btn()">Previous</button>  
          
                  <button class="btn btn-primary" onclick="fianl_submit_form()" type="button" >Submit</button>
            </div>
             <!-- END FOUR TAB -->

       <!-- <div class="tab">Login Info:
                <p><input placeholder="Username..." oninput="this.className = ''"></p>
                <p><input placeholder="Password..." oninput="this.className = ''"></p>
              </div> -->

              <div style="overflow:auto;">
                <div style="float:right;">
                  <div class='formbutton'>

                  </div>

          <div class='submitbutton' style="display:none;">

              
 
          </div>

                </div>
              </div>

              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px;">
                <span class="step "></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>

                <!-- <span class="step"></span> -->
               
               <!--  <span class="step"></span> -->
              </div>


            <!-- Modal -->
            <div class="modal fade" id="prevmdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                
                </div>
              </div>
            </div>

</div>
    </div>
  </div>
</div>

</body>
</html>
<style>
  
/* Style the form */
#regForm {
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
<script src="{{asset('public/access/js/custom_workmen.js')}}"></script>
@endsection