<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> FORM A  </title>

  </head>
  <body>
      
                <div class="container-fluid">
                <div class="row">
                    <h3 class="text-center m-0">FORM A</h3>
                    <p class="text-center">Public Announcement</p>
                    <h6 class="text-center">(Under Regulation 6 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corpotate Persons) Regulations, 2016)</h6>
                </div>
                <div class="row">
                    <h6 class="fw-bold text-center" style="font-size:12px;">[FOR THE ATTENTION OF THE CREDITORS OF {{$com_name->name}}]</h6>
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
        
        
<table class="table ">
  <thead>
    ggfgdfg
  </thead>
  <tbody>
    <tr class="table-active ">
      ...
    </tr>
    
    <tr class="bg-light">
        <td colspan="4" style="text-align:center;">Relevant Particular</td>
      
    </tr>
    
    <tr>
      <th  class="p-2" scope="row">1</th>
      <td colspan="2" class="table-active p-2">Name of corporate debtor</td>
      <td class="p-2">{{ucwords($comp->name)}}</td>
    </tr>
    
    
    <tr>
      <th class="p-2" scope="row">2</th>
      <td colspan="2" class="table-active  p-2">Date of incorporation of corporate debtor</td>
      <td class="p-2">{{datFm($cat->incorporation_date)}}</td>
    </tr>
    
    
    <tr>
      <th class="p-2" scope="row ">3</th>
      <td colspan="2" class="table-active p-2">Authority under which corporate debtor is incorporated / registered </td>
      <td class="p-2">{{$cat->corporate_debtor_authority}}</td>
    </tr>
    
    
    <tr>
      <th class="p-2" scope="row">4</th>
      <td colspan="2" class="table-active p-2">Corporate Identity No. / Limited Liability Identification No. of corporate debtor  </td>
      <td class="p-2">{{$cat->corporate_debtor_identity_number}}</td>
    </tr>
    
    <tr>
      <th class="p-2" scope="row">5</th>
      <td colspan="2" class="table-active p-2">Address of the registered office and principal office (if any) of corporate debtor</td>
      <td class="p-2">{{$cat->corporate_debtor_address}}</td>
    </tr>
    
    <tr>
      <th class="p-2" scope="row ">6</th>
      <td colspan="2" class="table-active p-2">Insolvency commencement date in respect of corporate debtor</td>
      <td class="p-2">{{datFm($cat->corporate_debtor_insolvency_date)}}</td>
    </tr>
    
    <tr>
      <th class="p-2" scope="row ">7</th>
      <td colspan="2" class="table-active p-2">Estimated date of closure of insolvency resolution process</td>
      <td class="p-2">{{datFm($cat->insolvency_closing_date)}}</td>
    </tr>
    
    
    <tr>
      <th class="p-2" scope="row ">8</th>
      <td colspan="2" class="table-active p-2">Name and registration number of the insolvency professional acting as interim resolution process </td>
      <td class="p-2">{{$cat->insolvency_professional_name}} <br>
          {{$cat->insolvency_professional_registration_number}}
      </td>
    </tr>
    
    
    <tr>
        <th class="p-2" scope="row ">9</th>
          <td colspan="2" class="table-active p-2">Address and e-mail of the interim resolution professional, as registered with the Board </td>
          <td class="p-2">                                   
                 <p>{{$cat->resolution_professional_address}}</p> 
                 <p>{{$cat->resolution_professional_email}}</p>
           </td>
    </tr>
    
    
    
    <tr>
      <th class="p-2" scope="row ">10</th>
      <td colspan="2" class="table-active p-2">Address and e-mail to be used for correspondence with the interim resolution professional </td>
      <td class="p-2">{{$cat->resolution_professional_email}}</td>
    </tr>
    
    
    <tr>
      <th class="p-2" scope="row ">11</th>
      <td colspan="2" class="table-active p-2">Last date for submission of claims </td>
      <td class="p-2">{{datFm($cat->claim_last_date)}}</td>
    </tr>
    
    
    <tr>
      <th class="p-2" scope="row ">12</th>
      <td colspan="2" class="table-active p-2">Classes of creditors, if any, under clause (b) of sub-section (6A) of section 21, ascertained by the interim resolution professional </td>
      <td class="p-2">
        @if(count($crCls)>0)
          @foreach($crCls as $cr)
          {{$cr->creditor_classess}}<br>
          @endforeach
        @endif
      </td>
    </tr>
    
    <tr>
      <th class="p-2" scope="row ">13</th>
      <td colspan="2" class="table-active p-2">Names of Insolvency Professionals identified to act as Authorised Representative of creditors in a class (Three names for each class) </td>
      <td class="p-2">
        @if(count($crCls)>0)
          @foreach($crCls as $cr)
          @foreach($crMdl as $cm)
            @if($cr->ar1==$cm->id)
             1. {{$cm->name}}<br>
                {{$cm->reg_no}}<br>
            @endif
            @if($cr->ar2==$cm->id)
              {{$cm->name}}<br>
              {{$cm->reg_no}}<br>
            @endif
            @if($cr->ar3==$cm->id)
              {{$cm->name}}<br>
              {{$cm->reg_no}}<br>
            @endif
          @endforeach
          @endforeach
        @endif
      </td>
    </tr>
    
    <tr>
      <th class="p-2"scope="row ">14</th>
      <td  colspan="2" class="table-active p-2">
            (a) Relevant Forms available at: <br>
            (b) Details of authorized representatives 
               are available at: 
      </td>
      
      <td class="p-2">{{$cat->authorized_forms}}
        <br>
          {{$cat->authorized_details}}

      </td>
    </tr>
  </tbody>
</table>
        

            

                
            
                </div>
         
                 <!-- append section start-->
                <div class="clearfix"></div>
                 @if(count($clss)>0)

                  @foreach($clss as $cls)
                <div class="row ">
                <div  style="float:left; width:300px;">
                <p class="fw-bold m-0"  style="font-size:14px;">Classes of creditors, if any, under clauses (b) of sub-section (6A) of section 21, ascertained by the interim resolution professional    </p> 
                <p>{{$cls->creditor_classess}}</p>
                </div>
                <div  style="float:left; width:130px;  position:relative;">
                  <p class="fw-bold m-0"  style="font-size:14px;">AR-1  </p> 
                    <p  style="font-size:14px;">
                        
                        @if(count($crCls)>0)
          @foreach($crCls as $cr)
          @foreach($crMdl as $cm)
            @if($cr->ar1==$cm->id)
              {{$cm->name}}<br>
            @endif
          @endforeach
          @endforeach
        @endif 
    
                    </p> 
                </div>
                <div  style="float:left; width:130px;  position:relative;">
                <p class="fw-bold m-0"  style="font-size:14px;">AR-2  </p> 
                <p  style="font-size:14px;">
                @if(count($crCls)>0)
          @foreach($crCls as $cr)
          @foreach($crMdl as $cm)
           
            @if($cr->ar2==$cm->id)
              {{$cm->name}}<br>
            @endif
           
          @endforeach
          @endforeach
        @endif
                </p> 
                </div>
                <div  style="float:left; width:130px;  position:relative;">
                <p class="fw-bold m-0"  style="font-size:14px;">AR-3  </p> 
                <p  style="font-size:14px;">
                @if(count($crCls)>0)
          @foreach($crCls as $cr)
          @foreach($crMdl as $cm)
           
            @if($cr->ar3==$cm->id)
              {{$cm->name}}<br>
            @endif
          @endforeach
          @endforeach
        @endif
                </p> 
                </div>
                </div>
                @endforeach
                @endif
                
                <!-- append section end-->
                
                
           
                <div class="clearfix"></div>
                <div class="row ">
               {!! $cat->conclusion !!}
               <!--  <p class="m-0">
                Notice is hereby given that the National Company Law Tribunal has ordered the commencement of a corporate insolvency resolution process of the {{$com_name->name}} on {{$cat->corporate_debtor_insolvency_date}}.
                </p>
                <p class="m-0">The creditors of {{$com_name->name}} are hereby called upon to submit their claims with proof on or before {{$cat->claim_last_date}} to the Interim Resolution Professional at the address mentioned against entry No. 10.</p>
                <p class="m-0">The Financial creditors shall submit their claims with proof by electronic means along with the hard copies. All other creditors may submit the claimss with proof in person, by post or any electronic means.</p>
                <p class="m-0">Submission of false or misleading proofs of claim shall attract penalties as per the provisions of IBC, 20216</p> -->
                </div>
                <br>
         
        
                <div class="clearfix"></div>
                <div class="row " style="width:320px; float:left; position:relative;">
                <p>Name and Signature of Interim Resolution Professional  </p>
                <div  style="float:left; width:130px;  position:relative;">
                <p  style="font-size:14px; margin:0px;">
                {{$cat->insolvency_professional_name}}
                </p> 
                </div>
                
                <div  style="float:right; width:120px;  position:relative;">
                <!-- <p  style="font-size:14px; margin:0px;"> Signature </p>  -->
                 @if(!empty($cat->interim_resolution_signature))
                    @if(file_exists(publicP() . '/access/media/forms/formA/'.$cat->unique_id.'/'.$cat->interim_resolution_signature))
                   <img src="{{ asset('public/access/media/forms/formA/'.$cat->unique_id.'/'.$cat->interim_resolution_signature) }}" width="50" height="50">
                    @endif @endif  
                <!-- <img src="https://static.cdn.wisestamp.com/wp-content/uploads/2020/08/Serena-Williams-handwritten-signature.png" style="width:100px;height:50px;" ></img> -->
                </div>
                </div>
             
             
                <div class="row " style="width:320px; float:left; position:relative;">
                <p>Date and Place  </p>
                <div  style="float:left; width:130px;  position:relative;">
                <p  style="font-size:14px; margin:0px;"> Date  </p> 
                <p>{{datFm($cat->date)}}</p>
                </div>
                
                <div  style="float:right; width:130px;  position:relative;">
                <p  style="font-size:14px; margin:0px;"> Place  </p> 
                <p>{{$cat->place}}</p>
                </div>
                </div>
         
        
            </div>
          <!-- section start-->
        
           </div>
            
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>