@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>create Date</th>
<th>Company name</th>
<th>Ip name</th>
<th>User name</th>
<th>financial creditor name</th>
<th>Identification number</th>
<th>Place</th>
<th>Address</th>
<th>financial creditor email</th>
<th> Amount of claim</th>
<th>Security interest amount</th>
<th>Claim covered by Guarantee</th>
<th>Guaranter name</th>
<th>Guaranter address</th>
<th>Guaranter claim amount</th>
<th>Guaranter Security interest amount</th>
<th>Guaratee amount</th>
<th>Amount of claim</th>
<th>Name of benificiary</th>
<th>benificiary address</th>
<th>Debit incurred</th>
<th>Any mutual credit</th>
<th>Bank Acount details</th>
<th>Position with relation</th>
<th>Address of person signing</th>
<th>Place</th>
<th>Guarantor principle borrower</th>
<th>Sanction amount</th>
<th>Sanction Date</th>
<th>Declaration amount</th>
<th>Declaration date</th>
</tr>
</thead>
<tbody>
@forelse($output as $dt)
  	<tr>
  		<td>{{$loop->index+1}}</td>
<td>{{$dt->created_at}}</td>
  		<td>{{$dt->name}}</td>
      <td>{{$dt->first_name}}</td>
        <td>{{$dt->user_name}}</td>
        <td>{{$dt->fc_name}}</td>
        <td>{{$dt->fc_identification_number}}</td>
        <td>{{$dt->place}}</td>
        <td>{{$dt->fc_address}}</td>
        <td>{{$dt->fc_email}}</td>
        <td>{{$dt->borrower_claim_amount ?? ''}}</td>
        <td>{{$dt->borrower_security_interest_amount ?? ''}}</td>
        <td>{{$dt->borrower_guarantee_amt ?? ''}}</td>
        <td>{{$dt->borrower_guarantor_name ?? ''}}</td>
        <td>{{$dt->borrower_guarantor_address ?? ''}}</td>
        <td>{{$dt->guarantor_claim_amount ?? ''}}</td>
        <td>{{$dt->guarantor_security_interest_amount ?? ''}}</td>
        <td>{{$dt->guarantor_gaurantee_amt ?? ''}}</td>
        <td>{{$dt->guarantor_claim_amount ?? ''}}</td>
        <td>{{$dt->financial_beneficiary_name ?? ''}}</td>
        <td>{{$dt->financial_beneficiary_address ?? ''}}</td>
        <td>{{$dt->debt_incurred_details ?? ''}}</td>
        <td>{{$dt->other_mutual_details ?? ''}}</td>
        <td>{{$dt->bank_account_details ?? ''}}</td>
        <td>{{$dt->creditor_position ?? ''}}</td>
        <td>{{$dt->signing_address ?? ''}}</td>
        <td>{{$dt->place ?? ''}}</td>
        <td>{{$dt->guarantor_principal_borrower ?? ''}}</td>
        <td>
          @foreach($sections as $sec)
          @if($sec->form_c_selected_id==$dt->form_c_selected_id && $sec->form_c_id==$dt->id)
          {{$sec->senction_amt ?? ''}},
          @endif
          @endforeach  
        </td>
        <td>   @foreach($sections as $sec)
          @if($sec->form_c_selected_id==$dt->form_c_selected_id && $sec->form_c_id==$dt->id)
          {{$sec->date}},
          @endif
          @endforeach  </td>
          <td> @foreach($Dseclaration as $dec)
          @if($dec->form_c_selected_id==$dt->form_c_selected_id && $dec->form_c_id==$dt->id)
          {{$dec->senction_amt ?? ''}},
          @endif
          @endforeach </td>
          <td> @foreach($Dseclaration as $dec)
          @if($dec->form_c_selected_id==$dt->form_c_selected_id && $dec->form_c_id==$dt->id)
          {{$dec->date}},
          @endif
          @endforeach </td>
  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




