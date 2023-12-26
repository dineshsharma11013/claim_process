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

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-5">
      <div class="box box-default">
        <div class="box-header">
          
              <h3 class="box-title">{{ucwords($fm->claimant_name)}} Documents Details</h3>
          <!-- <div class="box-tools pull-right">
            <a href="{{url(admin().'/form-b-registered')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div> -->
        </div>
        <!-- /.box-header -->
        <form role="form" id="formEApprovalForm">
        
        <div>
          <hr>
          <p>
          <span style="padding-left: 22px;font-size:16px;">Signature</span>
          @if(isset($fm->operational_creditor_signature))
          @if($fm->operational_creditor_signature != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->operational_creditor_signature))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->operational_creditor_signature) }}" target="_blank">Click Me</a>
          </span>
              @endif
               @endif

              </p>
<hr>
              <p>
          <span style="padding-left: 22px;font-size:16px;">Work order/ Purchase order</span>
          @if(isset($fm->work_purchase_order_file))
          @if($fm->work_purchase_order_file != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->work_purchase_order_file))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->work_purchase_order_file) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>
<hr>

            <p>
          <span style="padding-left: 22px;font-size:16px;">Invoices</span>
          @if(isset($fm->invoices_file))
          @if($fm->invoices_file != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->invoices_file))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->invoices_file) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>
              
              <hr>  

            <p>
          <span style="padding-left: 22px;font-size:16px;">Balance Confirmation</span>
          @if(isset($fm->balance_confirmation_file))
          @if($fm->balance_confirmation_file != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->balance_confirmation_file))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->balance_confirmation_file) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>
      <hr>          
            <p>
          <span style="padding-left: 22px;font-size:16px;">Any correspondence etc</span>
          @if(isset($fm->any_correspondence_file))
          @if($fm->any_correspondence_file != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->any_correspondence_file))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->any_correspondence_file) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>
              
<hr>          <p>
          <span style="padding-left: 22px;font-size:16px;">Authorisation letter</span>
          @if(isset($fm->authorisation_letter_file))
          @if($fm->authorisation_letter_file != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->authorisation_letter_file))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->authorisation_letter_file) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>
              <hr>
              
           <p>
          <span style="padding-left: 22px;font-size:16px;">Bank Statement</span>
          @if(isset($fm->bank_statement_file))
          @if($fm->bank_statement_file != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->bank_statement_file))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->bank_statement_file) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>
              <hr>
              
            <p>
          <span style="padding-left: 22px;font-size:16px;">Copy of ledger</span>
          @if(isset($fm->ledger_copy_file ))
          @if($fm->ledger_copy_file  != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->ledger_copy_file ))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->ledger_copy_file ) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>
              <hr>
              
            <p>
          <span style="padding-left: 22px;font-size:16px;">Computation sheet</span>
          @if(isset($fm->computation_sheet_filee))
          @if($fm->computation_sheet_filee != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->computation_sheet_filee))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->operational_creditor_signature) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>
              <hr>
            <p>
          <span style="padding-left: 22px;font-size:16px;">PAN Card</span>
          @if(isset($fm->pan_number_file))
          @if($fm->pan_number_file != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->pan_number_file))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->pan_number_file) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>
              <hr>
           <p>
          <span style="padding-left: 22px;font-size:16px;">Passport</span>
          @if(isset($fm->passport_file ))
          @if($fm->passport_file != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->passport_file))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->passport_file) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>                                    
              <hr>

              <p>
          <span style="padding-left: 22px;font-size:16px;">Adhar Card</span>
          @if(isset($fm->aadhar_card ))
          @if($fm->aadhar_card != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->aadhar_card))
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fm->aadhar_card) }}" target="_blank">Click Me</a>
          </span>
              @endif @endif

              </p>   


          <hr>


          
            <p style="padding-left: 22px;font-size:16px;"><u>Other Important Documents</u></p>
            @if(count($other_files)>0)  

               @forelse($other_files as $fl)
                 @if(isset($fl->file))
                      @if($fl->file != '' && file_exists('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fl->file))
              <p>        
          <span style="padding-left: 22px;font-size:16px;"> {{$loop->index+1}}. {{$fl->document_name}}</span>
           <span class="pull-right" style="padding-right: 22px;">
            <a href="{{ asset('public/access/media/forms/formE/documents/'.$fm->unique_id.'/'.$fl->file) }}" target="_blank">Click Me</a>
          </span>
          </p>
              @endif
                      @endif
                      @empty
                      @endforelse

             @endif
                 


          <hr>



        </div>





      </form>
    </div>
  </div>
</div>
</section>
</div>

@endsection  