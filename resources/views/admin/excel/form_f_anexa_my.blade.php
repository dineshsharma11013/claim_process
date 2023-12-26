
@if(count($output)>0) 
<?php 
$ttl_claim_amount = 0;
$ttl_clm_amnt_admnttd=0;
$ttl_amt_cntgnt_clm=0;
$ttl_amnt_mutul_dtls=0;
$ttl_clm_undr_vrfctn=0;
$ttl_amnt_clm_nt_admttd=0;

$ttl_amnt_gurantee=0;
$ttl_amnt_security_interest=0;

?>
<table style="border: none;border-collapse: collapse;width:786pt;">
    <tbody>
    <tr><td colspan='14' style="text-align:center;font-weight:bold">Annexure-9</td></tr>
    <tr><td colspan='14' style="text-align:center;font-weight:bold">Name of the corporate debtor: {{$comp->company_name}}; Date of commencement of CIRP: {{$comp->start_date}}; List of creditors as
on: {{date('Y-m-d')}};</td></tr>
        <tr><td colspan='14' style="text-align:center;font-weight:bold">List of other creditors (Other than financial creditors and operational creditors)</td></tr>
     
        <tr>
            <td colspan="14" rowspan="2" style="color:black;font-weight:400;font-style:normal;text-decoration:none;font-family:Calibri, sans-serif;text-align:center;vertical-align:bottom;border:none;width:786pt;"><br></td>
        </tr>
        <tr></tr>
      
        <tr>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:.5pt solid black;width:48pt;word-wrap: break-word;">Sl.<br>&nbsp;No.</td>
           
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid windowtext;border-right:.5pt solid windowtext;border-bottom:.5pt solid black;border-left:.5pt solid windowtext;width:48pt;word-wrap: break-word;">Name of Creditor</td>
            <td colspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:96pt;word-wrap: break-word;">Details of claim received</td>
            <td colspan="5" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:288pt;word-wrap: break-word;">Details of claim admitted</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:48pt;word-wrap: break-word;">Amount of contingent<br>&nbsp;claim</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:48pt;word-wrap: break-word;">Amount of any Mutual dues, that may be set-off</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:none;border-left:none;width:48pt;word-wrap: break-word;">Amount of claim not admitted</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri, sans-serif;text-align:left;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:48pt;word-wrap: break-word;">Amount of claim under verification</td>
            
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:none;border-left:none;width:48pt;word-wrap: break-word;">Remark s, if any</td>
        </tr>
        <tr>
            <td style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:48pt;word-wrap: break-word;">Date of receipt</td>
            <td style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:48pt;word-wrap: break-word;">Amount claimed</td>
            <td style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:48pt;word-wrap: break-word;">Amount of claim admitted</td>
            <td style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:48pt;">Nature of claim</td>
            <td style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:48pt;word-wrap: break-word;">Amount covered by<br>&nbsp;security interest</td>
            <td style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:48pt;word-wrap: break-word;">Amount covered by<br>&nbsp;guarant ee</td>
            <td style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:48pt;word-wrap: break-word;">Whether related party?</td>
           
        </tr>





        @forelse($output as $dt)
        <?php
        $ttl_claim_amount +=is_numeric($dt->claim_amt) ? $dt->claim_amt : 0;
        $ttl_clm_amnt_admnttd +=is_numeric($dt->approved_total_amount) ? $dt->approved_total_amount : 0;
        $ttl_amt_cntgnt_clm +=is_numeric($dt->contingent_amt) ? $dt->contingent_amt : 0;
        $ttl_amnt_mutul_dtls +=is_numeric($dt->mutual_dues) ? $dt->mutual_dues : 0;
        $ttl_clm_undr_vrfctn +=is_numeric($dt->pending_total_amount) ? $dt->pending_total_amount :0 ;
        $ttl_amnt_clm_nt_admttd +=is_numeric($dt->rejected_total_amount) ? $dt->rejected_total_amount: 0;

        $ttl_amnt_gurantee +=is_numeric($dt->guarantee_amt) ? $dt->guarantee_amt: 0;
        $ttl_amnt_security_interest +=is_numeric($dt->security_interest) ? $dt->security_interest: 0;
        ?>
        <tr>
<td style="word-wrap: break-word;">{{$loop->index+1}}</td>
<td style="word-wrap: break-word;">{{$dt->fc_name}}</td>
<td style="word-wrap: break-word;">{{$dt->created_at}}</td>
<td style="word-wrap: break-word;">{{$dt->claim_amt ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->approved_total_amount ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->claim_nature ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->security_interest ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->guarantee_amt ?? ''}}</td>
<td style="word-wrap: break-word;">@if($dt->related_party==1)
Yes
@else
No
@endif
</td>
<td style="word-wrap: break-word;">{{$dt->contingent_amt ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->mutual_dues ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->rejected_total_amount ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->pending_total_amount ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->reason ?? ''}}</td>




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
<td style="word-wrap: break-word;"><b>{{$ttl_claim_amount ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_clm_amnt_admnttd ?? ''}}</b></td>
<td></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amnt_security_interest ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amnt_gurantee ?? '' ?? ''}}</b></td>


<td></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amt_cntgnt_clm ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amnt_mutul_dtls ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amnt_clm_nt_admttd ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_clm_undr_vrfctn ?? ''}}</b></td>
<td></td>

</tr>
</tbody>
</table>
@endif