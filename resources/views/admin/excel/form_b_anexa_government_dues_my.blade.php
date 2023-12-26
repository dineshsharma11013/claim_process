

@if(count($output)>0) 

<?php 
$ttl_claim_amount = 0;
$ttl_clm_amnt_admnttd=0;
$ttl_amt_cntgnt_clm=0;
$ttl_amnt_mutul_dtls=0;
$ttl_clm_undr_vrfctn=0;
$ttl_amnt_clm_nt_admttd=0;

?>
<table style="border: none;border-collapse: collapse;width:749pt;">
    <tbody>
    <tr><td colspan='14' style="text-align:center;font-weight:bold">Annexure-7</td></tr>
    <tr><td colspan='14' style="text-align:center;font-weight:bold">Name of the corporate debtor: {{$comp->company_name}}; Date of commencement of CIRP:{{$comp->start_date}}; List of creditors as
on: {{date('Y-m-d')}};  </td></tr>
        <tr><td colspan='14' style="text-align:center;font-weight:bold">List of operational creditors (Government dues)</td></tr>
        <tr> <td colspan='14' rowspan='2'></td></tr>
        <tr></tr>
      
        <tr>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:29pt;word-wrap: break-word;">Sl. No</td>
            <td colspan="2"  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:bottom;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:120pt;word-wrap: break-word;">Details of claimant</td>
            <td colspan="2"  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:bottom;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:120pt;word-wrap: break-word;">Details Of Claim Received</td>
            <td colspan="4"  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:general;vertical-align:bottom;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:288pt;word-wrap: break-word;">Details of claim admitted</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:51pt;word-wrap: break-word;">Amount of conti-ngent &nbsp; &nbsp; claim</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt;border-left:.5pt solid black;width:50pt;word-wrap: break-word;">Amount of any mutual dues, that may be set-off</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:50pt;word-wrap: break-word;">Amount of claim under varification</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:51pt;word-wrap: break-word;">Amount of claim not admitted</td>
           
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:51pt;word-wrap: break-word;">Remarks if any</td>
        </tr>
       
        <tr>
            <td style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:  .5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:67pt;word-wrap: break-word;">Department</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:53pt;word-wrap: break-word;">Goverment</td>
            
            
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:  .5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:67pt;word-wrap: break-word;">Date Of Receipt</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:53pt;word-wrap: break-word;">Amount Claimed</td>
            
            
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:48pt;word-wrap: break-word;">Amount of claim admitted</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:45pt;word-wrap: break-word;">Nature of claim</td>

            
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:47pt;word-wrap: break-word;">Whether related party</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:51pt;word-wrap: break-word;">% Voting share in CoC</td>
        </tr>
       

      
       @forelse($output as $dt)

       <?php
        $ttl_claim_amount +=is_numeric($dt->total_amount) ? $dt->total_amount : 0;
        $ttl_clm_amnt_admnttd +=is_numeric($dt->approved_total_amount) ? $dt->approved_total_amount : 0;
        $ttl_amt_cntgnt_clm +=is_numeric($dt->contingent_amt) ? $dt->contingent_amt : 0;
        $ttl_amnt_mutul_dtls +=is_numeric($dt->mutual_dues) ? $dt->mutual_dues : 0;
        $ttl_clm_undr_vrfctn +=is_numeric($dt->pending_total_amount) ? $dt->pending_total_amount :0 ;
        $ttl_amnt_clm_nt_admttd +=is_numeric($dt->rejected_total_amount) ? $dt->rejected_total_amount: 0;
        ?>
       <tr>
<td style="word-wrap: break-word;"> {{$loop->index+1}}</td>
<td style="word-wrap: break-word;">{{$dt->dept ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->govt ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->date ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->total_amount ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->approved_total_amount ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->claim_nature ?? ''}}</td>
<td style="word-wrap: break-word;">@if($dt->related_party==1)
Yes
@else
No
@endif
</td>
<td style="word-wrap: break-word;">{{$dt->voting_shares ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->contingent_amt ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->mutual_dues ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->pending_total_amount ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->rejected_total_amount ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->reason ?? ''}}</td>
<td></td>
<td></td>
       </tr>

      
       @empty


    <tr><td>No data found</td></tr>
     
    </tbody>

    @endforelse
    <tbody>
        <tr>
<td colspan='14' style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;"></td>
    </tr>
    <tr>
<td colspan='2' style="text-align:center"><b>Total</b></td>

<td></td>
<td></td>
<td style="word-wrap: break-word;"><b>{{$ttl_claim_amount ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_clm_amnt_admnttd ?? ''}}</b></td>
<td ></td>
<td></td>
<td></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amt_cntgnt_clm ?? ''}}</b></td>

<td style="word-wrap: break-word;"><b>{{$ttl_amnt_mutul_dtls ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_clm_undr_vrfctn ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amnt_clm_nt_admttd ?? ''}}</b></td>
<td></td>
<td></td>
</tr>
</tbody>
</table>
@endif

