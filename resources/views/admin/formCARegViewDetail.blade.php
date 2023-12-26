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
          
              <h3 class="box-title">form CA Amount claimed by {{ucwords($user->signing_person_name)}}</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/form-ca-registered')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="formCaApprovalForm">
        
        <div>
          <hr>
          <span style="padding-left: 22px;font-size:16px;">Claimed Amount</span>
          <hr>
        </div>
        <input type="hidden" name="form_id" value="{{$fid}}">

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Principal Amt.</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="principle_amt" name="principle_amt" value="{{$user->claim_principle}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Interest</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="interest" name="interest" value="{{$user->claim_interest}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Total</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{$user->claim_amt}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <hr><span style="padding-left: 22px;font-size:16px;">Amount Admitted</span><hr>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Principal</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="approved_principle_amt" onkeyup ="getTotalAmt('approved_principle_amt','approved_interest_amt','approved_total_amount')" name="approved_principle_amt" autocomplete="off" value="{{isset($cat->approved_principle_amt) ? $cat->approved_principle_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">     
                  <label for="inputEmail3" class="col-sm-6 control-label">Interest</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="approved_interest_amt" name="approved_interest_amt" onkeyup ="getTotalAmt('approved_principle_amt','approved_interest_amt','approved_total_amount')" autocomplete="off" value="{{isset($cat->approved_interest_amt) ? $cat->approved_interest_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Total Amount</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="approved_total_amount" name="approved_total_amount"  autocomplete="off" value="{{isset($cat->approved_total_amount) ? $cat->approved_total_amount : ''}}">
                  </div>
                </div>
        </div>

        <hr><span style="padding-left: 22px;font-size:16px;">Amount of claim not admitted</span><hr>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Principal</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="rejected_principle_amt" onkeyup ="getTotalAmt('rejected_principle_amt','rejected_interest_amt','rejected_total_amount')" name="rejected_principle_amt"  autocomplete="off" value="{{isset($cat->rejected_principle_amt) ? $cat->rejected_principle_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Interest</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="rejected_interest_amt" onkeyup ="getTotalAmt('rejected_principle_amt','rejected_interest_amt','rejected_total_amount')" name="rejected_interest_amt"  autocomplete="off" value="{{isset($cat->rejected_interest_amt) ? $cat->rejected_interest_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Total Amount</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="rejected_total_amount" name="rejected_total_amount"  autocomplete="off" value="{{isset($cat->rejected_total_amount) ? $cat->rejected_total_amount : ''}}">
                  </div>
                </div>
        </div>

        <hr><span style="padding-left: 22px;font-size:16px;">Amount of claim under verfication</span><hr>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Principal</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="pending_principle_amt" onkeyup ="getTotalAmt('pending_principle_amt','pending_interest_amt','pending_total_amount')" name="pending_principle_amt"  autocomplete="off" value="{{isset($cat->pending_principle_amt) ? $cat->pending_principle_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Interest</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="pending_interest_amt" onkeyup ="getTotalAmt('pending_principle_amt','pending_interest_amt','pending_total_amount')" name="pending_interest_amt"  autocomplete="off" value="{{isset($cat->pending_interest_amt) ? $cat->pending_interest_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Total Amount</label>
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
                    <select class="form-control" id="status" name="status" onchange='Removef("status")' autocomplete="off">
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
                <x-asbutton value="Save" redirect="self" form="formCaApprovalForm" btnId="formCaApprBtn" path="/form-ca-approval" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       

                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
                   <button type="button" class="btn btn-danger btn-sm" onclick="sendMail('{{$fid}}','userModal','form-ca-mail-rp','formBody','formCApprovalForm')">Mail To {{ucwords($user->signing_person_name)}}</button>

                    <div class="col-md-12" id="errMessage_formCaApprovalForm">
                        
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
                  <th>Created By</th>
                  <th>Updated By</th>
                  <th>Files</th>
                  <th>View</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($fms as $fm)
                <tr>
                  <td>{{$loop->index+1}} </td>
       
                  <td>
                   {{$fm->fc_name}}
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
                    <a class="btn btn-info btn-sm" href="{{url(admin().'/form-ca-documents')}}/{{$fm->id}}" target="_blank" role="button"> <i class="fa fa-eye"></i> </a>
                  </td>
                  <td>
                     <!-- <a href="{{url(admin().'/get-form-ca-pdf-report/'.$fm->form_ca_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-file-pdf-o"></i></a> -->
                     
                    <input type="radio" id="report" name="report" value="{{$fm->id}}" onchange="getReport('{{$fm->form_ca_selected_id}}','{{$fm->id}}','get-form-ca-pdf-report','pdfCAReport')" autocomplete="off">
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
            
            <iframe src="" id="pdfCAReport" width="100%" height="620px" style="border:none;display: none;"></iframe>
          
        </div>
        <!-- <iframe src="{{asset('public/access/media/forms/formCa/documents/'.$user->unique_id.'/Form-CA.pdf')}}" width="100%" height="800px" style="border:none;"></iframe> -->

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
<x-js :file="$formCA" />
@endsection  
@endsection  
