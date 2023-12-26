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
      <div class="col-md-5">
      <div class="box box-default">
        <div class="box-header">
          
              <h3 class="box-title">Amount claimed by {{ucwords($userInfo->name)}}</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/form-b-registered')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <form role="form" id="formBApprovalForm">
        
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
                    <input type="text" class="form-control" id="principle_amt" name="principle_amt" value="{{$user->principle_amount}}" readonly>
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Interest</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="interest" name="interest" value="{{$user->interest}}" readonly>
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Total</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{$user->total_amount}}" readonly>
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <hr><span style="padding-left: 22px;font-size:16px;">Approved By RP</span><hr>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Approved Amt. Principal</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="approved_amt_principl" onkeyup ="getApprovedAmt('principle_amt','approved_amt_principl','rejected_amt_principl')" name="approved_amt_principl" autocomplete="off" value="{{isset($cat->approved_principle_amt) ? $cat->approved_principle_amt : ''}}">
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Rejected Principal Amt.</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="rejected_amt_principl" name="rejected_amt_principl" readonly autocomplete="off" value="{{isset($cat->rejected_principle_amt) ? $cat->rejected_principle_amt : ''}}">
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Approved Interest Amt.</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="approved_interest_amt" name="approved_interest_amt" onkeyup ="getInterestAmt('interest','approved_interest_amt','rejected_interest_amt', getOutput)" autocomplete="off" value="{{isset($cat->approved_interest_amt) ? $cat->approved_interest_amt : ''}}">
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Rejected Interest Amt.</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="rejected_interest_amt" name="rejected_interest_amt" readonly autocomplete="off" value="{{isset($cat->rejected_interest_amt) ? $cat->rejected_interest_amt : ''}}">
                  </div>
                </div>
          <!-- /.row -->
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Total Approved Amt.</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="total_approved_amount" name="total_approved_amount" readonly autocomplete="off" value="{{isset($cat->total_approval_amt) ? $cat->total_approval_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Total Rejected Amt.</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="total_rejected_amount" name="total_rejected_amount" readonly autocomplete="off" value="{{isset($cat->total_rejected_amt) ? $cat->total_rejected_amt : ''}}">
                  </div>
                </div>
        </div>

        <div class="box-body">
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Reason</label>
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
                    <select class="form-control" name="status" id="status" onchange = 'Removef("status")' autocomplete="off">
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
                <x-asbutton value="Save" redirect="none" form="formBApprovalForm" btnId="formBApprBtn" path="/form-b-approval" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />
                       
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="sendMail('{{$fid}}','userModal','form-b-mail-rp','formBody','userCredentialForm')">Mail To {{ucwords($userInfo->name)}}</button>

                  

                  
                    <div class="col-md-12" id="errMessage_formBApprovalForm">
                        
  </div>

              </div>
        </form>
      </div>
        <!-- /.box-body -->
        </div>

        <div class="col-md-7">
      <div class="box box-default">

        <div id="showtracker">
      <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <!-- <th>Name</th>
                  <th>Email</th> -->
                  <th>Submitted By</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>View</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($fms as $fm)
                <tr>
                  <td>{{$loop->index+1}} </td>
                 
                  <td>
                   {{ucwords($fm->claimant_name)}}
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

                    <!-- <a href="{{url(admin().'/get-form-b-pdf-report/'.$fm->form_b_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-file-pdf-o"></i></a> -->

                    <input type="radio" id="report" name="report" value="{{$fm->id}}" onchange="getReport('{{$fm->form_b_selected_id}}','{{$fm->id}}','get-form-b-pdf-report','pdfBReport')" autocomplete="off">
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
            
            <iframe src="" id="pdfBReport" width="100%" height="665px" style="border:none;display: none;"></iframe>
          
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
<x-js :file="$formB" />
@endsection  
@endsection  
