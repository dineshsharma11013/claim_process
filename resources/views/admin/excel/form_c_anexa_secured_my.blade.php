

@if(count($output)>0) 
<?php 
$total_amount_claime=0;
$total_apprvd_claim=0;
$total_amont_coverd_scrty_intrst=0;
$total_amnt_covrd_by_grntee=0;
$total_amnt_contignt_clm=0;
$total_amount_dues = 0;
$total_amount_claim_not_admitted = 0;
$total_amount_claim_under_verification= 0;
?>


<table style="border: none;border-collapse: collapse;width:749pt;">
    <tbody>
    <tr><td colspan='16' style="text-align:center;font-weight:bold">Annexure-3</td></tr>
    <tr><td colspan='16' style="text-align:center;font-weight:bold">Name of the corporate debtor: {{$comp->company_name}}; Date of commencement of CIRP: {{$comp->start_date}}; List of creditors as
on: {{date('Y-m-d')}} ;</td></tr>
        <tr><td colspan='16' style="text-align:center;font-weight:bold">List of secured financial creditors belonging to any class of creditors</td></tr>
        <tr> <td colspan='16' rowspan='2'></td></tr>
        <tr></tr>
       
<tr>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:29pt;word-wrap: break-word;">Sl. No</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:59pt;word-wrap: break-word;">Name of creditor</td>
            <td colspan="2"  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:bottom;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:120pt;word-wrap: break-word;">Details of claim received</td>
            <td colspan="6"  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:general;vertical-align:bottom;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:none;width:288pt;word-wrap: break-word;">Details of claim admitted</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:51pt;word-wrap: break-word;">Amount of conti-ngent &nbsp; &nbsp; claim</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt;border-left:.5pt solid black;width:50pt;word-wrap: break-word;">Amount of any mutual dues, that may be set-off</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:51pt;word-wrap: break-word;">Amount of claim not admitted</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:50pt;word-wrap: break-word;">Amount of claim under varification</td>
            <td rowspan="2" style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:51pt;word-wrap: break-word;">Remarks if any</td>
        </tr>
   
        <tr>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:.5pt solid black;border-right:  .5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:67pt;word-wrap: break-word;">Date of reciept</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:53pt;word-wrap: break-word;">Amount claimed</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:48pt;word-wrap: break-word;">Amount of claim admitted</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:45pt;word-wrap: break-word;">Nature of claim</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:48pt;word-wrap: break-word;">Amount covered by security interest</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:49pt;word-wrap: break-word;">Amount covered by guaratee</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:47pt;word-wrap: break-word;">Whether related party</td>
            <td  style="color:black;font-weight:700;font-style:normal;text-decoration:none;font-family:Calibri;text-align:center;vertical-align:top;border:none;border-top:none;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;width:51pt;word-wrap: break-word;">% Voting share in CoC</td>
        </tr>


      
      
       @forelse($output as $dt)
      <?php 
      $total_amount_claime +=is_numeric($dt->borrower_claim_amount) ? $dt->borrower_claim_amount : 0;
      $total_apprvd_claim +=is_numeric($dt->approved_total_amount) ? $dt->approved_total_amount : 0;
      $total_amont_coverd_scrty_intrst += is_numeric($dt->security_interest) ? $dt->security_interest : 0;
      $total_amnt_covrd_by_grntee += is_numeric($dt->guarantee_amt) ? $dt->guarantee_amt : 0;
      $total_amnt_contignt_clm +=is_numeric($dt->contingent_amt) ?$dt->contingent_amt : 0;
      $total_amount_dues +=is_numeric($dt->mutual_dues) ?$dt->mutual_dues : 0;
      $total_amount_claim_not_admitted +=is_numeric($dt->rejected_total_amount) ? $dt->rejected_total_amount:0;
      $total_amount_claim_under_verification +=is_numeric($dt->pending_total_amount) ? $dt->pending_total_amount : 0;
      ?>
       <tr>
<td style="word-wrap: break-word;"> {{$loop->index+1}}</td>
<td style="word-wrap: break-word;">{{$dt->fc_name}}</td>
<td style="word-wrap: break-word;"> {{$dt->created_at}}</td>
<td style="word-wrap: break-word;">{{$dt->borrower_claim_amount ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->approved_total_amount ?? ''}}</td>
<td style="word-wrap: break-word;">@if($dt->claim_nature==1)
Secured financial creditors belonging to any class of creditors
@else
Unsecured financial creditors belonging to any class of creditors
@endif
</td>
<td style="word-wrap: break-word;">{{$dt->security_interest ?? ''}}</td>
<td style="word-wrap: break-word;">{{$dt->guarantee_amt ?? ''}}</td>
<td style="word-wrap: break-word;">@if($dt->related_party==1)
Yes
    @else
No
    @endif
</td>
<td style="word-wrap: break-word;">{{$dt->voting_shares ?? ''}}</td>
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

    <tr ><td colspan='16'></td></tr>
    <tr>
        <td style="word-wrap: break-word;"><b>Total</b></td>
        <td ><b></b></td>
        <td><b></b></td>
        <td style="word-wrap: break-word;"><b>{{ $total_amount_claime ?? '' }}</b></td>
        <td style="word-wrap: break-word;"><b>{{ $total_apprvd_claim ?? ''}}</b></td>
        <td ><b></b></td>
        <td style="word-wrap: break-word;"><b>{{$total_amont_coverd_scrty_intrst ?? ''}}</b></td>
        <td style="word-wrap: break-word;"><b>{{$total_amnt_covrd_by_grntee ?? ''}}</b></td>
        <td><b></b></td>
        <td><b></b></td>
        <td style="word-wrap: break-word;"><b>{{ $total_amnt_contignt_clm ?? ''}}</b></td>
        <td style="word-wrap: break-word;"><b>{{ $total_amount_dues ?? ''}}</b></td>
        <td style="word-wrap: break-word;"><b>{{$total_amount_claim_not_admitted ?? ''}}</b></td>
        <td style="word-wrap: break-word;"><b>{{$total_amount_claim_under_verification ?? ''}}</b></td>
        <td><b></b></td>
        <td><b></b></td>






</tr>
</tbody>
</table>
@endif