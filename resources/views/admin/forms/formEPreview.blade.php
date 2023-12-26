<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> FORM E   </title>
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
            <h3 class="text-center">FORM E</h3>
            <h6 class="text-center">PROOF OF CLAIM SUBMITTED BY AUTHORISED REPRESENTATIVE OF WORKMEN AND EMPLOYEES </h6>
        </div>
        <div class="row">
            <h6 class="fw-bold">(Under Regulation 9 of the Insolvency and Bankruptcy (Insolvency Resolution Process for Corporate Persons) Regulations, 2016)</h6>
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
               <p>{{isset($user->name) ? $user->name : $cat->name}}{{isset($user->address) ? ', '.$user->address : $cat->address}}</p>
                     
                     
             <!-- <span>aakash sighaniya, kamla puri</span>
              <p class="mt-0">Subject: Submission of the claim.</p>-->
          </div>
          
          <div class="row my-2">
               <h6> <span class="fw-bold">Subject:</span> Submission of proofs of claim.</h6>
           </div>
          
          
           <div class="row">
               <h6>Madam / Sir</h6>
              <p>I, {{$user->name}}, currently residing at {{$user->address}}, on behalf of the workmen and employees employed by the above named corporate debtor and listed in Annexure A, solemnly affirm and say:</p>
              <p> 1. That the above named corporate debtor was, at the insolvency commencement date, being the <span> ________ </span> day of <span> ________ </span> 20 <span> ________ </span>, justly truly indebted to the several persons whose names, addresses, and descriptions appear in the Annexure A below in amounts severally set against their names in such Annexure A for wages, remuneration and other amounts due to them respectively as workmen or/ and employees in the employment of the corporate debtor in respect of services rendered by them respectively to the corporate debtor during such periods as are set out against their respective names in the said Annexure A.</p>
                <p>2. That for which said sums or any part thereof, they have not, nor has any of them, had or received any manner of satisfaction or security whatsoever, save and except the following:</p>
                <p>[Please state details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim.]</p>
          </div>
          
           
             
              <div class="row">
                    <h5 class="text-center">Deponent ANNEXURE </h5>
               <h6 style="font-size:14px;">1. Details of Employees/Workmen  </h6>
          <table class="table">
            <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">Workman</th>
              <th scope="col">Identification number</th>
              <th scope="col">Total amount due (Rs.)</th>
             <th scope="col">Period over which amount due</th>
          </tr>
         </thead>
            <tbody>
          <!-- <tr>
            <th scope="row">1</th>
             <td>Enter Details</td>
            <td>Passport</td>
          <td>Enter Details </td>
           <td>@Enter Details</td>
          </tr> -->
          @if(isset($emps) && count($emps)>0)
          @foreach($emps as $emp)

          <tr><td>{{$loop->index+1}}</td><td>{{$emp->employee_name}}</td><td>@if($emp->id_number==1) Pan card @elseif($emp->id_number==2) Passport @elseif($emp->id_number==3) Aadhar card @endif - {{$emp->id_details}}</td> <td>{{$emp->total_amt}}</td> <td>{{$emp->due_amt_period}}</td></tr>
          @endforeach
          @endif  
         </tbody>
            </table>
                     
             </div>
          
             <div class="row">
               <h6 style="font-size:14px;">2. Particulars of how debt was incurred by the corporate debtor, including particulars of any dispute as well as the record of pendency of suit or arbitration proceedings (if any).</h6>
               </div>
               
                <div class="row">
               <h6 style="font-size:14px;">3. Particulars of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim.</h6>
               </div>
             
            </div>
        
        
        <div class="container-fluid my-4 border border-dark p-2">
            <div class="row">
                <p class="fw-bold">(Signature of financial creditor or person authorised to act on its behalf) <br>
                [Please enclose the authority if this is being submitted on behalf of the financial creditor]</p>
            <p class="text-end">
               @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
              @endif @endif
            </p>
            </div>
        </div>
        
          <div class="container-fluid my-4 border border-dark p-2">
            <div class="row">
                <h6 style="font-size:14px;">{{$user->name}} </h6>
                <p class="fw-bold">Position with or in relation to creditor</p>
                <span class="">JIGSAW速 EDU SOLUTIONS PVT. LTD. is an ISO 9001:2015 certified company engaged in providing
comprehensive education solutions of the highest quality to orient thital emphasis on the aspect of not over
burdening the student with the</span>

<p class="fw-bold"style="margin-bottom:0px;">Address of person signing</p>
<span class="fw-bold">kamla puri</span>
            </div>
            
        </div>
        
        
           <div class="container-fluid my-4 ">
            <div class="row">
                <h3 class="text-center">DECLARATION </h3>
                <p class="fw-bold">I, {{!empty($user->name) ? $user->name : ''}}, currently residing at {{$user->address}}, do hereby declare and state as follows: -</p>
                <p>[ Name of corporate debtor ], the corporate debtor was, at the insolvency commencement date, being the {{ ($user->submitted == 1) ? getDat($user->date) : date("d")}} day of {{ ($user->submitted == 1) ? getMonth($user->date) : date("M")}} {{ ($user->submitted == 1) ? getYear($user->date) : date("Y")}} actually indebted to me for a sum of Rs. . </p>
                 <p>In respect of my claim of the said sum or any part thereof, I have relied on the documents specified below: [Please list the documents relied on as evidence of claim].</p>
               <p>The said documents are true, valid and genuine to the best of my knowledge, information and belief and no material facts have been concealed therefrom.</p>
               <p>In respect of the said sum or any part thereof, neither I, nor any person, by my order, to my knowledge or belief, for my use, had or received any manner of satisfaction or security whatsoever, save and except the following:</p>
               <p class="text-danger"><i>[Please state details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim]. – To be copied from S. No. 8</i></p>
                <p>I undertake to update my claim as and when the claim is satisfied, partly or fully, from any source in any manner, after the insolvency commencement date.</p>
              <p>I am / I am not a related party of the corporate debtor, as defined under section 5 (24) of the Code.</p>
              <p>I am eligible to join committee of creditors by virtue of proviso to section 21 (2) of the Code even though I am a related party of the corporate debtor.</p>
           <div class="row">
                <h6 class="fw-bold">Date: @if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h5></h6>
                  <h6 class="fw-bold">Place</h6>
<p class="text-end">    @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
              @endif @endif</p>
            </div>
            </div>
        </div>
        
        
          <div class="container-fluid my-4 ">
            <div class="row">
                <h3 class="text-center">VERIFICATION </h3>
                <p>I,{{$user->name}} the claimant hereinabove, do hereby verify that the contents of his proof of claim are true and correct to my Knowledge and belief and no material fact has been concealed therefrom.</p>
                <div class="row">
                <h6 class="fw-bold">Varified at @if(isset($user)) {{ ($user->submitted == 1) ? getDat($user->date) : date("d")}} @else {{date("d")}} @endif @if(isset($user)) {{ ($user->submitted == 1) ? getMonth($user->date) : date("M")}} @else {{date("M")}} @endif @if(isset($user)) {{ ($user->submitted == 1) ? getYear($user->date) : date("Y")}} @else {{date("Y")}} @endif</h6>
                <p class="text-end"> 
                  @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
            <img class="profile-pic-user" src="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
              @endif @endif<br>
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
                      @if($user->work_purchase_order_file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file))
       <tr>
      <th style="width:300px;">Work order/ Purchase order</th>
      <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->work_purchase_order_file) }}" target="_blank">{{ $user->work_purchase_order_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif
      

      @if(isset($user->invoices))
                      @if($user->invoices=='on')  
                      
                      @if(isset($user->invoices_file))
                      @if($user->invoices_file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->invoices_file))
        <tr>
      <th style="width:300px;">Invoice</th>
      <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->invoices_file) }}" target="_blank">{{ $user->invoices_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif  

      @if(isset($user->balance_confirmation))
                      @if($user->balance_confirmation=='on')  
                      
                      @if(isset($user->balance_confirmation_file))
                      @if($user->balance_confirmation_file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file))                
        <tr>
      <th style="width:300px;">Balance Confirmation</th>
      <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->balance_confirmation_file) }}" target="_blank">{{ $user->balance_confirmation_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif  

       @if(isset($user->any_correspondence))
                      @if($user->any_correspondence=='on')  
                      
                      @if(isset($user->any_correspondence_file))
                      @if($user->any_correspondence_file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->any_correspondence_file))                
        <tr>
      <th style="width:300px;">Any correspondence etc</th>
      <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->any_correspondence_file) }}" target="_blank">{{ $user->any_correspondence_file }}</a></td>
      </tr>
        @endif
                      @endif

                      @endif
                      @endif


     @if(isset($user->authorisation_letter))
                      @if($user->authorisation_letter=='on')  
                      
                      @if(isset($user->authorisation_letter_file))
                      @if($user->authorisation_letter_file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file))                 
      <tr>
      <th style="width:300px;">Authorisation letter</th>
      <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->authorisation_letter_file) }}" target="_blank">{{ $user->authorisation_letter_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif

        @if(isset($user->bank_statement))
                      @if($user->bank_statement=='on')  
                      
                      @if(isset($user->bank_statement_file))
                      @if($user->bank_statement_file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->bank_statement_file))
               
        <tr>
      <th style="width:300px;">Bank Statement</th>
      <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->bank_statement_file) }}" target="_blank">{{ $user->bank_statement_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif

      if(isset($user->ledger_copy))
                      @if($user->ledger_copy=='on')  
                      
                      @if(isset($user->ledger_copy_file))
                      @if($user->ledger_copy_file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->ledger_copy_file))
        <tr>
      <th style="width:300px;">Copy of ledger</th>
      <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->ledger_copy_file) }}" target="_blank">{{ $user->ledger_copy_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @
        @if(isset($user->computation_sheet))
                      @if($user->computation_sheet=='on')  
                      
                      @if(isset($user->computation_sheet_file))
                      @if($user->computation_sheet_file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->computation_sheet_file))
          <tr>
      <th style="width:300px;">Computation sheet</th>
      <td> <a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->computation_sheet_file) }}" target="_blank">{{ $user->computation_sheet_file }}</a></td>
      </tr>
      @endif
                      @endif

                      @endif
                      @endif

       @if(isset($user->pan_number_file))
                      @if($user->pan_number_file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->pan_number_file))
               
         <tr>
      <th style="width:300px;">PAN Card Number</th>
      <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->passport_file) }}" target="_blank">{{ $user->passport_file }}</a></td>
      </tr>
       @endif
                      @endif
       @if(isset($user->aadhar_card))
                      @if($user->aadhar_card != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->aadhar_card))               
        <tr>
      <th style="width:300px;">Passport</th>
      <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->aadhar_card) }}" target="_blank">{{ $user->aadhar_card }}</a></td>
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
                      @if($fl->file != '' && file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$fl->file))
    <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$fl->document_name}}</td>
  <td><a href="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$fl->file) }}" target="_blank">{{ $fl->file }}</a></td>
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