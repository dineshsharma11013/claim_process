@if(count($output)>0) 
<table class="table table-condensed">
            <thead>
            <tr>
            	<th>SNo.</th>	
              <th>Name</th>
              <th>Amount of claim</th>
              <th>Amount of claim covered by security interest</th>
              <th>Amount of claim covered by guarantee</th>
              <th>Name of the guarantor(s)</th>
              <th>Address of the guarantor(s)</th>
              <th>Amount of claim</th>
              <th>Amount of claim covered by security interest</th>
              <th> Amount of claim covered by guarantee</th>
              <th>Name of the principal borrower </th>

              <th>Address of the principal borrower </th>
              <th>Amount of claim </th>
              <th>Name of the beneficiary </th>
              <th>Address of the beneficiary</th>
             
          </tr>
      </thead>
  <tbody>
  	@forelse($output as $dt)
  	<tr>
  		<td>{{$loop->index+1}}</td>
  		<td>{{$dt->name}}</td>
  		<td>{{$dt->borrower_claim_amount ?? ''}}</td>
      <td>{{$dt->borrower_security_interest_amount ?? ''}}</td>
      <td>{{$dt->borrower_guarantee_amt ?? ''}}</td>
      <td>{{$dt->borrower_guarantor_name ?? ''}}</td>

      <td>{{$dt->borrower_guarantor_address ?? ''}</td>
      <td>{{$dt->guarantor_claim_amount ?? ''}}</td>
      <td>{{$dt->guarantor_security_interest_amount ?? ''}}</td>
      <td>{{$dt->guarantor_gaurantee_amt ?? ''}}</td>
      <td>{{$dt->guarantor_principal_borrower ?? ''}}</td>

      <td>{{$dt->guarantor_address_borrower ?? ''}}</td>
      <td>{{$dt->financial_claim_amt ?? ''}}</td>
      <td>{{$dt->financial_beneficiary_name ?? ''}}</td>
      <td>{{$dt->financial_beneficiary_address ?? ''}}</td>

  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




