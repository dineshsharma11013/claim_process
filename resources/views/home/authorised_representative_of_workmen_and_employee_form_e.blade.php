@extends("home_layout/main")
@section('content')
<style type="text/css">
  .form-control{
    height: 35px;
  }
  
</style>
@php 
$authF = url('/').'/'.Config::get('site.formE');
$bgImage = url('/').'/public/access/82c80ce2dd.jfif';
@endphp
 <div class="container-fluid back">
  <div class="row p-3">
    <div class="col m-3 p-3">



      <form class="mt-0 border border-info rounded form-body" id="financialCreditorFormE">

       <input type="hidden" name="form_type" value="{{$user_type}}">
       <input type="hidden" name="ar" value="{{$ar}}">
       <input type="hidden" name="fid" id="fid" value="{{isset($user->id) ? $user->id : ''}}">
       <input type="hidden" name="fA" id="fA" value="{{isset($formA->id) ? $formA->id : ''}}">
       <input type="hidden" name="form_e_selected_id" id="form_e_selected_id" value="{{isset($user->form_e_selected_id) ? $user->form_e_selected_id : ''}}">
       <input type="hidden" name="updated_data" id="updated_data" value="">
            <!-- One "tab" for each step in the form: -->
            <div class="tab" id="tab1">
        

               <h2 class="text-center">FORM E </h2>
              <center><h5 class="text-center text-uppercase" style="color: #e0363c;" >PROOF OF CLAIM SUBMITTED BY AUTHORISED REPRESENTATIVE OF WORKMEN AND EMPLOYEES </h5></center>
              <h6 class="text-center">(Under Regulation 9 of the Insolvency and Bankruptcy (Insolvency Resolution Process for Corporate Persons) Regulations, 2016)</h6>
              <h4 style="float: right;">@if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</h4>

              <h4>From</h4>

              <p>{{isset($cat->name) ? $cat->name : ''}} <br> {{isset($cat->address) ? $cat->address : ''}}</p>


              <h4>To</h4>
              <p>The Interim Resolution Professional / Resolution Professional <br>{{$irp->username}} <br>{{$irp->address}}</p>


              

              <h4><b>Subject:</b>Submission of proofs of claim.</h4><br>


              <h4>Madam/Sir</h4>

              <p class="text-dark">I {{$cat->name}} currently residing at {{$cat->address}}, on behalf of the workmen and employees employed by the above named corporate debtor and listed in Annexure A, solemnly affirm and say:</p>


              <p>1. That the above named corporate debtor was, at the insolvency commencement date, being the {{getDat($formA->corporate_debtor_insolvency_date)}} day of {{getMonth($formA->corporate_debtor_insolvency_date)}} {{getYear($formA->corporate_debtor_insolvency_date)}}, justly truly indebted to the several persons whose names, addresses, and descriptions appear in the Annexure A below in amounts severally set against their names in such Annexure A for wages, remuneration and other amounts due to them respectively as workmen or/ and employees in the employment of the corporate debtor in respect of services rendered by them respectively to the corporate debtor during such periods as are set out against their respective names in the said Annexure A. 
                
              </p>


              <p>2. That for which said sums or any part thereof, they have not, nor has any of them, had or received any manner of satisfaction or security whatsoever, save and except the following: <br> [Please state details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim.]</p><br>


              <h4 style="float: right;">Deponent</h4><br>
               <h3 class="text-center">ANNEXURE</h3>


<h6>1. Details of Employees/Workmen</h6>
<table class="table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Select Type </th>
      <th scope="col">Name of Employee / Workman </th>
      <th scope="col">Identification number</th>
      <th scope="col" >Total amount due (Rs.)</th>
      <th scope="col" class="myDIV">Period over which amount due</th>
    </tr>
  </thead>
  <tbody id="myTable2">
    @if(isset($emps) && count($emps)>0)
    @foreach($emps as $emp)
    <tr>
      <th scope="row{{$loop->index+1}}"></th>
      
      <td> <select class="form-select" name="emp_type[]" id="emp_type" autocomplete="off">
                          <option value="">--Select Type--</option>
                          @foreach(Config::get('site.empType') as $ti=>$tp)
                          <option value="{{$ti}}" {{($emp->emp_type==$ti) ? 'selected' : '' }}>{{$tp}}</option>
                          @endforeach  
           </select>
            

      </td>
      <td><input type="text" value="{{$emp->employee_name}}" placeholder="enter details" name="employee_name[]" id="employee_name" autocomplete="off"></td>
      <td> <select class="form-select" name="id_number[]" id="id_number" autocomplete="off">
                          <option value="">--Select--</option>
                          @foreach(Config::get('site.identification_type') as $ti=>$tp)
                          <option value="{{$ti}}" {{($emp->id_number==$ti) ? 'selected' : '' }}>{{$tp}}</option>
                          @endforeach  
           </select>
            <input type="text" value="{{$emp->id_details}}" placeholder="enter details" name="id_details[]" id="id_details" autocomplete="off" >

      </td>
      <td><input type="text" name="total_amt[]" id="total_amt" value="{{$emp->total_amt}}" placeholder="enter details" autocomplete="off"></td>
      <td><input type="text" name="due_amt_period[]" id="due_amt_period" value="{{$emp->due_amt_period}}" placeholder="enter details" autocomplete="off"></td>
    </tr>
    @endforeach
    @else
    <tr>
      <th scope="row1"></th>
      <td>
          <select class="form-select" name="emp_type[]" id="emp_type" autocomplete="off">
                          <option value="">--Select--</option>
                          @foreach(Config::get('site.empType') as $ti=>$tp)
                          <option value="{{$ti}}">{{$tp}}</option>
                          @endforeach   
                       </select>
                       
      </td>
      <td><input type="text" placeholder="enter details" name="employee_name[]" id="employee_name" autocomplete="off"></td>
      <td> <select class="form-select" name="id_number[]" id="id_number" autocomplete="off">
                          <option value="">--Select--</option>
                          @foreach(Config::get('site.identification_type') as $ti=>$tp)
                          <option value="{{$ti}}">{{$tp}}</option>
                          @endforeach   
                       </select>
                       <input type="text" value="" placeholder="enter details" name="id_details[]" id="id_details" autocomplete="off">

      </td>
      <td><input type="text" name="total_amt[]" id="total_amt" placeholder="enter details" autocomplete="off"></td>
      <td><input type="text" name="due_amt_period[]" id="due_amt_period" placeholder="enter details" autocomplete="off"></td>
    </tr>
    @endif

  </tbody>
</table>

      <div class="btn-group mr-2 col-md-4" role="group" aria-label="First group">
        <button class="btn btn-primary btn-sm" type="button" id="append_data" onclick="myFunction3()">Add More</button>
      <button class="btn btn-primary btn-sm" type="button" id="append_onclick" onclick="del2()">Delete Row</button>
    </div> 


                 <p>2. Particulars of how debt was incurred by the corporate debtor, including particulars of any dispute as well as the record of pendency of suit or arbitration proceedings (if any). </p>


                 <p>3. Particulars of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim.</p>


                <div class="mt-1 mb-4">
                <p>(Signature of financial creditor or person authorised to act on its behalf)<br>[Please enclose the authority if this is being submitted on behalf of the financial creditor]</p>


                <input class="form-control" type="file" name="operational_creditor_signature" id="operational_creditor_signature" placeholder="ENTER DETAILS ..." accept="image/*" onchange="loadFile2(event,'cl_signature', 'cl_signtre', 'operational_creditor_signature','error_operational_creditor_signature')" autocomplete="off">

                @if(isset($user->operational_creditor_signature) && $user->operational_creditor_signature != '')
                  <img class="profile-pic-user" id="cl_signtre" src="{{ asset('public/access/media/forms/formE/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" >
                @endif

                <img class="profile-pic-user" src="" id="cl_signature" width="75" height="75" style="display: none;" >

                <input type="hidden" name="operational_creditor_signature_val" id="operational_creditor_signature_val" value="{{isset($user->operational_creditor_signature) ? $user->operational_creditor_signature : ''}}" autocomplete="off">

                <div class="error_cls" id="error_operational_creditor_signature"></div>
                </div>  

                <button class="btn btn-primary" type="button" id="firstStep" onclick="validateData('financialCreditorFormE','firstStep','tab1', 'tab2', check0, 'step1', 'step2', '/form/financial-creditor-form-e','errMessage_1',updateFileData, '/form/get-forme-updated-fileData', '/form/get-formE-updated-table', '/get-formE-signature', 'step2Sign')" >Next</button>

              <div id="errMessage_1">
              </div>

            </div>

             <!-- TAB ONE CLOSED -->

             <!-- TAB FOURTH STARTED -->
            <div class="tab" id="tab2">

                <div class="form-group">
                <label> LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</label><br><br>
                    
                    <div id="fileField">
                  
                  </div>                 
                  </div>

                <div class="form-group">
                <label>PAN number</label>
                <p><input class="form-control" type="file"  name="pan_number_file" autocomplete="off"></p></div> 

                <div class="form-group">
                <label>Passport</label>
                <p><input class="form-control" type="file"  name="passport_file" autocomplete="off"></p></div> 

                <div class="form-group">
                <label>AADHAR Card</label>
                <p><input class="form-control" type="file"  name="aadhar_card" autocomplete="off"></p></div> 


              <p id="otherDocP">Add Other Important Documents</p>

              <table id="myTable1">
              
              </table>
              <br>   
              <div id="step2Sign" style="text-align: center;margin-top: 40px;"></div>
              <br>

               <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab2','tab1','step2','step1');">Previous</button>
             <button class="btn btn-primary" type="button" id="thirdStep" onclick="validateData2('financialCreditorFormE','thirdStep','tab2', 'tab3', check1, 'step2', 'step3', '/form/financial-creditor-form-e-save', 'errMessage_3','/form/get-formE-updated-table');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '', '/get-formE-signature', 'step3Sign');" >Next</button>

              <div id="errMessage_3">
              </div>

            </div>

            <div class="tab" id="tab3">
              

             <div id="declarationDiv"></div>
             <div id="step3Sign" style="text-align: center;margin-top: 40px;"></div>
             
             <br><br>
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab3','tab2','step3','step2');">Previous</button>
              <button class="btn btn-primary" type="button" id="secondStep" onclick="validateData('financialCreditorFormE','firstStep','tab3', 'tab4', check0, 'step3', 'step4', '/form/financial-creditor-form-e','errMessage_1', getPreview);updateTableData('financialCreditorFormE','myTable1','/form/get-formE-updated-table');" >Next</button>

              <div id="errMessage_2">
              </div>
              
            </div>



             <!-- TAB FIFTH STARTED -->
            <div class="tab" id="tab4">
              
              <div id="formEPreview"></div>


              <br><br>
             <button class="btn btn-primary" type="button" id="prevBtn" onclick="prev('tab4','tab3','step4','step3');declaration('declarationDiv', '{{isset($user->id) ? $user->id : ''}}', '', '/get-formE-signature', 'step3Sign');">Previous</button>
             <button class="btn btn-success" type="button" onclick="formSubmit('financialCreditorFormE','financialCreditorFormEBtn','/form/financial-creditor-form-e-submit')" id="financialCreditorFormEBtn">Submit</button>
             <br><br>

             <div id="errMessage_financialCreditorFormE">
              </div>
              
            </div>
             <!-- END FOUR TAB -->

              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px;">
                <span class="step" id="step1"></span>
                <span class="step" id="step2"></span>
                <span class="step" id="step3"></span>
                <span class="step" id="step4"></span>
                <!-- <span class="step" id="step5"></span> -->
               <!--  <span class="step"></span> -->
              </div>



        </form>
    </div>
  </div>
</div>

<script>

function handleChange(check, id)
{
  //alert(id);
  //$("#"+id).toggle();
  let isChecked = $('#'+check)[0].checked;
  if (isChecked) 
  {
    $('#financialCreditorFormE input[id="'+id+'"]').show(); 
    //$("#"+id).show();
  }
  else
  {
    $('#financialCreditorFormE input[id="'+id+'"]').hide(); 
   //$("#"+id).hide(); 
  }
  //console.log(isChecked);
}
</script>

  <style>
    

/* Style the form */
#financialCreditorFormE {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
  outline: 4px solid #ffffff;
  outline-offset: 11px;
}

/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #1861d6;
}


.back{
    width: 100%;
    height:auto;
  min-height:100vh;
    background-image:url({{$bgImage}});
    background-size: 100% 100%;
    background-position: top center;
  }


  .myDIV {
    min-width: 50px;
  }
  </style>


@section('nwJS')
<x-js :file="$authF" />
<x-js :file="$jsl" />
@endsection
@endsection