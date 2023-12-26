@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	    
<th>financial creditor name</th>
<th> Amount of claim</th>
<th>Security interest amount</th>
<th>Claim covered by Guarantee</th>
<th>Guaranter claim amount</th>
<th>Guaranter Security interest amount</th>
<th>Guaratee amount</th>
<th>Amount of claim</th>
<th>Approved borrower claim amount</th>
<th>Approved borrower security amount</th>
<th>Approved borrower guarantee amount</th>
<th>Approved guarantor claimed amount</th>
<th>Approved Guarantor security interest amount</th>
<th>Approved guarantor guarantee amount</th>
<th>Approved guarnator principle amount</th>
<th>Approved financial claimed amount</th>
</tr>

</thead>
<tbody>
@forelse($output as $dt)
  	<tr>
  		<td>{{$loop->index+1}}</td>
        <td>{{$dt->fc_name}}</td>
        <td>{{$dt->borrower_claim_amount ?? ''}}</td>
        <td>{{$dt->borrower_security_interest_amount ?? ''}}</td>
        <td>{{$dt->borrower_guarantee_amt ?? ''}}</td>
        <td>{{$dt->guarantor_claim_amount ?? ''}}</td>
        <td>{{$dt->guarantor_security_interest_amount ?? ''}}</td>
        <td>{{$dt->guarantor_gaurantee_amt ?? ''}}</td>
        <td>{{$dt->guarantor_claim_amount ?? ''}}</td>



        <td>{{$dt->apprv_borrower_claim_amount ?? ''}}</td>
        <td>{{$dt->apprv_borrower_security_interest_amount ?? ''}}</td>
        <td>{{$dt->apprv_borrwer_gurantee_amount ?? ''}}</td>
        <td>{{$dt->apprv_guaranter_claim_amount ?? ''}}</td>
        <td>{{$dt->apprv_gurantor_security_interest_amount ?? ''}}</td>
        <td>{{$dt->apprv_guranter_gurantee_amount ?? ''}}</td>
        <td>{{$dt->apprv_guranter_principle_amunt ?? ''}}</td>
        <td>{{$dt->financial_claimed_amount ?? ''}}</td>






    </tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




