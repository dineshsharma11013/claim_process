@extends("admin_layout.main")

@section("container")

      <style>
      
        @media (min-width:1200px){ 
        .container {       
        width:955px !important;       
        }     
        }           
        
        @media (min-width:768px)
        {     
        .container {    
        width:auto !important;    
        }    
        }       
      
      
      .justify-content-end {
  justify-content: flex-end !important;
}
    *{
      box-sizing: border-box;
      /* overflow-x: hidden;
      width:100%; */
    }
    body{
      background-color: black;
      overflow-x: hidden;
    }
    .my-2{
        margin:5px 0px;
    }
  .form_wrapper{
  width: 80%;
  margin:30px auto;
  padding: 40px;
  background-color: #fff;
  }

  @media only screen and (max-width: 600px) {
    .form_wrapper{
  width: 100%;
  margin: auto;
  padding: 10px;
  background-color: #fff;
  }
  .input-group-text.delete_btn{
    flex-direction:column;
  }
}
  .form_heading{
  text-align:center;
  font-size:22px;
  font-weight:600;
  }
  .form-control:focus, input[type="date"]:focus, input[type="number"]:focus,input[type="email"]:focus{
    border-color: #0f0505;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgb(0 0 0 / 16%);
}
  p{
  margin:0px;
  margin-bottom:2px;
  padding:0px;
  }
  input{
    margin-bottom: 5px!important;
  }
  .w-75{
    width:560px;
  }
/*  input[type="date"]::-webkit-inner-spin-button,*/
/*  input[type="date"]::-webkit-calendar-picker-indicator {*/
/*    display: none;*/
/*    -webkit-appearance: none;*/
/*}*/
input,
input::-webkit-input-placeholder {
    font-size: 12px;
    font-weight: bold;
    margin-left:2px;
    line-height:2;
}

  </style>




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
      <div class="box box-default">
        <div class="box-header with-border">
          
              <!--<h3 class="box-title">Change Password</h3>-->
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/form-2-details')}}" class="btn bg-maroon btn-flat margin text-uppercase" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->

 
      <form id="form2" style="padding:10px;">
            
    <div class="container text-center">
    <h3 class="form_heading">FORM 2 </h3>
    <p>(See sub-rule (1) of rule 9)</p>
    <p style=" margin:auto;"><i>(Under rule 9 of the Insolvency and Bankruptcy (Application to Adjudicating Authority) Rules, 2016) </i></p>
    <h3  style=" text-align: center; margin:8px  auto 0px; font-size:18px;">WRITTEN COMMUNICATION BY PROPOSED INTERIM RESOLUTION PROFESSIONAL</h3>  
    <p style="text-align:right; margin:10px;">Date  <input type="date" name="first_date" value="{{$mnT->date}}" style="border:none;caret-color: transparent;"/> </p>
    </div>
    

    <div class="container">
      <div calss="row">
        <p><b>To</b></p>
        <p>The National Company Law Tribunal</p>
        <p> Address <span class="required_cls">*</span> </p>
        <input type="text" name="address" id="address" value="{{$mnT->address}}" onclick="Removefd('form2','address')" class="form-control my-2" placeholder="Enter your address" style="margin-left:5px;"  />
        <div class="error_cls" id="error_address"></div>

        <p style="margin-top:10px;"><b>From</b></p>
        <p class=" mt-2">Enter Name <span class="required_cls">*</span></p>
        <input type="text" name="name" id="name" class="form-control my-2" value="{{$mnT->name}}" onclick="Removefd('form2','name')" placeholder="Enter your name" style="margin-left:5px;"/>
        <div class="error_cls" id="error_name"></div>

        <p class=" mt-2">Enter Address <span class="required_cls">*</span></p>
        <input type="text" name="office_address" id="office_address" value="{{$mnT->office_address}}" onclick="Removefd('form2','office_address')" class="form-control my-2" placeholder="Enter your Registered office of the proposed interim resolution professional" style="margin-left:5px;"/>
        <div class="error_cls" id="error_office_address"></div>
        
         <p class=" mt-2">Enter Email <span class="required_cls">*</span></p>
        <input type="text" name="email" class="form-control my-2" value="{{$mnT->email}}" onclick="Removefd('form2','email')" id="email" placeholder="Enter your Email" style="margin-left:5px;"/>
        <div class="error_cls" id="error_email"></div>
        
        <p>Contact Number <span class="required_cls">*</span></p>
        <input type="number" name="contact_number" id="contact_number" onkeypress="return isNumberKey(event);" value="{{$mnT->contact_number}}" onclick="Removefd('form2','contact_number')" class="form-control my-2" placeholder="Enter your number" name="contac_number" style="margin-left:5px;"/>
        <div class="error_cls" id="error_contact_number"></div>
      
      </div>
      </div>

      <div class="container">
      <div class="row">
      <p class="mt-2">In the matter of:</p>
      <!-- <input type="text" class="form-control my-2" placeholder=" name of the corporate debtor"/> -->
       
      @if(count($corporateDebtor)>0) 
      @foreach($corporateDebtor as $fl)
      <div class="input-group" id="devve{{$loop->index+1}}" style="display:flex;">
        <input type="text" name="in_matter_crprt_dbtr[]" class="form-control my-2" value="{{$fl->in_matter_corporate_debtor_name}}" placeholder="name of the corporate debtor" autocomplete="off" />
        <input type="hidden" name="other_senc_id[]" value="{{$fl->id}}" autocomplete="off" >
        <span class="input-group-text bg-white  border-0 px-2 " >
          @if($loop->index==0)
          <button type="button" onClick="add_inmatter()" class="btn btn-primary btn-sm " style="margin: 6px;">Add</button>
          @endif
          @if($loop->index!=0)
          <button type="button" id="deleteCorDebBtn{{$loop->index+1}}" onClick="delt_inmatter('{{$loop->index+1}}', 'devve', '{{$fl->id}}', '/remove-form2-data', 'deleteCorDebBtn', 'form2', 'errMessage_4', 'form2_in_matter_corporate_debtors')" class="btn btn-danger btn-sm " style="margin: 6px;">Delete</button>
          @endif
        </span>
      </div>
      @endforeach
      @else
      <div class="input-group" style="display:flex;">
        <input type="text" name="in_matter_crprt_dbtr[]" class="form-control my-2" autocomplete="off" placeholder="name of the corporate debtor"/>
        <input type="hidden" name="other_senc_id[]" value="">
        <span class="input-group-text bg-white  border-0 px-2 " >
          <button type="button" onClick="add_inmatter()" class="btn btn-primary btn-sm " style="margin: 6px;">Add</button>
        </span>
      </div>

      @endif
      
      
      <div id='ad_appnd_metter_dv'></div>

      <div class="my-3">
      <p>M/s Oriental Bank of Commerce </p>
      <input type="text" name="bank_name" autocomplete="off" value="{{$mnT->bank_name}}" id="bank_name" class="form-control my-2" style="margin-left:5px;"/>
      
      <p style="font-size:22px; font-weight:bold;">vs</p>
      <p>M/s Gupta Exim India Pvt. Ltd </p>
      </div>
      </div>
      </div>

       <div class="container">
        <div class="subject"style="margin:10px 0px;">
          <h6> <b>Subject :</b> Written communication in connection with an application to initiate corporate insolvency resolution process in respect of: </h6>
          <input type="text" id="vs_cmp_neme"  onKeyUp="validate_cmp(this.value)" value="{{$mnT->vs_name_of_corporate_debtor}}" name="vs_name_of_corporate_debtor" class="form-control mb-3 mt-3" placeholder=" name of the corporate debtor" style="margin-left:5px;"/>
        <span id="skks"></span>
        </div>
       </div>

       <div class="container">
        <div class="row">
          <p style="font-weight: 600; margin:3px 0px">Madam/Sir,</p>
          <p>I, <input type="text" class="my-0 mx-2" placeholder="name of proposed interim resolution professional" value="{{$mnT->name_of_proposed_resolution}}" name="name_of_proposed_resolution" oninput="autoIncrease(this)" style="min-width:300px;  margin-bottom: 5px!important;"/> an insolvency professional registered with  <input type="text" class="my-0 mx-2" placeholder="name of insolvency professional agency" value="{{$mnT->name_of_insolvency_professional_agency}}" name="name_of_insolvency_professional_agency"  oninput="autoIncrease(this)"  style="min-width:245px;  margin-bottom: 5px!important;"/>  having registration number
             <input type="text" class="my-0 mx-2" placeholder="registration number" value="{{$mnT->rehgisteration_number}}" name="rehgisteration_number" oninput="autoIncrease(this)" style="min-width: 150px;  margin-bottom: 5px!important;"/>  have been proposed as the interim resolution professional by <input type="text" name="name_of_creditor" value="{{$mnT->name_of_creditor}}" class="my-0 mx-2" placeholder="name of application financial creditor/operational creditor/corporate debtor" oninput="autoIncrease(this)" style="width: 100% !important;  margin-bottom: 5px!important;"/>  in connection with the proposed corporate insolvency resolution process of <input type="text" name="insovency_resolution_corporate_debtor" value="{{$mnT->insovency_resolution_corporate_debtor}}" class="my-0 mx-2" placeholder="name of the corporate debtor" oninput="autoIncrease(this)"  style="width:100%;  margin-bottom: 5px!important;"/>.</p>
          <p class="mt-3" style="font-weight:600;">In accordance with rule 9 of the Insolvency and Bankruptcy (Application to Adjudicating Authority) Rules, 2016, I hereby:</p>
        

        <ol type="I" style="margin-left:15px; margin-top:8px;">
        <li style="font-weight:600;">   agree to accept appointment as the interim resolution professional if an order admitting the present application is passed;</li>
        <li>    state that the registration number allotted to me by the Board is <input type="text" name="inter_registration_number" value="{{$mnT->inter_registration_number}}" class="my-0 mx-2" placeholder="inter registration number" oninput="autoIncrease(this)" style="min-width: 250px;  margin-bottom: 5px!important;"/> and that I am currently qualified to practice as an insolvency professional;</li>
        <li>    disclose that I am currently serving as Resolution Professional in three cases-
       </li>

        <!-- <li>certify that there are no disciplinary proceedings pending against me with the Board or Indian Institute of Insolvency Professionals of ICAI;</li>
        <li>affirm that I am eligible to be appointed as a resolution professional in respect of the corporate debtor in accordance with the provisions of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations,2016;</li>
       -->
        </ol>

        <div class="assigmnet_table_section mt-3 table-responsive">
        <table class="table table align-middle " id='irp_row' style="
    margin-bottom: 0px;
">
          <thead>
            <tr>
              <th scope="col">Sl no.</th>
              <th scope="col">Assignment as</th>
              <th scope="col">No of Assignments</th>
              <th scope="col">Name of Corporate debtor</th>
              <th scope="col">Date of commencement of process </th>
              <th scope="col">Expected date of closure of process </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
            <tr>
               <td colspan="7"> <b>Coporate Processes</b>
               </tr>
            @if(count($indIrps)>0)
            @foreach($indIrps as $cl)
            
                <tr id="row_irp_row_{{$loop->index+1}}">
                  @if($loop->index+1==1)
                  <th scope="row">1</th>
                  <td>IRP</td>
                  <td><input name="no_of_irp_assignment" type="number" autocomplete="off" value="{{$mnT->no_of_irp_assignment}}" autocomplete="off" min='1' id="no_of_irp_assignment" style="width:120px"/></td>
                  @else
                  <th></th><td></td><td></td>
                  @endif
                  <td><input type="text" name="name_of_corporate_debtor[]" autocomplete="off"  value="{{$cl->name_of_corporate_debtor}}" style="width:120px"/></td>
                  <td><input type="date" name="commencement_date[]" autocomplete="off" value="{{$cl->commencement_date}}" style="width:120px"/></td>
                  <td><input type="date" name="expected_date_closure_process[]" autocomplete="off" value="{{$cl->expected_date_closure_process}}" style="width:120px"/></td>
                  <input type="hidden" name="other_corporate_id[]" autocomplete="off" value="{{$cl->id}}">
                  <td>
                    @if($loop->index+1==1)
                    <button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('irp_row', 'name_of_corporate_debtor', 'commencement_date', 'expected_date_closure_process', 'no_of_irp_assignment')">Add</button>
                    @endif
                    @if($loop->index+1!=1)
                    <button type="button" id="deleteIrpBtn{{$loop->index+1}}" onClick="delete_corporate('{{$loop->index+1}}', 'irp_row', '{{$cl->id}}', '/remove-form2-data', 'deleteIrpBtn', 'form2', 'errMessage_4', 'form2_mdl_irps')" class="btn btn-danger btn-sm " style="margin: 6px;">Delete</button>
                    @endif
                  </td>
                </tr>
              @endforeach  

              @else

                <tr id="row_irp_row_1">
                  <th scope="row">1</th>
                  <td>IRP</td>
                  <td><input name="no_of_irp_assignment" type="number" autocomplete="off" min='1' id="no_of_irp_assignment" style="width:120px"/></td>
                  <td><input type="text" name="name_of_corporate_debtor[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="commencement_date[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="expected_date_closure_process[]" autocomplete="off" style="width:120px"/></td>
                  
                  <td><button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('irp_row', 'name_of_corporate_debtor', 'commencement_date', 'expected_date_closure_process', 'no_of_irp_assignment')">Add</button></td>
                </tr>

              @endif
            </tbody>
            </table>
            
                
        
        <table class="table table align-middle " id='rp_row' style="margin-bottom:0px;">
           <thead>
            <tr>
             <th scope="col" style="visibility:hidden">Sl no.</th>
              <th scope="col" style="visibility:hidden">Assignment as</th>
              <th scope="col" style="visibility:hidden">No of Assignments</th>
              <th scope="col" style="visibility:hidden">Name of Corporate debtor</th>
              <th scope="col" style="visibility:hidden">Date of commencement of process </th>
              <th scope="col" style="visibility:hidden">Expected date of closure of process </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
               <tr>
              
                </tr>

                @if(count($mdlRps)>0)
                @foreach($mdlRps as $rp)
            
                <tr id="row_rp_row_{{$loop->index+1}}">
                  @if($loop->index+1==1)
                  <th scope="row">2</th>
                  <td>RP</td>
                  <td><input name="no_of_rsdsdsdment" type="number" autocomplete="off" value="{{$mnT->number_of_rp_assgnmt}}" autocomplete="off" min='1' id="no_of_rsdsdsdment" style="width:120px"/></td>
                  @else
                  <th></th><td></td><td></td>
                  @endif
                  <td><input type="text" name="rp_neme_crprt_debtr[]" autocomplete="off" value="{{$rp->name_of_corporate_debtor}}" style="width:120px"/></td>
                  <td><input type="date" name="rp_date_of_cmnsmnt_prcss[]" autocomplete="off" value="{{$rp->commencement_date}}" style="width:120px"/></td>
                  <td><input type="date" name="rp_expected_date_clsr_prcss[]" autocomplete="off" value="{{$rp->expected_date_closure_process}}" style="width:120px"/></td>
                  <input type="hidden" name="other_rp_id[]" value="{{$rp->id}}" autocomplete="off">
                  <td>
                    @if($loop->index+1==1)
                    <button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('rp_row', 'rp_neme_crprt_debtr', 'rp_date_of_cmnsmnt_prcss', 'rp_expected_date_clsr_prcss', 'no_of_rsdsdsdment')">Add</button>
                    @endif
                    @if($loop->index+1!=1)
                    <button type="button" id="deleteRpBtn{{$loop->index+1}}" onClick="delete_corporate('{{$loop->index+1}}', 'rp_row', '{{$rp->id}}', '/remove-form2-data', 'deleteRpBtn', 'form2', 'errMessage_4', 'form2_mdl_rps')" class="btn btn-danger btn-sm " style="margin: 6px;">Delete</button>
                    @endif
                  </td>
                </tr>
              @endforeach  

              @else

                <tr id="row_rp_row_1">
                  <th scope="row">2</th>
                  <td>RP</td>
                  <td><input name="no_of_rsdsdsdment" type="number" autocomplete="off" min='1' id="no_of_rsdsdsdment" style="width:120px"/></td>
                  <td><input type="text" name="rp_neme_crprt_debtr[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="rp_date_of_cmnsmnt_prcss[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="rp_expected_date_clsr_prcss[]" autocomplete="off" style="width:120px"/></td>
                  
                  <td><button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('rp_row', 'rp_neme_crprt_debtr', 'rp_date_of_cmnsmnt_prcss', 'rp_expected_date_clsr_prcss', 'no_of_rsdsdsdment')">Add</button></td>
                </tr>

              @endif

            </tbody>
            </table>
            
                  <table class="table table align-middle " id='lqdtr_rw' style="margin-bottom:0px;">
           <thead>
            <tr>
             <th scope="col" style="visibility:hidden">Sl no.</th>
              <th scope="col" style="visibility:hidden">Assignment as</th>
              <th scope="col" style="visibility:hidden">No of Assignments</th>
              <th scope="col" style="visibility:hidden">Name of Corporate debtor</th>
              <th scope="col" style="visibility:hidden">Date of commencement of process </th>
              <th scope="col" style="visibility:hidden">Expected date of closure of process </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
               <tr>
                </tr>

                @if(count($mdlLiqVol)>0)
            @foreach($mdlLiqVol as $lq)
            
                <tr id="row_lqdtr_rw_{{$loop->index+1}}">
                  @if($loop->index+1==1)
                  <th scope="row">3</th>
                  <td style="width: 125px;">Liquidator (including voluntary liquidations)</td>
                  <td><input name="numbr_of_lqdtr_voluntry" type="number" value="{{$mnT->no_of_irp_assignment}}" autocomplete="off" min='1' id="numbr_of_lqdtr_voluntry" style="width:120px"/></td>
                  @else
                  <th></th><td></td><td></td>
                  @endif
                  <td><input type="text" name="lqdtr_coprorate_dbtr_neme[]" autocomplete="off" value="{{$lq->name_of_corporate_debtor}}" style="width:120px"/></td>
                  <td><input type="date" name="lqdtr_date_of_cmncmnt[]" autocomplete="off" value="{{$lq->commencement_date}}" style="width:120px"/></td>
                  <td><input type="date" name="lqdtr_expected_clsr_cmncmnt[]" autocomplete="off" value="{{$lq->expected_date_closure_process}}" style="width:120px"/></td>
                  <input type="hidden" name="other_lqdtr_id[]" autocomplete="off" value="{{$lq->id}}">
                  <td>
                    @if($loop->index+1==1)
                    <button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('lqdtr_rw', 'lqdtr_coprorate_dbtr_neme', 'lqdtr_date_of_cmncmnt', 'lqdtr_expected_clsr_cmncmnt', 'numbr_of_lqdtr_voluntry')">Add</button>
                    @endif
                    @if($loop->index+1!=1)
                    <button type="button" id="deleteLqBtn{{$loop->index+1}}" onClick="delete_corporate('{{$loop->index+1}}', 'lqdtr_rw', '{{$lq->id}}', '/remove-form2-data', 'deleteLqBtn', 'form2', 'errMessage_4', 'form2_mdl_liquidator_volutaries')" class="btn btn-danger btn-sm " style="margin: 6px;">Delete</button>
                    @endif
                  </td>
                </tr>
              @endforeach  

              @else

                <tr id="row_lqdtr_rw_1">
                  <th scope="row">3</th>
                  <td style="width: 125px;">Liquidator (including voluntary liquidations)</td>
                  <td><input name="numbr_of_lqdtr_voluntry" type="number" autocomplete="off" min='1' id="numbr_of_lqdtr_voluntry" style="width:120px"/></td>
                  <td><input type="text" name="lqdtr_coprorate_dbtr_neme[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="lqdtr_date_of_cmncmnt[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="lqdtr_expected_clsr_cmncmnt[]" autocomplete="off" style="width:120px"/></td>
                 
                  <td><button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('lqdtr_rw', 'lqdtr_coprorate_dbtr_neme', 'lqdtr_date_of_cmncmnt', 'lqdtr_expected_clsr_cmncmnt', 'numbr_of_lqdtr_voluntry')">Add</button></td>
                </tr>
              @endif

            </tbody>
            </table>
            
            
             <table class="table table align-middle " id='authrprsnt_rw' style="margin-bottom:0px;">
           <thead>
            <tr>
             <th scope="col" style="visibility:hidden">Sl no.</th>
              <th scope="col" style="visibility:hidden">Assignment as</th>
              <th scope="col" style="visibility:hidden">No of Assignments</th>
              <th scope="col" style="visibility:hidden">Name of Corporate debtor</th>
              <th scope="col" style="visibility:hidden">Date of commencement of process </th>
              <th scope="col" style="visibility:hidden">Expected date of closure of process </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
               <tr>
                </tr>

                @if(count($arDetails)>0)
            @foreach($arDetails as $ar)
            
                <tr id="row_authrprsnt_rw_{{$loop->index+1}}">
                  @if($loop->index+1==1)
                  <th scope="row">4</th>
                  <td style="width: 125px;">Authorised Representative</td>
                  <td><input name="form_2_mdl_no_of_ar_assign_corporate_process" autocomplete="off" type="number" value="{{$mnT->no_of_irp_assignment}}" autocomplete="off" min='1' id="form_2_mdl_no_of_ar_assign_corporate_process" style="width:120px"/></td>
                  @else
                  <th></th><td></td><td></td>
                  @endif
                  <td><input type="text" name="ar_name_of_corporate_debtor[]" autocomplete="off" value="{{$ar->name_of_corporate_debtor}}" style="width:120px"/></td>
                  <td><input type="date" name="ar_commencement_date[]" autocomplete="off" value="{{$ar->commencement_date}}" style="width:120px"/></td>
                  <td><input type="date" name="ar_expected_date[]" autocomplete="off" value="{{$ar->expected_date_closure_process}}" style="width:120px"/></td>
                  <input type="hidden" name="other_ar_id[]" autocomplete="off" value="{{$ar->id}}">
                  <td>
                    @if($loop->index+1==1)
                    <button type="button" class="btn btn-sm btn-primary"  onClick="add_corporate('authrprsnt_rw', 'ar_name_of_corporate_debtor', 'ar_commencement_date', 'ar_expected_date', 'form_2_mdl_no_of_ar_assign_corporate_process')">Add</button>
                    @endif
                    @if($loop->index+1!=1)
                    <button type="button" id="deleteIrpBtn{{$loop->index+1}}" onClick="delete_corporate('{{$loop->index+1}}', 'authrprsnt_rw', '{{$ar->id}}', '/remove-form2-data', 'deleteIrpBtn', 'form2', 'errMessage_4', 'form2_mdl_ar_details')" class="btn btn-danger btn-sm " style="margin: 6px;">Delete</button>
                    @endif
                  </td>
                </tr>
              @endforeach  

              @else

                <tr id="row_authrprsnt_rw_1">
                  <th scope="row">4</th>
                  <td style="width: 125px;">Authorised Representative</td>
                  <td><input name="form_2_mdl_no_of_ar_assign_corporate_process" autocomplete="off" type="number" autocomplete="off" min='1' id="form_2_mdl_no_of_ar_assign_corporate_process" autocomplete="off" style="width:120px"/></td>
                  <td><input type="text" name="ar_name_of_corporate_debtor[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="ar_commencement_date[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="ar_expected_date[]" autocomplete="off" style="width:120px"/></td>
                
                  <td><button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('authrprsnt_rw', 'ar_name_of_corporate_debtor', 'ar_commencement_date', 'ar_expected_date', 'form_2_mdl_no_of_ar_assign_corporate_process')">Add</button></td>
                </tr>

              @endif

            
            </tbody>
            </table>
            
             <table class="table table align-middle " id='indvdl_rw' style="margin-bottom:0px;">
           <thead>
            <tr>
             <th scope="col" style="visibility:hidden">Sl no.</th>
              <th scope="col" style="visibility:hidden">Assignment as</th>
              <th scope="col" style="visibility:hidden">No of Assignments</th>
              <th scope="col" style="visibility:hidden">Name of Corporate debtor</th>
              <th scope="col" style="visibility:hidden">Date of commencement of process </th>
              <th scope="col" style="visibility:hidden">Expected date of closure of process </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
               <tr>
              <th colspan='7'>Individual Processes</th>
                </tr>
          

              @if(count($indRps)>0)
            @foreach($indRps as $ind)
            
                <tr id="row_indvdl_rw_{{$loop->index+1}}">
                  @if($loop->index+1==1)
                  <th scope="row">1</th>
                  <td style="width: 125px;">Resolution Professional</td>
                  <td><input name="individual_processes_rp_number" type="number" autocomplete="off" value="{{$mnT->individual_processes_rp_number}}" autocomplete="off" min='1' id="individual_processes_rp_number" style="width:120px"/></td>
                  @else
                  <th></th><td></td><td></td>
                  @endif
                  <td><input type="text" name="indvdl_rp_crprt_dbtr[]" autocomplete="off" value="{{$ind->name_of_corporate_debtor}}" style="width:120px"/></td>
                  <td><input type="date" name="indvdl_rp_cmncmt_dete[]" autocomplete="off" value="{{$ind->commencement_date}}" style="width:120px"/></td>
                  <td><input type="date" name="indvdl_rp_clsr_dete[]" autocomplete="off" value="{{$ind->expected_date_closure_process}}" style="width:120px"/></td>
                  <input type="hidden" name="other_rsp_id[]" autocomplete="off" value="{{$ind->id}}">
                  <td>
                    @if($loop->index+1==1)
                    <button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('indvdl_rw', 'indvdl_rp_crprt_dbtr', 'indvdl_rp_cmncmt_dete', 'indvdl_rp_clsr_dete', 'individual_processes_rp_number')">Add</button>
                    @endif
                    @if($loop->index+1!=1)
                    <button type="button" id="deleteRspBtn{{$loop->index+1}}" onClick="delete_corporate('{{$loop->index+1}}', 'indvdl_rw', '{{$ind->id}}', '/remove-form2-data', 'deleteRspBtn', 'form2', 'errMessage_4', 'form2_mdl_individiual_rps')" class="btn btn-danger btn-sm " style="margin: 6px;">Delete</button>
                    @endif
                  </td>
                </tr>
              @endforeach  

              @else

                <tr id="row_indvdl_rw_1">
                  <th scope="row">1</th>
                  <td style="width: 125px;">Resolution Professional</td>
                  <td><input name="individual_processes_rp_number" autocomplete="off" type="number" autocomplete="off" min='1' id="individual_processes_rp_number" style="width:120px"/></td>
                  <td><input type="text" name="indvdl_rp_crprt_dbtr[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="indvdl_rp_cmncmt_dete[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="indvdl_rp_clsr_dete[]" autocomplete="off" style="width:120px"/></td>
                  
                  <td><button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('indvdl_rw', 'indvdl_rp_crprt_dbtr', 'indvdl_rp_cmncmt_dete', 'indvdl_rp_clsr_dete', 'individual_processes_rp_number')">Add</button></td>
                </tr>

              @endif
                
            </tbody>
            </table>
            <table class="table table align-middle " id="bank_cruptancy_rw" style="margin-bottom:0px;">
           <thead>
            <tr>
             <th scope="col" style="visibility:hidden">Sl no.</th>
              <th scope="col" style="visibility:hidden">Assignment as</th>
              <th scope="col" style="visibility:hidden">No of Assignments</th>
              <th scope="col" style="visibility:hidden">Name of Corporate debtor</th>
              <th scope="col" style="visibility:hidden">Date of commencement of process </th>
              <th scope="col" style="visibility:hidden">Expected date of closure of process </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
               <tr>
              
                </tr>
                @if(count($indBankCrpt)>0)
            @foreach($indBankCrpt as $inB)
            
                <tr id="row_bank_cruptancy_rw_{{$loop->index+1}}">
                  @if($loop->index+1==1)
                  <th scope="row">2</th>
                  <td style="width: 125px;">Bankruptcy Trustee</td>
                  <td><input name="bank_cruptancy_trustee_individual" type="number" value="{{$mnT->bank_cruptancy_trustee_individual}}" autocomplete="off" min='1' id="bank_cruptancy_trustee_individual" style="width:120px"/></td>
                  @else
                  <th></th><td></td><td></td>
                  @endif
                  <td><input type="text" name="bank_cruptcy_corporate_debtr_neme[]" autocomplete="off" value="{{$inB->name_of_corporate_debtor}}" style="width:120px"/></td>
                  <td><input type="date" name="bank_cruptcy_cmncmnt_dete[]" autocomplete="off" value="{{$inB->commencement_date}}" style="width:120px"/></td>
                  <td><input type="date" name="bank_cruptcy_clsr_dete[]" autocomplete="off" value="{{$inB->expected_date_closure_process}}" style="width:120px"/></td>
                  <input type="hidden" name="other_bank_cruptcy_id[]" autocomplete="off" value="{{$inB->id}}">
                  <td>
                    @if($loop->index+1==1)
                    <button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('bank_cruptancy_rw', 'bank_cruptcy_corporate_debtr_neme', 'bank_cruptcy_cmncmnt_dete', 'bank_cruptcy_clsr_dete', 'bank_cruptancy_trustee_individual')">Add</button>
                    @endif
                    @if($loop->index+1!=1)
                    <button type="button" id="deleteinBBtn{{$loop->index+1}}" onClick="delete_corporate('{{$loop->index+1}}', 'bank_cruptancy_rw', '{{$inB->id}}', '/remove-form2-data', 'deleteinBBtn', 'form2', 'errMessage_4', 'form2_mdl_individiual_bank_cruptancies')" class="btn btn-danger btn-sm " style="margin: 6px;">Delete</button>
                    @endif
                  </td>
                </tr>
              @endforeach  

              @else

                <tr id="row_bank_cruptancy_rw_1">
                  <th scope="row">2</th>
                  <td style="width: 125px;">Bankruptcy Trustee</td>
                  <td><input name="bank_cruptancy_trustee_individual" type="number" autocomplete="off" min='1' id="bank_cruptancy_trustee_individual" style="width:120px"/></td>
                  <td><input type="text" name="bank_cruptcy_corporate_debtr_neme[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="bank_cruptcy_cmncmnt_dete[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="bank_cruptcy_clsr_dete[]" autocomplete="off" style="width:120px"/></td>
                 
                  <td><button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('bank_cruptancy_rw', 'bank_cruptcy_corporate_debtr_neme', 'bank_cruptcy_cmncmnt_dete', 'bank_cruptcy_clsr_dete', 'bank_cruptancy_trustee_individual')">Add</button></td>
                </tr>

              @endif


            </tbody>
            </table>
            
               <table class="table table align-middle " id="any_other_rw" style="margin-bottom:0px;">
           <thead>
            <tr>
             <th scope="col" style="visibility:hidden">Sl no.</th>
              <th scope="col" style="visibility:hidden">Assignment as</th>
              <th scope="col" style="visibility:hidden">No of Assignments</th>
              <th scope="col" style="visibility:hidden">Name of Corporate debtor</th>
              <th scope="col" style="visibility:hidden">Date of commencement of process </th>
              <th scope="col" style="visibility:hidden">Expected date of closure of process </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
               <tr>
              
                </tr>
                @if(count($indProcess)>0)
            @foreach($indProcess as $prc)
            
                <tr id="row_any_other_rw_{{$loop->index+1}}">
                  @if($loop->index+1==1)
                  <th scope="row">3</th>
                  <td>Any other</td>
                  <td><input name="number_of_any_other_assignment" type="number" value="{{$mnT->number_of_any_other_assignment}}" autocomplete="off" min='1' id="number_of_any_other_assignment" style="width:120px"/></td>
                  @else
                  <th></th><td></td><td></td>
                  @endif
                  <td><input type="text" name="any_other_crprt_dbtr[]" autocomplete="off" value="{{$prc->name_of_corporate_debtor}}" style="width:120px"/></td>
                  <td><input type="date" name="any_other_cmncment_dete[]" autocomplete="off" value="{{$prc->commencement_date}}" style="width:120px"/></td>
                  <td><input type="date" name="any_other_clsre_dete[]" autocomplete="off" value="{{$prc->expected_date_closure_process}}" style="width:120px"/></td>
                  <input type="hidden" name="other_any_other_id[]" autocomplete="off" value="{{$prc->id}}">
                  <td>
                    @if($loop->index+1==1)
                    <button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('any_other_rw', 'any_other_crprt_dbtr', 'any_other_cmncment_dete', 'any_other_clsre_dete', 'number_of_any_other_assignment')">Add</button>
                    @endif
                    @if($loop->index+1!=1)
                    <button type="button" id="deleteOthBtn{{$loop->index+1}}" onClick="delete_corporate('{{$loop->index+1}}', 'any_other_rw', '{{$prc->id}}', '/remove-form2-data', 'deleteOthBtn', 'form2', 'errMessage_4', 'form2_mdl_any_other_individiual_processes')" class="btn btn-danger btn-sm " style="margin: 6px;">Delete</button>
                    @endif
                  </td>
                </tr>
              @endforeach  

              @else

                <tr id="row_any_other_rw_1">
                  <th scope="row">3</th>
                  <td>Any other</td>
                  <td><input name="number_of_any_other_assignment" type="number" autocomplete="off" min='1' id="number_of_any_other_assignment" style="width:120px"/></td>
                  <td><input type="text" name="any_other_crprt_dbtr[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="any_other_cmncment_dete[]" autocomplete="off" style="width:120px"/></td>
                  <td><input type="date" name="any_other_clsre_dete[]" autocomplete="off" style="width:120px"/></td>
                  
                  <td><button type="button" class="btn btn-sm btn-primary" onClick="add_corporate('any_other_rw', 'any_other_crprt_dbtr', 'any_other_cmncment_dete', 'any_other_clsre_dete', 'number_of_any_other_assignment')">Add</button></td>
                </tr>

              @endif


         
            </tbody>
            </table>
            
    </div>

    </div>
      </div>


      <div class="container">
        <div class="row">
          <ol start="4" type="I" style="margin-left:15px; margin-top:8px;text-align: justify;">
          <li>  certify that there are no disciplinary proceedings pending against me with the Board or Indian Institute of Insolvency Professionals of ICAI;</li>
          <li>  affirm that I am eligible to be appointed as a resolution professional in respect of the corporate debtor in accordance with the provisions of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations,2016;</li>
          <li>  make the following disclosures in accordance with the code of conduct for insolvency professionals as set out in the Insolvency and Bankruptcy Board of India (Insolvency Professionals) Regulations, 2016;</li>

          <ol class="m" style="list-style-type: lower-latin;margin-left:15px; margin-top:8px; margin-bottom:4px;">
            <li>    I will maintain integrity by being honest, straightforward, and forthright in all professional relationships. I will not misrepresent any facts or situations and should refrain from being involved in any action that would bring disrepute to the profession. I will maintain objectivity in professional dealings by ensuring that the decisions are made without the presence of any bias, conflict of interest, coercion, or undue influence of any party, whether directly connected to the insolvency proceedings or not. I shall not acquire in the capacity of interim resolution professional, resolution professional, liquidator, or bankruptcy trustee, directly or indirectly, any of the assets of the debtor, nor knowingly permit any relative to do so.</li>
            <li>    I shall maintain complete independence and impartiality in my  professional relationships and will conduct the insolvency resolution, liquidation or bankruptcy process, as the case may be, independent of external influences. I shall not take up an assignment under the Code if I, any of my relatives, any of the partners or directors of the insolvency professional entity of which I may eventually become a partner or director, or the insolvency professional entity of which I may eventually become a partner or director, is not independent, in terms of the Regulations related to the processes under the Code, in relation to the corporate person/ debtor and its related parties. I shall disclose the existence of any pecuniary or personal relationship with any of the stakeholders entitled to distribution under sections 53 or 178 of the Code, and the concerned corporate person/ debtor as soon as I become aware  of it, by making a declaration of the same to the applicant, committee of creditors, and the person proposing appointment, as applicable  </li>
            <li>  I shall not influence the decision or the work of the committee of creditors or debtor, or other stakeholders under the Code, so as to make any undue or unlawful gains for myself or related parties, or cause any undue preference for any other persons for undue or unlawful gains and shall not adopt any illegal or improper means to achieve any mala fide objectives </li>
            <li>    I shall maintain professional competence by maintaining and upgrading my professional knowledge and skills to render competent professional service</li>
            <li>    I shall inform such persons under the Code as may be required, of a misapprehension or wrongful consideration of a fact of which I become aware, as soon as may be practicable. I will not conceal any material information or knowingly make a misleading statement to the Board, the Adjudicating Authority or any stakeholder, as applicable</li>
            <li>    I will adhere to the time limits prescribed in the Code and the rules, regulations and guidelines there under for insolvency resolution, liquidation or bankruptcy process, as the case may be, and will carefully plan my actions, and promptly communicate with all stakeholders involved for the timely discharge of my duties. I will not act with mala fide intention nor be negligent while performing my functions and duties under the Code</li>
            <li>    I will make all efforts to ensure that all communication to the stakeholders, whether in the form of notices, reports, updates, directions, or clarifications, are made well in advance and in a manner which is simple, clear, and easily understood by the recipients. I will ensure that I maintain written contemporaneous records for any decision taken, the reasons for taking the decision, and the information and evidence in support of such decision. This shall be maintained so as to sufficiently enable a reasonable person to take a view on the appropriateness of his decisions and actions. I will not make any private communication with any of the stakeholders unless required by the Code, rules, regulations and guidelines there under, or orders of the Adjudicating Authority. I will appear, co-operate and be available for inspections and investigations carried out by the Board, any person authorised by the Board or the insolvency professional agency with which I am enrolled. I will provide all information and records as may be required by the Board or the insolvency professional agency with which I am enrolled. I will be available and provide information for any periodic study, research and audit conducted by the Board.</li>
            <li>    I will ensure that confidentiality of the information relating to the insolvency resolution process, liquidation or bankruptcy process, as the case may be, is maintained at all times. However, this shall not prevent me from disclosing any information with the consent of the relevant parties or required by law.</li>
            <li>    I will refrain from accepting too many assignments, if I am unlikely to be able to devote adequate time to each of his assignments. I will not engage in any employment, except when I have temporarily surrendered my certificate of membership with the insolvency professional agency with which I am registered. I will not conduct business which in the opinion of the Board is inconsistent with the reputation of the profession.</li>
            <li>    I will provide services for remuneration which is charged in a transparent manner, is a reasonable reflection of the work necessarily and properly undertaken, and is not inconsistent with the applicable regulations. I will not accept any fees or charges other than those which are disclosed to and approved by the persons fixing his remuneration. I will disclose all costs towards the insolvency resolution process costs, liquidation costs, or costs of the bankruptcy process, as applicable, to all relevant stakeholders, and will endeavour to ensure that such costs are not unreasonable</li>
            <li>    I will not accept gifts or hospitality which undermines or affects my independence as an insolvency professional</li>
            <li>    I shall not offer gifts or hospitality or a financial or any other advantage to a public servant or any other person, intending to obtain or retain work for myself, or to obtain or retain an advantage in the conduct of profession for myself</li>

            <li> 
         
          
           @if(count($mdlDisclosure)>0)
            @foreach($mdlDisclosure as $dis) 
            <div class="input-group my-2" id="descD{{$loop->index+1}}" style="display:flex !important">
            <textarea class="form-control" name="disclsure[]" autocomplete="off" aria-label="With textarea">{{$dis->discosures}}
            </textarea>
            <input type="hidden" name="other_desc_id[]" autocomplete="off" value="{{$dis->id}}">
            <span class="input-group-text delete_btn" style="display:flex; align-items:Center; border:1px solid gray; background:#e9e9e9;">
              @if($loop->index+1==1)
              <button type="button" class="btn btn-sm btn-info" style="height:30px; margin:2px" onClick="add_li()">Add</button>
              @endif
              @if($loop->index+1!=1)
              <button type="button" class="btn btn-sm btn-danger" style="height:30px; margin:2px" id="deletedescDBtn{{$loop->index+1}}" onClick="delt_inmatter('{{$loop->index+1}}', 'descD', '{{$dis->id}}', '/remove-form2-data', 'deletedescDBtn', 'form2', 'errMessage_4', 'form2_mdl_disclosures')">Delete</button>
            </span>
              @endif
              <!--<button type="button" class="btn btn-sm btn-danger "style="height:30px; margin:2px">Delete</button>-->
            </div>
            @endforeach
            @else
            <div class="input-group my-2" style="display:flex !important">
              <textarea class="form-control"  name="disclsure[]" autocomplete="off" aria-label="With textarea">
            </textarea>
            <span class="input-group-text delete_btn" style="display:flex; align-items:Center; border:1px solid gray; background:#e9e9e9;">
              <button type="button" class="btn btn-sm btn-info" style="height:30px; margin:2px" onClick="add_li()">Add</button>
              <!--<button type="button" class="btn btn-sm btn-danger "style="height:30px; margin:2px">Delete</button>-->
            </span>
            </div>
            @endif
          
          
          
          
            </li>
            
            <div id='rww_add'>
                
            </div>
            
          </ol>
        </ol>
      </div>

      </div>

      <div class="container">
        <div class="row justify-content-end">
          
          <div class="col-12 col-md-12 text-align-start">
           
            <div class="sign my-3 " style="width:100%; overflow:hidden;text-align: right;">
              <input type='file' name="sgnture" style="float: right;" autocomplete="off">
              @if(!empty($mnT->signature_of_ip))
              <br><br> 
                    <img src="{{ asset('public/access/media/form2/'.$mnT->unique_id.'/'.$mnT->signature_of_ip) }}" alt="profile image" id="ip_image" width="50" height="50"> 
                    @endif
            </div>
             <p class="text-right my-2">  (signature of the insolvency professional)</p>
            </div>
            
            <div class="col-sm-12  col-md-offset-6 col-md-6 ">
             <div class="name_blocklte" style="margin:10px 0px;">
              <div class="mb-3">
              <p style="text-align: right; my-2">(Name of block letter)</p>
              <input type="text" name="signing_person_name" autocomplete="off" value="{{$mnT->signing_person_name}}" class="form-control"  placeholder="(Name of block letter)">
            </div>

             <p class="text-right ">(Name of insolvency professional entity, if applicable)</p> 
            </div>
            </div>
            
        </div>

        <div class="row">
          <div class="col-md-12 text-editor_add my-2">
          <label>Optional certificate, if required by the applicant making an application under these Rules</label>
          <input type="file" name="optional_certificate" autocomplete="off">
           @if(!empty($mnT->optional_certificate))
              <br>
                    <img src="{{ asset('public/access/media/form2/'.$mnT->unique_id.'/'.$mnT->optional_certificate) }}" alt="profile image" id="ip_image" width="50" height="50"> 
                    @endif
        </div>
        <p>I, hereby, certify that the facts averred by the applicant in the present application are true, accurate and complete and a default has occurred in respect of the relevant corporate debtor. I have reached this conclusion based on the following facts and/or opinion:-</p>
        </div>

          <!--ck_editor-->
        <div class="row">
          <p>Please give details-</p>
          <div class="ck_editor">
            <textarea name="conclusion" id="conclusion" autocomplete="off">{!! $mnT->conclusion !!}</textarea>
          </div>
        </div>
        <!--ck_editor-->
        
        <!-- <div class='row '> -->
               <p style="font-weight:bold;padding-top:5px">Docments if Any</p>
     <div class="input-group my-2" >
           <input type ='file' class='form-control' name="other_doc[]" autocomplete="off" multiple  />
            </div>
           <div id="bannerSection">
                            @if(!empty($mnT->other_doc))
                        @php $banners = explode(", ",$mnT->other_doc);  @endphp  
                       @foreach($banners as $ban)   
                   
                    @if(file_exists(publicP() . '/access/media/form2/'.$mnT->unique_id.'/'.$ban))
                   <img src="{{ asset('public/access/media/form2/'.$mnT->unique_id.'/'.$ban) }}" width="50" height="50">
                   <button type="button" onclick="removeFiles('/remove-form2-file/{{$mnT->id}}/{{$ban}}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
             
                    @endif 
                    @endforeach
                    @endif 
                    </div>

          
            <!-- </div> -->
            
            <div id='ad_dc' class='row'>
</div>


<br><br>
<div class='row'>
<div class='col-md-12'>


<span class='padding-top:5px;'><b>Additional Information</b></span>
<hr/ style="color:black;">

</div>

<div class='col-md-6'>
<p style="font-weight:bold;padding-top:5px">Choose IP/IPE - {{$mnT->ip_ipe}}</p>
<select name="ip_ipe" onChange="shw_iip(this.value)" class="form-control" autocomplete="off">
<option value="">Choose IP/IPE</option>
<option value="IP" {{$mnT->ip_ipe=='IP' ? 'selected' : ''}}>IP</option>
<option value="IPE" {{$mnT->ip_ipe=='IPE' ? 'selected' : ''}}>IPE</option>
</select>
</div> 
<div class='col-md-6' id="neme_of_athrzd_sgntre" {{$mnT->ip_ipe=='IP' ? 'style="display:none;"' : ''}} >
<p style="font-weight:bold;padding-top:5px">Name of Authorized signature</p>
<input type='text' placeholder="Enter name of authorized signature" id="athr_prdx" name="name_authorised_signature" value="{{$mnT->name_authorised_signature}}" class="form-control" autocomplete="off"  >
</div>

<div class='col-md-6'>
    <p style="font-weight:bold;padding-top:5px">Choose Section</p>
<select name="sction" class="form-control" autocomplete="off">
 @foreach(Config::get('site.form2_section') as $sk=>$sv)
    <option value="{{$sk}}" {{$mnT->sction==$sk ? 'selected' : ''}} >{{$sv}}</option> 
 @endforeach 
</select>
    
    
    </div>
</div>
      </div>

<br><br>

 <div class="box-footer">
                <x-ckbutton value="Update" redirect="self" form="form2" btnId="form2Btn" path="/updateform-2/{{$mnT->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />         
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              
                    <div class="col-md-12" id="errMessage_form2">
      
                        
  </div>

              </div>
</form>
   
      <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>


      


@section('script')

<script src="{{asset('public/access/ckeditor/ckeditor.js')}}"></script>
     <script type="text/javascript">
    CKEDITOR.replace('conclusion');
   
</script>


<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection   
@endsection  










