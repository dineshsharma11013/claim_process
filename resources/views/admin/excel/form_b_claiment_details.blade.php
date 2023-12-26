@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>Claiment name</th>
<th>Email</th>

<th>Mobile</th>


</tr>
</thead>
<tbody>
@forelse($output as $dt)
  	<tr>
  		<td>{{$loop->index+1}}</td>
          <td>{{$dt->claimant_name}}</td>
  		<td>{{$dt->operational_creditor_email}}</td>
          <td>{{$dt->mobile}}</td>
     
  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




