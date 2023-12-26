@if(count($output)>0) 
<table class="table table-condensed">
            <thead>
            <tr>
            	<th>SNo.</th>	
              <th>Name</th>
              <th>Principle Amount</th>
              <th>Interest</th>
              <th>Total</th>
              <th>Approved Principal Amt.</th>
              <th>Rejected Principal Amt.</th>
              <th>Approved Interest Amt.</th>
              <th>Rejected Interest Amt.</th>
              <th>Total Approved Amt.</th>
              <th>Total Rejected Amt.</th>
             
          </tr>
      </thead>
  <tbody>
  	@forelse($output as $dt)
  	<tr>
  		<td>{{$loop->index+1}}</td>
  		<td>{{$dt->name}}</td>
  		<td>{{$dt->principal_amt ?? ''}}</td>
      <td>{{$dt->interest ?? ''}}</td>
      <td>{{$dt->total ?? ''}}</td>
      <td>{{$dt->approved_principle_amt ?? ''}}</td>
      <td>{{$dt->rejected_principle_amt ?? ''}}</td>
      <td>{{$dt->approved_interest_amt ?? ''}}</td>
      <td>{{$dt->rejected_interest_amt ?? ''}}</td>
      <td>{{$dt->total_approval_amt ?? ''}}</td>
      <td>{{$dt->total_rejected_amt ?? ''}}</td>
  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




