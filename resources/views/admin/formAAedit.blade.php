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
      <div class="box box-default">
        <div class="box-header with-border">
          
              <!--<h3 class="box-title">Change Password</h3>-->
          <div class="box-tools pull-right">
            <!-- <a href="{{url(admin().'/sabredge-representative')}}" class="btn bg-maroon btn-flat margin text-uppercase" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a> -->
          </div>
        </div>
        <!-- /.box-header -->
      <style>
      @media (min-width: 1200px)
{
.container {
    width: auto !important;
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

    <style>
    *{
      box-sizing: border-box;
      /* overflow-x: hidden;
      width:100%; */
    }
    body{
      background-color: black;
      overflow-x: hidden;
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
  .form-control:focus,input[type="number"]:focus,input[type="email"]:focus{
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
.text-end {
    text-align: right!important;
}

.d-flex{
    
    display:flex !important;
}

  </style>
  


        <form id='postformAAEdit' style="padding: 10px;">
            

  
    <div class="">
    <div class="container text-center">
    <h3 class="form_heading">FORM AA </h3>
    <h3  style=" text-align: center; margin:8px  auto 0px; font-size:18px;">WRITTEN COMMUNICATION BY PROPOSED INTERIM RESOLUTION PROFESSIONAL</h3>  
    <p style=" margin:auto;">( Under Regulation 3(1A) of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations, 2016 ) </p>
    <p style="text-align:right; margin:10px;">Date  <input type="date" value="{{$data->first_date}}" name="first_date" style="border:none;caret-color: transparent;"/> </p>
    </div>



    <div class="container">
      <div calss="row">
        <p style="margin-top:10px;"><b>From</b></p>
        <p class=" mt-2">Enter Name</p>
        <input type="text" class="form-control my-2" placeholder="Enter your name" value="{{$data->from_name}}" name="from_name" style="margin-left:5px;"/>
        <p class=" mt-2">Registration number of the insolvency professional</p>
        <input type="text"  value="{{$data->registeration_number_insolvency_professional}}" name="registeration_number_insolvency_professional" class="form-control my-2" placeholder="Registration number of the insolvency professional" style="margin-left:5px;"/>
        
        <p>Address of the insolvency professional registered with the Board</p>
        <input type="text"  value="{{$data->address_of_insolvency_professional}}" name="address_of_insolvency_professional" class="form-control my-2" placeholder="Address of the insolvency professional registered with the Board" style="margin-left:5px;"/>
        
        <p>Address </p>
        <input type="text" name="address" value="{{$data->address}}" class="form-control my-2" placeholder="Address" style="margin-left:5px;"/>
        
        <p>Email id </p>
        <input type="email" name="email_id" value="{{$data->email_id}}"  class="form-control my-2" placeholder="Enter Email id" style="margin-left:5px;"/>
        

        <p><b>To</b></p>
        <p>The Committee of Creditors</p>
        <p>Name of corporate debtor </p>
        <input type="text" class="form-control my-2" value="{{$data->name_of_corporate_debtor}}" name="name_of_corporate_debtor" placeholder="name of corporate debtor" style="margin-left:5px;"/>

        
      </div>
      </div>

      

       <div class="container my-4">
        <div class="subject"style="margin:10px 0px;">
          <h6> <b>Subject :</b> Written communication in connection with an application to initiate corporate insolvency resolution process in respect of: </h6>
         </div>
       </div>

       <div class="container">
        <div class="row">
          <p style="font-weight: 600; margin:3px 0px">Madam/Sir,</p>
          <ol style="margin-left:15px; margin-top:8px;">
          <li>
            I, <input type="text" class="my-0 mx-2"  value="{{$data->insolvency_professional_name}}" name="insolvency_professional_name" placeholder="name" oninput="autoIncrease(this)" style="min-width:100px;  margin-bottom: 5px!important;"/> an insolvency professional registered with  
            
            <input type="text" name="insolvency_agency_name" class="my-0 mx-2" value="{{$data->insolvency_agency_name}}"  placeholder="name of insolvency professional agency" oninput="autoIncrease(this)"  style="min-width:245px;  margin-bottom: 5px!important;"/>  
            and registered with the Board, note that the  <input type="text" value="{{$data->commeetee_name}}" class="my-0 mx-2" name="commeetee_name" placeholder="committee name" oninput="autoIncrease(this)" style="min-width:100px;  margin-bottom: 5px!important;"/> proposes to appoint me as resolution professional under section  
           
            <select id="section" name="section">
             @foreach(Config::get('site.form_aa_section') as $ky => $vl)
              <option value="{{$ky}}" {{$data->section==$ky ? 'selected' : ''}} >{{$vl}}</option> 
             @endforeach 
           </select>
            
            of the Code for corporate insolvency resolution process of
            <input type="text" value="{{$data->process_of_name_of_corporate_debtor}}"  name="process_of_name_of_corporate_debtor" class="my-0 mx-2" placeholder="name of the corporate debtor" oninput="autoIncrease(this)"  style="min-width:180px;  margin-bottom: 5px!important;"/>.
          </li>

        <li style="font-weight:600;">	
          In accordance with regulation 3(1A) of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations, 2016, I hereby give consent to the proposed appointment.
        </li>
       
        <li> I declare and affirm as under: -</li>

        <ol class="m" style="list-style-type: lower-latin;margin-left:15px; margin-top:8px; margin-bottom:4px;">
          <li>	I am registered with the Board as an insolvency professional.</li>
          <li>	I am not subject to any disciplinary proceedings initiated by the Board or the Insolvency Professional Agency.</li>
          <li>	I do not suffer from any disability to act as a resolution professional.</li>
          <li>	I am eligible to be appointed as resolution professional of the corporate debtor under regulation 3 and other applicable provisions of the Code and regulations.</li>
          <li>	I shall make the disclosures in accordance with the code of conduct for insolvency professionals as set out in the Insolvency and Bankruptcy Board of India (Insolvency Professionals) Regulations, 2016;</li>
          <li>	I am having the following processes in hand:</li>
          </ol>
        </ol>

        <div class="assigmnet_table_section mt-3 table-responsive">
        <table id="ad_dc" class="table table-bordered table align-middle ">
          <thead>
            <tr>
              <th scope="col">Sl no.</th>
              <th scope="col">Role as</th>
              <th scope="col">No. of Processes on the date of Consent</th>
             </tr>
          </thead>
          <tbody>
          <tr>
          <th scope="row">1</th>
          <td>Interim Resolution Professional</td>
          <td colspan="3"><input type="text" value="{{$data->no_of_interim_resolution_professional}}" name="no_of_interim_resolution_professional"></td>
          
          </tr>
            
          <!--2-->
          <tr>
          <th scope="row" rowspan="3">2</th>
          <td colspan="4">Resolution Professional of</td>
           </tr>
          <tr>
           <td>a. Corporate Debtors</td>
           <td colspan="3"><input type="text" value="{{$data->rp_of_corporate_debtor}}" name="rp_of_corporate_debtor" /></td>
           </tr>
          <tr>
          <td>b. Individuals</td>
          <td colspan="3"><input type="text"   value="{{$data->rp_of_individuals}}" name="rp_of_individuals"/></td>
          
           </tr>
           <!--2-->


           <!--3-->
          <tr>
            <th scope="row" rowspan="3">3</th>
            <td colspan="4">Liquidator of</td>
             </tr>
            <tr>
             <td> a. Liquidation Processes</td>
             <td colspan="3"><input type="text"  value="{{$data->liquidator_of_liquidation_process}}" name="liquidator_of_liquidation_process"/></td>
             </tr>
            <tr>
            <td> b.Voluntary Liquidation Processes </td>
            <td colspan="3"><input type="text" value="{{$data->voluntary_liquiadation_process}}" name="voluntary_liquiadation_process"/></td>
             </tr>
           <!--3-->


           <tr>
          <th scope="row">4</th>
          <td>Bankruptcy Trustee</td>
          <td colspan="3"><input type="text" value="{{$data->bank_cruptancy_trustee}}" name="bank_cruptancy_trustee"/></td>
         
          </tr>

          <tr>
          <th scope="row">5</th>
          <td>Authorised Representative </td>
          <td colspan="3">
            <div class="div">
             <textarea class="form-control" name="authorise_represantatvie" rows="3"> {{$data->authorise_represantatvie}}</textarea>
            </div>
          </td>
           </tr>

@if(count($any_other_data)>0)
@foreach($any_other_data as $dtet)
          <tr id="row_ad_dc_{{$loop->index+1}}">
              
          <th scope="row">@if($loop->first)6 @endif</th>
          <td>@if($loop->first)Any other (Please state) @endif </td>
          <td><input type="text" value="{{$dtet->no_of_process_date_consent}}" name="no_of_process_date_consent[]"/></td>
          <input type="hidden" name="other_any_other_id[]" value="{{$dtet->id}}">
          <td>
            @if($loop->index == 0)
            <button type="button" class="btn btn-info" onClick="add_prces('ad_dc', 'no_of_process_date_consent')">Add Row</button>
            @endif
            @if($loop->index > 0) 
            <button type="button" class="btn btn-danger" id="deleteOthBtn{{$loop->index+1}}" onClick="del_prces('{{$loop->index+1}}', 'ad_dc', '{{$dtet->id}}', '/remove-form2-data', 'deleteOthBtn', 'postformAAEdit', 'errMessage_4', 'form_aa_mdl_any_others')">Delete</button> 
            @endif
            <td>
          </tr>
@endforeach
@else

<tr id="row_ad_dc_1">
          <th scope="row">6</th>
          <td>Any other (Please state)</td>
          <td><input type="text" name="no_of_process_date_consent[]"/></td>
          
          <td><button type="button" class="btn btn-info" onClick="add_prces('ad_dc', 'no_of_process_date_consent')">Add Row</button><td>
          </tr>
@endif

          </tbody>
        </table>

      
    </div>

    </div>
      </div>



      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 text-align-start">
            <div class="date">
             <p class="text-start">Date</p> 
             <input type="date"  value="{{$data->date}}" name="date">
            </div>
             <div class="place">
              <p class="text-start">Place</p> 
              <input type="text" value="{{$data->place}}"  name="place" placeholder="Place" oninput="autoIncrease(this)" style="min-width: 150px;">
            </div>
          </div>

          <div class="col-12 col-md-6 text-align-start">
            
            <div class="signature_insolvency">
            <div class="sign my-3 " style="width:100%; overflow:hidden; text-align: right;">
           

              <input type='file' name="signature_of_ip" style="float:right;">
                
              @if(!empty($data->signature_of_ip))
              <br><br> 
                    <img src="{{ asset('public/access/media/formAA/'.$data->unique_id.'/'.$data->signature_of_ip) }}" alt="profile image" id="ip_image" width="50" height="50"> 
                    @endif
               </div>
               <p class="text-end"> (signature of the insolvency professional) </p>
              </div>

            <div class="name_blocklte ">
             <p class="text-end ">Registration No. .......</p>
             <div class="d-flex justify-content-end align-items-center">
             <input type="text" value="{{$data->registeration_number}}" name="registeration_number" placeholder="Registration No" oninput="autoIncrease(this)" style=" min-width: 150px; margin-top:5px;"/> 
             </div>
            </div>
             <div class="name_blocklte ">
              <p class="text-end d-block">Authorization for Assignment valid til</p>
              <div class="d-flex justify-content-end align-items-center">
              <input type="date" value="{{$data->authorisation_assignment_valid_till}}"  name="authorisation_assignment_valid_till" placeholder="Registration No" oninput="autoIncrease(this)" style=" min-width: 150px; margin-top:5px;"/> 
              </div>
            </div>
              <div class="name_blocklte d-flex justify-content-end align-items-center">
                <p class="text-end d-block">Regd Address - </p>
                <input type="text" value="{{$data->regd_address}}"  name="regd_address" placeholder="Regd Address" oninput="autoIncrease(this)" style=" min-width: 150px; margin-top:5px;"/> 
                </div>

                <div class="name_blocklte d-flex justify-content-end align-items-center">
                <p class="text-end d-block">Date - </p>
                <input type="date" value="{{$data->down_date}}" name="down_date" placeholder="Regd Address" oninput="autoIncrease(this)" style=" min-width: 150px; margin-top:5px;"/> 
                </div>

                <div class="name_blocklte d-flex justify-content-end align-items-center">
                <p class="text-end d-block me-2">Place - </p>
                <input type="text" value="{{$data->down_place}}" name="down_place" placeholder="place" oninput="autoIncrease(this)" style=" min-width: 150px; margin-top:5px;"/> 
                </div>
          </div>
        </div>

      </div>
  </div>
  
  <div class="box-footer">
                <x-abutton value="Update" redirect="self" form="postformAAEdit" btnId="formAABtn" path="/updatepostformAA/{{$data->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" />         

                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
              
                    <div class="col-md-12" id="errMessage_form2">
      
                        
  </div>

              </div>
 
        <!-- input size auto increase script-->
   

      
</form>
</div>
 
    
        
      <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>


@section('script')
<x-vjs :file="$a_vl" />
<x-js :file="$jsl" />
@endsection  
@endsection  
