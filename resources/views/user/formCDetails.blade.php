@extends("user_layout/layout")
@section('user_content')



<main>
<div class="container-fluid">
<!--<h2 class="mt-30 page-title">All Users</h2>-->
<ol class="breadcrumb mb-30 mt-2">
<li class="breadcrumb-item active breadcrumb_heading" style="font-weight:bold;"> Form C Details</li>
</ol>



<div class="container" style="margin-bottom: 100px;">
              <div class="form-group row">
                <div class="col-sm-12">
                 
                	<a href="{{url('/form-c')}}" class="btn btn-primary float-right">Back</a>
                </div>
              </div>
    <div class="row">
        <!--form data start-->
        <div class="col-md-5">
            <h5 class="font-weight-bold mb-3 mt-0"> {{isset($ip) ? 'Amount Covered By '.ucwords($ip->first_name) : 'Amount to be covered'}} </h5>
            
            <hr>
              <span>Details of claim, if it is made against corporate debtor as principal borrower:</span>
              <hr>

            <form>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(i) Amount of claim</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="borrower_claim_amount" name="borrower_claim_amount" value="{{isset($cat->borrower_claim_amount) ? $cat->borrower_claim_amount : $user->borrower_claim_amount}}" readonly >
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(ii) Amount of claim covered by security interest</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="borrower_security_interest_amount" name="borrower_security_interest_amount" value="{{isset($cat->borrower_security_interest_amount) ? $cat->borrower_security_interest_amount : $user->borrower_security_interest_amount}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(iii) Amount of claim covered by guarantee</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="borrower_guarantee_amt" name="borrower_guarantee_amt" value="{{isset($cat->borrower_guarantee_amt) ? $cat->borrower_guarantee_amt : $user->borrower_guarantee_amt}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(iv) Name of the guarantor(s)</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="borrower_guarantor_name" name="borrower_guarantor_name" value="{{isset($cat->borrower_guarantor_name) ? $cat->borrower_guarantor_name : $user->borrower_guarantor_name}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(v) Address of the guarantor(s)</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="borrower_guarantor_address" name="borrower_guarantor_address" value="{{isset($cat->borrower_guarantor_address) ? $cat->borrower_guarantor_address : $user->borrower_guarantor_address}}" readonly>
                </div>
              </div>
           
              

              <hr>
              <span>Details of claim, if it is made against corporate debtor as guarantor:</span>
              <hr>
              
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(i) Amount of claim</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="guarantor_claim_amount" name="guarantor_claim_amount" value="{{isset($cat->guarantor_claim_amount) ? $cat->guarantor_claim_amount : $user->guarantor_claim_amount}}" readonly >
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(ii) Amount of claim covered by security interest</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="guarantor_security_interest_amount" name="guarantor_security_interest_amount" value="{{isset($cat->guarantor_security_interest_amount) ? $cat->guarantor_security_interest_amount : $user->guarantor_security_interest_amount}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(iii) Amount of claim covered by guarantee</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="guarantor_gaurantee_amt" name="guarantor_gaurantee_amt" value="{{isset($cat->guarantor_gaurantee_amt) ? $cat->guarantor_gaurantee_amt : $user->guarantor_gaurantee_amt}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(iv) Name of the principal borrower</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="guarantor_principal_borrower" name="guarantor_principal_borrower" value="{{isset($cat->guarantor_principal_borrower) ? $cat->guarantor_principal_borrower : $user->guarantor_principal_borrower}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(v) Address of the principal borrower</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="guarantor_address_borrower" name="guarantor_address_borrower" value="{{isset($cat->guarantor_address_borrower) ? $cat->guarantor_address_borrower : $user->guarantor_address_borrower}}" readonly>
                </div>
              </div>
              

              <hr>
              <span>Details of claim, if it is made in respect of financial debt covered under clauses (h) and (i) of sub-section (8) of section 5 of the Code, extended by the creditor:

</span>
              <hr>

              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(i) Amount of claim</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="financial_claim_amt" name="financial_claim_amt" value="{{isset($cat->financial_claim_amt) ? $cat->financial_claim_amt : $user->financial_claim_amt}}" readonly >
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(ii) Name of the beneficiary</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="financial_beneficiary_name" name="financial_beneficiary_name" value="{{isset($cat->financial_beneficiary_name) ? $cat->financial_beneficiary_name : $user->financial_beneficiary_name}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">(iii) Address of the beneficiary</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="financial_beneficiary_address" name="financial_beneficiary_address" value="{{isset($cat->financial_beneficiary_address) ? $cat->financial_beneficiary_address : $user->financial_beneficiary_address}}" readonly>
                </div>
              </div>

              <hr>
              @php

              	$borrower_claim_amount = is_numeric($user->borrower_claim_amount) ? $user->borrower_claim_amount : 0;
		        $guarantor_claim_amount = is_numeric($user->guarantor_claim_amount) ? $user->guarantor_claim_amount : 0;
		        $financial_claim_amt = is_numeric($user->financial_claim_amt) ? $user->financial_claim_amt : 0;

		         $total_amount = $borrower_claim_amount + $guarantor_claim_amount + $financial_claim_amt;

              @endphp	

              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Total claimed amount</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{$total_amount}}" readonly >
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Total Admitted</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="approved_total_amount" name="approved_total_amount" value="{{isset($cat->approved_total_amount) ? $cat->approved_total_amount : ''}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Amount of claim not admitted</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="rejected_total_amount" name="rejected_total_amount" value="{{isset($cat->rejected_total_amount) ? $cat->rejected_total_amount : ''}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">AAmount of claim under verfication</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="pending_total_amount" name="pending_total_amount" value="{{isset($cat->pending_total_amount) ? $cat->pending_total_amount : ''}}" readonly>
                </div>
              </div>
              	

              <hr>

              
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Nature of claim</label>
                <div class="col-sm-7">
                    <select class="form-control" autocomplete="off" readonly>
                      <option>Default select</option>
                      <option value="1" {{(isset($cat->claim_nature) && $cat->claim_nature==1) ? 'selected' : ''}}>Secured financial creditors belonging to any class of creditors</option>
                      <option value="2" {{(isset($cat->claim_nature) && $cat->claim_nature==2) ? 'selected' : ''}}>Unsecured financial creditors belonging to any class of creditors</option>
                      
                    </select>
                </div>
              </div>

              
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Amount Covered by security interest</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="security_interest" value="{{isset($cat->security_interest) ? $cat->security_interest : ''}}" readonly>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Amount covered by guarantee</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="" value="{{isset($cat->guarantee_amt) ? $cat->guarantee_amt : ''}}" readonly>
                </div>
              </div>

              <?php
                $relatedParty = isset($cat->related_party) ? $cat->related_party : '';
                $relP = '';

                if (!empty($relatedParty)) 
                {
                  if ($relatedParty=='1') 
                  {
                    $relP = 'Yes';
                  }
                  elseif ($relatedParty=='2') 
                  {
                    $relP= 'No';
                  }
                }

              ?>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Whether related party</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="related_party" name="related_party" value="{{$relP}}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Percentage of voting shares in COC</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="voting_shares" name="voting_shares" value="{{isset($cat->voting_shares) ? $cat->voting_shares : ''}}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Amount of contingent claim</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="contingent_amt" name="contingent_amt" value="{{isset($cat->contingent_amt) ? $cat->contingent_amt : ''}}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Amount of any mutual dues that may be set-off</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="mutual_dues" name="mutual_dues" value="{{isset($cat->mutual_dues) ? $cat->mutual_dues : ''}}" readonly>
                </div>
              </div>
              

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Remarks</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{isset($cat->reason) ? $cat->reason : ''}}</textarea>
              </div>
              
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Total Rejected Amt.</label>
                <div class="col-sm-7">
                    <select class="form-control" autocomplete="off" readonly>
                      <option>Default select</option>
                      <option value="1" {{(isset($cat->status) && $cat->status==1) ? 'selected' : ''}}>Approved</option>
                      <option value="2" {{(isset($cat->status) && $cat->status==2) ? 'selected' : ''}}>Pending</option>
                      <option value="3" {{(isset($cat->status) && $cat->status==3) ? 'selected' : ''}}>Rejected</option>
                    </select>
                </div>
              </div>
              
             <!--  <button type="button" class="btn btn-success">Save</button>
              <button type="button" class="btn btn-secondary">Reset</button>
              <button type="button" class="btn btn-danger">Mail </button> -->

            </form>
        </div>
        <!--form data closed-->
        
        <!--data table start-->
        <div class="col-md-7">
                        <!-- <div class="col-md-12 table table-responsive"> -->
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Submitted By</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@forelse($fms as $fm)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$fm->signing_person_name}}</td>
                                        <td>@if($fm->status==1)
						                {{dateFm2($fm->created_at)}}
						                @endif</td>
                                        <td>
					                    @if($fm->status==2)
					                    {{dateFm2($fm->updated_at)}}
					                    @endif
					                  </td>
                                        <td>

                                          <input type="radio" id="report" name="radio" value="{{$fm->id}}" onchange="getReport('{{$fm->form_c_selected_id}}','{{$fm->id}}','get-form-c-pdf-report','pdfBReport')" autocomplete="off">
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                    	<td></td>
                                    	<td></td>
                                    	<td></td>
                                    	<td></td>
                                    	<td></td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>

                            <div class="box box-default" style="border: 1px solid #d5cfcf;">

                  <div id="showPdf">
            
            <iframe src="" id="pdfBReport" width="100%" height="665px" style="border:none;display: none;"></iframe>
          
        </div>

      </div>   

                            
                      <!--   </div> -->


                        <!--     <div>
                                <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="Girl in a jacket" width="500" height="600">
                            </div> -->

                    </div>
                 <!--data table close-->
        
        </div>
      </div>
    </div>

</main>



              
@section('userJS')

<x-js :file="$formB" />


@endsection
        
@endsection