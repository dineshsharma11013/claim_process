@extends("admin_layout.main")

@section("container")


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>
@php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header">
          
              <h3 class="box-title">Form C Amount claimed by {{ucwords($user->signing_person_name)}}</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/form-c-registered')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="formCApprovalForm">
        
        <div>
          <hr>
          <span style="padding-left: 22px;padding-right: 22px;font-size:16px;">Details of claim, if it is made against corporate debtor as principal borrower: </span>
          <hr>
        </div>
        <input type="hidden" name="form_id" value="{{$fid}}">

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(i) Amount of claim </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="borrower_claim_amount" name="borrower_claim_amount" value="{{isset($cat->borrower_claim_amount) ? $cat->borrower_claim_amount : $user->borrower_claim_amount}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(ii) Amount of claim covered by security interest</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="borrower_security_interest_amount" name="borrower_security_interest_amount" value="{{isset($cat->borrower_security_interest_amount) ? $cat->borrower_security_interest_amount : $user->borrower_security_interest_amount}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(iii) Amount of claim covered by guarantee</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="borrower_guarantee_amt" name="borrower_guarantee_amt" value="{{isset($cat->borrower_guarantee_amt) ? $cat->borrower_guarantee_amt : $user->borrower_guarantee_amt}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(iv) Name of the guarantor(s) </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="borrower_guarantor_name" name="borrower_guarantor_name" value="{{isset($cat->borrower_guarantor_name) ? $cat->borrower_guarantor_name : $user->borrower_guarantor_name}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(v) Address of the guarantor(s) </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="borrower_guarantor_address" name="borrower_guarantor_address" value="{{isset($cat->borrower_guarantor_address) ? $cat->borrower_guarantor_address : $user->borrower_guarantor_address}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <hr><span style="padding-left: 22px;padding-right: 22px;font-size:16px;">Details of claim, if it is made against corporate debtor as guarantor: </span><hr>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(i) Amount of claim</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="guarantor_claim_amount" name="guarantor_claim_amount" autocomplete="off" value="{{isset($cat->guarantor_claim_amount) ? $cat->guarantor_claim_amount : $user->guarantor_claim_amount}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(ii) Amount of claim covered by security interest</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="guarantor_security_interest_amount" name="guarantor_security_interest_amount"  autocomplete="off" value="{{isset($cat->guarantor_security_interest_amount) ? $cat->guarantor_security_interest_amount : $user->guarantor_security_interest_amount}}">
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(iii) Amount of claim covered by guarantee</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="guarantor_gaurantee_amt" name="guarantor_gaurantee_amt" autocomplete="off" value="{{isset($cat->guarantor_gaurantee_amt) ? $cat->guarantor_gaurantee_amt : $user->guarantor_gaurantee_amt}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(iv) Name of the principal borrower </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="guarantor_principal_borrower" name="guarantor_principal_borrower"  autocomplete="off" value="{{isset($cat->guarantor_principal_borrower) ? $cat->guarantor_principal_borrower : $user->guarantor_principal_borrower}}">
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(v) Address of the principal borrower </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="guarantor_address_borrower" name="guarantor_address_borrower"  autocomplete="off" value="{{isset($cat->guarantor_address_borrower) ? $cat->guarantor_address_borrower : $user->guarantor_address_borrower}}">
                  </div>
                </div>
        </div>

        <hr><p style="padding-left: 22px;padding-right: 22px;font-size:16px;">Details of claim, if it is made in respect of financial debt covered under clauses (h) and (i) of sub-section (8) of section 5 of the Code, extended by the creditor:  </p><hr>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(i) Amount of claim  </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="financial_claim_amt" name="financial_claim_amt"  autocomplete="off" value="{{isset($cat->financial_claim_amt) ? $cat->financial_claim_amt : $user->financial_claim_amt}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(ii) Name of the beneficiary  </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="financial_beneficiary_name" name="financial_beneficiary_name"  autocomplete="off" value="{{isset($cat->financial_beneficiary_name) ? $cat->financial_beneficiary_name : $user->financial_beneficiary_name}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">(iii) Address of the beneficiary  </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="financial_beneficiary_address" name="financial_beneficiary_address"  autocomplete="off" value="{{isset($cat->financial_beneficiary_address) ? $cat->financial_beneficiary_address : $user->financial_beneficiary_address}}">
                  </div>
                </div>
        </div>

        <hr>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Total claimed amount</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="total_amount" name="total_amount"  autocomplete="off" value="{{isset($total_amount) ? $total_amount : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Total Admitted</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="approved_total_amount" name="approved_total_amount"  autocomplete="off" value="{{isset($cat->approved_total_amount) ? $cat->approved_total_amount : ''}}">
                  </div>
                </div>
        </div>


          <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Amount of claim not admitted</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="rejected_total_amount" name="rejected_total_amount"  autocomplete="off" value="{{isset($cat->rejected_total_amount) ? $cat->rejected_total_amount : ''}}">
                  </div>
                </div>
        </div>


        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Amount of claim under verfication</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="pending_total_amount" name="pending_total_amount"  autocomplete="off" value="{{isset($cat->pending_total_amount) ? $cat->pending_total_amount : ''}}">
                  </div>
                </div>
        </div>

        <hr>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Nature of claim</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="claim_nature" name="claim_nature" onchange='Removef("claim_nature")' autocomplete="off">
                      <option value="">Select</option>
                      <option value="1" {{(isset($cat->claim_nature) && $cat->claim_nature==1) ? 'selected' : ''}}>Secured financial creditors belonging to any class of creditors</option>
                      <option value="2" {{(isset($cat->claim_nature) && $cat->claim_nature==2) ? 'selected' : ''}}>Unsecured financial creditors belonging to any class of creditors</option>
                    </select>
                    <div class="error_cls" id="error_claim_nature"></div>
                  </div>
                </div>
          <!-- /.row -->
        </div>


        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Amount Covered by security interest</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="security_interest" name="security_interest"  autocomplete="off" value="{{isset($cat->security_interest) ? $cat->security_interest : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Amount covered by guarantee</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="guarantee_amt" name="guarantee_amt"  autocomplete="off" value="{{isset($cat->guarantee_amt) ? $cat->guarantee_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Whether related party</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="related_party" name="related_party" onchange='Removef("related_party")'  autocomplete="off">
                      <option value="">Select</option>
                      <option value="1" {{(isset($cat->related_party) && $cat->related_party==1) ? 'selected' : ''}}>Yes</option>
                      <option value="2" {{(isset($cat->related_party) && $cat->related_party==2) ? 'selected' : ''}}>No</option>
                    </select>
                    <div class="error_cls" id="error_related_party"></div>
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Percentage of voting shares in COC</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="voting_shares" name="voting_shares"  autocomplete="off" value="{{isset($cat->voting_shares) ? $cat->voting_shares : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Amount of contingent claim</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="contingent_amt" name="contingent_amt"  autocomplete="off" value="{{isset($cat->contingent_amt) ? $cat->contingent_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Amount of any mutual dues that may be set-off</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="mutual_dues" name="mutual_dues"  autocomplete="off" value="{{isset($cat->mutual_dues) ? $cat->mutual_dues : ''}}">
                  </div>
                </div>
        </div>


        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Remarks (If any)</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" name="reason">{{isset($cat->reason) ? $cat->reason : ''}}</textarea>
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Status</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="status" id="status" onchange='Removef("status")' autocomplete="off">
                      <option value="">Select</option>
                      <option value="1" {{(isset($cat->status) && $cat->status==1) ? 'selected' : ''}}>Approved</option>
                      <option value="2" {{(isset($cat->status) && $cat->status==2) ? 'selected' : ''}}>Pending</option>
                      <option value="3" {{(isset($cat->status) && $cat->status==3) ? 'selected' : ''}}>Rejected</option>
                    </select>
                    <div class="error_cls" id="error_status"></div>
                  </div>
                </div>
          <!-- /.row -->
        </div>


        <div class="box-footer">
                <x-asbutton value="Save" redirect="self" form="formCApprovalForm" btnId="formBApprBtn" path="/form-c-approval" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       

                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="sendMail('{{$fid}}','userModal','form-c-mail-rp','formBody','formCApprovalForm')">Mail To {{ucwords($user->signing_person_name)}}</button>

                    <div class="col-md-12" id="errMessage_formBApprovalForm">
                        
  </div>

              </div>
        </form>
      </div>
        <!-- /.box-body -->
        </div>

        <div class="col-md-6">

          <div class="box box-default">

        <div id="showtracker">
      <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Submitted By</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Files</th>
                  <th>View</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($fms as $fm)
                <tr>
                  <td>{{$loop->index+1}} </td>
                  <td>
                    {{$fm->signing_person_name}}
                  </td>
                  <td>
                    @if($fm->status==1)
                    {{dateFm2($fm->created_at)}}
                    @endif
                  </td>
                  <td>
                    @if($fm->status==2)
                    {{dateFm2($fm->updated_at)}}
                    @endif
                  </td>
                    <td>
                    <a class="btn btn-info btn-sm" href="{{url(admin().'/form-c-documents')}}/{{$fm->id}}" target="_blank" role="button"> <i class="fa fa-eye"></i> </a>
                  </td>
                  <td>
                     <!-- <a href="{{url(admin().'/get-form-c-pdf-report/'.$fm->form_c_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-file-pdf-o"></i></a> -->

                    <input type="radio" id="report" name="report" value="{{$fm->id}}" onchange="getReport('{{$fm->form_c_selected_id}}','{{$fm->id}}','get-form-c-pdf-report','pdfCReport')" autocomplete="off">
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>


      <div class="box box-default">
      
         <div id="showPdf">
            
            <iframe src="" id="pdfCReport" width="100%" height="980px" style="border:none;display: none;"></iframe>
          
        </div>

        <!-- <iframe src="{{asset('public/access/media/forms/formC/documents/'.$user->unique_id.'/Form-C.pdf')}}" width="100%" height="800px" style="border:none;"></iframe> -->

      </div>
    </div>
    </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@include('admin.modals.notification')
@section('script')
<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
<x-js :file="$mail" />
<x-js :file="$formC" />
@endsection  
@endsection  
