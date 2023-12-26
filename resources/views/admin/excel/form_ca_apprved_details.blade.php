@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>name</th>
<th>Principle amount</th>
<th>Interest amount</th>
<th>Total Amount of claim</th>

<th>Approved Principle amount</th>
<th>Approved Interest amount</th>
<th>Approved Total Amount of claim</th>
<th>Reason</th>

</tr>
</thead>
<tbody>
@forelse($output as $dt)
  	<tr>
  		<td>{{$loop->index+1}}</td>
        <td>{{$dt->neme}}</td>
        <td>{{$dt->claim_principle ?? ''}}</td>
        <td>{{$dt->claim_interest ?? ''}}</td>
        <td>{{$dt->claim_amt ?? ''}}</td>
        <td>{{$dt->approved_principle_amt ?? ''}}</td>
        <td>{{$dt->approved_interest_amt ?? ''}}</td>
        <td>{{$dt->total_approval_amt ?? ''}}</td>
        <td>{{$dt->resoon ?? ''}}</td>
  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




