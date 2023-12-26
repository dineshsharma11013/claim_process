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
                        <h3 class="text-center m-0">FORM 2</h3>
                        <p class="text-center fw-bold">(See sub-rule (1) of rule 9)</p>
                        <p class="text-center">(Under rule 9 of the Insolvency and Bankruptcy (Application to Adjudicating Authority) Rules, 2016)</p>
                    </div>
            
            
                     <p class="text-end">{{$mnT->date}}</p>
            

                      <div class="row my-3">
                          
                          <label class="fw-bold my-3">To,</label>
                 
                           <span>The National Company Law Tribunal  </span><br>
                           <span>Address</span><br>
                           <span>{{$mnT->address}}</span>
                      </div> 
                  
                  
                  
                    
                  <div class="row my-3">
                      
                      <label class="fw-bold my-3">From,</label> <br>
                      
                        <span class="fw-bold my-3">{{$mnT->name}} </span> <br>
                            
                       <span>{{$mnT->office_address}}</span> <br>
                       
                       <span class="fw-bold my-3"> Email:  </span>
                         <p>{{$mnT->email}}</p> 
                         
                       <span class="fw-bold my-3"> Contact: </span>
                         <p>{{$mnT->contact_number}}</p> 
                         
                  </div>          
                            
                  
                  
                  <div class="row my-3">   
                        <label class="fw-bold my-3"> In the matter of:  </label>
                        @if(count($corporateDebtor)>0) 
      						@foreach($corporateDebtor as $fl)              
                        <span> {{$fl->in_matter_corporate_debtor_name}}  </span>
                  		@endforeach
                  		@else
                  		@endif
                  </div>   
                  
                  <div class="row my-3">   
                        <label class="fw-bold my-3"> M/s Oriental Bank of Commerce  </label>
                        <span>{{$mnT->bank_name}}</span>

                        </div> 

         
         <h5 class="fw-bold my-3 "> <strong> Subject: </strong> Written communication in connection with an application to initiate corporate insolvency resolution process in respect of: </h5>

<label>Madam/Sir,</label>

<p class="my-3">I, <b>{{$mnT->name_of_proposed_resolution}} </b>, an insolvency professional registered with {{$mnT->name_of_insolvency_professional_agency}} having registration number {{$mnT->rehgisteration_number}} have been proposed as the interim resolution professional by {{$mnT->name_of_creditor}} in connection with the proposed corporate insolvency resolution process of {{$mnT->insovency_resolution_corporate_debtor}}.</p>


<p class="my-3">In accordance with rule 9 of the Insolvency and Bankruptcy (Application to Adjudicating Authority) Rules, 2016, I hereby:</p>


<ul>

    <li>(i)	Agree to accept appointment as the interim resolution professional if an order admitting the present application is passed;</li>
    
    <li>(ii)	State that the registration number allotted to me by the Board is {{$mnT->inter_registration_number}} and that I am currently qualified to practice as an insolvency professional;</li>
    
    <li>(iii)	Disclose that I am currently serving as Resolution Professional in three cases-</li>


    <ol style="list-style-type:lower-alpha">
      <li>Veekay Polycoats Limited</li>
      <li>Unitech machines Limited</li>
      <li>Trading Engineers (International) Limited and as Liquidator in one case of Voluntary Liquidation:</li>
      <li>Climate Change Association India</li>
    </ol>



    <li>(iv) Certify that there are no disciplinary proceedings pending against me with the Board or Indian Institute of Insolvency Professionals of ICAI;</li>
    
    
    <li>(v)	Affirm that I am eligible to be appointed as a resolution professional in respect of the corporate debtor in accordance with the provisions of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corporate Persons) Regulations,2016;</li>
    
    
    <li>(vi)  Make the following disclosures in accordance with the code of conduct for insolvency professionals as set out in the Insolvency and Bankruptcy Board of India (Insolvency Professionals) Regulations, 2016;</li>
    
    
    <ol style="list-style-type:lower-alpha">
      <li>I will maintain integrity by being honest, straightforward, and forthright in all professional relationships. I will not misrepresent any facts or situations and should refrain from being involved in any action that would bring disrepute to the profession. I will maintain objectivity in professional dealings by ensuring that the decisions are made without the presence of any bias, conflict of interest, coercion, or undue influence of any party, whether directly connected to the insolvency proceedings or not. I shall not acquire in the capacity of interim resolution professional, resolution professional, liquidator, or bankruptcy trustee, directly or indirectly, any of the assets of the debtor, nor knowingly permit any relative to do so.</li>
      <li>I shall maintain complete independence and impartiality in my professional relationships and will conduct the insolvency resolution, liquidation or bankruptcy process, as the case may be, independent of external influences. I shall not take up an assignment under the Code if I, any of my relatives, any of the partners or directors of the insolvency professional entity of which I may eventually become a partner or director, or the insolvency professional entity of which I may eventually become a partner or director, is not independent, in terms of the Regulations related to the processes under the Code, in relation to the corporate person/ debtor and its related parties. I shall disclose the existence of any pecuniary or personal relationship with any of the stakeholders entitled to distribution under sections 53 or 178 of the Code, and the concerned corporate person/ debtor as soon as I become aware of it, by making a declaration of the same to the applicant, committee of creditors, and the person proposing appointment, as applicable </li>
      <li>I shall not influence the decision or the work of the committee of creditors or debtor, or other stakeholders under the Code, so as to make any undue or unlawful gains for myself or related parties, or cause any undue preference for any other persons for undue or unlawful gains and shall not adopt any illegal or improper means to achieve any mala fide objectives</li>
      <li>I shall maintain professional competence by maintaining and upgrading my professional knowledge and skills to render competent professional service</li>
      <li>I shall inform such persons under the Code as may be required, of a misapprehension or wrongful consideration of a fact of which I become aware, as soon as may be practicable. I will not conceal any material information or knowingly make a misleading statement to the Board, the Adjudicating Authority or any stakeholder, as applicable</li>
      <li>I will adhere to the time limits prescribed in the Code and the rules, regulations and guidelines there under for insolvency resolution, liquidation or bankruptcy process, as the case may be, and will carefully plan my actions, and promptly communicate with all stakeholders involved for the timely discharge of my duties. I will not act with mala fide intention nor be negligent while performing my functions and duties under the Code</li>
      <li>I will make all efforts to ensure that all communication to the stakeholders, whether in the form of notices, reports, updates, directions, or clarifications, are made well in advance and in a manner which is simple, clear, and easily understood by the recipients. I will ensure that I maintain written contemporaneous records for any decision taken, the reasons for taking the decision, and the information and evidence in support of such decision. This shall be maintained so as to sufficiently enable a reasonable person to take a view on the appropriateness of his decisions and actions. I will not make any private communication with any of the stakeholders unless required by the Code, rules, regulations and guidelines there under, or orders of the Adjudicating Authority. I will appear, co-operate and be available for inspections and investigations carried out by the Board, any person authorised by the Board or the insolvency professional agency with which I am enrolled. I will provide all information and records as may be required by the Board or the insolvency professional agency with which I am enrolled. I will be available and provide information for any periodic study, research and audit conducted by the Board.</li>
      <li>I will refrain from accepting too many assignments, if I am unlikely to be able to devote adequate time to each of his assignments. I will not engage in any employment, except when I have temporarily surrendered my certificate of membership with the insolvency professional agency with which I am registered. I will not conduct business which in the opinion of the Board is inconsistent with the reputation of the profession.</li>
      <li>I will provide services for remuneration which is charged in a transparent manner, is a reasonable reflection of the work necessarily and properly undertaken, and is not inconsistent with the applicable regulations. I will not accept any fees or charges other than those which are disclosed to and approved by the persons fixing his remuneration. I will disclose all costs towards the insolvency resolution process costs, liquidation costs, or costs of the bankruptcy process, as applicable, to all relevant stakeholders, and will endeavour to ensure that such costs are not unreasonable.</li>
      <li>I will not accept gifts or hospitality which undermines or affects my independence as an insolvency professional</li>
      <li>I shall not offer gifts or hospitality or a financial or any other advantage to a public servant or any other person, intending to obtain or retain work for myself, or to obtain or retain an advantage in the conduct of profession for myself</li>
    </ol>


</ul>




    <div class="container" style="float:right;">
                <label class="my-3" style="float:right;">(Signature of the insolvency professional)</label> <br> <br>
            <label class="fw-bold float-end ">{{$mnT->signing_person_name}}</label> <br>
    </div>
    
    


<div class="container" style="float:right;">
    
       
        
        <p class="my-3" >
                        <strong>Date:</strong> {{$mnT->date}} 
        </p> <br> 

    
  
             <p class="my-3" >
               <strong>Place:</strong> {{$mnT->address}}
             </p> 
     <br><br>

        
</div>     
        
        <br><br>   <br><br>





</div>
         
 
     
        
        
        
        
        
            </div>
      
             
             
             
     <div class="clearfix">        
<div class="mt-3"> <br><br><br><br>
    
    <h6 class="text-center">[Optional certification, if required by the applicant making an application under these Rules]</h6>
    
    
    <p>I, hereby, certify that the facts averred by the applicant in the present application are true, accurate and complete and a default has occurred in respect of the relevant corporate debtor. I have reached this conclusion based on the following facts and/or opinion:-</p>
    
    
    <h6 class="text-end">(Signature of the insolvency professional)</h6>
    <span class="text-end">{{$mnT->signing_person_name}}</span>
        
        
</div>   
    </div>
           </div>
    
    <style>
    table, td, th {
      border: 1px solid;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    </style> 
    
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>