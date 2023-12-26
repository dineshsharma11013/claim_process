
              <center><h5 class="text-center text-uppercase" style="color: #e0363c;" >Proof of claim by a workman or an employee </h5></center><br>
              
              <h6 class="text-cente">(Under Regulation 9 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corpotate Persons) Regulations, 2016)</h6>
              <h4 style="float: right;"><span class="dateadd">{{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}}</span></h4>

             <div class="row">

              <h4>From</h4>

              <p>{{!empty($user->name) ? $user->name : ''}} <br> {{isset($user->address) ? $user->address : ''}}</p>

              <h4>To</h4>
              <p>The Interim Resolution Professional / Resolution Professional <br>{{$ip->username}}<br> {{$ip->address}}</p>

              <h4><b>Subject:</b> Submission of the claim.</h4><br>

              <h4>Madam/Sir</h4>

              <p class="text-dark"> <span class="name_append">I {{!empty($user->name) ? $user->name : $cat->name}}</span>, hereby submits this proof of claim in respect of the corporate insolvency resolution process in the case of {{!empty($comp->name) ? ucwords($comp->name) : ''}}. The details for the same are set our below.</p>
                 </div>

    <div class="table-responsive row border">
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
          <td colspan="4"><span class="name_append">{{!empty($user->name) ? $user->name : $cat->name}}</span></td>
         
        </tr>


          <tr>
          <tr><th  rowspan='5'>2.</th><td  rowspan='5'> Pan card number, passport, the identity card issued by the election comission of the india or aadhar card of workman / employee</td></tr>
          <tr><td colspan="4">{{isset($user->pancard_no) ? $user->pancard_no : ''}}<span class="pancard_append"></span></td></tr>
          <tr><td colspan="4">{{isset($user->passport_no) ? $user->passport_no : ''}}<span class="passport_append"></span></td></tr>
          <tr><td colspan="4">{{isset($user->voter_id_no) ? $user->voter_id_no : ''}}<span class="voter_id_append"></span></td></tr>
          <tr><td colspan="4">{{isset($user->aadhar_no) ? $user->aadhar_no : ''}}<span class="ifsc_append"></span></td></tr>
          </tr>


        <tr>
          <th scope="row">3</th>
          <td colspan="4">a. Address of workman / employee for correspondence </td>
          <td colspan="4">{{isset($user->address) ? $user->address : ''}}<span class="address_append"></span></td>

          <tr><th scope="row"></th>
            <td colspan="4">b. Email Address</td>
            <td colspan="4">{{isset($user->email) ? $user->email : ''}}<span class="email_append"></span></td></tr> 
        </tr>

          <tr>
              <th  rowspan='4'>4.</th><td  rowspan='4'> Total amount of claim </td>
              <tr><td colspan="4">{{isset($user->principle) ? $user->principle : ''}}<span class="principle_append"></span></td></tr>
              <tr><td colspan="4">{{isset($user->intrest) ? $user->intrest : ''}}<span class="interest_append"></span></td></tr>
              <tr><td colspan="4">{{isset($user->total_amount) ? $user->total_amount : ''}}<span class="total_amount_append"></span></td></tr>
          </tr>

        <tr>
          <th scope="row">5.</th>
          <td colspan="4"> Details of documents by reference to which the claim can be substained.</td>
          <td colspan="4">{{isset($user->details_of_documents) ? $user->details_of_documents : ''}}<span class="claim_details_append"></span></td>  
        </tr>

        <tr>
          <th scope="row">6.</th>
          <td colspan="4"> Details of any dispute as well as the record of pendency or order of suit or arbitration proceedings</td>
          <td colspan="4">{{isset($user->dispute_details) ? $user->dispute_details : ''}}<span class="dispute_append"></span></td>         
        </tr>

        <tr>
          <th scope="row">7.</th>
          <td colspan="4"> Details of how and when claim arose</td>
          <td colspan="4">{{isset($user->claim_arose_details) ? $user->claim_arose_details : ''}}<span class="claim_arose_append"></span></td>        
        </tr>

        <tr>
          <th scope="row">8.</th>
          <td colspan="4">Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim</td>
          <td colspan="4">{{isset($user->mutual_credit_details) ? $user->mutual_credit_details : ''}}<span class="mutial_credit_append"></span></td>     
        </tr>


          <tr>
          <tr><th  rowspan='4'>9.</th><td  rowspan='4'> Details of the bank account to which the amount of the claim or any part thereof can be transferred pursuant to a resolution plan</td></tr>
          <tr><td colspan="4">{{isset($user->account_no) ? $user->account_no : ''}}<span class="account_number_append"></span></td></tr>
          <tr><td colspan="4">{{isset($user->bank_name) ? $user->bank_name : ''}}<span class="bank_name_append"></span></td></tr>
          <tr><td colspan="4">{{isset($user->ifsc_code) ? $user->ifsc_code : ''}}<span class="ifsc_append"></span></td></tr>
          </tr>       

      </tbody>
    </table>
    </div>


              <div class="row border mb-3 p-2">
                <h6>Signature of financial creditor or person authorised to act on his behalf [ Please enclose the authority if this is being submitted on behalf of an operational creditor ]</h6>
               
           <div>

                <span class="pull-right">
                  @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
              <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75">
              @endif @endif
              
              <br>( Signature of the claimant )</span>
            </div>
            
                
              </div>

              <div class="row border mb-3 p-2">
              <div class="col-md-4 my-2">
                <h6>Name in BLOCK LETTERS</h6>

               <span class="block_letter_append">{{isset($user->name_in_block_letter) ? $user->name_in_block_letter : ''}}</span>


                
              </div>

              <div class="col-md-4 my-2">
                <h6>Position with or in relation to creditor</h6>

                <span class="relation_creditor_append">{{isset($user->relation_to_creditor) ? $user->relation_to_creditor : ''}}</span>

          
                
              </div>

              <div class="col-md-4 my-2">
                <h6>Address of person signing</h6>

                <span class="person_signing_append">{{isset($user->address_person_signing) ? $user->address_person_signing : ''}}</span>

          
                
              </div>
              </div>



<!-- declaration part -->


             <div class="row border  mb-3 p-2">
              
              <div class="form-group">
                <label> LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</label><br><br>
                    

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="work_purchase_order" autocomplete="off" disabled @if(isset($user->work_purchase_order)) @if($user->work_purchase_order=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Work order/ Purchase order</label></div>
                    </div>
                    <div class="col-md-6">
                      @if(isset($user->work_purchase_order))
                      @if($user->work_purchase_order=='on')  
                      
                      @if(isset($user->work_purchase_order_file))
                      @if($user->work_purchase_order_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file) }}" target="_blank">{{ $user->work_purchase_order_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
                    </div>
                    </div>
                    

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invoices" autocomplete="off" disabled @if(isset($user->invoices)) @if($user->invoices=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Invoices</label></div>
                    </div>
                    <div class="col-md-6">
                      @if(isset($user->invoices))
                      @if($user->invoices=='on')  
                      
                      @if(isset($user->invoices_file))
                      @if($user->invoices_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->invoices_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->invoices_file) }}" target="_blank">{{ $user->invoices_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
                    </div>
                    </div>


                    

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="balance_confirmation" autocomplete="off" disabled @if(isset($user->balance_confirmation)) @if($user->balance_confirmation=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Balance Confirmation</label></div>
                    </div>
                    <div class="col-md-6">
                      @if(isset($user->balance_confirmation))
                      @if($user->balance_confirmation=='on')  
                      
                      @if(isset($user->balance_confirmation_file))
                      @if($user->balance_confirmation_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file) }}" target="_blank">{{ $user->balance_confirmation_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="any_correspondence" autocomplete="off" disabled @if(isset($user->any_correspondence)) @if($user->any_correspondence=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Any correspondence etc</label></div>
                    </div>
                    <div class="col-md-6">
                      @if(isset($user->any_correspondence))
                      @if($user->any_correspondence=='on')  
                      
                      @if(isset($user->any_correspondence_file))
                      @if($user->any_correspondence_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->any_correspondence_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->any_correspondence_file) }}" target="_blank">{{ $user->any_correspondence_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="authorisation_letter" autocomplete="off" disabled @if(isset($user->authorisation_letter)) @if($user->authorisation_letter=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Authorisation letter</label></div>
                    </div>
                    <div class="col-md-6">
                      @if(isset($user->authorisation_letter))
                      @if($user->authorisation_letter=='on')  
                      
                      @if(isset($user->authorisation_letter_file))
                      @if($user->authorisation_letter_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file) }}" target="_blank">{{ $user->authorisation_letter_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="work_purchase_order" autocomplete="off" disabled @if(isset($user->bank_statement)) @if($user->bank_statement=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Bank Statement</label></div>
                    </div>
                    <div class="col-md-6">
                      @if(isset($user->bank_statement))
                      @if($user->bank_statement=='on')  
                      
                      @if(isset($user->bank_statement_file))
                      @if($user->bank_statement_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->bank_statement_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->bank_statement_file) }}" target="_blank">{{ $user->bank_statement_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="ledger_copy" autocomplete="off" disabled @if(isset($user->ledger_copy)) @if($user->ledger_copy=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Copy of ledger</label></div>
                    </div>
                    <div class="col-md-6">
                      @if(isset($user->ledger_copy))
                      @if($user->ledger_copy=='on')  
                      
                      @if(isset($user->ledger_copy_file))
                      @if($user->ledger_copy_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->ledger_copy_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->ledger_copy_file) }}" target="_blank">{{ $user->ledger_copy_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="computation_sheet" autocomplete="off" disabled @if(isset($user->computation_sheet)) @if($user->computation_sheet=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Computation sheet</label></div>
                    </div>
                    <div class="col-md-6">
                      @if(isset($user->computation_sheet))
                      @if($user->computation_sheet=='on')  
                      
                      @if(isset($user->computation_sheet_file))
                      @if($user->computation_sheet_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->computation_sheet_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->computation_sheet_file) }}" target="_blank">{{ $user->computation_sheet_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
                    </div>
                    </div>
                 
                  </div>


                @if(isset($user->pan_number_file) && $user->pan_number_file != '')  
                <div class="form-group">
                <label>PAN number</label>
                <p>
                      @if($user->pan_number_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->pan_number_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->pan_number_file) }}" target="_blank">{{ $user->pan_number_file }}</a>

                      @endif
                      
                </p></div> 
                @endif

                @if(isset($user->passport_file) && $user->passport_file != '')
                <div class="form-group">
                <label>Passport</label>
                <p>
                  
                      @if($user->passport_file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->passport_file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->passport_file) }}" target="_blank">{{ $user->passport_file }}</a>

                      @endif
                      
                    </p></div> 
                    @endif

                @if(isset($user->aadhar_card) && $user->aadhar_card != '')    
                <div class="form-group">
                <label>AADHAR Card</label>
                <p>
                      @if($user->aadhar_card != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->aadhar_card))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->aadhar_card) }}" target="_blank">{{ $user->aadhar_card }}</a>

                      @endif
                      
                    </p>
                  </div> 
                  @endif

              @if(count($other_files)>0)      

              <p>Other Important Documents</p>

              <table id="myTable">
                @forelse($other_files as $fl)
                <tr>
                     <td class="col-md-8"><input type='text' value="{{$fl->document_name}}" readonly placeholder='enter document name'></td>
                  <td>
                    @if(isset($fl->file))
                      @if($fl->file != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$fl->file))

                      <a href="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$fl->file) }}" target="_blank">{{ $fl->file }}</a>

                      @endif
                      @endif
                  </td>
                  
                </tr>
                @empty
                @endforelse
              </table>

              @endif
              <br>
              <br><br>
              
              <h2 class="text-center">DECLARATION</h2>
              
              <h6>I {{!empty($user->name_in_block_letter) ? $user->name_in_block_letter : $cat->name}}, currently residing at {{isset($user->address_person_signing) ? $user->address : $cat->address}}, hereby declare and state as follows:- </h6><br>

              <span class="mb-3">1. {{!empty($comp->name) ? ucwords($comp->name) : ''}}, the corporate debtor was, at the insolvency commencement date, being the {{dateFm3($user->insolvency_commencement_date)}}, actually indebted to me in the sum of Rs. {{ isset($user->total_amount) ? $user->total_amount : '' }}.</span><br><br>

              <span>2. In respect of my claim of the said sum or any part thereof, I have relied on the documents specified below: [Please list the documents relied on as evidence of claim].</span><br><br>

              <span>
              @if(count($senctions) > 0)
              <br>
              <table id="sanctionAmtTbl">
                <tr>  
                <td style="padding-right:30px;">
                    <label>Date</label>
                   
                <td style="padding-right:30px;">
                     <label>Sanction Amount and facility (Amt in lakh)</label> 
              </td> 
                
                </tr>

               @foreach($senctions as $fl)

                 <tr id="row{{$loop->index+1}}">  
                <td style="padding-right:30px;">
                    <!-- <label>Date</label><br> -->
                    <input type="text" placeholder="enter date" value="{{$fl->date}}" autocomplete="off" readonly></td>
               
                <td style="padding-right:30px;">
                    <!--  <label>Sanction Amount and facility (Amt in lakh)</label><br>  -->
                    <textarea placeholder="enter details"  value="{{$fl->senction_amt}}" style="width:600px;" readonly>{{$fl->senction_amt}}</textarea>
            
              </td> 
                
                </tr>

                @endforeach
              </table>
                <br>
                @endif
                </span>


              <span>3. The said documents are true, valid and genuine to the best of my knowledge, information and belief and no material facts have been concealed therefrom. </span><br><br>

              <span>4. In respect of the said sum or any part thereof, neither I, nor any person, by my order, to my knowledge or belief, for my use, had or received any manner of satisfaction or security whatsoever, save and except the following:</span><br>

              <span class="text-danger"><i>[Please state details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim]. – To be copied from S. No. 8</i></span><br><br>

               <span>
              @if(count($declarationMdls) > 0)
              <br>
              <table id="sanctionAmtTbl">
                <tr>  
                <td style="padding-right:30px;">
                    <label>Date</label>
               
                <td style="padding-right:30px;">
                     <label>Details</label><br> 
                </td> 
                
                </tr>
               @foreach($declarationMdls as $dl)

                 <tr id="row{{$loop->index+1}}">  
                <td style="padding-right:30px;">
                <!--     <label>Date</label><br> -->
                    <input type="text" placeholder="enter date" value="{{$dl->date}}" autocomplete="off" readonly></td>
               
                <td style="padding-right:30px;">
                     <!-- <label>Sanction Amount and facility (Amt in lakh)</label><br> --> 
                    <textarea placeholder="enter details"  value="{{$dl->senction_amt}}" style="width:600px;" readonly>{{$dl->senction_amt}}</textarea>
              
              </td> 
                
                </tr>

                @endforeach
              </table>
                <br>
                @endif
                </span>

              
              <span>I undertake to update my claim as and when the claim is satisfied, partly or fully, from any source in any manner, after the insolvency commencement date.  </span><br><br>

              <span>{{$user->select_option == 1 ? 'I am' : 'I am not'}} a related party of the corporate debtor, as defined under section 5 (24) of the Code.</span><br><br>

              <span>I am eligible to join committee of creditors by virtue of proviso to section 21 (2) of the Code even though I am a related party of the corporate debtor.</span><br><br>

           

              
              <div class="col-md-6 my-2">
              <label>Date: @if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</label>
              <div style="display: flex;">

                     <label>Place: {{isset($user->place) ? $user->place : ''}}</label>                     
              </div>
              </div><br><br>

              <div>

                <span class="pull-right" style="float: right;">
                  @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
              <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75">
              @endif @endif
              
              <br>( Signature of the claimant )</span>
            </div>
             

              <br><br>       <br>


              <h3 class="text-center">VERIFICATION</h3><br>


              <p>I {{!empty($user->name_in_block_letter) ? $user->name_in_block_letter : $cat->name}}, the {{!empty($user->relation_to_creditor) ? $user->relation_to_creditor : ''}} hereinabove, do hereby verify that the contents of his proof of claim are true and correct to my Knowledge and belief and no material fact has been concealed therefrom.</p><br>

              <div>

              <h5>Varified at @if(isset($user)) {{ ($user->submitted == 1) ? getDat($user->date) : date("d")}} @else {{date("d")}} @endif @if(isset($user)) {{ ($user->submitted == 1) ? getMonth($user->date) : date("M")}} @else {{date("M")}} @endif @if(isset($user)) {{ ($user->submitted == 1) ? getYear($user->date) : date("Y")}} @else {{date("Y")}} @endif</h5>


              <span class="pull-right" style="float: right;">
                <!-- <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="Girl in a jacket" width="150" height="150"> -->
                @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
              @endif @endif

                <br>( Signature of the claimant )
              </span>

              </div>

              <p>[Note: In the case of company or limited liability pertnership, the declaration and verification shall be made by the director/manager/secretary and in the case of other entities, an officer authorised for the purpose by the entity ].</p>     
              
              <div style="text-align: center;">
                @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formD/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
              @endif @endif
              </div>

            </div>

           
             
     