@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>Name</th>
<th>Email</th>
<th>Mobile</th>

</tr>
</thead>
<tbody>
@forelse($output as $dt)
  	<tr>
  		<td>{{$loop->index+1}}</td>
        <td>{{$dt->neme}}</td>
        <td>{{$dt->email}}</td>
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




