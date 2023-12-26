  

   <h2 class="text-center">FORM B <br> PREVIEW <!--{{Session::has('new_form_id') ? Session::get('new_form_id') : ''}}--></h1>

  <center><h5 class="text-center text-uppercase" style="color: #e0363c;" >PROOF OF CLAIM BY OPERATIONAL EXCEPT WORKMEN AND EMPLOYEES</h5></center><br>
              <h6 class="text-center">(Under Regulation 7 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corpotate Persons) Regulations, 2016)</h5>
              <h4 style="float: right;">@if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h4>


 <div class="row">
            <h4>From</h4>
            <p>
              <span id="operational_creditor_name_2">{{isset($user->operational_creditor_name) ? $user->operational_creditor_name : $cat->name}} <br>{{isset($user->operational_creditor_address) ? $user->operational_creditor_address : ''}}</span> 
              </p>
              <h4>To</h4>

              <p>The Interim Resolution / Resolution Professional <br> {{$ip->username}}<br> {{$ip->address}}</p>


              
              <!-- <p>[Name and address of the operational creditor]</p> -->

              <h4><b>Subject:</b> Submission of the claim.</h4><br>


              <h4>Madam/Sir</h4>

              <p class="text-dark">I <span id="operational_creditor_name_2">{{isset($user->operational_creditor_name) ? $user->operational_creditor_name : ''}}</span>, hereby submits this proof of claim in respect of the corporate insolvency resolution process in the case of {{isset($comp->name) ? ucwords($comp->name) : '' }}. The details for the same are set our below.</p>
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
          <td colspan="4"> NAME OF OPERATIONAL CREDITOR</td>
          <td colspan="4"><span id="operational_creditor_name_2">{{isset($user->operational_creditor_name) ? $user->operational_creditor_name : $cat->name}} </span></td>
         
        </tr>
        <tr>
          <th scope="row">2</th>
          <td colspan="4"> IDENTIFICATION NUMBER OF OPERATIONAL CREDITOR <br> (IF AN INCORPORATE BODY PROVIDE OF INCORPORATION. IF A PARTNERSHIP OR INDIVIDUAL PROVIDE IDENTIFICATION RECORDS* OF ALL THE PARTNERS OR THE INDIVIDUAL)</td>
          <td colspan="4"><span id="identification_number">{{isset($user->identification_number) ? $user->identification_number : ''}}</span></td>
          
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="4">a. ADDRESS OF OPERATIONAL CREDITOR FOR CORRESPONDENCE</td>
          <td colspan="4"><span id="operational_creditor_correspondence_address">{{isset($user->operational_creditor_address) ? $user->operational_creditor_address : ''}}</span></td>

          <tr><th scope="row"></th>
            <td colspan="4">b. Email Address</td>
            <td colspan="4"><span id="operational_creditor_email">{{isset($user->operational_creditor_email) ? $user->operational_creditor_email : $cat->email}}</span></td></tr> 
        </tr>


          <tr>
          <tr><th  rowspan='4'>4</th><td  rowspan='4'>TOTAL AMOUNT OF CLAIM <br> ( INCLUDING ANY INTEREST AS AT THE INSOLVENCY COMMENTMENT DATE ) </td></tr>
          
          <tr><td colspan="4"><span id="principle_amount">{{isset($user->principle_amount) ? $user->principle_amount : ''}}</span></td></tr>
          <tr><td colspan="4"><span id="interest">{{isset($user->interest) ? $user->interest : ''}}</span></td></tr>
          <tr><td colspan="4"><span id="total_amount">{{isset($user->total_amount) ? $user->total_amount : ''}}</span></td></tr>
          </tr>

        <tr>
          <th scope="row">5</th>
          <td colspan="4"> DETAILS OF DOCUMENTS BY REFERENCES TO WHICH CAN BE SUBSTANIATED.</td>
          <td colspan="4"><span id="document_details">{{isset($user->document_details) ? $user->document_details : ''}}</span></td>
         
        </tr>

        <tr>
          <th scope="row">6</th>
          <td colspan="4"> DETAILS OF ANY DISPUTE AS WELL AS THE RECORD OF PENDENCY OR ORDER OF SUIT OR ARBITRATION PROCEEDINGS</td>
          <td colspan="4"><span id="any_dispute_deatails">{{isset($user->any_dispute_deatails) ? $user->any_dispute_deatails : ''}}</span></td>
        </tr>

        <tr>
          <th scope="row">7</th>
          <td colspan="4"> DETAILS OF HOW AND WHEN DEBT INCURRED</td>
          <td colspan="4"><span id="debt_incurred_details">{{isset($user->debt_incurred_details) ? $user->debt_incurred_details : ''}}</span></td>
         
        </tr>

        <tr>
          <th scope="row">8</th>
          <td colspan="4"> DETAILS OF ANY MUTUAL CREDIT, MUTUAL DEBTS, OR OTHER MUTUAL DEALINGS BETWEEN THE CORPORATE DEBTOR AND THE CREDITOR WHICH MAY BE SET-OFF AGAINST THE CLAIM </td>
          <td colspan="4"><span id="any_mutual_details"> {{isset($user->any_mutual_details) ? $user->any_mutual_details : ''}}</span></td>
         
        </tr>

        <tr>
          <th scope="row">9</th>
          <td colspan="4"> DETAILS OF: <br> a. any security held, the value of security and its date, or <br>b. any relation of the title arrangement in respect of goods or properties to which the claim refers</td>
          <td colspan="4"><span id="any_security_details">{{isset($user->any_security_details) ? $user->any_security_details : ''}}</span></td>
        
<!--           <tr>
            <th scope="row"></th>
          <td colspan="4"> b. any relation of the title arrangement in respect of goods or properties to which the claim refers </td>
          <td colspan="4">[Details example]</td>
          </tr> -->
         
        </tr>





          <tr>
          <tr><th  rowspan='4'>10.</th><td  rowspan='4'> DETAILS OF THE BANK ACCOUNT TO WHICH THE AMOUNT OF THE CLAIM OR ANY PART THEREOF CAN BE TRANSFERRED PURSUANT TO A RESOLUTION PLAN</td></tr>
          <tr><td colspan="4"><span id="account_number">{{isset($user->account_number) ? $user->account_number : ''}}</span></td></tr>
          <tr><td colspan="4"><span id="bank_name">{{isset($user->bank_name) ? $user->bank_name : ''}}</span></td></tr>
          <tr><td colspan="4"><span id="ifsc_code">{{isset($user->ifsc_code) ? $user->ifsc_code : ''}}</span></td></tr>
          </tr>


      </tbody>
    </table>
    </div>

            <div class="row border mb-3 p-2">
                <h6>Signature of financial creditor or person authorised to act on his behalf [ Please enclose the authority if this is being submitted on behalf of an operational creditor ]</h6>
               

                <span>
                  @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
              @endif @endif
                </span>

            
                
              </div>

              <div class="row border mb-3 p-2">
              <div class="col-md-4 my-2">
                <h6>Name in BLOCK LETTERS</h6>

                <span><span id="signing_person_name_2">{{isset($user->claimant_name) ? strtoupper($user->claimant_name) : $cat->name}} </span></span>               
              </div>

              <div class="col-md-4 my-2">
                <h6>Position with or in relation to creditor</h6>

                <span><span id="creditor_relation">{{isset($user->creditor_relation) ? $user->creditor_relation : ''}}</span></span>

              </div>

              <div class="col-md-4 my-2">
                <h6>Address of person signing</h6>

                <span><span id="signing_person_address">{{isset($user->signing_person_address) ? $user->signing_person_address : $user->operational_creditor_address}}</span></span>

          
                
              </div>
              </div>

              <div class=" row border  mb-3 p-2">
              
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
                      @if($user->work_purchase_order_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file) }}" target="_blank">{{ $user->work_purchase_order_file }}</a>

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
                      @if($user->invoices_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->invoices_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->invoices_file) }}" target="_blank">{{ $user->invoices_file }}</a>

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
                      @if($user->balance_confirmation_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file) }}" target="_blank">{{ $user->balance_confirmation_file }}</a>

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
                      @if($user->any_correspondence_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->any_correspondence_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->any_correspondence_file) }}" target="_blank">{{ $user->any_correspondence_file }}</a>

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
                      @if($user->authorisation_letter_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file) }}" target="_blank">{{ $user->authorisation_letter_file }}</a>

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
                      @if($user->bank_statement_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->bank_statement_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->bank_statement_file) }}" target="_blank">{{ $user->bank_statement_file }}</a>

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
                      @if($user->ledger_copy_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->ledger_copy_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->ledger_copy_file) }}" target="_blank">{{ $user->ledger_copy_file }}</a>

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
                      @if($user->computation_sheet_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->computation_sheet_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->computation_sheet_file) }}" target="_blank">{{ $user->computation_sheet_file }}</a>

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
                      
                      
                      @if($user->pan_number_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->pan_number_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->pan_number_file) }}" target="_blank">{{ $user->pan_number_file }}</a>

                      @endif
                      
                </p></div> 
                @endif

                @if(isset($user->passport_file) && $user->passport_file != '')
                <div class="form-group">
                <label>Passport</label>
                <p>
                  
                      @if($user->passport_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->passport_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->passport_file) }}" target="_blank">{{ $user->passport_file }}</a>

                      @endif
                      
                    </p></div> 
                    @endif

                @if(isset($user->aadhar_card) && $user->aadhar_card != '')    
                <div class="form-group">
                <label>AADHAR Card</label>
                <p>
                      @if($user->aadhar_card != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->aadhar_card))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->aadhar_card) }}" target="_blank">{{ $user->aadhar_card }}</a>

                      @endif
                      
                    </p>
                  </div> 
                  @endif

                @if(count($other_files)>0)      

              <p>Other Important Documents</p>

              <table id="myTable">
                @forelse($other_files as $fl)
                <!--  @if(isset($fl->file))
                      @if($fl->file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$fl->file)) -->
                <tr>
                     <td class="col-md-8"><input type='text' value="{{$fl->document_name}}" readonly placeholder='enter document name'></td>
                  <td>
                   

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$fl->file) }}" target="_blank">{{ $fl->file }}</a>

                      
                  </td>
                  
                </tr>
             <!--    @endif
                      @endif -->
                @empty
                @endforelse
              </table>

              @endif
              <br>  


              <h1 class="text-center">DECLARATION</h1><br><br>           
              <h6>I,<span id="operational_creditor_name_2">{{isset($user->claimant_name) ? " ".$user->claimant_name : " ".$cat->name}}</span> currently residing at <span id="operational_creditor_address_2">{{isset($user->signing_person_address) ? $user->signing_person_address : ''}}</span> , hereby declare and state as follows:- </h6><br>

              <span class="mb-3">1. {{isset($comp->name) ? ucwords($comp->name) : '' }}, the corporate debtor was, at the insolvency commencement date, being the {{dateFm3($user->insolvency_commencement_date)}}, actually indebted to me in the sum of Rs. {{$user->total_amount}}.</span><br><br>

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

           
              <br><nbr>

              <label>Date: @if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</label>  <br>    
              <div style="display: flex;">

                     <label>Place: {{isset($user->place) ? $user->place : ''}}</label>                     
              </div>



              <br><br>

              <div>

                <span class="pull-right" style="float: right;">
                  @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
              <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75">
              @endif @endif
              
              <br>( Signature of the claimant )</span>
            </div>

              <br><br>       


              <h2 class="text-center">VERIFICATION</h2><br>


              <p>I<span id="operational_creditor_name_2">{{isset($user->claimant_name) ? " ".$user->claimant_name : " ".$cat->name}}, </span> the {{!empty($user->creditor_relation) ? $user->creditor_relation : ''}} hereinabove, do hereby verify that the contents of his proof of claim are true and correct to my Knowledge and belief and no material fact has been concealed therefrom.</p><br>

              <div>

              <h5>Varified at .. on this @if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h5>
              @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formB/signature/'.$user->operational_creditor_signature))
              <span id="user_signature_hide"><img class="profile-pic-user" src="{{ asset('public/access/media/forms/formB/signature/'.$user->operational_creditor_signature) }}" width="75" height="75" style="float: right;"></span>
              @endif @endif

              <div>

                <span class="pull-right" style="float: right;">
                  @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
              <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75">
              @endif @endif
              
              <br>( Signature of the claimant )</span>
            </div>
              <br><br><br>
              </div>

              <p>[Note: In the case of company or limited liability pertnership, the declaration and verification shall be made by the director/manager/secretary and in the case of other entities, an officer authorised for the purpose by the entity ].</p>     
              
              <br>

              <div style="text-align: center;">
                @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
              <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75">
              @endif @endif
              </div>

              <br>

              </div>  