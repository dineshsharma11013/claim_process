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
          
              <h3 class="box-title">Form F claimed by {{ucwords($user->signing_person_name)}}</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/form-f-registered')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="formFApprovalForm">
        
        <div>
          <hr>
         <!--  <span style="padding-left: 22px;padding-right: 22px;font-size:16px;">Details of Employees/Workmen </span> -->
          <!-- <hr> -->
        </div>
        <input type="hidden" name="form_id" value="{{$fid}}">


        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" value="{{isset($user->signing_person_name) ? $user->signing_person_name : ''}}" >
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Claim amount</label>
                  <div class="col-sm-6">
                   <input type="text" class="form-control" id="claim_amt" name="claim_amt" value="{{isset($user->claim_amt) ? $user->claim_amt : ''}}" >
                    </div>
                </div>
        </div>


        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Description of the claim</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" name="claim_amt_desc">{{isset($user->claim_amt_desc) ? $user->claim_amt_desc : ''}}</textarea>
                    
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
                    <textarea class="form-control" name="claim_nature">{{isset($cat->claim_nature) ? $cat->claim_nature : ''}}</textarea>
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
                    <select class="form-control" name="status" id="status" onchange='Removef("status")'>
                      <option value="">Select</option>
                     @foreach(Config::get('site.approval_status') as $si=>$sv)
                     <option value="{{$si}}" {{(isset($cat->status) && $cat->status==$si) ? 'selected' : ''}}>{{$sv}}</option>
                     @endforeach
                    </select>
                    <div class="error_cls" id="error_status"></div>
                  </div>
                </div>
          <!-- /.row -->
        </div>


        <div class="box-footer">
                <x-asbutton value="Save" redirect="none" form="formFApprovalForm" btnId="formFApprBtn" path="/form-f-approval" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       

                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="sendMail('{{$fid}}','userModal','form-f-mail-rp','formBody','formCApprovalForm')">Mail To {{ucwords($user->signing_person_name)}}</button>

                    <div class="col-md-12" id="errMessage_formFApprovalForm">
                        
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
                    <a class="btn btn-info btn-sm" href="{{url(admin().'/form-f-documents')}}/{{$fm->id}}" target="_blank" role="button"> <i class="fa fa-eye"></i> </a>
                  </td>
                  <td>
                    <!--  <a href="{{url(admin().'/get-form-f-pdf-report/'.$fm->form_f_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-file-pdf-o"></i></a> -->

                    <input type="radio" id="report" name="report" value="{{$fm->id}}" onchange="getReport('{{$fm->form_f_selected_id}}','{{$fm->id}}','get-form-f-pdf-report','pdfCReport')" autocomplete="off">
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
            
            <iframe src="" id="pdfCReport" width="100%" height="500px" style="border:none;display: none;"></iframe>
          
        </div>

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
<x-js :file="$formF" />
@endsection  
@endsection  
