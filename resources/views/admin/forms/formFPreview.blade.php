<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> FORM F  </title>
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
            <h3 class="text-center">FORM F</h3>
            <h6 class="text-center">PROOF OF CLAIM BY CREDITORS (OTHER THAN FINANCIAL CREDITORS AND OPERATIONAL CREDITORS) </h6>
        </div>
        <div class="row">
            <h6 class="fw-bold">[Under Regulation 9A of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations, 2016]</h6>
        </div>
        
        <div class="row mt-4">
            <div class="d-flex justify-content-between">
            <h6 class="float-start">To</h6> <h6 class="float-end">{{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}}</h6>
            </div>
        </div>
        
        <div class="clearfix"></div>
       
         <div class="row">

              <p>The Interim Resolution / Resolution Professional <br>
              [ Name of the Insolvency Resolution Professional / Resolution Professional ]<br>
              [ Address as set out in public announcement ]</p>
             
               <h6>From</h6>
               <p>{{!empty($user->fc_name) ? $user->fc_name : $cat->name}} {{!empty($user->fc_address) ? $user->fc_address : ''}}</p>
                     
                     
             <!-- <span>aakash sighaniya, kamla puri</span>
              <p class="mt-0">Subject: Submission of the claim.</p>-->
          </div>
          
          <div class="row my-2">
               <h6> <span class="fw-bold">Subject:</span> Submission of proof of claim.</h6>
           </div>
          
          
           <div class="row">
               <h6>Madam / Sir</h6>
            <p>{{!empty($user->fc_name) ? $user->fc_name : $cat->name}}, hereby submits this claim in respect of the corporate insolvency resolution process of [name of corporate debtor]. The details for the same are set out below:</p>
                </div>
          
            <div class="row">
               <h6 style="font-size:14px;">1. Name of the creditor </h6>
               <p>{{!empty($user->fc_name) ? $user->fc_name : $cat->name}}<</p>
               </div>
               
                <div class="row">
               <h6 style="font-size:14px;">2. Identification number of the creditor <br> (If an incorporate body, provide of incorporation. If a partnership or individual provide identification records* of all the partners or the individual) </h6>
               <p>{{!empty($user->fc_name) ? $user->fc_name : $cat->name}}<</p>
               </div>
               
               
                <div class="row">
               <h6 style="font-size:14px;">3.  a. Address of Creditor for correspondence. </h6>
               <p>{{isset($user->fc_address) ? $user->fc_address : ''}}</p>
               </div>
               
                  <div class="row">
               <h6 style="font-size:14px;"> b. Email Address </h6>
               <p>{{isset($user->fc_email) ? $user->fc_email : ''}}</p>
               </div>
               
                  <div class="row">
               <h6 style="font-size:14px;">4. Description of the claim (Including the amount of the claim as at the insolvency commencement date)</h6>
               <p>{{isset($user->claim_amt_desc) ? $user->claim_amt_desc : ''}}</p>
               </div>
               
                  <div class="row">
               <h6 style="font-size:14px;">5. Details of documents by reference to which claim can be substantiated</h6>
               <p>{{isset($user->document_details) ? $user->document_details : ''}}</p>
               </div>
               
                  <div class="row">
               <h6 style="font-size:14px;">6. Details of how and when the claim arose</h6>
               <p>{{isset($user->claim_details) ? $user->claim_details : ''}}</p>
               </div>
                 
                  <div class="row">
               <h6 style="font-size:14px;">7. Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim</h6>
               <p>{{isset($user->other_mutual_details) ? $user->other_mutual_details : ''}}</p>
               </div>
               
                 <div class="row">
               <h6 style="font-size:14px;">8. DETAILS OF:</h6>
               <p style="margin:0px;">a. any security held, the value of security and its date, or</p>
               <p style="margin:0px;">b. any relation of the title arrangement in respect of goods or properties to which the claim refers</p>
              <p class="bg-light">{{isset($user->security_held) ? $user->security_held : ''}}</p>
               </div>
               
                 <div class="row">
               <h6 style="font-size:14px;">9. Details of the bank account to which the amount of the claim or any part thereof can be transferred pursuant to a resolution plan</h6>
                  <table class="table">
  <thead>
    <tr>
   >
      <th scope="col">Account Number</th>
      <th scope="col">Bank Name</th>
      <th scope="col">IFSC Code</th>
    </tr>
  </thead>
  <tbody>
    <tr>
   
      <td>{{isset($user->bank_account_number) ? $user->bank_account_number : ''}}</td>
      <td>{{isset($user->bank_name) ? $user->bank_name : ''}}</td>
      <td>{{isset($user->bank_ifsc_code) ? $user->bank_ifsc_code : ''}}</td>
    </tr>
 
  </tbody>
</table>
</div>
             
            </div>
        
        
        <div class="container-fluid my-4 border border-dark p-2">
            <div class="row">
                <p class="fw-bold">(Signature of financial creditor or person authorised to act on its behalf) <br>
                [Please enclose the authority if this is being submitted on behalf of the financial creditor]</p>
            
            <p class="text-end">@if(isset($user->fc_signature))
              @if($user->fc_signature != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->fc_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->fc_signature) }}" width="75" height="75" >
              @endif @endif</p>
            </div>
        </div>
        
          <div class="container-fluid my-4 border border-dark p-2">
            <div class="row">
                <h6 style="font-size:14px;">{{!empty($user->fc_name) ? $user->fc_name : $cat->name}} </h6>
                <p class="fw-bold">Position with or in relation to creditor</p>
                <span class="">{{isset($user->creditor_position) ? $user->creditor_position : ''}}</span>

<p class="fw-bold"style="margin-bottom:0px;">Address of person signing</p>
<span class="fw-bold">{{isset($user->fc_address) ? $user->fc_address : ''}}</span>
            </div>
            
        </div>
        
        
           <div class="container-fluid my-4 ">
            <div class="row">
                <h3 class="text-center">DECLARATION </h3>
                <p class="fw-bold">I, {{!empty($user->fc_name) ? $user->fc_name : $cat->name}}, currently residing at {{isset($user->signing_address) ? $user->signing_address : ''}}, do hereby declare and state as follows: -</p>
                <p>[ Name of corporate debtor ], the corporate debtor was, at the insolvency commencement date, being the 16 Nov 2022 actually indebted to me for a sum of Rs. . </p>
                 <p>In respect of my claim of the said sum or any part thereof, I have relied on the documents specified below: [Please list the documents relied on as evidence of claim].</p>
               <p>The said documents are true, valid and genuine to the best of my knowledge, information and belief and no material facts have been concealed therefrom.</p>
               <p>In respect of the said sum or any part thereof, neither I, nor any person, by my order, to my knowledge or belief, for my use, had or received any manner of satisfaction or security whatsoever, save and except the following:</p>
               <p class="text-danger"><i>[Please state details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim]. – To be copied from S. No. 8</i></p>
                <p>I undertake to update my claim as and when the claim is satisfied, partly or fully, from any source in any manner, after the insolvency commencement date.</p>
              <p>I am / I am not a related party of the corporate debtor, as defined under section 5 (24) of the Code.</p>
              <p>I am eligible to join committee of creditors by virtue of proviso to section 21 (2) of the Code even though I am a related party of the corporate debtor.</p>
           <div class="row">
                <h6 class="fw-bold">Date: @if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h6>
                  <h6 class="fw-bold">Place</h6>
<p class="text-end">@if(isset($user->fc_signature))
              @if($user->fc_signature != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->fc_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->fc_signature) }}" width="75" height="75" >
              @endif @endif
  </p>
            </div>
            </div>
        </div>
        
        
          <div class="container-fluid my-4 ">
            <div class="row">
                <h3 class="text-center">VERIFICATION </h3>
                <p>I,{{!empty($user->fc_name) ? $user->fc_name : $cat->name}} the claimant hereinabove, do hereby verify that the contents of his proof of claim are true and correct to my Knowledge and belief and no material fact has been concealed therefrom.</p>
                <div class="row">
                <h6 class="fw-bold">Varified at @if(isset($user)) {{ ($user->submitted == 1) ? getDat($user->date) : date("d")}} @else {{date("d")}} @endif @if(isset($user)) {{ ($user->submitted == 1) ? getMonth($user->date) : date("M")}} @else {{date("M")}} @endif @if(isset($user)) {{ ($user->submitted == 1) ? getYear($user->date) : date("Y")}} @else {{date("Y")}} @endif</h6>

                <p class="text-end">@if(isset($user->fc_signature))
              @if($user->fc_signature != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->fc_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->fc_signature) }}" width="75" height="75" >
              @endif @endif
<br>
                <span>( Signature of the claimant )</span>
                </p>
            </div>
            
             <div class="row">
               <p>[Note: In the case of company or limited liability pertnership, the declaration and verification shall be made by the director/manager/secretary and in the case of other entities, an officer authorised for the purpose by the entity ].</p>
                  </div>
            </div>
        </div>
        
         <div class="container-fluid my-2">
            <div class="row">
             <p>LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</p>
           </div>
        </div>
        
         <div class="container-fluid my-4 ">
            <div class="row">
                <div class="col-md-6">
            <table class="table">
       @if(isset($user->work_purchase_order))
                      @if($user->work_purchase_order=='on')  
                      
                      @if(isset($user->work_purchase_order_file))
                      @if($user->work_purchase_order_file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file))
       <tr>
      <th style="width:300px;">Work order/ Purchase order</th>
      <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file) }}" target="_blank">{{ $user->work_purchase_order_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif
      

      @if(isset($user->invoices))
                      @if($user->invoices=='on')  
                      
                      @if(isset($user->invoices_file))
                      @if($user->invoices_file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->invoices_file))
        <tr>
      <th style="width:300px;">Invoice</th>
      <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->invoices_file) }}" target="_blank">{{ $user->invoices_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif  

      @if(isset($user->balance_confirmation))
                      @if($user->balance_confirmation=='on')  
                      
                      @if(isset($user->balance_confirmation_file))
                      @if($user->balance_confirmation_file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file))                
        <tr>
      <th style="width:300px;">Balance Confirmation</th>
      <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file) }}" target="_blank">{{ $user->balance_confirmation_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif  

       @if(isset($user->any_correspondence))
                      @if($user->any_correspondence=='on')  
                      
                      @if(isset($user->any_correspondence_file))
                      @if($user->any_correspondence_file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->any_correspondence_file))                
        <tr>
      <th style="width:300px;">Any correspondence etc</th>
      <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->any_correspondence_file) }}" target="_blank">{{ $user->any_correspondence_file }}</a></td>
      </tr>
        @endif
                      @endif

                      @endif
                      @endif


     @if(isset($user->authorisation_letter))
                      @if($user->authorisation_letter=='on')  
                      
                      @if(isset($user->authorisation_letter_file))
                      @if($user->authorisation_letter_file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file))                 
      <tr>
      <th style="width:300px;">Authorisation letter</th>
      <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file) }}" target="_blank">{{ $user->authorisation_letter_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif

        @if(isset($user->bank_statement))
                      @if($user->bank_statement=='on')  
                      
                      @if(isset($user->bank_statement_file))
                      @if($user->bank_statement_file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->bank_statement_file))
               
        <tr>
      <th style="width:300px;">Bank Statement</th>
      <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->bank_statement_file) }}" target="_blank">{{ $user->bank_statement_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif

      if(isset($user->ledger_copy))
                      @if($user->ledger_copy=='on')  
                      
                      @if(isset($user->ledger_copy_file))
                      @if($user->ledger_copy_file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->ledger_copy_file))
        <tr>
      <th style="width:300px;">Copy of ledger</th>
      <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->ledger_copy_file) }}" target="_blank">{{ $user->ledger_copy_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @
        @if(isset($user->computation_sheet))
                      @if($user->computation_sheet=='on')  
                      
                      @if(isset($user->computation_sheet_file))
                      @if($user->computation_sheet_file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->computation_sheet_file))
          <tr>
      <th style="width:300px;">Computation sheet</th>
      <td> <a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->computation_sheet_file) }}" target="_blank">{{ $user->computation_sheet_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif

       @if(isset($user->pan_number_file))
                      @if($user->pan_number_file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->pan_number_file))
               
         <tr>
      <th style="width:300px;">PAN Card Number</th>
      <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->passport_file) }}" target="_blank">{{ $user->passport_file }}</a></td>
      </tr>
       @endif
                      @endif
       @if(isset($user->aadhar_card))
                      @if($user->aadhar_card != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->aadhar_card))               
        <tr>
      <th style="width:300px;">Passport</th>
      <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$user->aadhar_card) }}" target="_blank">{{ $user->aadhar_card }}</a></td>
      </tr>
      @endif
      @endif
      
</table>

</div>
            </div>
        </div>
        
        
                <div class="container-fluid my-4 ">
                 <div class="row">
                       @if(count($other_files)>0)  
                       <h6>Add Other Important Documents</h6>
                <div class="col-md-6">
                     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"> Documnet Name</th>
<th scope="col">2nd Documnet Name</th>
    </tr>
  </thead>
  <tbody>
    @forelse($other_files as $fl)
                 @if(isset($fl->file))
                      @if($fl->file != '' && file_exists('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$fl->file))
    <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$fl->document_name}}</td>
  <td><a href="{{ asset('public/access/media/forms/formF/documents/'.$user->unique_id.'/'.$fl->file) }}" target="_blank">{{ $fl->file }}</a></td>
    </tr>
  @endif
  @endif
  @empty
  @endforelse
  </tbody>
</table>
                    
                    </div>
                    @endif
                    </div>
                    </div>
                    
                 
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>