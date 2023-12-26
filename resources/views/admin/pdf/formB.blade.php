<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <Style>
        table, th, td {
  border: 1px solid;
  padding:2px;
}
th {
  padding: 5px;
  text-align: left;
}
    </Style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">FORM B</h3>
            <h6 class="text-center">PROOF OF CLAIM BY OPERATIONAL EXCEPT WORKMEN AND EMPLOYEES</h6>
        </div>
        <div class="row">
            <h6 class="fw-bold">(Under Regulation 7 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corpotate Persons) Regulations, 2016)</h6>
        </div>
        
        <div class="row mt-4">
            <div class="d-flex justify-content-between">
            <p class="float-start">From</p> <p class="float-end">@if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</p>
            </div>
        </div>
        
        <div class="clearfix"></div>
       
         <div class="row">

            <p>{{isset($user->operational_creditor_name) ? $user->operational_creditor_name : $cat->name}}
                <br>
                {{isset($user->operational_creditor_address) ? $user->operational_creditor_address : ''}}</p>

               <h6>To</h6>
                              <p>The Interim Resolution / Resolution Professional <br> 
                {{ucwords($ip->username)}}<br>
                 {{$ip->address}}</p>              

              <p>Subject: Submission of the claim.</p>
                                         
                     
             <!-- <span>aakash sighaniya, kamla puri</span>
              <p class="mt-0">Subject: Submission of the claim.</p>-->
          </div>
          
           <div class="row">
               <h6>Madam/Sir</h6>
              <p>I {{isset($user->operational_creditor_name) ? $user->operational_creditor_name : ''}}, hereby submits this proof of claim in respect of the corporate insolvency resolution process in
the case of {{isset($comp->name) ? ucwords($comp->name) : '' }}. The details for the same are set our below.</p>
          </div>
          
            <div class="row">
               <h6 style="font-size:14px;">1. NAME OF OPERATIONAL CREDITOR </h6>
              <p>{{isset($user->operational_creditor_name) ? $user->operational_creditor_name : $cat->name}} </p>
             </div>
             
              <div class="row">
               <h6 style="font-size:14px;">2. IDENTIFICATION NUMBER OF OPERATIONAL CREDITOR <span>(IF AN INCORPORATE BODY PROVIDE OF INCORPORATION. IF A PARTNERSHIP OR INDIVIDUAL PROVIDE IDENTIFICATION RECORDS* OF ALL THE PARTNERS OR THE INDIVIDUAL)</span></h6>
              <p>{{isset($user->identification_number) ? $user->identification_number : ''}}</p>
             </div>
          
             <div class="row">
               <h6 style="font-size:14px;">3.   a. ADDRESS OF OPERATIONAL CREDITOR FOR CORRESPONDENCE</h6>
              <p>{{isset($user->operational_creditor_address) ? $user->operational_creditor_address : ''}}</p>
             </div>
             
              <div class="row">
               <h6 style="font-size:14px;">b. Email Address   </h6>
              <p>{{isset($user->operational_creditor_email) ? $user->operational_creditor_email : $cat->email}}</p>
             </div>
             
             <div class="row">
               <h6 style="font-size:14px;">4.TOTAL AMOUNT OF CLAIM  <br><span> INCLUDING ANY INTEREST AS AT THE INSOLVENCY COMMENTMENT DATE )</span> </h6>
                
                <!--  <div class="d-flex justify-content-evenly"> <span class="text-start ">dineshkumar@jigsaw.edu.in</span>  <span class="text-center ms-5">dineshkumar@jigsaw.edu.in</span>  <span class="text-end ms-5">dineshkumar@jigsaw.edu.in</span></div>-->
              <table class="table">
                <tr>
                  <th>Principle</th>
                         <th>Interest</th>
                          <th>Total Amount</th>
                </tr>
                      <tr>
                         <td>{{isset($user->principle_amount) ? $user->principle_amount : ''}}</td>
                         <td>{{isset($user->interest) ? $user->interest : ''}}</td>
                          <td>{{isset($user->total_amount) ? $user->total_amount : ''}}</td>
                     </tr>
                     </table>
              </div>
              
              <div class="row mt-2">
               <h6 style="font-size:14px;"> 5. DETAILS OF DOCUMENTS BY REFERENCES TO WHICH CAN BE SUBSTANIATED. </h6>
              <p>{{isset($user->document_details) ? $user->document_details : ''}}</p>
             </div>
             
               <div class="row">
               <h6 style="font-size:14px;">6.  DETAILS OF ANY DISPUTE AS WELL AS THE RECORD OF PENDENCY OR ORDER OF SUIT OR ARBITRATION PROCEEDINGS</h6>
              <p>{{isset($user->any_dispute_deatails) ? $user->any_dispute_deatails : ''}}</p>
             </div>
             
              <div class="row">
               <h6 style="font-size:14px;">7. DETAILS OF HOW AND WHEN DEBT INCURRED</h6>
              <p>{{isset($user->debt_incurred_details) ? $user->debt_incurred_details : ''}}</p>
             </div>
             
              <div class="row">
               <h6 style="font-size:14px;">8. DETAILS OF ANY MUTUAL CREDIT, MUTUAL DEBTS, OR OTHER MUTUAL DEALINGS BETWEEN THE CORPORATE DEBTOR AND THE CREDITOR WHICH MAY BE SET-OFF AGAINST THE CLAIM</h6>
              <p>{{isset($user->any_mutual_details) ? $user->any_mutual_details : ''}}</p>
             </div>
             
             <div class="row">
               <h6 style="font-size:14px;">9. DETAILS OF:</h6>
              <p>a. any security held, the value of security and its date, or<br>
              b. any relation of the title arrangement in respect of goods or properties to which the claim refers </p>
              <p>{{isset($user->any_security_details) ? $user->any_security_details : ''}}</p>
             </div>
             
              <div class="row">
               <h6 style="font-size:14px;">10. DETAILS OF THE BANK ACCOUNT TO WHICH THE AMOUNT OF THE CLAIM OR ANY PART THEREOF CAN BE TRANSFERRED PURSUANT TO A RESOLUTION PLAN </h6>
             
           <!--  <div class="d-flex justify-content-evenly"> <span class="text-start ">dineshkumar@jigsaw.edu.in</span>  <span class="text-center ms-5">city bank</span>  <span class="text-end ms-5">shusfgbghjkigt</span></div>-->
               <table class="table">
                <tr>
                  <th>Account Number</th>
                  <th>Bank Name</th>
                  <th>IFSC Code</th>
                </tr>
                      <tr>
                         <td>{{isset($user->account_number) ? $user->account_number : ''}}</td>
                         <td>{{isset($user->bank_name) ? $user->bank_name : ''}}</td>
                          <td>{{isset($user->ifsc_code) ? $user->ifsc_code : ''}}</td>
                     </tr>
                     </table>
             
              </div>
        </div>
        
        <div class="container-fluid my-4 border border-dark p-2">
            <div class="row">
                <p class="fw-bold">Signature of financial creditor or person authorised to act on his behalf [ Please enclose the
authority if this is being submitted on behalf of an operational creditor ]
</p>
<p class="text-end">@if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
              @endif @endif</p>
            </div>
        </div>
        
          <div class="container-fluid my-4 border border-dark p-2">
            <div class="row">
                <h6 style="font-size:14px;">{{isset($user->claimant_name) ? strtoupper($user->claimant_name) : $cat->name}} </h6>
                <p class="fw-bold" style="margin-bottom:0px;">Position with or in relation to creditor</p>
                <span class="">{{isset($user->creditor_relation) ? $user->creditor_relation : ''}}</span>
<br>
<p class="fw-bold"style="margin-bottom:0px;">Address of person signing</p>
<span class="">{{isset($user->signing_person_address) ? $user->signing_person_address : ''}}</span>
            </div>
            
        </div>
        
        
         <div class="container-fluid my-4 ">
            <div class="row">
             <p>LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</p>
            
            </div>
        </div>
        
         <div class="container-fluid my-4 ">
            <div class="row">
                <div class="col-md-6">
            <table class="table">
       @if(isset($user->work_purchase_order)) @if($user->work_purchase_order=='on')
       <tr>
      <th style="width:300px;">Work order/ Purchase order</th>
      <td>
        @if(isset($user->work_purchase_order))
                      @if($user->work_purchase_order=='on')  
                      
                      @if(isset($user->work_purchase_order_file))
                      @if($user->work_purchase_order_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file) }}" target="_blank">{{ $user->work_purchase_order_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
         

      </td>
      </tr>
      @endif @endif
        
        @if(isset($user->invoices)) @if($user->invoices=='on')
        <tr>
      <th style="width:300px;">Invoice</th>
      <td>
          @if(isset($user->invoices))
                      @if($user->invoices=='on')  
                      
                      @if(isset($user->invoices_file))
                      @if($user->invoices_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->invoices_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->invoices_file) }}" target="_blank">{{ $user->invoices_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif
      </td>
      </tr>
      @endif
      @endif
      
      @if(isset($user->balance_confirmation)) @if($user->balance_confirmation=='on')
        <tr>
      <th style="width:300px;">Balance Confirmation</th>
      <td> @if(isset($user->balance_confirmation))
                      @if($user->balance_confirmation=='on')  
                      
                      @if(isset($user->balance_confirmation_file))
                      @if($user->balance_confirmation_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file) }}" target="_blank">{{ $user->balance_confirmation_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif</td>
      </tr>
      @endif
      @endif

      @if(isset($user->any_correspondence)) @if($user->any_correspondence=='on')
        <tr>
      <th style="width:300px;">Any correspondence etc</th>
      <td>@if(isset($user->any_correspondence))
                      @if($user->any_correspondence=='on')  
                      
                      @if(isset($user->any_correspondence_file))
                      @if($user->any_correspondence_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->any_correspondence_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->any_correspondence_file) }}" target="_blank">{{ $user->any_correspondence_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif</td>
      </tr>
        @endif @endif

        @if(isset($user->authorisation_letter)) @if($user->authorisation_letter=='on')
          <tr>
      <th style="width:300px;">Authorisation letter</th>
      <td>@if(isset($user->authorisation_letter))
                      @if($user->authorisation_letter=='on')  
                      
                      @if(isset($user->authorisation_letter_file))
                      @if($user->authorisation_letter_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file) }}" target="_blank">{{ $user->authorisation_letter_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif</td>
      </tr>
       @endif @endif 

       @if(isset($user->bank_statement)) @if($user->bank_statement=='on')
        <tr>
      <th style="width:300px;">Bank Statement</th>
      <td>@if(isset($user->bank_statement))
                      @if($user->bank_statement=='on')  
                      
                      @if(isset($user->bank_statement_file))
                      @if($user->bank_statement_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->bank_statement_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->bank_statement_file) }}" target="_blank">{{ $user->bank_statement_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif</td>
      </tr>
       @endif @endif  

       @if(isset($user->ledger_copy)) @if($user->ledger_copy=='on')
        <tr>
      <th style="width:300px;">Copy of ledger</th>
      <td>@if(isset($user->ledger_copy))
                      @if($user->ledger_copy=='on')  
                      
                      @if(isset($user->ledger_copy_file))
                      @if($user->ledger_copy_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->ledger_copy_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->ledger_copy_file) }}" target="_blank">{{ $user->ledger_copy_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif</td>
      </tr>
      @endif @endif
          
        @if(isset($user->computation_sheet)) @if($user->computation_sheet=='on')
          <tr>
      <th style="width:300px;">Computation sheet</th>
      <td>@if(isset($user->computation_sheet))
                      @if($user->computation_sheet=='on')  
                      
                      @if(isset($user->computation_sheet_file))
                      @if($user->computation_sheet_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->computation_sheet_file))

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->computation_sheet_file) }}" target="_blank">{{ $user->computation_sheet_file }}</a>

                      @endif
                      @endif

                      @endif
                      @endif</td>
      </tr>
      @endif @endif
      
      @if(isset($user->pan_number_file))
      @if($user->pan_number_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->pan_number_file))
         <tr>
      <th style="width:300px;">PAN Number</th>
      <td> 
                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->pan_number_file) }}" target="_blank">{{ $user->pan_number_file }}</a>

                      </td>
      </tr>
      @endif
      @endif
      
      @if(isset($user->passport_file))
                      @if($user->passport_file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->passport_file))
           <tr>
      <th style="width:300px;">Passport</th>
      <td>

                      <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->passport_file) }}" target="_blank">{{ $user->passport_file }}</a>

                      </td>
      </tr>
      @endif
      @endif

      
      @if(isset($user->aadhar_card))
                        @if($user->aadhar_card != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->aadhar_card))

         <tr>
      <th style="width:300px;">AADHAR Card</th>
      <td>
                        <a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->aadhar_card) }}" target="_blank">{{ $user->aadhar_card }}</a>
              </td>
      </tr>
      @endif
      @endif
      
</table>

</div>
            </div>
        </div>
        
        
                <div class="container-fluid my-4 ">
                 <div class="row">
                <div class="col-md-6">
                   @if(count($other_files)>0)      

              <p>Other Important Documents</p>
                       <table class="table">
                         @forelse($other_files as $fl)
                 @if(isset($fl->file))
                      @if($fl->file != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$fl->file))
                      <tr>
                         <th style="width:300px;">{{$fl->document_name}}</th>
                         <td><a href="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$fl->file) }}" target="_blank">{{ $fl->file }}</a></td>
                     </tr>
                      
                      @endif
                      @endif
                      @empty
                      @endforelse
                       
                    </table>
                    @endif
                    </div>
                    </div>
                    </div>
                    

                    <div class="container-fluid my-4 ">
            <div class="row">
                <h3 class="text-center">DECLARATION </h3>
                <h6>I {{!empty($user->claimant_name) ? ucwords($user->claimant_name) : ucwords($cat->name)}}, currently residing at {{isset($user->signing_person_address) ? $user->signing_person_address : ''}}, do hereby declare and state as follows: - </h6><br>

              <span>1. {{!empty($comp->name) ? ucwords($comp->name) : ''}}, the corporate debtor was, at the insolvency commencement date, being the {{dateFm3($user->insolvency_commencement_date)}} actually indebted to me for a sum of Rs. {{ isset($user->total_amount) ? $user->total_amount : '' }}.</span><br><br>

              <span>2. In respect of my claim of the said sum or any part thereof, I have relied on the documents specified below: [Please list the documents relied on as evidence of claim].</span><br><br>


              @if(count($senctions)>0)
              <table>  
                <tr>  
                <td style="padding-right:30px;">
                    <label>Date</label></td>

                <td style="padding-right:30px;">
                     <label>Sanction Amount and facility (Amt in lakh)</label><br> 
              </td> 
                </tr>

              @foreach($senctions as $fl)

                 <tr>  
                <td style="padding-right:30px;">
                  <label>{{$fl->date}}</label>
                  
                <td style="padding-right:30px;"> 
                  {{$fl->senction_amt}}
                    
                  <input type="hidden" name="other_senc_id[]" value="{{$fl->id}}">
              </td> 
               
                </tr>

                @endforeach
                 </table><br>
                @endif
               

              <span>3. The said documents are true, valid and genuine to the best of my knowledge, information and belief and no material facts have been concealed therefrom. </span><br><br>

              <span>4. In respect of the said sum or any part thereof, neither I, nor any person, by my order, to my knowledge or belief, for my use, had or received any manner of satisfaction or security whatsoever, save and except the following:</span><br>

              <span class="text-danger"><i>[Please state details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim]. – To be copied from S. No. 8</i></span><br><br>

              @if(count($declarationMdls)>0)
              <table>  
                <tr>  
                <td style="padding-right:30px;">
                    <label>Date</label></td>

                <td style="padding-right:30px;">
                     <label>Details</label><br> 
              </td> 
                </tr>

              @foreach($declarationMdls as $fl)

                 <tr>  
                <td style="padding-right:30px;">
                  <label>{{$fl->date}}</label>
                  
                <td style="padding-right:30px;"> 
                  {{$fl->senction_amt}}
                    
                  <input type="hidden" name="other_senc_id[]" value="{{$fl->id}}">
              </td> 
               
                </tr>

                @endforeach
                 </table><br>
                @endif

              <span>I undertake to update my claim as and when the claim is satisfied, partly or fully, from any source in any manner, after the insolvency commencement date.  </span><br><br>

              <span>5. {{$user->select_option == 1 ? 'I am' : 'I am not'}} a related party of the corporate debtor, as defined under section 5 (24) of the Code.</span><br><br>

              <span>6. I am eligible to join committee of creditors by virtue of proviso to section 21 (2) of the Code even though I am a related party of the corporate debtor.</span><br><br>
           
           <div class="row">
                <h6 class="fw-bold">Date: @if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h6>
                  <h6 class="fw-bold">Place : {{ isset($user->place) ? $user->place : ''}}</h6>
<p class="text-end">@if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
              <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75">
              @endif @endif <br>( Signature of the claimant )</p>
            </div>
            </div>
        </div>
        
        
          <div class="container-fluid my-4 ">
            <div class="row">
                <h3 class="text-center">VERIFICATION </h3>
                <p >I {{isset($user->claimant_name) ? $user->claimant_name : $cat->name}}, the {{isset($user->creditor_relation) ? $user->creditor_relation : ''}} hereinabove, do hereby verify that the contents of his proof of claim are true and correct to my Knowledge and belief and no material fact has been concealed therefrom.
                </p>
                <div class="row">
                <h6 class="fw-bold">Varified at @if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h6>
                <p class="text-end"> @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
              <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75">
              @endif @endif <br>( Signature of the claimant )</p>

            </div>
            
             <div class="row">
                <p>[Note: In the case of company or limited liability pertnership, the declaration and verification shall be made by the director/manager/secretary and in the case of other entities, an officer authorised for the purpose by the entity ].</p>
            </div>
            <br>
            <div style="text-align: center;">
              @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formB/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
              @endif @endif
            </div>

            </div>
        </div>



                    <!-- 5 page form -->
                    
    
        
  </body>
</html>