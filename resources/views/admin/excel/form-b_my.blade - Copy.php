@if(count($output)>0) 
<table class="table table-condensed">
            <thead>
            <tr>
            	<th>SNo.</th>	
                <th>create Date</th>
              <th>Company name</th>
              <th>operational creditor name</th>
              <th>Identification number</th>
              <th>Address</th>
              <th>operational creditor email</th>
              <th>Total Amount of claim</th>
              <th>Principle amount</th>
              <th>Interest amount</th>
              <th>Document details</th>
              <th>Dispute details</th>
              <th>Debit incurred details</th>
              <th>any mutual details</th>
              <th>Security details</th>
              <th>Bank name</th>
              <th>Account number</th>
              <th>IFSC code</th>
              <th>Signature of operational creditor</th>
              <th>Claiment name</th>
              <th>Relation to creditor</th>
              <th>signing person Address</th>
              
              <th>Sanction amount</th>
              <th>Date</th>
              <th>Details</th>





              


              


          </tr>
      </thead>
  <tbody>
  	@forelse($output as $dt)
  	<tr>
  		<td>{{$loop->index+1}}</td>
          <td>{{$dt->created_at}}</td>
  		<td>{{$dt->name}}</td>
        <td>{{$dt->operational_creditor_name}}</td>
        <td>{{$dt->identification_number}}</td>
        <td>{{$dt->operational_creditor_correspondence_address}}</td>
        <td>{{$dt->operational_creditor_email}}</td>
        <td>{{$dt->total_amount}}</td>
        <td>{{$dt->principle_amount}}</td>
        <td>{{$dt->interest}}</td>
        <td>{{$dt->document_details}}</td>
        <td>{{$dt->any_dispute_deatails}}</td>
        <td>{{$dt->debt_incurred_details}}</td>
        <td>{{$dt->any_mutual_details}}</td>
        <td>{{$dt->any_security_details}}</td>
        <td>{{$dt->bank_name}}</td>
        <td>{{$dt->account_number}}</td>
        <td>{{$dt->ifsc_code}}</td>
        <td>{{$dt->operational_creditor_signature}}</td>
        <td>{{$dt->claimant_name}}</td>
        <td>{{$dt->creditor_relation}}</td>
        <td>{{$dt->signing_person_address}}</td>
     
        <td>{{$dt->senction_amt}}</td>
        <td>{{$dt->newdstet}}</td>
        <td>{{$dt->sct_amnt}}</td>













  		
  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




