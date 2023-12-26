@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>Name</th>
<th>Principle amount claimed</th>
<th>Interest amount claimed</th>
<th>Total amount claimed</th>
</tr>
</thead>
<tbody>
@forelse($output as $dt)
<tr>
<td>{{$loop->index+1}}</td>
<td>{{$dt->claimant_name}}</td>
<td>{{$dt->principle_amount}}</td>
<td>{{$dt->interest}}</td>
<td>{{$dt->total_amount}}</td>


</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




