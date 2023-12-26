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

</tr>
</thead>
<tbody>
@forelse($output as $dt)
<tr>
<td>{{$loop->index+1}}</td>
<td>{{$dt->neme}}</td>
<td>{{$dt->principle ?? ''}}</td>
<td>{{$dt->intrest ?? ''}}</td>
<td>{{$dt->total_amount ?? ''}}</td>


<td>{{$dt->approved_principle_amt ?? ''}}</td>
<td>{{$dt->approved_interest_amount ?? ''}}</td>
<td>{{$dt->approved_total_amount ?? ''}}</td>
</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
</tbody> 
</table>
@endif




