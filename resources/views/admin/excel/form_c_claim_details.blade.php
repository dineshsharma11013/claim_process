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
    </tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




