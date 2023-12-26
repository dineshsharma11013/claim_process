
@if(count($output)>0) 
<?php 
$ttl_claim_amount = 0;
$ttl_clm_amnt_admnttd=0;
$ttl_amnt_cvrd_scrt=0;
$ttl_amnt_cvrd_guranteee=0;
$ttl_amnt_cvrd_guranteee=0;
$ttl_amt_cntgnt_clm=0;
$ttl_amnt_mutul_dtls=0;
$ttl_amnt_clm_nt_admttd=0;
$ttl_clm_undr_vrfctn=0;

?>
<table style="margin-left:6.0pt;border-collapse:collapse;border:none;">
    <tbody>
    <tr><td colspan='15' style="text-align:center;font-weight:bold">Annexure-1</td></tr>
    <tr><td colspan='15' style="text-align:center;font-weight:bold">Name of the corporate debtor: {{$comp->company_name}}; Date of commencement of CIRP: {{$comp->start_date}}; List of creditors as
on: {{date('Y-m-d')}}; </td></tr>
        <tr><td colspan='15' style="text-align:center;font-weight:bold">List of secured financial creditors belonging to any class of creditors</td></tr>
        <tr> <td colspan='15' rowspan='3'></td></tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td rowspan="2" style="width: 26.9pt;border: 1pt solid black;padding: 0cm;vertical-align: top;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Times New Roman","serif";margin-left:12.2pt;word-wrap: break-word;'><b>Sl.No.</b></p>
            </td>
            <td rowspan="2" style="width: 36.75pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Times New Roman","serif";margin-top:0cm;margin-right:2.45pt;margin-left:5.45pt;text-align:center; word-wrap: break-word;'><b>Name of Creditor</b></p>
            </td>
            <td colspan="2" style="width: 76.6pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;word-wrap: break-word;">
                <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Times New Roman","serif";margin-left:18.65pt;text-indent:-16.8pt;word-wrap: break-word;'><b>Details of claim received</b></p>
            </td>
            <td colspan="6" style="width: 307.85pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;word-wrap: break-word;">
               <b>Details of claim admitted</b>
            </td>
            <td rowspan="2" style="width: 52.65pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;word-wrap: break-word;">
              <b>Amount of contingent claim</b>
              
            </td>
            <td rowspan="2" style="width: 49.3pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;word-wrap: break-word;">
               <b>Amount of any Mutual dues, that may be set-off</b>
            </td>
            <td rowspan="2" style="width: 49.05pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;word-wrap: break-word;">
             <b>Amount of claim not admitted</b>
            </td>
            <td rowspan="2" style="width: 53.35pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;word-wrap: break-word;">
              <b>Amount of claim under verification</b>
            </td>
            <td rowspan="2" style="width: 45.45pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm;vertical-align: top;word-wrap: break-word;">
              <b>Remarks, if any</b>
            </td>
        </tr>
        <tr>
            <td style="width: 36.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;vertical-align: top;word-wrap: break-word;">
               <b>Date of receipt</b>
            </td>
            <td style="width: 40.35pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;vertical-align: top;word-wrap: break-word;">
              <b>Amount claimed</b>
            </td>
            <td style="width: 48.3pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;vertical-align: top;word-wrap: break-word;">
               <b>Amount of claim admitted</b>
            </td>
            <td style="width: 55.05pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;vertical-align: top;word-wrap: break-word;">
                <b>Nature of claim</b>
            </td>
            <td style="width: 49pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;vertical-align: top;word-wrap: break-word;">
               <b>Amount covered by security interest</b>
            </td>
            <td style="width: 48.3pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;vertical-align: top;word-wrap: break-word;">
              <b>Amount covered by guarantee</b>
            </td>
            <td style="width: 53.1pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;vertical-align: top;word-wrap: break-word;">
               <b>Whether related party?</b>
            </td>
            <td style="width: 54.1pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm;vertical-align: top;word-wrap: break-word;">
              <b>% of voting share in CoC</b>
            </td>
        </tr>
       
        @forelse($output as $dt)
        <?php
        $ttl_claim_amount +=is_numeric($dt->claimed_ttl_amount) ? $dt->claimed_ttl_amount : 0;
        $ttl_clm_amnt_admnttd +=is_numeric($dt->approved_total_amount) ? $dt->approved_total_amount : 0;
        $ttl_amnt_cvrd_scrt +=is_numeric($dt->security_interest) ? $dt->security_interest : 0;
        $ttl_amnt_cvrd_guranteee +=is_numeric($dt->guarantee_amt) ? $dt->guarantee_amt : 0;
        $ttl_amt_cntgnt_clm +=is_numeric($dt->contingent_amt) ? $dt->contingent_amt : 0;
        $ttl_amnt_mutul_dtls +=is_numeric($dt->mutual_dues) ? $dt->mutual_dues : 0;
        $ttl_amnt_clm_nt_admttd +=is_numeric($dt->rejected_total_amount) ? $dt->rejected_total_amount: 0;
        $ttl_clm_undr_vrfctn +=is_numeric($dt->pending_total_amount) ? $dt->pending_total_amount :0 ;
        ?>
        <tr>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
            {{$loop->index+1}}
               </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
            {{$dt->fc_name}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;">
             {{$dt->created_at}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
              {{$dt->claimed_ttl_amount}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
              {{$dt->approved_total_amount}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
@if($dt->claim_nature==1)
Secured financial creditor
@else
unsecured financial creditor
@endif
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
            {{$dt->security_interest}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
                {{$dt->guarantee_amt}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
                @if($dt->related_party==1)
                yes
                @else
                no
                @endif
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
                {{$dt->voting_shares}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
                {{$dt->contingent_amt}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
                {{$dt->mutual_dues}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
                {{$dt->rejected_total_amount}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
                {{$dt->pending_total_amount}}
            </td>
            <td  style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;word-wrap: break-word;">
                {{$dt->reason}}
            </td>
        </tr>
    @empty


    <tr><td>No data found</td></tr>
    </tbody>
    @endforelse
    <tbody>
        <tr>
<td colspan='15' style="border-top: 1pt solid black;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;"></td>
    </tr>
<tr>
<td colspan='2' style="text-align:center;"><b>Total</b></td>

<td></td>
<td style="word-wrap: break-word;"><b>{{$ttl_claim_amount ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_clm_amnt_admnttd ?? ''}}</b></td>
<td style="word-wrap: break-word;"></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amnt_cvrd_scrt ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amnt_cvrd_guranteee ?? ''}}</b></td>
<td></td>
<td></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amt_cntgnt_clm ?? '' }}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amnt_mutul_dtls ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_amnt_clm_nt_admttd ?? ''}}</b></td>
<td style="word-wrap: break-word;"><b>{{$ttl_clm_undr_vrfctn ?? ''}}</b></td>
<td></td>
</tr>
</tbody>
</table>


      
@endif