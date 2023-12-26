@extends("user_layout/layout")
@section('user_content')



<main>
<div class="container-fluid">
<!--<h2 class="mt-30 page-title">All Users</h2>-->
<ol class="breadcrumb mb-30 mt-2">
<li class="breadcrumb-item active breadcrumb_heading" style="font-weight:bold;"> Form E Details</li>
</ol>



<div class="container" style="margin-bottom: 100px;">
              <div class="form-group row">
                <div class="col-sm-12">
                 
                	<a href="{{url('/form-e')}}" class="btn btn-primary float-right">Back</a>
                </div>
              </div>
    <div class="row">
        <!--form data start-->
        <div class="col-md-5">
            <h5 class="font-weight-bold mb-3 mt-0"> {{isset($ip) ? 'Amount Covered By '.ucwords($ip->first_name) : 'Amount to be covered'}} </h5>
            
            <hr>
              <span>Details of Employees/Workmen</span>
              <hr>

            <form>

           @forelse($emps as $emp) 	
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">{{$loop->index+1}}. Employee/Workmen</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="emp_type" name="emp_type" value="{{isset($emp->emp_type) ? $emp->emp_type : ''}}" readonly >
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Name of Employee/Workmen</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="borrower_claim_amount" name="borrower_claim_amount" value="{{isset($emp->employee_name) ? $emp->employee_name : ''}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Identification Number</label>
                <div class="col-sm-7">
                	@foreach(Config::get('site.identification_type') as $id => $iv)
                    @if(isset($emp->id_number))
                    @if($id == $emp->id_number)
                  <input type="text" class="form-control" id="id_number" name="id_number" value="{{$iv}}" readonly>
                  @endif
                    @else
                    <input type="text" class="form-control" id="id_number" name="id_number" value="" readonly>
                    @endif
                    @endforeach
                    <input type="text" class="form-control" id="id_details" name="id_details" value="{{isset($emp->id_details) ? $emp->id_details : ''}}" readonly>
                </div>
              </div>	

              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Total Amount Due (Rs.)</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="total_amt" name="total_amt" value="{{isset($emp->total_amt) ? $emp->total_amt : ''}}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Period over which amount due</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="due_amt_period" name="due_amt_period" value="{{isset($emp->due_amt_period) ? $emp->due_amt_period : ''}}" readonly>
                </div>
              </div>
           
              @empty
        @endforelse

              <hr>
              
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Total amount</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="claim_amt" name="claim_amt" value="{{is_numeric($total_amt) ? $total_amt : ''}}" readonly >
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Total Admitted</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="approved_total_amount" name="approved_total_amount" value="{{isset($cat->approved_total_amount) ? $cat->approved_total_amount : ''}}" readonly >
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Amount of claim not admitted</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="rejected_total_amount" name="rejected_total_amount" value="{{isset($cat->rejected_total_amount) ? $cat->rejected_total_amount : ''}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Amount of claim under verfication</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="pending_total_amount" name="pending_total_amount" value="{{isset($cat->pending_total_amount) ? $cat->pending_total_amount : ''}}" readonly>
                </div>
              </div>
              

              <hr>

              <div class="form-group row">
                <label for="" class="col-sm-5 col-form-label">Nature of claim</label>
                <div class="col-sm-7">
                  <textarea id="claim_nature" name="claim_nature" class="form-control" readonly>{{isset($user->claim_amt_desc) ? $user->claim_amt_desc : ''}}</textarea>
                  
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
                                        <td>{{$userIn->name}}</td>
                                        <td>@if($fm->status==1)
						                {{dateFm2($fm->created_at)}}
						                @endif</td>
                                        <td>
					                    @if($fm->status==2)
					                    {{dateFm2($fm->updated_at)}}
					                    @endif
					                  </td>
                                       <td>

                                          <input type="radio" id="report" name="radio" value="{{$fm->id}}" onchange="getReport('{{$fm->form_e_selected_id}}','{{$fm->id}}','get-form-e-pdf-report','pdfBReport')" autocomplete="off">
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