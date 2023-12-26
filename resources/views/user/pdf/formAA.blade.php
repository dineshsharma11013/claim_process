<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> FORM AA  </title>

  </head>
  <body>
      
                <div class="container-fluid">
                <div class="row">
                    <h3 class="text-center m-0">FORM AA</h3>
                    <p class="text-center fw-bold">Written Consent To Act As Resolution Professional</p>
                    <p class="text-center">(Under Regulation 6 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corpotate Persons) Regulations, 2016)</p>
                </div>
            
            
                     <p class="text-end">12-Jan-2023</p>
            

                    
                  <div class="row my-3">
                      
                      <label class="fw-bold my-3">From,</label>
                      
                        <span class="fw-bold my-3">{{$data->from_name}}</span> <br>
                            
                       <span>{{$data->registeration_number_insolvency_professional}}</span>
                  </div>          
                            
                  
                  
                  <div class="row my-3">   
                        <label class="fw-bold my-3"> Address: </label>
                                      
                        <span> {{$data->address}}  </span>
                  </div>   
                  
                  
                            
                  <div class="row my-3">   
                        <label class="fw-bold my-3"> Email: </label>
                                      
                        <span> {{$data->email_id}} </span>
                  </div>      


         <span class="fw-bold my-3">To </span> <br>
         
         <span class="fw-bold my-3">The Commitee of creditors </span> <br>
         
         <span class="fw-bold my-3">JC World Hospitality Private Limited </span> <br>
         <span class="fw-bold my-3">{{$data->name_of_corporate_debtor}}</span> <br>
         
         <h5 class="fw-bold my-3 ">  Subject: Written Consent to act as Resolution Professional </h5>



<p class="my-3">I, <b>{{$data->insolvency_professional_name}} </b>, an insolvency professional enrolled with {{$data->insolvency_agency_name}}
and registered with the Board, note that the {{$data->commeetee_name}} proposes to appoint me as resolution professional under section <span>{{$data->section}}</span> of the Code for Corporate Insolvency Resolution Process of {{$data->process_of_name_of_corporate_debtor}}</p>


<p class="my-3">2. In accordance with regulation 3(1A) of the Insolvency and Bankruptcy Board of India (Insolvency Resolution
Process for Corporate Persons) Regulations, 2016, I hereby give consent to the proposed appointment.</p>


<p class="my-3">I declare and affirm as under: -</p>

<ul>a. I am registered with the Board as an insolvency professional.</ul>

<ul>b. I am not subject to any disciplinary proceedings initiated by the Board or the Insolvency Professional Agency.</ul>

<ul>c.  I do not suffer from any disability to act as a resolution professional.</ul>

<ul>d. I am eligible to be appointed as resolution professional of the corporate debtor under regulation 3 and other
applicable provisions of the Code and regulations.  </ul>

<ul>e. I Shall make the disclosures in accordance with the code of conduct for insolvency professionals as set out in
the Insolvency and Bankruptcy Board of India (Insolvency Professionals) Regulations, 2016; </ul>

<ul>f. I am having the following processes in hand:  </ul>













    <style>
    table, td, th {
      border: 1px solid;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    </style> 
        
        
<table class="table ">
  <thead>
    
  </thead>
  <tbody>
    <tr class="table-active ">
      ...
    </tr>
    
    <tr class="bg-light">
        <td colspan="4" style="text-align:center;">Relevant Particular</td>
      
    </tr>
    
    <tr>
      <th  class="p-2" scope="row">S No.</th>
      <td colspan="2" class="table-active p-2">  Role as  </td>
      <td class="p-2">No. of Processes on the date of Consent</td>
    </tr>
    
    
    <tr>
      <th class="p-2" scope="row">1</th>
      <td colspan="2" class="table-active p-2">Interim Resolution Professional </td>
      <td class="p-2">{{$data->no_of_interim_resolution_professional}}     </td>
    </tr>
    
    
    <tr>
      <th class="p-2" scope="row ">2</th>

      <td colspan="2" class="table-active p-2"> Resolution Professional of <br>
          a. Corporate Debtors <br>
          b. Individuals .  
       </td>
      <td class="p-2">a. {{$data->rp_of_corporate_debtor}} <br>b. {{$data->rp_of_individuals}}</td>
    
    </tr>
    
    
    <tr>
      <th class="p-2" scope="row">3</th>
      <td colspan="2" class="table-active p-2">Liquidator of <br>
            a. Liquidation Processes <br>
            b.Voluntary Liquidation Processes   
       </td>
      <td class="p-2">a. {{$data->liquidator_of_liquidation_process}} <br> b. {{$data->voluntary_liquiadation_process}}</td>
    
    </tr>
    

    
    <tr>
      <th class="p-2" scope="row ">4</th>
      <td colspan="2" class="table-active p-2">Bankruptcy Trustee</td>
      <td class="p-2">{{$data->bank_cruptancy_trustee}}</td>
    </tr>
    
    <tr>
      <th class="p-2" scope="row ">5</th>
      <td colspan="2" class="table-active p-2"> Authorised Representative </td>
      <td class="p-2">{{$data->authorise_represantatvie}} <br> However, The Resolution Plan has been approved by CoC in both the cases and pending for approval of Hon'ble NCLT.</td>

    </tr>
    
    @if(count($any_other_data)>0)
@foreach($any_other_data as $dtet)

    <tr>
      <th class="p-2" scope="row ">@if($loop->first)6 @endif</th>
      <td colspan="2" class="table-active p-2">@if($loop->first)Any other (Please state) @endif </td>
      <td class="p-2">{{$dtet->no_of_process_date_consent}}</td>
    </tr>
@endforeach
@else
    <tr>
      <th class="p-2" scope="row ">6</th>
      <td colspan="2" class="table-active p-2">Any other (Please state)</td>
      <td class="p-2"></td>
    </tr>
   
    @endif

  </tbody>
</table>
        

<div class="container" style="float:right;">
    

        <p class="my-3" style="float:right;">
           {{$data->address}}

        </p> <br> <br>
        
        
        <p class="my-3" style="float:right;">
                        <strong>Date:</strong> {{$data->date}}
        </p> <br> <br>

    
  
    <p class="my-3" style="float:right;"> <strong>Place:</strong> {{$data->place}}</p> 
  
  
    
        
   </div>     
        
        
        
        
        
        
        
         <div class="clearfix"></div>
            



<h2 class="text-center">Certificate Of Registration</h2>

<p class="text-center">IP REGISTRATION No. IBBI/IPA-001/IP-P00055/2017-18/10133</p>




<p class="text-center"> [Under Regulation 7 of the Insolvency and Bankruptcy Board of India (Insolvency
Professionals) Regulations, 2016] </p>



<p>1. In exercise of the powers conferred by Regulation 7 of the Insolvency and Bankruptcy i
Board of India (Insolvency Professionals) Regulations, 2016, the Board hereby grants a

certificate of registration to Mr. Vivek Raheja to act as an insolvency professional in

accordance with these Regulations,</p>


<p class="my-3"> 2. *This certificate is valid from <strong> 02™ May, 2017.   </strong> </p>



<div class="container" style="float:right;">
    <p class="text-end my-3"  style="float:right;">  ( Sreekara Rao) </p> <br>
    <p class="text-end my-3"  style="float:right;"> Deputy General Manager </p> <br>
    <p class="text-end my-3"  style="float:right;"> For and on behalf of Insolvency and Bankruptcy Board of India</p>

</div>





</div>
         
       <br> <br>         
<div class="container" style="float:left;">
    <label style="float:left"><strong>Place: </strong> New Delhi</label> <br> <br>
    <label style="float:left"><strong>Date: </strong> 02™ May, 2017</label> <br><br>
</div>
                
                <br><br>
                
                <!-- append section end-->
                
                
    

        
            </div>
          <!-- section start-->
                 <div class="clearfix"></div>
                 
                <div class="my-3">
                    
                   <p class="my-3">“Registration No 1BBi/IPA-001/IP-00006/2016-17/20, granted under Regulation 9 of aforesaid regulations stands cancelled with effect from 02" May, 2017.</p>
           
               </div> 
               
               
               
               
               
           
           <div class="container">
               
                <div class="row">
                    <h3 class="text-center m-0">FORM B</h3>
                    <p class="text-center fw-bold">AUTHORISATION FOR ASSIGNMENT</p>
                    <p class="text-center">(Under bye-law 12A of the Agency’s Bye-laws)</p>
                </div>
                
                
                <div class="text-start">
                    <label>NO:</label>
                    <span>AA1/10133/02/270224/105503</span>                   
                </div>

                
                <div class="text-end">
                    <label>Date:</label>
                    <span>28/02/2023</span>                    
                    
                </div>

               
           </div>    
               
               
               
  
               
           </div>
            
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>